<? //checks whether the username already exist or not, if not exist/valid input return positive message else negitive ?>

<?php
     require_once "../class/connection.php";
     $db=new Database;
     $db->connect();

    //$db is the connection variable already defined in connection file

    $username = htmlspecialchars($_POST['username']);
    $username = mysqli_real_escape_string($db->connection, $username);
    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1;";
    $result = $db->makequery($query);
    $num = mysqli_num_rows($result);
    if($num == 0){
        echo "<span style=\"color:green;font-weight:bold;\"><span class=\"glyphicon glyphicon-ok\">&nbsp;</span>Username available</span>";
    } else {
        echo "<span style=\"color:red;font-weight:bold;\"><span class=\"glyphicon glyphicon-remove\">&nbsp;</span>Username already exist. Select other username.</span>";
    }
    $db->disconnect();
?>