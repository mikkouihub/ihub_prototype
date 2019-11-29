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
  <title>Portfolios</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h3 style="text-align: center;">Portfolios</h3>
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
						<h4 class="modal-title">Edit Portfolio Details</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Portfolio Name</label>
							<input type="text" name="portfolio_name" id="portfolio_name" class="form-control" />
						</div>
						<div class="form-group">
							<label>Portfolio Description</label>
							<textarea type="text" name="portfolio_desc" id="portfolio_desc" class="form-control" placeholder="Portfolio Description"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="portfolio_id" id="portfolio_id" value="" />
						<input type="submit" name="submit" id="submit" class="btn btn-info" value="Save" />
						<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
  </div>
    
<script>
	var user_type = "<?php echo $_SESSION['userType']; ?>";
	var category = "";

	if (user_type === 'Student') {
		$(document).ready(function() {
			load_product_service_data();

			function load_product_service_data() {
				$.ajax({
					url:"includes/portfolio/load-student-portfolio.inc.php",
					method:"POST",
					success:function(data) {
						$('#product-service-table').html(data);
					}
				});
			}

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
						url:"includes/portfolio/upload-student-portfolio.inc.php",
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
				var portfolio_id = $(this).attr("id");

				$.ajax({
					url:"includes/portfolio/show-modal-student.inc.php",
					method:"POST",
					data:{ portfolio_id:portfolio_id },
					dataType:"json",
					success:function(data) {
						$('#product_service_modal').modal('show');
						$('#portfolio_id').val(portfolio_id);
						$('#portfolio_name').val(data.portfolio_name);
						$('#portfolio_desc').val(data.portfolio_desc);
					}
				});
			});

			$('#edit_product_service_form').on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url:"includes/portfolio/edit-student-portfolio.inc.php",
					method:"POST",
					data:$('#edit_product_service_form').serialize(),
					success:function(data) {
						$('#product_service_modal').modal('hide');
						load_product_service_data();
						alert('Portfolio Details Updated');
					}
				});
			});

			$(document).on('click', '.delete', function(){
				var portfolio_id = $(this).attr("id");
				var portfolio_image = $(this).data("portfolio_image");

				if(confirm("Are you sure you want to remove it?")) {
					$.ajax({
						url:"includes/portfolio/delete-student-portfolio.inc.php",
						method:"POST",
						data:{ portfolio_id:portfolio_id, portfolio_image:portfolio_image },
						success:function(data) {
							load_product_service_data();
							alert("Portfolio removed");
						}
					});
				}
			}); 
		}); 
	} else if (user_type === 'Mentor') {
		$(document).ready(function() {
			load_product_service_data();

			function load_product_service_data() {
				$.ajax({
					url:"includes/portfolio/load-mentor-portfolio.inc.php",
					method:"POST",
					success:function(data) {
						$('#product-service-table').html(data);
					}
				});
			}

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
						url:"includes/portfolio/upload-mentor-portfolio.inc.php",
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
				var portfolio_id = $(this).attr("id");

				$.ajax({
					url:"includes/portfolio/show-modal-mentor.inc.php",
					method:"POST",
					data:{ portfolio_id:portfolio_id },
					dataType:"json",
					success:function(data) {
						$('#product_service_modal').modal('show');
						$('#portfolio_id').val(portfolio_id);
						$('#portfolio_name').val(data.portfolio_name);
						$('#portfolio_desc').val(data.portfolio_desc);
					}
				});
			});

			$('#edit_product_service_form').on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url:"includes/portfolio/edit-mentor-portfolio.inc.php",
					method:"POST",
					data:$('#edit_product_service_form').serialize(),
					success:function(data) {
						$('#product_service_modal').modal('hide');
						load_product_service_data();
						alert('Portfolio Details Updated');
					}
				});
			});

			$(document).on('click', '.delete', function(){
				var portfolio_id = $(this).attr("id");
				var portfolio_image = $(this).data("portfolio_image");

				if(confirm("Are you sure you want to remove it?")) {
					$.ajax({
						url:"includes/portfolio/delete-mentor-portfolio.inc.php",
						method:"POST",
						data:{ portfolio_id:portfolio_id, portfolio_image:portfolio_image },
						success:function(data) {
							load_product_service_data();
							alert("Portfolio removed");
						}
					});
				}
			}); 
		}); 
	}
</script>
</body>
</html>