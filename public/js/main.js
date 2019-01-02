var Main = {
	init: function() {
		$(document).ready(function () {

			// Admin >> Product >> Tag
			$('#tag-s2').select2({
			  placeholder: 'Tag',
			  maximumSelectionSize: 3
			});

			// On close modal image -- Admin >> Product >> Image >> Add
			$('#modalUpload').on('hidden.bs.modal', function () {

				var html = '';

				$.each(files, function(index,value) {
					html += '<div class="admin-product-image-thumb float-left mr-4">';
					html += '<img src="' + APP_URL + '/storage/products/' + value + '" alt="Product 1 - Vintage Ecommerce">';
					html += '</div>';
				});

				$('.admin-product-image').append(html);
				
			});
			
		});

		/* dropzone */
		var files = [];

		Dropzone.options.dropzoneUpload  = {
		    paramName: "file",
		    dictDefaultMessage: "Drop an image or click in input to upload a image",
		    acceptedFiles: "image/*",
		    success: function (file,response) {
		    	files.push(response.file);
		    	$('#files').val(files);
		    }
		};

		Dropzone.options.dropzoneUploadCsv  = {
		    paramName: "file",
		    dictDefaultMessage: "Drop or click input to upload a CSV file"
		};


		/* Jquery Mask */
		$('.price').mask('999999.99',{reverse: true});

	},
	deleteProduct: function (id) {
		swal({
			title: "DELETE PRODUCT",
			text: "Are you sure you want delete this item ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		  		form = id ? '#formDelete-' + id : '#formDelete';
		  		$(form).submit();
			}
		});
	}

};

Main.init();