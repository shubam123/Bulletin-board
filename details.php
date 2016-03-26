

<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>SRMADT Project</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="Webarch, Project" />

	<!--css files-->
	<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!--css files end here-->

	<!--js files-->
	<script type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
	<!--js files end here-->
</head>

<body>




<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Fields</th>
      <th></th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>User id:</td>
      <td>=></td>
      <td><?php echo $_SESSION['user_id']; ?></td>
    </tr>
    <tr>
      <td>2</td>
      <td>First name:</td>
      <td>=></td>
      <td><?php echo $_SESSION['first_name']; ?></td>
    </tr>
    <tr class="info">
      <td>3</td>
      <td>Last name:</td>
      <td>=></td>
      <td><?php echo $_SESSION['last_name']; ?></td>
    </tr>
    <tr class="success">
      <td>4</td>
      <td>Age:</td>
      <td>=></td>
      <td><?php echo $_SESSION['age']; ?></td>
    </tr>
    <tr class="danger">
      <td>5</td>
      <td>Gender</td>
      <td>=></td>
      <td><?php echo $_SESSION['gender']; ?></td>
    </tr>
    <tr class="warning">
      <td>6</td>
      <td>Username:</td>
      <td>=></td>
      <td><?php echo $_SESSION['username']; ?></td>
    </tr>
    <tr class="active">
      <td>7</td>
      <td>Phone number:</td>
      <td>=></td>
      <td><?php echo $_SESSION['phone']; ?></td>
    </tr>
     <tr class="info">
      <td>8</td>
      <td>Email id:</td>
      <td>=></td>
      <td><?php echo $_SESSION['email']; ?></td>
    </tr>
  </tbody>
</table> 



<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>
</html>
