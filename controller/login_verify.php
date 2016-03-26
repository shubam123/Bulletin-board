<?php //This script will verify the login. ?>
<?php 
	ob_start();
	require_once "../class/connection.php"; 
	$db=new Database;
	$db->connect();
?>
<?php session_start(); ?>

<?php
if(isset($_POST['login']))
{
	if (empty($_POST['username']) || empty($_POST['password'])) 
	{
	header('Location: ../login.php?loginFailed=true');
	}
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars(md5($_POST['password']));

	$username = mysqli_real_escape_string($db->connection, $username);
	$password = mysqli_real_escape_string($db->connection, $password);

	$query = " SELECT * FROM users WHERE (username = '$username' or email = '$username') and password = '$password' ";
	$select_user_query = $db->makequery($query) or die('Query failed!'.mysqli_error());

	$num_rows = mysqli_num_rows($select_user_query);

	$db_username = null;
	$db_password = null;
	$db_email = null;

	if($num_rows == 1)
	{	
		while($row = mysqli_fetch_array($select_user_query))
		{
			$db_id = htmlspecialchars($row['user_id']);
			$db_first_name = htmlspecialchars($row['first_name']);
			$db_last_name = htmlspecialchars($row['last_name']);
			$db_age = htmlspecialchars($row['age']);
			$db_gender = htmlspecialchars($row['gender']);
			$db_username = htmlspecialchars($row['username']);
			$db_password = htmlspecialchars($row['password']);
			$db_phone = htmlspecialchars($row['phone']);
			$db_email = htmlspecialchars($row['email']);

		}

		if($username == $db_username && $password == $db_password || $username == $db_email && $password == $db_password)
		{
			$_SESSION['user_id'] = $db_id;
			$_SESSION['first_name']=$db_first_name;
			$_SESSION['last_name']=$db_last_name;
			$_SESSION['age']=$db_age;
			$_SESSION['gender']=$db_gender;
			$_SESSION['username']=$db_username;
			$_SESSION['phone']=$db_phone;
			$_SESSION['email']=$db_email;
			header("Location: ../index.php");
			exit();
		}
		else
		{
			die(header("Location: ../login.php?loginFailed=true"));
			exit();
		}
	}
	else
	{
		die(header("Location: ../login.php?loginFailed=true"));
		exit();
	}
}
else 
	echo "not set";
ob_end_flush();
?>

<?php $db->disconnect(); ?>