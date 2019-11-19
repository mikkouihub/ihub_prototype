// JavaScript Validation For Login Page

$('document').ready(function() {
	
	$("#login-form").validate({
		// Specify validation rules
		rules:
		{
			
		},
		
		// Specify validation error messages
		messages:
		{
			
		},

		submitHandler: submitForm
	}); 

	function submitForm(){
		var form_data = $('#login-form').serialize();

		$.ajax({
			url: 'includes/user-management/login.inc.php',
			type: 'POST',
			data: form_data,

			beforeSend: function() {
					$("#info").fadeOut();
					$("#btn-login").html("Logging-in...");
			},

			success: function(resp) {
				if(resp=="success") {
						$("#btn-login").html("&nbsp; Logging-in");
						setTimeout('window.location.href = "index.php";', 1000);
				} else {
						$("#info").html("");
						$("#info").fadeIn(1000, function() {
								$("#info").html("<div class='text-danger'>"+resp+"</div>");
								$("#btn-login").html('Login');
						})
				}
			}
		})
	}
});