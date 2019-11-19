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
  <title>Document Files</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h3 style="text-align: center;">Document Files</h3>
    <a href="profile.php"><button>Go Back</button></a>
    <div style="float: right;">
      <input type="file" name="document-files" id="document-files" multiple/>
			<span class="text-muted">Only .doc, .docx, .pdf, .txt file/s are allowed</span>
			<span id="error_document_files"></span>
    </div>

    <div class="table-responsive" id="document_table">
      <!-- Table Here -->
    </div>

    <div id="document_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" id="edit_document_form">
            <div class="modal-header">
              <button type="submit" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Document Details</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Document Title</label>
                <input type="text" name="document_name" id="document_name" class="form-control" />
              </div>
              <div class="form-group">
                <label>Document Description</label>
                <input type="text" name="document_description" id="document_description" class="form-control" />
              </div>
              <!-- CATEGORY TYPE -->
              <div class="form-group">
                <p class="form-field required ">
                  <label class="field-label">Document Type</label>
                  <select name="document_category" id="document_category" class="form-control categorydropdown" required>
                    <option value="">Select File Category</option>
                    <option value="Brochures">Brochures</option>
                    <option value="Business Documents">Business Documents</option> 
                    <option value="Business Certificates">Business Certificates</option>
                  </select>
                </p>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="document_id" id="document_id" value="" />
              <input type="submit" name="submit" class="btn btn-info" value="Save" />
              <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function () {
    load_document_data();
    
		function load_document_data() {
			$.ajax({
        url:"includes/document/load-document.inc.php",
        method:"POST",
        success:function(data) {
          $('#document_table').html(data);
        }
		  });
	  }

    $('#document-files').change(function(){
      var error_images = '';
      var form_data = new FormData();
      var files = $('#document-files')[0].files;

      if(files.length > 10) {
        error_images += 'You can not select more than 10 files';
      } else {
        for(var i = 0; i < files.length; i++) {
          var name = document.getElementById("document-files").files[i].name;
          var ext = name.split('.').pop().toLowerCase();

          if(jQuery.inArray(ext, ['doc','pdf','docx','txt']) == -1) {
            error_images += '<p>Invalid '+i+' File</p>';
          }

          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("document-files").files[i]);
          var f = document.getElementById("document-files").files[i];
          var fsize = f.size||f.fileSize;

          if(fsize > 2000000) {
            error_images += '<p>' + i + ' File Size is very big</p>';
          } else {
            form_data.append("document-files[]", document.getElementById('document-files').files[i]);
          }
        }
      }
      
      if(error_images == '') {
        $.ajax({
          url:"includes/document/upload-document.inc.php",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend:function() {
            $('#error_document_files').html('<br /><label class="text-primary">Uploading...</label>');
          },   
          success:function(data) {
            $('#error_document_files').html('<br /><label class="text-success">Uploaded</label>');
            load_document_data();
          }
        });
      } else {
        $('#document-files').val('');
        $('#error_document_files').html("<span class='text-danger'>"+error_images+"</span>");
        return false;
      }
    });

    $(document).on('click', '.edit', function() {
      var document_id = $(this).attr("id");

      $.ajax({
        url:"includes/document/show-modal-document.inc.php",
        method:"POST",
        data:{ document_id:document_id },
        dataType:"json",
        success:function(data) {
          $('#document_modal').modal('show');
          $('#document_id').val(document_id);
          $('#document_name').val(data.document_name);
          $('#document_category').val(data.document_category);
          $('#document_description').val(data.document_description);
        }
      });
    }); 

    $('#edit_document_form').on('submit', function(event) {
      event.preventDefault();
      if($('#document_name').val == '') {
        alert("Enter Document Name");
      } else {
        $.ajax({
          url:"includes/document/edit-document.inc.php",
          method:"POST",
          data:$('#edit_document_form').serialize(),
          success:function(data) {
            $('#document_modal').modal('hide');
            load_document_data();
            alert('Document Details Updated');
          }
        });
      }
    });

    $(document).on('click', '.delete', function(){
      var document_id = $(this).attr("id");
      var document_name = $(this).data("document_name");

      if(confirm("Are you sure you want to remove it?")) {
        $.ajax({
          url:"includes/document/delete-document.inc.php",
          method:"POST",
          data:{ document_id:document_id, document_name:document_name },
          success:function(data) {
            load_document_data();
            alert("File removed");
          }
        });
      }
    }); 
  })
</script>
</body>
</html>