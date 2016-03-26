<?php
session_start();
if(isset($_SESSION['user_id']))
{
	ob_start();
	header("Location: index.php");
	ob_end_flush();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="Webarch, Project" />

	<!--css files-->
	<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!--css files end here-->

	<!--js files-->
	<script type="text/javascript" src="assets/js/jquery-1.6.js"></script>
	<script type="text/javascript" src="assets/js/jQuery.Validate.min.js"></script>
	<!--js files end here-->

	<script>

	$(document).ready(function () {


    $('#signup_form').validate({ // initialize the plugin
    	rules: {
    		first_name:{
    			required:true,
    		},
        	last_name:{
    			required:true,
    		},
        	
            age: {
            	required:true,
            	number:true,
				range: [1,120],
            },
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password:{
            	required:true,
            	equalTo: "#password"
            },
            number:{
            	number:true,
            	rangelength: [8,12]
            },
            email: {
                required: true,
                email: true
            },
            agree: "required"
        },


        // Specify the validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            age: {
            	required:"Please enter your age",
            	number:"Please enter a valid age",
            	range:"Please enter a valid age"
            },
            username: {
            	required:"Please enter a username",
            	minlength:"Username must be atleast 5 character long"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
            	required:"Enter the password again",
            	equalTo: "Password doesn't match"
            },
            number:{
            	number:"Invalid number",
            	rangelength:"Invalid number"
            },
            email: {
            	required:"Email is required",
            	email:"Please enter valid email id",
            },
            agree: "Please accept our policy"
        },


      
    });
	

	$("#email").change(function(){
		$.ajax({
			type: 'POST',
			url:'controller/check_mail.php',
			data: 'email=' + $("#email").val(),
			success: function(msg){
				$('.email_already_msg').html(msg);
			}
		});
	});

	$("#username").change(function(){
		$.ajax({
			type: 'POST',
			url:'controller/check_username.php',
			data: 'username=' + $("#username").val(),
			success: function(msg){
				$('.username_already_msg').html(msg);
			}
		});
	});


});
  
  </script>

<style>
    label.error,label.email_already_success,label.email_already_error{
    	color:red;
    }
</style>





	<title>Sign up!</title>
</head>
<body id="signup">
	<div class="container">
		<header class="row">
			<div class=" text-center col-xs-12 col-md-8 col-md-offset-2">
				<h3 class="logo">
					<a href="index.html">The Project</a>
				</h3>
				<h4>Create an account.</h4>
			</div>
		</header>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
								<form id="signup_form" role="form" action="controller/create_user.php" method="POST">
									<div class="form-group">
							    		<label for="name">First name</label>
							    		<input type="text" class="form-control" id="first_name" name="first_name" />
							  		</div>
							  		<div class="form-group">
							    		<label for="name">Last name</label>
							    		<input type="text" class="form-control" id="last_name" name="last_name" />
							  		</div>
									<div class="form-group">
							    		<label for="age">Age</label>
							    		<input type="text" class="form-control" id="age" name="age" />
							  		</div>
							  		<div class="form-group">
							    		<label for="gender">Gender</label>
							    		<div class="row text-center">
							    			<div class="col-xs-4">
							    			<input class="" type="radio" name="gender" value="male" checked/>
							    			Male
							    			</div>
							    			<div class="col-xs-4">
							    			<input class="" type="radio" name="gender" value="female" />
							    			Female
							    			</div>
							    		</div>
							  		</div>
									<div class="form-group">
							    		<label for="name">Username</label>
							    		<input type="text" class="form-control" id="username" name="username" placeholder="(Minimum 5 characters)" />
							    		<span id="error" class= "username_already_msg"></span> 
							  		</div>
							  		<div class="form-group">
							    		<label for="password">Password</label>
							    		<input type="password" class="form-control" id="password" name="password" placeholder="(Minimum 5 characters)" />
							  		</div>
							  		<div class="form-group">
							    		<label for="password">Confirm Password</label>
							    		<input type="password" class="form-control" id="confirm_password" name="confirm_password"/>
							  		</div>
							  		<div class="form-group">
							    		<label for="phone">Phone no.</label>
							    		<div class="row">
								    		<div style="line-height:34px;" class="col-xs-1 text-right">+91</div>
								    		<div class="col-xs-11">
								    			<input type="int" class=" form-control" id="number" name="number" placeholder="(Optional)" />
								    		</div>
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label for="email">Email address</label>
							    		<input type="email" class="form-control" id="email" name="email" />
							    		<span id="error" class= "email_already_msg"></span> 
							  		</div>
							  		<div class="form-group">
							    		<label for="agreement"></label>
							      			You have read & agree to the 
							      			<a href="#">Terms of service</a><input type="checkbox" id="agree" name="agree" style="float:right;" />
							  		</div>

							  			<a class="button-clear successbtn">
								  			<button type="submit" name="create" class="btn btn-info btn-lg btn-block">Create >></button>
								  		</a>
							  		</div>
								</form>
							</div>
						</div>						
					</div>
				</div>
				<div class="already-account">
					Already have an account?
					<a href="login.php" data-toggle="popover" data-placement="top" data-content="Go to sign in!" data-trigger="manual">Sign in here</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
