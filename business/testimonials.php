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
  <title>Testimonials</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="../images/fcbilogo.png">
</head>
<body>
  <div class="container">
    <h3 style="text-align: center;">Testimonials</h3>
    <a href="profile.php"><button>Go Back</button></a>
    <div style="float: right;">
      <input type="file" name="testimonial-files" id="testimonial-files" multiple/>
			<span class="text-muted">Only .jpg, .png, .gif, file/s are allowed</span>
			<span id="error_testimonial_files"></span>
    </div>

    <div class="table-responsive" id="testimonial_table">
      <!-- Table Here -->
    </div>

    <div id="testimonial_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <form method="POST" id="edit_testimonial_form">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Testimonial Details</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="active">Testimony</label>
                      <textarea name="testimonial_description" id="testimonial_description" class="textarea_testimonial" placeholder="Testimony Text Section"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Name of the attestant</label>
                      <input type="text" name="testimonial_name" id="testimonial_name" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="testimonial_id" id="testimonial_id" value="">
                  <input type="submit" name="submit" class="btn btn-info" value="Save">             <!-- changes in here -->
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              </form>
          </div>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function () {
    load_testimonial_data();
    function load_testimonial_data() {
        $.ajax({
          url:"includes/testimonial/load-testimonial.inc.php",
          method:"POST",
          success:function(data) {
              $('#testimonial_table').html(data);
          }
      });
    }

    $('#testimonial-files').change(function(){
      var error_images = '';
      var form_data = new FormData();
      var files = $('#testimonial-files')[0].files;

      if(files.length > 10) {
          error_images += 'You can not select more than 10 files';
      } else{
        for(var i = 0; i < files.length; i++)
        {
            var name = document.getElementById("testimonial-files").files[i].name;
            var ext = name.split('.').pop().toLowerCase();

            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                error_images += '<p>Invalid '+i+' File</p>';
            }

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("testimonial-files").files[i]);
            var f = document.getElementById("testimonial-files").files[i];
            var fsize = f.size||f.fileSize;

            if(fsize > 2000000) {
                error_images += '<p>' + i + ' File Size is very big</p>';
            } else {
                form_data.append("testimonial-files[]", document.getElementById('testimonial-files').files[i]);
            }
        }
      }

      if(error_images == '') {
        $.ajax({
          url:"includes/testimonial/upload-testimonial.inc.php",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend:function() {
              $('#error_testimonial_files').html('<br /><label class="text-primary">Uploading...</label>');
          },
          
          success:function(data) {
              $('#error_testimonial_files').html('<br /><label class="text-success">Uploaded</label>');
              load_testimonial_data();
          }
        });
      } else {
        $('#testimonial-files').val('');
        $('#error_testimonial_files').html("<span class='text-danger'>"+error_images+"</span>");
        return false;
      }
    });

    $(document).on('click', '.edit', function(){
      var testimonial_id = $(this).attr("id");
      $.ajax({
          url:"includes/testimonial/show-modal-testimonial.inc.php",
          method:"POST",
          data:{ testimonial_id:testimonial_id },
          dataType:"json",
          success:function(data) {
              $('#testimonial_modal').modal('show');
              $('#testimonial_id').val(testimonial_id);
              $('#testimonial_image').val(data.testimonial_image);
              $('#testimonial_name').val(data.testimonial_name);
              $('#testimonial_description').val(data.testimonial_description);
          }
      });
    });

    $('#edit_testimonial_form').on('submit', function(event){
      event.preventDefault();
      if($('#testimonial_name').val() == '') {
          alert("Enter attestant's Name");
      } else {
          $.ajax({
          url:"includes/testimonial/edit-testimonial.inc.php",
          method:"POST",
          data:$('#edit_testimonial_form').serialize(),
          success:function(data) {
              $('#testimonial_modal').modal('hide');
              load_testimonial_data();
              alert('Testimonial Details updated');
          }
        });
      }
    });

    $(document).on('click', '.delete', function(){
      var testimonial_id = $(this).attr("id");
      var testimonial_image = $(this).data("testimonial_image");
      if(confirm("Are you sure you want to remove it?")) {
        $.ajax({
          url:"includes/testimonial/delete-testimonial.inc.php",
          method:"POST",
          data:{ testimonial_id:testimonial_id, testimonial_image:testimonial_image },
          success:function(data) {
              load_testimonial_data();
              alert("Testimonial removed");
          }
        });
      }
    });
  })
</script>
</body>
</html>