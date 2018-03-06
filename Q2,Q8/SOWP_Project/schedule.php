<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Schedule Lessons</title>

<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
<script type="text/javascript" src="jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />

<script type="text/javascript" src="bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="bootstrap-multiselect.css" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>


<style>
.error {color: #FF0000;}

</style>

<?php
session_start();
if(!$_SESSION["login_user"]) {
 header("location: admin-login.php");
exit();
}
?>
</head>
<body>

<form action="admin-logout.php">
<button type="Submit" name="submit1" class="btn btn-primary pull-right" value="Save">
    Log out
</button>
</form>

<div class="container-fluid" id="section1">
<div class="container">
<div class="col-md-2">

</div>
<div class="col-md-2">
<img src="graduated.png" class="img-rounded" height="174" width="175" />

</div>
<div class="col-md-4">
<h1>Schedule Lessons</h1><br>
<p>Assign the schedule</p>
</div>
<div class="col-md-4">
<img src="graduated2.png" class="img-rounded" height="174" width="200" />
</div>
</div>
<hr/>

</div>

<br>

<div class="container-fluid" id="section2">
<div class="container">
<div class="jumbotron">

<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "sowpassignmentnew";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ScDate = "";
$date1Err = "";

if (isset($_POST['submit'])) {
	
 if (empty($_POST["ScDate"])) {
    $date1Err = "Date is required";
	}else{
	$date1 = mysqli_real_escape_string($conn, $_POST['ScDate']);
		}
}
 
if (!empty($_POST["ScDate"]) && !($date1Err))
{
$sql10="INSERT INTO lessonmanagerapp(Booking_ID,Start_Time,Duration,Day,Subject) 
SELECT Booking_ID,Start_Time,Duration,Day,Subjects FROM booking";

$sql9="INSERT into lessonmanagerapp (Instructor_ID)
select Instructor_ID from instructor_available_days where Available_Days IN (select Day from booking where booking.Day=instructor_available_days.Available_Days)"; 

if (mysqli_query($conn, $sql9) && mysqli_query($conn, $sql10)) {
    echo "New Schedule created successfully";
} else {
   echo "Could not able to execute $sql9. " . mysqli_error($conn);
}
}

if (isset($_POST['submitIns'])) {

$sql14="INSERT into lessonmanagerapp (Instructor_ID)
select Instructor_ID from instructor_available_days where Available_Days IN (select Day from booking)";


if (mysqli_query($conn, $sql14)) {
    echo "New Instructor scheduled successfully";
} else {
   echo "Could not able to execute $sql14. " . mysqli_error($conn);
}
	}


mysqli_close($conn);

?>

<form method="post" action="lessonmanageradmin.php">
<button type="Submit" name="view1" class="btn btn-success pull-right" value="Save" onclick="style.display='none'">View All Schedules</button>
<br>
</form>

<br>
<form method="post" action="view-bookings.php">
<button type="Submit" name="view1" class="btn btn-warning pull-right" value="Save" onclick="style.display='none'">View All Bookings</button>
<br>
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>
<br>
<h5><span class="error">* required fields</span></h5>	
  <div class="form-group">
  <div class="col-md-2">
	 <label for="InputDate">Schedule for the week starting from : </label>
	 </div>
	 
	 
	  <div class="col-md-7">
    <input type="date" class="form-control" id="InputDate1" placeholder="Date" name="ScDate" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
	</div>
	
	  <div class="col-md-3">
	<span class="error">* <?php echo $date1Err;?></span>
	</div>
	<br>
	
  </div>
  <br>
  
    
 <button type="Submit" name="submit" class="btn btn-primary pull-right" value="Save">Generate Schedule</button>
 
 
  
</form>
</div>
</div>
</div>
</body>
</html>