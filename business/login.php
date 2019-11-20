<?php 
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../stylesheets/loginform_2.css"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>
<body>
    
<div>
  <div class="imgcontainer">
      <a href="../index.php"><img src="../images/FilcebLoginLogo.png" alt="Filceb Login" class="avatar"></a>
  </div>
  <div class="container">
    <form id="myform" action="../includes/user-management/login.inc.php" method="POST" style="max-width:900px; margin:auto;">
      <label style="color: #404040; letter-spacing: 1px;"><strong>Login to Filceb</strong></label><br><br>

      <div class="input-container">
        <i class="fa fa-envelope icon"></i>
          <input id="email" type="text" name="email" values="" class="input-field" placeholder="Enter email">
      </div>

      <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input id="password" type="password" name="password" class="input-field" placeholder="Enter password">
      </div>

      <button id="login" type="submit" class="loginbtn" style="letter-spacing: 2px;" name="submit">Login</button>
      <button class="forgotpswbtn"><a style="text-decoration: none;" href="forgot-password.php">Can't access your account?</a></button>

      <div class="content">
      <p class="or" style="color: #8C8C8C;">New to Filceb?</p></div>

      <button class="signupbtn" type="button" onclick="window.location='sign-up.php'">Create your Filceb account</button>
      <div id="info"></div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>  
<script>
$(document).ready(function(){
    $("#myform").validate({
        rules: {
      
        },
        messages:{
            
        },
        submitHandler: subform
    })
    function subform(){
        var data = $("#myform").serialize();
        $.ajax({
            type: 'POST',
            url: '../includes/user-management/login.inc.php',
            data: data,
            beforeSend: function(){
                $("#info").fadeOut();
                $("#login").html("Logging-in...");
            },
            success: function(resp){
              alert(resp);
                if(resp=="success"){
                    $("#login").html("<img src='../images/ajax-loader.gif' width='15'/> &nbsp; Logging-in");
                    setTimeout('window.location.href = "../index.php";',4000);
                } else{
                    $("#info").fadeIn(1000, function(){
                        $("#info").html("<div class='text-danger'>"+resp+"</div>");
                        $("#login").html('Login');
                    })
                }
            }
        })
    }
})
</script>

</body>
</html>