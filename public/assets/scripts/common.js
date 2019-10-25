(function ($) {
  jQuery('html').removeClass('no-js');
  Drupal.behaviors.epsdiamond = {
    attach: function(context, settings) {
      $(document).ready(function() {

        /* Primary Messages */
        if($(".view-content .list-messages:last-child .mailbox-content .collapse").length){
          $('.view-content .list-messages:last-child .mailbox-content .collapse').collapse('show');
        }
        /* END -> Primary Messages */
        /* Change Language */
        if($('.language-block > ul.language-switcher-locale-url li.active a').length){
          var current_language = $('.language-block > ul.language-switcher-locale-url li.active a').text();
          $('.language-block > a.language-main-link').html(current_language+' <span class="caret"></span>');
        }
        /* END -> Change Language */
        /* Menu - Active */
        if($("ul.nav.menu-navigation > .active-trail").length){
          if(!$("ul.nav.menu-navigation > .active-trail").is(".active")){
            $("ul.nav.menu-navigation > .active-trail").addClass("active");
          }
        }

        if($("ul.nav.menu-navigation > li.expanded > a.active").length){
          if(!$("ul.nav.menu-navigation > li.expanded > a.active").parent('li').is(".active")){
            $("ul.nav.menu-navigation > li.expanded > a.active").parent('li').addClass("active");
          }
        }

        /* END -> Menu - Active */
        /* Views bulk operations (select box) */
        if($('input.vbo-table-select-all').length){
          $('input.vbo-table-select-all').click(function(event) {  //on click
            if (this.checked) { // check select status
              $('input.vbo-select').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes
              });
            } else {
              $('input.vbo-select').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes
              });
            }
          });
        }
        if($('input.vbo-select').length){
          $('input.vbo-select').click(function(event) {
            jQuery(this).parent().parent().trigger('click');
          });
        }
        /* END -> Views bulk operations (select box) */

/*=========================================Pratheesh==========================================================================*/
        /* Selected package in add new member */
        if($('#afl-add-new-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').length){
          //if the radio already selected
          if($('#afl-add-new-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').is(':checked')) {
            $('#afl-add-new-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio:checked').parent().parent().addClass("active-package");

          }
          //in logged user add mbr
          $('#afl-add-new-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').on('change',function() {
            $('#afl-add-new-member .form-item-field-afl-enrollment-fee-und').removeClass("active-package");
            if($(this).is(":checked")) {

                $(this).parent().parent().addClass("active-package");
            }
          });
        }

        if($('#afl-ref-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').length){
          //if the radio already selected
          if($('#afl-ref-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').is(':checked')) {
            $('#afl-ref-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio:checked').parent().parent().addClass("active-package");

          }
          //in logged user add mbr
          $('#afl-ref-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').on('change',function() {
            $('#afl-ref-member .form-item-field-afl-enrollment-fee-und').removeClass("active-package");
            if($(this).is(":checked")) {

                $(this).parent().parent().addClass("active-package");
            }
          });
        }
        if($('#afl-join-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').length){
           //if the radio already selected
          if($('#afl-join-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').is(':checked')) {
            $('#afl-join-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio:checked').parent().parent().addClass("active-package");

          }
          //new user without login
          $('#afl-join-member .form-item-field-afl-enrollment-fee-und .form-radios input:radio').on('change',function() {
            $('#afl-join-member .form-item-field-afl-enrollment-fee-und').removeClass("active-package");
            if($(this).is(":checked")) {

                $(this).parent().parent().addClass("active-package");
            }
          });
        }
        $('#commerce-checkout-form-review #edit-commerce-payment #edit-commerce-payment-payment-method ').removeClass("active-payment");
        if($('#commerce-checkout-form-review #edit-commerce-payment .form-radios .form-item-commerce-payment-payment-method input:radio').is(':checked')) {
            $('#commerce-checkout-form-review #edit-commerce-payment .form-radios .form-item-commerce-payment-payment-method input:radio:checked').parent().parent().addClass("active-payment");

          }
          $('#commerce-checkout-form-review #edit-commerce-payment .form-radios .form-item-commerce-payment-payment-method input:radio').on('change',function() {
            $('#commerce-checkout-form-review #edit-commerce-payment .form-radios .form-item-commerce-payment-payment-method').removeClass("active-payment");
            if($(this).is(":checked")) {

                $(this).parent().parent().addClass("active-payment");
            }
          });
/*===================================================================================================================*/

$( ".percentage-n-amount" ).change(function() {
  if ($(this).val().indexOf('%') > -1){
    $(this).closest('.input-group').find('.input-group-addon:first').html('%');
  }
  else{
     $(this).closest('.input-group').find('.input-group-addon:first').html($(this).attr('groupfields'));
  }
});

$( ".percentage-n-amount" ).each(function() {
  if ($(this).val().indexOf('%') > -1){
    $(this).closest('.input-group').find('.input-group-addon:first').html('%');
  }
  else{
     $(this).closest('.input-group').find('.input-group-addon:first').html($(this).attr('groupfields'));
  }
});

$('input.single-switch-checkbox').on('change', function() {
    $('input.single-switch-checkbox').not(this).prop('checked', false);
});


/*=========================================================================================================================*/
$('.mail_icon').click(function(){
     if($(this).find('i').hasClass('fa-plus')){
      $(this).find('i').removeClass('fa-plus');
        $(this).find('i').addClass('fa-minus');
     }
    else{
      $(this).find('i').removeClass('fa-minus');
      $(this).find('i').addClass('fa-plus');
    }
});

/*============================================================================================================================*/


    $(".copy-export-code").click(function() {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).closest('tr').find('td:eq(7) div').html()).select();
    document.execCommand("copy");
    $temp.remove();
    return false;
    });



/*========================================================================================================*/

    $(".cop-banner-link").click(function() {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).parent().parent().find('.banner-image-copy').html()).select();
    document.execCommand("copy");
    $temp.remove();
    return false;
    });

/*=============================================================================================================*/
  // Set the date we're counting down to

var countDownDate = $("#package-expire-timer").length;
if(countDownDate){
  countDownDate = $("#package-expire-timer").html();
  countDownDate = countDownDate * 1000;
    var now = $("#curret-date-expire").html();
    var i = 0;
    now = now * 1000;
    var distance = countDownDate - now;
    if(distance > 0){
      var x = setInterval(function() {
        i += 60;
        distance -= i;
        if (distance < 0) {
          clearInterval(x);
          $("#package-expire-timer").html("EXPIRED");
        }
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        var content = '';
        if(days > 0){
          content = content + days + "d ";
        }
        
        content = content + hours + "h "+minutes + "m "+seconds + "s ";
        $("#package-expire-timer").html(content);
    }, 1000);
  }else{
    $("#package-expire-timer").html("EXPIRED");
  }
}

/*=============================================================================================================*/

      });
    }
  };
}(jQuery));
