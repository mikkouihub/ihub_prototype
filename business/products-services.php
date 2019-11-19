<?php
	session_start();

	if ($_SESSION['loggedIn'] != true) {
	    header("Location: ../index.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Products/Services</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h3 style="text-align: center;">Products/Services</h3>
    <a href="profile.php"><button>Go Back</button></a>
    <div style="float: right;">
      <input type="file" name="product-service-files" id="product-service-files" multiple/>
			<span class="text-muted">Only .jpg, .png, .gif file/s allowed</span>
			<span id="error_product_service_files"></span>
    </div>

		<div class="table-responsive" id="product-service-table">
			<!-- Table Here -->
  	</div>

		<div id="product_service_modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" id="edit_product_service_form">
					<div class="modal-header">
						<button type="submit" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Product / Service Details</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Product / Service Title</label>
							<input type="text" name="product_service_name" id="product_service_name" class="form-control" />
						</div>
						<div class="form-group">
							<label>Product / Service Price</label>
							<input type="text" name="product_service_price" id="product_service_price" class="form-control" />
						</div>
						<!-- <div class="form-group">
							<label>Minimum Order Quantity</label>
							<input type="text" name="Minimum_Order_Quantity" id="Minimum_Order_Quantity" class="form-control" />
						</div> -->
						<div class="form-group">
							<label>Product / Service Description</label>
							<textarea type="text" name="product_service_description" id="product_service_description" class="form-control" placeholder="Product / Service Description"></textarea>
						</div>
						<div class="form-group">
							<label class="field-label">Your Business Type</label>
								<select name="product_service_type" id="product_service_type" class="form-control categorydropdown" required>
							</select>
						</div>
						<div class="form-group">
							<label class="field-label">Select Category</label>
								<select name="product_service_category" id="product_service_category" class="form-control categorydropdown" required disabled>
									<option value="">Select Category</option>
								</select>
						</div>
						<div class="form-group">
							<label class="field-label">Select Sub-category</label>
								<select name="product_service_sub_category" id="product_service_sub_category" class="form-control categorydropdown" required disabled>
									<option value="">Select Sub-category</option>
								</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="product_service_id" id="product_service_id" value="" />
						<input type="submit" name="submit" id="submit" class="btn btn-info" value="Save" disabled/>
						<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
  </div>
    
<script>
	var business_type = "";
	var category = "";

	$(document).ready(function() {
		load_product_service_data();

		function load_product_service_data() {
			$.ajax({
				url:"includes/product-service/load-product-services.inc.php",
				method:"POST",
				success:function(data) {
					$('#product-service-table').html(data);
				}
			});
		}

		$.ajax({
			type:'POST',
			url:'includes/product-service/load-product-services-type.inc.php',
			success:function(html){
					$('#product_service_type').html(html);
			}
		});

		function chainSelect(current, target){
			var value1 = $(current).on('change', function() {
				if($(this).find(':selected').val() != ''){
					$(target).removeAttr('disabled');
					var value = $(this).find(':selected').text();
				} else {
					$(target).prop('disabled', 'disabled').val(null);
				}
			  return value;
			});
				return value1;
		}
		
		type = chainSelect('select#product_service_type', '#product_service_category');
		category = chainSelect('select#product_service_category', '#product_service_sub_category');
		sub_category = chainSelect('select#product_service_type', '#product_service_sub_category');
		submit = chainSelect('select#product_service_sub_category', '#submit');

		$('#product_service_type').on('change', function() {
			business_type = $(this).val();
			$.ajax({
				type:'POST',
				url:'includes/product-service/load-product-services-category.inc.php',
				data: { "company_business_type": business_type },
				success:function(html) {
						$('#product_service_category').html(html);
				}
			});
		});

		$('#product_service_category').on('change', function() {
			category = $(this).val();
			$.ajax({
					type:'POST',
					url:'includes/product-service/load-product-services-sub-category.inc.php',
					data: { "category_id": category, "company_business_type": business_type },
					success:function(html){
						$('#product_service_sub_category').html(html);
					}
			});
		});

		$('#product-service-files').change(function() {
			var error_images = '';
			var form_data = new FormData();
			var files = $('#product-service-files')[0].files;

			if(files.length > 10) {
				error_images += 'You can not select more than 10 files';
			} else {
				for (var i = 0; i < files.length; i++) {
					var name = document.getElementById("product-service-files").files[i].name;
					var ext = name.split('.').pop().toLowerCase();

					if (jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
						error_images += '<p>Invalid '+i+' File</p>';
					}

					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("product-service-files").files[i]);
					var f = document.getElementById("product-service-files").files[i];
					var fsize = f.size||f.fileSize;

					if(fsize > 2000000) {
						error_images += '<p>' + i + ' File Size is very big</p>';
					} else {
						form_data.append("product-service-files[]", document.getElementById('product-service-files').files[i]);
					}
				}
			}
			
			if(error_images == '') {
				$.ajax({
					url:"includes/product-service/upload-product-service.inc.php",
					method:"POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend:function() {
						$('#error_product_service_files').html('<br /><label class="text-primary">Uploading...</label>');
					},

					success:function(data) {
						$('#error_product_service_files').html('<br /><label class="text-success">Uploaded</label>');
						load_product_service_data();
					}
				});
			} else {
				$('#product-service-files').val('');
				$('#error_product_service_files').html("<span class='text-danger'>"+error_images+"</span>");
				return false;
			}
		});  

		$(document).on('click', '.edit', function() {
      var product_service_id = $(this).attr("id");

      $.ajax({
        url:"includes/product-service/show-modal-product-service.inc.php",
        method:"POST",
        data:{ product_service_id:product_service_id },
        dataType:"json",
        success:function(data) {
          $('#product_service_modal').modal('show');
          $('#product_service_id').val(product_service_id);
          $('#product_service_name').val(data.product_service_name);
					$('#product_service_price').val(data.product_service_price);
					// $('#Minimum_Order_Quantity').val(data.Minimum_Order_Quantity);
					$('#product_service_type').val(data.product_service_type);
					$('#product_service_category').val(data.product_service_category);
					$('#product_service_sub_category').val(data.product_service_sub_category);
					$('#product_service_description').val(data.product_service_description);
        }
      });
    });

		$('#edit_product_service_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
				url:"includes/product-service/edit-product-service.inc.php",
				method:"POST",
				data:$('#edit_product_service_form').serialize(),
				success:function(data) {
					$('#product_service_modal').modal('hide');
					load_product_service_data();
					alert('Product / Service Details Updated');
				}
			});
    });

		$(document).on('click', '.delete', function(){
			var client_id = $(this).attr("id");
			var client_image = $(this).data("client_image");

			if(confirm("Are you sure you want to remove it?")) {
				$.ajax({
					url:"includes/client/delete-client.inc.php",
					method:"POST",
					data:{ client_id:client_id, client_image:client_image },
					success:function(data) {
						load_client_data();
						alert("Image removed");
					}
				});
			}
		}); 
	}); 
</script>
</body>
</html>