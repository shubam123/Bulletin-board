<?php session_start(); ?>

<?php
  require_once "class/connection.php";
  include_once "controller/functions.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>SRMADT Project</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="Webarch, Project" />

	<!--css files-->
	<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  
	<!--css files end here-->

	<!--js files-->
	<script type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
	<!--js files end here-->
</head>

<body>
	<?php 
		if(isset($_SESSION['user_id']))
		{
	?>


<header class="navbar navbar-inverse hero">
      <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
        
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    About<b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
              <li><a href="#">US</a></li>
              <li><a href="#">TEAM</a></li>
                </ul>

              <li class="dropdown">
                <a href="#">Add Message</a>
              </li>

              <li class="dropdown">
                <a href="../pages/sponsors.php">Details</a>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $_SESSION['username']; ?><b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
              <li><a href="../pages/images.php">Account</a></li> 
              <li><a href = "controller/logout.php"><span class="glyphicon glyphicon-off pdng"></span>&nbsp;Log Out</a></li>
                </ul>
              </li>


                </ul>
              </li>
            </ul>
        </nav>
      </div>
  </header>



  <section>

    <div class="col-xs-8 col-xs-offset-2">
      <h1 align="center">Messages</h1>
      <div class="comments">
        <div class="form-group">
          <div class="col-xs-12">
            <form method="POST" action="controller/comment.php" >
              <textarea class="form-control" rows="5" id="textArea" name="comment_text"></textarea>
            
          </div>
        </div>
      </div>
      <br clear="all" /><br>
      <p class="text-right"><input type="submit" class="btn btn-primary" name="comment" value="Comment"></p>
      </form>



    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">New Comments</a></li>
      <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Top Comments</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">

      <div class="tab-pane fade active in" id="home">

        <?php


        $db = new Database();
        $db->connect();

        $query = "SELECT * FROM comment ORDER BY 'cmnt_id' DESC";
        $result = $db->makequery($query);
        $uid = $_SESSION['user_id']; //session id
        while($row = mysqli_fetch_assoc($result))
        {
        $id = $row['cmnt_id'];
        $name = $row['person_name'];
        $text = $row['comment_text'];
        $likes = $row['number_of_likes'];
        $status = like_already($uid,$id);

        ?>

          <div>
            <p class="cmnt"><div class="image"><span class="glyphicon glyphicon-user c_img"></span></div></p>
            <p><b><?php echo $name; ?></b></p>
            <p class="cmnt cmtext"><?php echo $text; ?></p>
            <p class="vote">
              <?php 
              if($status == 1)//already liked
              {
              ?>
              <button id="likebtn" name="like" class="btn btn-info" value="<?php echo $id; ?>">
                <span class ="glyphicon glyphicon-chevron-up"></span>&nbsp;Liked
              </button>
              <?php
              }
              else//not liked
              {
              ?>
              <button id="likebtn" name="like" class="btn btn-default" value="<?php echo $id; ?>">
                <span class ="glyphicon glyphicon-chevron-up"></span>&nbsp;Like
              </button>
              <?php
              }
              ?>

            </p>
          </div>
          <br clear="all" />
          <hr>

        <?php
        }
        ?>

        </div>


        <div class="tab-pane fade" id="profile">
        
        <?php
        $query = "SELECT * FROM comment ORDER BY number_of_likes DESC";
        $result = $db->makequery($query);
        while($row = mysqli_fetch_assoc($result))
        {
        $id = $row['cmnt_id'];
        $name = $row['person_name'];
        $text = $row['comment_text'];
        $likes = $row['number_of_likes'];

        $status = like_already($uid,$id);


        ?>
          
            <div>
            <p class="cmnt"><div class="image"><span class="glyphicon glyphicon-user c_img"></span></div></p>
            <p><b><?php echo $name; ?></b></p>
            <p class="cmnt cmtext"><?php echo $text; ?></p>
            <p class="vote">
              <?php 
              if($status == 1)//already liked
              {
              ?>
              <button id="likebtn" name="like" class="btn btn-info" value="<?php echo $id; ?>">
                <span class ="glyphicon glyphicon-chevron-up"></span>&nbsp;Liked
              </button>
              <?php
              }
              else//not liked
              {
              ?>
              <button id="likebtn" name="like" class="btn btn-default" value="<?php echo $id; ?>">
                <span class ="glyphicon glyphicon-chevron-up"></span>&nbsp;Like
              </button>
              <?php
              }
              ?>

            </p>

          </div>
          <br clear="all" />
          <hr>

        <?php
        }
        ?>



        </div>   
      </div>
    </div>


  </section>




















<?php }
	else
	{
 ?>

<header class="column-fluid">
	<h1 align="center">Welcome to mini project!</h1>
</header>

<section class="container-fluid">
	<div class="row">
	<div class="col-xs-12 col-md-4 col-md-offset-2">
		<a href="login.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Already registered? login here" data-original-title="">Login!</button></a>
	</div>
	<div class="col-xs-12 col-md-4 col-md-offset-2">
		<a href="register.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Not registered? signup here" data-original-title="">Sign up!</button></a>
	</div>
</div>
</section>
<?php } ?>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script>

  $(document).ready(function () {

    $('button#likebtn').click(function(){
      console.log('clicked');
    $.ajax({
      type: 'POST',
      url:'controller/upvote.php',
      data: {cmnt_id: $(this).val() },
      success: function(msg){
        alert(msg);
      }
    });

  });



  });




</script>


</body>
</html>
