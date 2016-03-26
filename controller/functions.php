<?php

//include_once "class/connection.php";



function get_current_users($cmnt_id)
{
	$db = new Database();
	$db->connect();
	
	$query = "SELECT person_id FROM likes WHERE comment_id = '$cmnt_id' ;";
	$result = $db->makequery($query);
	$row = mysqli_fetch_assoc($result);
	$x = $row['person_id'];
	return $x;
}

function like_already($user_id,$cmnt_id)
{
	$db = new Database();
	$db->connect();
	
	$query = "SELECT person_id FROM likes WHERE comment_id = '$cmnt_id' LIMIT 1;";
	$result = $db->makequery($query) or die(mysqli_error($db->connection));
	$row = mysqli_fetch_assoc($result);
	$x = $row['person_id'];

	$current_id = $user_id;


	$individual_id = explode(',', $x);

	foreach($individual_id as $id)
	{
		if($id == $current_id)//if user already liked
		{
			return 1;
			exit();
		}
	}
	return 0;
	exit();
}



?>