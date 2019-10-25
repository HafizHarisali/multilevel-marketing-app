$(document).ready(function(){
	//Dynamic modal for delete items
	$html='';
	jQuery(".delete_package").click(function(){
		$token = jQuery(this).data("token");
		$href = jQuery(this).data("href");
		$html +='<div class="modal-dialog" role="document">';
		$html += '<div class="modal-content">'; 
		$html += '<div class="modal-header">';
        $html += '<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>';
        $html += '<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">';
        $html += '<span aria-hidden="true">&times;</span>';
        $html += '</button>';
        $html += '</div>';
        $html += '<form method="post" action="'+$href+'">';
        $html += '<input type="hidden" value="'+$token+'" name="_token"/>'
		$html += '<div class="modal-body">This action cannot be undone</div>';
		$html += '<div class="modal-footer">';
		$html += '<button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>';
		$html += '<button type="submit" class="btn btn-primary">Delete</button>';
		$html += '</div>';
		$html += '</form>';
		$html += '</div>';
		$html += '</div>';
	jQuery("#deleteModal").append($html);
	});
	jQuery(".modal").on("hidden.bs.modal", function(){
    	jQuery(".custom-modal #deleteModal").html("");
	});

	//show image after select
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            jQuery('#banner-image-edit').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            jQuery('#cover-image-edit').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	jQuery("#imgInp").change(function(){
	    readURL(this);
	});

	//ajax status update of compensations
	jQuery(".ajax_status").click(function(){
		var id = jQuery(this).data("category_id");
		if (jQuery(this).is(':checked')) {
	       var status = 0;
	    }else {
	        var status = 1;
	    }
		jQuery.ajax({
			headers: {
        		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    		},
    		data:{
    			"_token":jQuery('meta[name="csrf-token"]').attr('content'),
    			"status":status
    		},
			type : 'POST',
			url : window.location.href.split('compensation-settings')[0] + 'ajax-update-status/' + id,
			success : function(data){
				console.log('success');
			},
			error: function (data) {
				console.log('error');
			}
		});
	});

	//ajax image upload
	jQuery('#upload-image').on('submit', function(event){
      event.preventDefault();
      jQuery.ajax({
       url: window.location.href.split('banners-create')[0] + 'ajax-image-upload/',
       method:"POST",
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data){
        console.log(data.message)
       },
       error:function(data){
        console.log(data.class_name)
       },
      });
     });

	// jQuery("#ajax-image-upload").click(function(){
	// 	var banner_image = jQuery('input[name="banner_image"]').val();
	// 	jQuery.ajax({
 //    		data:{
 //    			"banner_image":banner_image
 //    		},
	// 		type : 'GET',
	// 		url : window.location.href.split('banners-create')[0] + 'ajax-image-upload/',
	// 		success : function(data){
	// 			console.log('success');
	// 		},
	// 		error: function (data) {
	// 			console.log('error');
	// 		}
	// 	});
	// });
	jQuery(".remove-btn").click(function(){
		jQuery('.form-item-edit').remove();
		$html = '<div class="form-item-file clearfix form-type-managed-file form-item-file-wrapper-file-1 form-group" data-toggle="tooltip" title="" data-original-title="(Allowed File Extensions: .gif,.png,.jpg,.jpeg,.doc,.docx,.pdf,.xls,.xlsx,.rtf,.odt,.tiff)">'
				+'<label for="edit-file-wrapper-file-1-upload">Attachment </label>'
				+'<div id="edit-file-wrapper-file-1-upload-file-upload-wrapper" class="form-managed-file">'
				+'<input type="file" id="edit-file-wrapper-file-1-upload" name="support_file" size="22" class="form-file">'
                +'</div>'
                +'</div>';                                            
		jQuery('.form-file-insert').append($html);
	});

	jQuery(".referal_name").keyup(function(){
		var name = jQuery(this).val();
		jQuery.ajax({
			url: window.location.href.split('add-member')[0] + 'get-user?referal_name=' + name,
			type:'GET',
			dataType: 'JSON',
			beforeSend: function(data){
				jQuery('.font-icon').removeClass('fa-check-circle');
				jQuery('.font-icon').addClass('fa-refresh');
				jQuery('.font-icon').removeClass('fa-times-circle');
				jQuery('.fa-refresh').addClass('animate');
			},
			success:function(data){
				jQuery('.font-icon').removeClass('fa-refresh');
				jQuery('.font-icon').addClass('fa-check-circle');
				jQuery('.font-icon').removeClass('animate');
			},
			error:function(data){
				jQuery('.font-icon').addClass('fa-refresh');
				jQuery('.font-icon').addClass('fa-times-circle');
				jQuery('.font-icon').removeClass('animate');
			}
		});
	});

	$ = jQuery;
	$.getJSON(
	    window.location.href.split('network-explorer')[0] + 'network-explorer-tree',
	    function(data) {
	        $('#tree1').tree({
	            data: data
	        });
	    }
	);

	$.getJSON(
	    window.location.href.split('network-explorer')[0] + 'network-explorer-left-tree',
	    function(data) {
	        $('#tree-left').tree({
	            data: data
	        });
	    }
	);

	$.getJSON(
	    window.location.href.split('network-explorer')[0] + 'network-explorer-right-tree',
	    function(data) {
	        $('#tree-right').tree({
	            data: data
	        });
	    }
	);

	//initializing select2
	$('#edit-field-users-und').select2({
	  ajax: {
	    url: window.location.href.split('mlm.admin')[0]+'mlm.admin/admin/get-referee-user',
		dataType: 'json',
	    delay: 250,
	    data: function (params) {
	      return {
	        q: params.term, // search term
	        page: params.page
	      };
	    },
	    processResults: function (data) {
	      return {
	        results: data.items,
	      };
	    },
	    cache: true
	  },
	  placeholder: 'Search for a sponsor',
	  minimumInputLength: 1,
	});

	//initializing select2
	$('#edit-field-users-add').select2({
	  ajax: {
	    url: window.location.href.split('mlm.admin')[0]+'mlm.admin/admin/get-user',
		dataType: 'json',
	    delay: 250,
	    data: function (params) {
	      return {
	        q: params.term, // search term
	        page: params.page
	      };
	    },
	    processResults: function (data) {
	      return {
	        results: data.items,
	      };
	    },
	    cache: true
	  },
	  placeholder: 'Search for a sponsor',
	  minimumInputLength: 1,
	});

	 setTimeout(function () {
        $.ajax({
            url: window.location.href.split('mlm.admin')[0]+'mlm.admin/admin/notifications',
            type: "GET",
            dataType: 'json',  
            success: function (response) {
            	$("#afl-notification").append(response.data);
            },
            error: function(data){
            	console.log('error');
            },
        });
    }, 500);

	// //check radio button
	// $("input[name='views_bulk_operations']").change(function(){
 //    	if($(this).prop("checked", true)){
 //    		$select_value = $("#edit-operation option:selected").val();
 //    		if($select_value > 0){
 //    			$('#edit-submit--2').attr('disabled',false);
 //    		}
 //    		else{
 //    			$('#edit-submit--2').attr('disabled',true);
 //    		}
    		
 //    	}
 //    	else{
 //    		$('#edit-submit--2').attr('disabled',true);
 //    	}
	// });

	// $("#edit-operation").change(function(){
 //    	if($("#edit-views-bulk-operations--2").is(':checked')){
 //    		alert();
 //    		$select_value = $("#edit-operation option:selected").val();
 //    		if($select_value > 0){
 //    			$('#edit-submit--2').attr('disabled',false);
 //    		}
 //    		else{
 //    			$('#edit-submit--2').attr('disabled',true);
 //    		}	
 //    	}
 //    	else{
 //    		$('#edit-submit--2').attr('disabled',true);
 //    	}
	// });
	
	$ = jQuery;
	$( function() {
    $( "#fromdate" ).datepicker();
  } );
	$( function() {
    $( "#todate" ).datepicker();
  } );
});



