<?php
session_start();
include_once "../class/connection.php";
//include_once "class/connection.php";
include_once "functions.php";
//include_once "controller/functions.php";

$db = new Database();
$db->connect();

	$cmnt_id = $_GET['cmnt_id'];
	$already_id = get_current_users($cmnt_id);
	$id = $_SESSION['user_id'] . ",";

	echo $already_id . "<br>";
	$uid = $_SESSION['user_id'];
	$status = like_already($uid,$cmnt_id);
	echo $status . "<br>";
	if($status == 1)//dislike
	{
		$new_user_data = str_replace($id , "", $already_id);
		$query = "UPDATE likes SET person_id = '$new_user_data' WHERE comment_id = '$cmnt_id';";
		$db->makequery($query) or die(mysqli_error($db->connection));
		echo "Successfully Disliked!";
	}
	else//like
	{
		$new_user_data = $already_id . $id;
		$query = "UPDATE likes SET person_id = '$new_user_data' WHERE comment_id = '$cmnt_id';";
		$db->makequery($query) or die(mysqli_error($db->connection));
		echo "Successfully Liked!";
	}

?>