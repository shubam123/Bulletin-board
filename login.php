<?php
session_start();
if(isset($_SESSION['user_id']))
{
	ob_start();
	header("Location: ../index.php");
	ob_end_flush();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login!</title>
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
</head>

<body>
	<header>
		<h1 align="center">Login Here</h1>
	</header>
	<section>
		<div class="col-xs-12 col-md-8 col-md-offset-2">
	<form role="form" action="controller/login_verify.php" method="post" style="text-align:center">
							  		<div class="form-group">
							    		<label for="username">Username</label>
							    		<input type="text" class="form-control" name="username" placeholder="Enter your username." required/>
							  		</div>
							  		<div class="form-group">
							    		<label for="password">Password</label>
							    		<input type="password" class="form-control" name="password" placeholder="Enter your password." required/>
							  		</div>
							  		<div class="checkbox">
							    		<label>
							      			<input type="checkbox"> Remember me
							    		</label>
							  		</div>
							  			<a href="../index.html" class="button-clear successbtn">
								  			<button type="submit" name="login" value="login" class="btn btn-lg btn-block btn-success">Login >></button>
								  		</a>
								  		<?php 
								  			if(@$_GET["loginFailed"])
								  			{
								  				echo "<div class=\"err_msg\">Invalid username or password.<br>Forgot password? <a href='forgot_pass.php'>Click here</a></div>";
								  			}
								  			else{
								  				echo "<br>";
								  			}
								  		?>
							  		</div>
								</form>
								<br clear="all" />
								<p align="center">Not registered? <a href="register.php">Signup here!</a></p>
							</div>
						</section>

</body>
</html>
