// JavaScript Validation For Registration Page

$('document').ready(function() {

	// Name validation
	var nameRegEx = /^(?![\s.]+$)[a-zA-Z\s.]*$/;
		 
	$.validator.addMethod("validateName", function( value, element ) {
			return this.optional( element ) || nameRegEx.test( value );
	}); 
	
	// Email VBalidation
// 	var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
// 	$.validator.addMethod("validemail", function( value, element ) {
// 			return this.optional( element ) || eregex.test( value );
// 	});
	
	// Valid number pattern
	// var numRegEx = /(^(\+)?639-?([0-9]{10}))|([0-9]{3}-?[0-9]{4})/;
	
	// $.validator.addMethod("validateNum", function( value, element ) {
	// 		return this.optional( element ) || numRegEx.test( value );
	// });
	
	$("#register-form").validate({
		// Specify validation rules
		rules:
		{
			// The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
			fullName: {
				required: true,
				validateName: true
			},
			email : {
				required: true,
				// Specify that email should be validated
				// by the built-in "email" rule
				email: true,
				// validemail: true,
				remote: {
					url: "includes/user-management/check-email.inc.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 16
			},
			confirmPassword: {
				required: true,
				equalTo: password
			},
			contactNo : {
				required: true,
				// validateNum: true,
				number: true,
				maxlength: 11,
			}
		},
		
		// Specify validation error messages
		messages:
		{
			fullName: {
				required: "Full Name is required",
				validateName: "Full Name must contain only alphabets and space",
			},
			email : {
				required : "Email is required",
				email : "Please enter valid email address",
				remote : "Email already exists",
			},
			password:{
				required: "Password is required",
				minlength: "Password must be at least have 6 characters"
			},
			confirmPassword:{
				required: "Re-type your password",
				equalTo: "Password did not match!"
			},
			contactNo: {
				required: "Contact Number is Required",
				// validateNum: "Invalid contact number",
				maxlength: "Your contact number must NOT exceed up to 11 digits long",
			}
		},

		errorPlacement : function(error, element) {
			$(element).closest('.row1').find('.help-block').html(error.html());
			$(element).closest('.row2').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('.row1').removeClass('has-success').addClass('has-error');
			$(element).closest('.row2').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.row1').removeClass('has-error');
			$(element).closest('.row1').find('.help-block').html('');
			$(element).closest('.row2').removeClass('has-error');
			$(element).closest('.row2').find('.help-block').html('');
		}

// 		submitHandler: submitForm
	}); 

// 	function submitForm(){
// 		var form_data = new FormData($('#register-form')[0]);

// 			$.ajax({
// 				url: 'includes/user-management/sign-up.inc.php',
// 				type: 'POST',
// 				data: $('#register-form').serialize(),
// 				dataType: form_data,
// 				cache: false,
// 				contentType: false,
// 				processData: false,

// 				beforeSend: function(){
// 						$("#btn-register").html("Signing-up...");
// 				},
// 				success: function(resp){
// 					if(resp=="success"){
// 							$("#btn-register").html("<img src='images/ajax-loader.gif' width='15'/> &nbsp; Signing-up");
// 							setTimeout('window.location.href = "../index.php";',4000);
// 					}
// 					// else{
// 					// 		$("#info").fadeIn(1000, function(){
// 					// 				$("#info").html("<div class='text-danger'>"+resp+"</div>");
// 					// 				$("#submit").html('Login');
// 					// 		})
// 					// }
// 				}
// 			})

// 			// .done(function(data){
// 			// 	$('#register-btn').html('<img src="images/ajax-loader.gif" /> &nbsp; Signing up...').prop('disabled', true);
// 			// 	$('input[type=text], input[type=email], input[type=password]').prop('disabled', true);
				 
// 			// 	setTimeout(function(){
							 
// 			// 		if ( data.status==='success' ) {
// 			// 			$('#errorDiv').slideDown('fast', function(){
// 			// 				$('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
// 			// 				$("#register-form").trigger('reset');
// 			// 				$('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
// 			// 				$('#register-btn').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Me Up').prop('disabled', false);
// 			// 			}).delay(3000).slideUp('fast');
// 			// 		} else {
// 			// 				$('#errorDiv').slideDown('fast', function(){
// 			// 						$('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
// 			// 						$("#register-form").trigger('reset');
// 			// 						$('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
// 			// 						$('#register-btn').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Me Up').prop('disabled', false);
// 			// 				}).delay(3000).slideUp('fast');
// 			// 		}
							
// 			// 	},3000);
				 
// 			// })

// 			// .fail(function(){
// 			// 	$("#register-form").trigger('reset');
// 			// 	alert('An unknown error occoured, Please try again Later...');
// 			// });
// 	}
});