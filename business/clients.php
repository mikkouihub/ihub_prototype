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
  <title>Clients</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h3 style="text-align: center;">Clients</h3>
    <a href="profile.php"><button>Go Back</button></a>
    <div style="float: right;">
      <input type="file" name="client-files" id="client-files" multiple/>
			<span class="text-muted">Only .jpg, .png, .gif file/s allowed</span>
			<span id="error_client_files"></span>
    </div>

		<div class="table-responsive" id="client-table">
			<!-- Table Here -->
  	</div>

		<div id="client_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" id="edit_client_form">
            <div class="modal-header">
              <button type="submit" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Client Details</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Client's Name</label>
                <input type="text" name="client_name" id="client_name" class="form-control" />
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="client_id" id="client_id" value="" />
              <input type="submit" name="submit" class="btn btn-info" value="Save" />
              <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    
<script>
	$(document).ready(function() {
		load_client_data();

		function load_client_data() {
			$.ajax({
				url:"includes/client/load-client.inc.php",
				method:"POST",
				success:function(data) {
					$('#client-table').html(data);
				}
			});
		}

		$('#client-files').change(function() {
			var error_images = '';
			var form_data = new FormData();
			var files = $('#client-files')[0].files;

			if(files.length > 10) {
				error_images += 'You can not select more than 10 files';
			} else {
				for (var i = 0; i < files.length; i++) {
					var name = document.getElementById("client-files").files[i].name;
					var ext = name.split('.').pop().toLowerCase();

					if (jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
						error_images += '<p>Invalid '+i+' File</p>';
					}

					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("client-files").files[i]);
					var f = document.getElementById("client-files").files[i];
					var fsize = f.size||f.fileSize;

					if(fsize > 2000000) {
						error_images += '<p>' + i + ' File Size is very big</p>';
					} else {
						form_data.append("client-files[]", document.getElementById('client-files').files[i]);
					}
				}
			}
			
			if(error_images == '') {
				$.ajax({
					url:"includes/client/upload-client.inc.php",
					method:"POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend:function() {
						$('#error_client_files').html('<br /><label class="text-primary">Uploading...</label>');
					},

					success:function(data) {
						$('#error_client_files').html('<br /><label class="text-success">Uploaded</label>');
						load_client_data();
					}
				});
			} else {
				$('#client-files').val('');
				$('#error_client_files').html("<span class='text-danger'>"+error_images+"</span>");
				return false;
			}
		});  

		$(document).on('click', '.edit', function() {
      var client_id = $(this).attr("id");

      $.ajax({
        url:"includes/client/show-modal-client.inc.php",
        method:"POST",
        data:{ client_id:client_id },
        dataType:"json",
        success:function(data) {
          $('#client_modal').modal('show');
          $('#client_id').val(client_id);
          $('#client_name').val(data.client_name);
        }
      });
    });

		$('#edit_client_form').on('submit', function(event) {
      event.preventDefault();
      if($('#client_name').val == '') {
        alert("Enter Client's Name");
      } else {
        $.ajax({
          url:"includes/client/edit-client.inc.php",
          method:"POST",
          data:$('#edit_client_form').serialize(),
          success:function(data) {
            $('#client_modal').modal('hide');
            load_client_data();
            alert('Client Details Updated');
          }
        });
      }
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