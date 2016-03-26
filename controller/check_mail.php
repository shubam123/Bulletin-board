<? //checks whether the email already exist or not, if not exist/valid input return true else false ?>

<?php
     require_once "../class/connection.php";
     $db=new Database;
     $db->connect();

    //$db is the connection variable already defined in connection file

    $email = htmlspecialchars($_POST['email']);
    $email = mysqli_real_escape_string($db->connection, $email);
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1;";
    $result = $db->makequery($query);
    $num = mysqli_num_rows($result);
    if($num == 0){
        echo "<span style=\"color:green;font-weight:bold;\"><span class=\"glyphicon glyphicon-ok\">&nbsp;</span>Email is available to register</span>";
    } else {
        echo "<span style=\"color:red;font-weight:bold;\"><span class=\"glyphicon glyphicon-remove\">&nbsp;</span>Email is already registered. Select other email id.</span>";
    }
    $db->disconnect();
?>