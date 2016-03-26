<?php
session_start();
include_once "../class/connection.php";
//include_once "class/connection.php";
include_once "functions.php";
//include_once "controller/functions.php";

$db = new Database();
$db->connect();

	$cmnt_id = $_POST['cmnt_id'];

	$already_id = get_current_users($cmnt_id);
	$id = $_SESSION['user_id'] . ",";
	$status = like_already($_SESSION['user_id'],$cmnt_id);
	if($status == 1)//dislike
	{
		$new_user_data = str_replace($id , "", $already_id);
		$query = "UPDATE likes SET person_id = '$new_user_data' WHERE comment_id = '$cmnt_id';";
		$db->makequery($query) or die(mysqli_error($db->connection));

		$query_old_likes = "SELECT `number_of_likes` FROM `comment` WHERE `cmnt_id` = '$cmnt_id' ";
		$result = $db->makequery($query_old_likes);
		$row = mysqli_fetch_assoc($result);

		$updated_likes = $row['number_of_likes']--;
		$query_ipdate_likes = "UPDATE `comment` SET `number_of_likes`='$updated_likes' WHERE `cmnt_id` = '$cmnt_id' ";
		echo "Successfully Disliked!";
	}
	else//like
	{
		$new_user_data = $already_id . $id;
		$query = "UPDATE likes SET person_id = '$new_user_data' WHERE comment_id = '$cmnt_id';";
		$db->makequery($query) or die(mysqli_error($db->connection));

		$query_old_likes = "SELECT `number_of_likes` FROM `comment` WHERE `cmnt_id` = '$cmnt_id' ";
		$result = $db->makequery($query_old_likes);
		$row = mysqli_fetch_assoc($result);

		$updated_likes = $row['number_of_likes']--;
		$query_ipdate_likes = "UPDATE `comment` SET `number_of_likes`='$updated_likes' WHERE `cmnt_id` = '$cmnt_id' ";
		



		echo "Successfully Liked!";
	}

?>