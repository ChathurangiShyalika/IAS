<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Book A Lesson</title>

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


<script type="text/javascript">
    $(document).ready(function() {
        $('#days').multiselect();
    });
</script>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","b.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>

<form action="customer-logout.php">
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
<h1> Book A Lesson</h1><br>
<p>Booking Section</p>
</div>
<div class="col-md-4">
<img src="graduated2.png" class="img-rounded" height="174" width="200" />
</div>
</div>


<hr/>

</div>
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



$subErr= $durationErr= $rateErr =$date1Err =$date2Err=$timeErr=$cusErr="";
$subject =$Duration = $Rate=$date1=$date2=$Time=$Customer="";

$subjectResults = mysqli_query($conn, "SELECT Subjects FROM subjectcategory;");
$customerResults = mysqli_query($conn, "SELECT Customer_ID FROM customer;");
//$subjectsResults = mysqli_query($conn, "SELECT Subjects FROM subjects WHERE Category = '".$category."'");

if (isset($_POST['submit'])) {

if (empty($_POST["Customer"])) {
    $cusErr = "Customer ID is required";
  } else {
    $Customer = mysqli_real_escape_string($conn, $_POST['Customer']);
     
}	
if (empty($_POST["Subject"])) {
    $subErr = "Subject is required";
  } else {
    $subject = mysqli_real_escape_string($conn, $_POST['Subject']);
    
    
}


if (empty($_POST["Duration"])) {
    $durationErr = "Duration is required";
  } else {
    $Duration = mysqli_real_escape_string($conn, $_POST['Duration']);
   
}

if (empty($_POST["Rate"])) {
    $rateErr = "Rate is required";
	}else{
	$Rate = mysqli_real_escape_string($conn, $_POST['Rate']);
		}
		
		if (empty($_POST["Time"])) {
    $timeErr = "Time is required";
	}else{
	$Time = mysqli_real_escape_string($conn, $_POST['Time']);
		}
		
  if (empty($_POST["BookingDate"])) {
    $date1Err = "Date is required";
	}else{
	$date1 = mysqli_real_escape_string($conn, $_POST['BookingDate']);
		}
		
		 if (empty($_POST["BookedDate"])) {
    $date2Err = "Date is required";
	}else{
	$date2 = mysqli_real_escape_string($conn, $_POST['BookedDate']);
		}
  
   }
  
 
  
  
if (!empty($_POST["Subject"]) && ($_POST["BookingDate"]) && ($_POST["BookedDate"]) && ($_POST["Duration"]) && ($_POST["Rate"]) && ($_POST["Customer"]) && !($subErr) && !($durationErr) && !($date1Err) && !($date2Err) && !($rateErr) && !($cusErr))
{

//$sql    = 'SELECT Start_Time * FROM booking';
//$rows   = $mysql_conn->fetch_array($sql);

//$day = strtotime('D', $date2);
//$dayVal=var_dump($day);


//$newDate = DateTime::createFromFormat('YmdHi', $date2);
//$dayVal = $newDate->format('D'); 
$dayVal = date("l", strtotime($date2));
//$date = DateTime::createFromFormat("Y-m-d", $string);
 //$dayVal=$date->format("d");

//foreach($rows) 
//$Period=Time+Duration+1 - ($Time-1);
//if(Start_Time=!($Time-1) && $Duration+$Start_Time=!($Time+$Duration+1)){
$sql = "INSERT into booking (Subjects,Booking_Date, Booked_Date,Duration,Maximum_Hourly_Rate,Start_Time,CustomerID, Day) VALUES ('$subject','$date1','$date2','$Duration','$Rate','$Time','$Customer','$dayVal')";

if (mysqli_query($conn, $sql)) 
{
    echo "Lesson Booked successfully";
} else {
   echo "Could not able to execute $sql. " . mysqli_error($conn);
}

}



mysqli_close($conn);

?>



	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<br>
<h5><span class="error">* required fields</span></h5>	

<div class="form-group">
   <div class="col-md-2">
    <label for="InputCustomer">Customer ID</label>
</div>

	
	<div class="col-md-7">
  <select id="Customer" class="form-control" name="Customer" onChange="showUser(this.value)">
  <option selected disabled value="">----Select Your ID----</option>
  
  <?php
  
  
   while ($row = mysqli_fetch_array($customerResults, MYSQLI_ASSOC)): ?>
  
       <option><?php echo $row['Customer_ID']; ?></option>
       <?php endwhile; ?>
  
</select>
</div>
<div class="col-md-3">
<span class="error">* <?php echo $cusErr; ?></span>
</div>
</div>

<br>
<br>

 <div class="form-group">
   <div class="col-md-2">
    <label for="InputSubject">Subject</label>
</div>


	
	<div class="col-md-7">
  <select id="Subject" class="form-control" multiple="multiple" name="Subject" onChange="showUser(this.value)">
  <option selected disabled value="">----Select the Subject----</option>
  
  <?php
  
  
   while ($row = mysqli_fetch_array($subjectResults, MYSQLI_ASSOC)): ?>
  
       <option><?php echo $row['Subjects']; ?></option>
       <?php endwhile; ?>
  
</select>
</div>

<div class="col-md-3">
<span class="error">* <?php echo $subErr; ?></span>
</div>
<br>
</div>
<br>
<br>
<br>
<br>


 
 
  
 
  
  <div class="form-group">
  <div class="col-md-2">
    <label for="InputRate">Maximum Hourly Rate</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputRate1" placeholder="Rate" name="Rate">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $rateErr;?></span>
	</div>
	<br>
  </div>
  <br>
  
  <div class="form-group">
  <div class="col-md-2">
    <label for="InputTime">Start Time</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputTime" placeholder="Time" name="Time">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $timeErr;?></span>
	</div>
	<br>
  </div>
  <br>
  
 
  <div class="form-group">
  <div class="col-md-2">
	 <label for="InputDate">Booking Date</label>
	 </div>
	 
	 
	  <div class="col-md-7">
    <input type="date" class="form-control" id="InputDate1" placeholder="Date" name="BookingDate" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
	</div>
	
	  <div class="col-md-3">
	<span class="error">* <?php echo $date1Err;?></span>
	</div>
	<br>
  </div>
  <br>
  
  
  
  <div class="form-group">
  <div class="col-md-2">
	 <label for="InputDate">Booked Date</label>
	 </div>
	 
	 
	  <div class="col-md-7">
    <input type="date" class="form-control" id="InputDate2" placeholder="Date" name="BookedDate">
	</div>
	
	  <div class="col-md-3">
	<span class="error">* <?php echo $date2Err;?></span>
	</div>
	 <br>
  </div>
  <br>

 
  
  
  <div class="form-group">
  <div class="col-md-2">
    <label for="InputDuration">Duration</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputDuration" placeholder="Duration" name="Duration">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $durationErr;?></span>
	</div>
	<br>
  </div>
  <br>
  
 <button type="Submit" name="submit" class="btn btn-primary pull-right" value="Save">Book Lesson</button>
  
 
	
</form>
</div>
</div>
</div>
<br>
<br>


</body>
</html>