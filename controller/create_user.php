
<?php ob_start(); ?>
<?php require_once "../class/connection.php"; 
	 $db= new Database;
	 $db->connect();
	if(isset($_POST['create']))
	{
		$user_id = uniqid();
		$fname = htmlspecialchars($_POST['first_name']);
		$lname = htmlspecialchars($_POST['last_name']);
		$age = htmlspecialchars($_POST['age']);
		$gender = htmlspecialchars($_POST['gender']);
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars(md5($_POST['password']));
		$number = htmlspecialchars($_POST['number']);
		$email = htmlspecialchars($_POST['email']);

		$fname = mysqli_real_escape_string($db->connection, $fname);
		$lname = mysqli_real_escape_string($db->connection, $lname);
		$age = mysqli_real_escape_string($db->connection, $age);
		$gender = mysqli_real_escape_string($db->connection, $gender);
		$username = mysqli_real_escape_string($db->connection, $username);
		$password = mysqli_real_escape_string($db->connection, $password);
		$number = mysqli_real_escape_string($db->connection, $number);
		$email = mysqli_real_escape_string($db->connection, $email);

		$query = "INSERT INTO users(user_id, first_name, last_name, age, gender, username, password, phone, email) VALUES('$user_id', '$fname' , '$lname' , '$age', '$gender' , '$username', '$password', '$number', '$email')";
		if($db->makequery($query))
		{
		header('Location: ../login.php');
		ob_end_flush();
		}
		else
		{
			die("query error" . mysqli_error($db->connection));
		}
	}
	else
	{
		die("database error");
	}
?>

<?php $db->disconnect(); ?>