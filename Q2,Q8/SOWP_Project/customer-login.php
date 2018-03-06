<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Index</title>

<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
<script type="text/javascript" src="jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />
<script type="text/javascript" src="main.js"></script>

<script type="text/javascript" src="bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="bootstrap-multiselect.css" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body background="wP6J3r.jpg">


<?php
include('login1.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: booking.php");
}
?>





<h1>E-Explore</h1>
<p>Online E-Learning Academy</p>
<div id="login">

<div class="container-fluid" id="section2">
<div class="container">
<div class="jumbotron">

<form action="add-customer.php">

<button type="Submit" name="submit1" class="btn btn-primary pull-right" value="Save">
    Register
</button>
</form>

<h2>Customer Login</h2>


<form action="" method="post">

<div class="form-group">
	<div class="col-md-4">
    <label for="InputName1">UserName</label>
	</div>
	
	<div class="col-md-4">
    <input id="name" name="username" class="form-control" placeholder="username" type="text">
	
	</div>
	
	<br>
	</div>
  <br>
  
  <div class="form-group">
	<div class="col-md-4">
    <label for="InputName1">Password</label>
	</div>
	
	<div class="col-md-4">
    <input id="password" name="password" class="form-control" placeholder="**********" type="password">
	</div>
	
	<br>
	</div>
  <br>
  
<br>

 <button type="submit" name="submit" class="btn btn-primary center-block" value="Login">LOGIN</button>

<span><?php echo $error; ?></span>
</form>
</div>
</div>
</div>

</div>
</body>
</html>