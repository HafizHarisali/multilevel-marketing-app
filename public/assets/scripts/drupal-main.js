/**
 * @file
 * bootstrap.js
 *
 * Provides general enhancements and fixes to Bootstrap's JS files.
 */

var Drupal = Drupal || {};

(function($, Drupal){
  "use strict";

 /* Drupal.behaviors.bootstrap = {
    attach: function(context) {
      // Provide some Bootstrap tab/Drupal integration.
      $(context).find('.tabbable').once('bootstrap-tabs', function () {
        var $wrapper = $(this);
        var $tabs = $wrapper.find('.nav-tabs');
        var $content = $wrapper.find('.tab-content');
        var borderRadius = parseInt($content.css('borderBottomRightRadius'), 10);
        var bootstrapTabResize = function() {
          if ($wrapper.hasClass('tabs-left') || $wrapper.hasClass('tabs-right')) {
            $content.css('min-height', $tabs.outerHeight());
          }
        };
        // Add min-height on content for left and right tabs.
        bootstrapTabResize();
        // Detect tab switch.
        if ($wrapper.hasClass('tabs-left') || $wrapper.hasClass('tabs-right')) {
          $tabs.on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
            bootstrapTabResize();
            if ($wrapper.hasClass('tabs-left')) {
              if ($(e.target).parent().is(':first-child')) {
                $content.css('borderTopLeftRadius', '0');
              }
              else {
                $content.css('borderTopLeftRadius', borderRadius + 'px');
              }
            }
            else {
              if ($(e.target).parent().is(':first-child')) {
                $content.css('borderTopRightRadius', '0');
              }
              else {
                $content.css('borderTopRightRadius', borderRadius + 'px');
              }
            }
          });
        }
      });
    }
  };*/

  /**
   * Bootstrap Popovers.
   */
  /*Drupal.behaviors.bootstrapPopovers = {
    attach: function (context, settings) {
      if (settings.bootstrap && settings.bootstrap.popoverEnabled) {
        var elements = $(context).find('[data-toggle="popover"]').toArray();
        for (var i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          var options = $.extend(true, {}, settings.bootstrap.popoverOptions, $element.data());
          $element.popover(options);
        }
      }
    }
  };*/

  /**
   * Bootstrap Tooltips.
   */
  /*Drupal.behaviors.bootstrapTooltips = {
    attach: function (context, settings) {
      if (settings.bootstrap && settings.bootstrap.tooltipEnabled) {
        var elements = $(context).find('[data-toggle="tooltip"]').toArray();
        for (var i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          var options = $.extend(true, {}, settings.bootstrap.tooltipOptions, $element.data());
          $element.tooltip(options);
        }
      }
    }
  };
*/
  /**
   * Anchor fixes.
   */
  /*var $scrollableElement = $();
  Drupal.behaviors.bootstrapAnchors = {
    attach: function(context, settings) {
      var i, elements = ['html', 'body'];
      if (!$scrollableElement.length) {
        for (i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          if ($element.scrollTop() > 0) {
            $scrollableElement = $element;
            break;
          }
          else {
            $element.scrollTop(1);
            if ($element.scrollTop() > 0) {
              $element.scrollTop(0);
              $scrollableElement = $element;
              break;
            }
          }
        }
      }
      if (!settings.bootstrap || !settings.bootstrap.anchorsFix) {
        return;
      }
      var anchors = $(context).find('a').toArray();
      for (i = 0; i < anchors.length; i++) {
        if (!anchors[i].scrollTo) {
          this.bootstrapAnchor(anchors[i]);
        }
      }
      $scrollableElement.once('bootstrap-anchors', function () {
        $scrollableElement.on('click.bootstrap-anchors', 'a[href*="#"]:not([data-toggle],[data-target])', function(e) {
          this.scrollTo(e);
        });
      });
    },
    bootstrapAnchor: function (element) {
      element.validAnchor = element.nodeName === 'A' && (location.hostname === element.hostname || !element.hostname) && element.hash.replace(/#/,'').length;
      element.scrollTo = function(event) {
        var attr = 'id';
        var $target = $(element.hash);
        if (!$target.length) {
          attr = 'name';
          $target = $('[name="' + element.hash.replace('#', '') + '"');
        }
        var offset = $target.offset().top - parseInt($scrollableElement.css('paddingTop'), 10) - parseInt($scrollableElement.css('marginTop'), 10);
        if (this.validAnchor && $target.length && offset > 0) {
          if (event) {
            event.preventDefault();
          }
          var $fakeAnchor = $('<div/>')
            .addClass('element-invisible')
            .attr(attr, $target.attr(attr))
            .css({
              position: 'absolute',
              top: offset + 'px',
              zIndex: -1000
            })
            .appendTo(document);
          $target.removeAttr(attr);
          var complete = function () {
            location.hash = element.hash;
            $fakeAnchor.remove();
            $target.attr(attr, element.hash.replace('#', ''));
          };
          if (Drupal.settings.bootstrap.anchorsSmoothScrolling) {
            $scrollableElement.animate({ scrollTop: offset, avoidTransforms: true }, 400, complete);
          }
          else {
            $scrollableElement.scrollTop(offset);
            complete();
          }
        }
      };
    }
  };*/


  if(Drupal.jsAC){
    Drupal.jsAC.prototype.setStatus = function (status) {
      var $throbber = $('.glyphicon-refresh', $('#' + this.input.id).parent());

      switch (status) {
        case 'begin':
          $throbber.addClass('glyphicon-spin');
          $(this.ariaLive).html(Drupal.t('Searching for matches...'));
          break;
        case 'cancel':
        case 'error':
        case 'found':
          $throbber.removeClass('glyphicon-spin');
          break;
      }
    };
  }
  if(Drupal.tableSelect){
    Drupal.tableSelect = function () {
      // Do not add a "Select all" checkbox if there are no rows with checkboxes in the table
      if ($('td input:checkbox', this).length == 0) {
        return;
      }

      // Keep track of the table, which checkbox is checked and alias the settings.
      var table = this, checkboxes, lastChecked;
      var strings = { 'selectAll': Drupal.t('Select all rows in this table'), 'selectNone': Drupal.t('Deselect all rows in this table') };
      var updateSelectAll = function (state) {
        // Update table's select-all checkbox (and sticky header's if available).
        $(table).prev('table.sticky-header').andSelf().find('th.select-all input:checkbox').each(function() {
          $(this).attr('title', state ? strings.selectNone : strings.selectAll);
          this.checked = state;
        });
      };

      // Find all <th> with class select-all, and insert the check all checkbox.
      $('th.select-all', table).prepend($('<label class="i-checks"><input class="form-checkbox checkbox" type="checkbox"><i></i></label>').attr('title', strings.selectAll)).click(function (event) {
        if ($(event.target).is('input:checkbox')) {
          // Loop through all checkboxes and set their state to the select all checkbox' state.
          checkboxes.each(function () {
            this.checked = event.target.checked;
            // Either add or remove the selected class based on the state of the check all checkbox.
            $(this).closest('tr').toggleClass('selected', this.checked);
          });
          // Update the title and the state of the check all box.
          updateSelectAll(event.target.checked);
        }
      });

      // For each of the checkboxes within the table that are not disabled.
      checkboxes = $('td input:checkbox:enabled', table).click(function (e) {
        // Either add or remove the selected class based on the state of the check all checkbox.
        $(this).closest('tr').toggleClass('selected', this.checked);

        // If this is a shift click, we need to highlight everything in the range.
        // Also make sure that we are actually checking checkboxes over a range and
        // that a checkbox has been checked or unchecked before.
        if (e.shiftKey && lastChecked && lastChecked != e.target) {
          // We use the checkbox's parent TR to do our range searching.
          Drupal.tableSelectRange($(e.target).closest('tr')[0], $(lastChecked).closest('tr')[0], e.target.checked);
        }

        // If all checkboxes are checked, make sure the select-all one is checked too, otherwise keep unchecked.
        updateSelectAll((checkboxes.length == $(checkboxes).filter(':checked').length));

        // Keep track of the last checked checkbox.
        lastChecked = e.target;
      });

      // If all checkboxes are checked on page load, make sure the select-all one
      // is checked too, otherwise keep unchecked.
      updateSelectAll((checkboxes.length == $(checkboxes).filter(':checked').length));
    };
  }

if(Drupal.behaviors.password){
  Drupal.behaviors.password = {
    attach: function (context, settings) {
      var translate = settings.password;
      $('input.password-field', context).once('password', function () {
        var passwordInput = $(this);
        var innerWrapper = $(this).parent();
        var outerWrapper = $(this).parent().parent();

        // Add identifying class to password element parent.
        innerWrapper.addClass('password-parent');

        // Add the password confirmation layer.
        $('input.password-confirm', outerWrapper).parent().prepend('<div class="password-confirm">' + translate['confirmTitle'] + ' <span></span></div>').addClass('confirm-parent');
        var confirmInput = $('input.password-confirm', outerWrapper);
        var confirmResult = $('div.password-confirm', outerWrapper);
        var confirmChild = $('span', confirmResult);

        // Add the description box.
        var passwordMeter = '<div class="password-strength"><div class="password-strength-title">' + translate['strengthTitle'] + '</div><div class="password-strength-text" aria-live="assertive"></div><div class="password-indicator"><div class="indicator"></div></div></div>';
        $(confirmInput).parent().after('<div class="password-suggestions description"></div>');
        $(innerWrapper).prepend(passwordMeter);
        var passwordDescription = $('div.password-suggestions', outerWrapper).hide();

        // Check the password strength.
        var passwordCheck = function () {

          // Evaluate the password strength.
          var result = Drupal.evaluatePasswordStrength(passwordInput.val(), settings.password);

          // Update the suggestions for how to improve the password.
          if (passwordDescription.html() != result.message) {
            passwordDescription.html(result.message);
          }

          // Only show the description box if there is a weakness in the password.
          if (result.strength == 100) {
            passwordDescription.hide();
          }
          else {
            passwordDescription.show();
          }

          // Adjust the length of the strength indicator.
          $(innerWrapper).find('.indicator').css('width', result.strength + '%');

          // Update the strength indication text.
          $(innerWrapper).find('.password-strength-text').html(result.indicatorText);

          passwordCheckMatch();
        };

        // Check that password and confirmation inputs match.
        var passwordCheckMatch = function () {

          if (confirmInput.val()) {
            var success = passwordInput.val() === confirmInput.val();

            // Show the confirm result.
            confirmResult.css({ visibility: 'visible' });

            // Remove the previous styling if any exists.
            if (this.confirmClass) {
              confirmChild.removeClass(this.confirmClass);
            }

            // Fill in the success message and set the class accordingly.
            var confirmClass = success ? 'ok' : 'error';
            confirmChild.html(translate['confirm' + (success ? 'Success' : 'Failure')]).addClass(confirmClass);
            this.confirmClass = confirmClass;
          }
          else {
            confirmResult.css({ visibility: 'hidden' });
          }
        };

        // Monitor keyup and blur events.
        // Blur must be used because a mouse paste does not trigger keyup.
        passwordInput.keyup(passwordCheck).focus(passwordCheck).blur(passwordCheck);
        confirmInput.keyup(passwordCheckMatch).blur(passwordCheckMatch);
      });
    }
  };
}
})(jQuery, Drupal);