<?php
session_start();
include_once "../class/connection.php";
$db = new Database();
$db->connect();

if(isset($_POST['comment']))
{
	$id = $_SESSION['user_id'];
	$text = $_POST['comment_text'];
	$person_name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
	$query = "Insert INTO comment(cmnt_id,person_id,person_name,comment_text) VALUES(NULL,'$id','$person_name','$text');";
	$db->makequery($query);
	$cmnt_id = mysqli_insert_id($db->connection);
	$query_like = "Insert INTO likes(comment_id) VALUES('$cmnt_id');";	
	$db->makequery($query_like);

}

?>