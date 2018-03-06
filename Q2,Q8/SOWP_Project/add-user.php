<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Instructor And Admin  Register</title>

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
        xmlhttp.open("GET","a.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script type="text/javascript">
function changetextbox()
{
    if (document.getElementById("utype").value == "Instructor") {
        document.getElementById("InputRate").disabled=false;
		document.getElementById("Category").disabled=false;
		document.getElementById("days").disabled=false;
		document.getElementById("txtHint").disabled=false;
				
    } else {
        document.getElementById("InputRate").disabled=true;
		document.getElementById("Category").disabled=true;
		document.getElementById("days").disabled=true;
		document.getElementById("txtHint").disabled=true;
		
    }
}
</script>

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
<h1> User Details</h1><br>
<p>Register An Admin / Instructor</p>
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



$lnameErr = $fnameErr = $addressErr = $emailErr = $catErr = $cntErr = $dateErr = $dayErr = $subjErr = $rateErr = $utypeErr = $pwErr =$genderErr= $dobErr= "";
$first_name = $last_name = $address = $email = $category = $contact_no = $date = $subjects= $rate= $utype = $password= $gender =$dob= $imploded1 = $imploded2="";

$categoryResults = mysqli_query($conn, "SELECT * FROM Category;");
//$subjectsResults = mysqli_query($conn, "SELECT Subjects FROM subjects WHERE Category = '".$category."'");

if (isset($_POST['submit'])) {
	
if (empty($_POST["utype"])) {
    $utypeErr = "User Type is required";
  } else {
    $utype = mysqli_real_escape_string($conn, $_POST['utype']);
    
    
}

if (empty($_POST["FirstName"])) {
    $fnameErr = "First Name is required";
  } else {
    $first_name = mysqli_real_escape_string($conn, $_POST['FirstName']);
    // check if first_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
      $fnameErr = "Only letters and white space allowed";
    }
}

if (empty($_POST["LastName"])) {
    $lnameErr = "Last Name is required";
  } else {
    $last_name = mysqli_real_escape_string($conn, $_POST['LastName']);
    // check if last_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $lnameErr = "Only letters and white space allowed";
    }
}

if (empty($_POST["Address"])) {
    $addressErr = "Address is required";
  } else {
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
   
}

if (empty($_POST["ContactNumber"])) {
    $cntErr = "Contact Number is required";
  } else {
    $contact_no = mysqli_real_escape_string($conn, $_POST['ContactNumber']);
   
    if (!preg_match("/^[0-9]{10}$/",$contact_no)) {
      $cntErr = "Incorrect format";
    }
}

if (empty($_POST["Email"])) {
    $emailErr = "Email is required";
  } else {
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["Password"])) {
    $pwErr = "Password is required";
  } else {
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
 }
 
 if (empty($_POST["Gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = mysqli_real_escape_string($conn, $_POST['Gender']);
 }
 
 if (empty($_POST["DOB"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = mysqli_real_escape_string($conn, $_POST['DOB']);
 }
  
  
  if (empty($_POST["subjects"])) {
    $subjErr = "Subject/s are required. Ignore Error If You Are An Administrator!";
	}else{
	//$subjects = mysqli_real_escape_string($conn, $_POST['subjects']);
	$var1 = $_POST['subjects'];
    $imploded1 = implode(",", $var1);
	
  } 
  
   if (empty($_POST["days"])) {
    $dayErr = "Available day /s are required. Ignore Error If You Are An Administrator!";
	}else{
	//$date = mysqli_real_escape_string($conn, $_POST['Date']);
	$var2 = $_POST['days'];
    $imploded2 = implode(",", $var2);
	
  } 
  
   if(empty($_POST["category"])) {
    $catErr = "Category is are required. Ignore Error If You Are An Administrator!";
	}else{
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	
  } 
  
  if (empty($_POST["Date"])) {
    $dateErr = "Date is required";
	}else{
	$date = mysqli_real_escape_string($conn, $_POST['Date']);
		}
  
  
   if (empty($_POST["Rate"])) {
    $rateErr = "Rate is required. Ignore Error If You Are An Administrator!";
	}else{
	$rate = mysqli_real_escape_string($conn, $_POST['Rate']);
		}
		





   }
  
 
  //$var1 = $_POST['subjects'];
    //$imploded1 = implode(",", $var1);
  
  //$var2 = $_POST['days'];
    //$imploded2 = implode(",", $var2);
  
  
if (!empty($_POST["utype"]) && ($_POST["FirstName"]) && ($_POST["LastName"]) && ($_POST["Address"]) && ($_POST["ContactNumber"]) && ($_POST["Email"]) && ($_POST["Date"]) && !($utypeErr) && !($lnameErr) && !($fnameErr) && !($addressErr) && !($emailErr) && !($cntErr) && !($dateErr))
{
$sql4="SELECT count(1) from user";
$result=mysqli_query($conn,$sql4);
$row = mysqli_fetch_array($result);
$total = $row[0];
$User_count=$total+1;

if($_POST["utype"]=="Instructor")
{
	


$sql1 = "INSERT into user (User_Name,Password,User_Type, First_Name,Last_Name,Address,Gender, Date_Of_Birth,TP_No) VALUES ('$email','$password', '$utype','$first_name', '$last_name', '$address', '$gender','$dob','$contact_no')";
$sql2 = "INSERT into instructor (User_ID, Hourly_Rate) VALUES ('$User_count','$rate')";

$sql3 = "INSERT into instructor_available_days (Available_Days) VALUES ('$imploded2')";

$sql5 = "INSERT into subjects (Subjects, Category) VALUES ('$imploded1','$category')";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)&& mysqli_query($conn, $sql3) && mysqli_query($conn, $sql5)) 
{
    echo "New instructor created successfully";
} else {
   echo "Could not able to execute $sql1. " . mysqli_error($conn);
}
}


else if($_POST["utype"]=="Customer")
{
$sql1 = "INSERT into user (User_Name,Password,User_Type, First_Name,Last_Name,Address,Gender, Date_Of_Birth,TP_No) VALUES ('$email','$password', '$utype','$first_name', '$last_name', '$address', '$gender','$dob','$contact_no')";
$sql7 = "INSERT into customer (User_ID) VALUES ('$User_count')";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql7)) 
{
    echo "New customer created successfully";
} else {
   echo "Could not able to execute $sql1. " . mysqli_error($conn);
}
}

else if($_POST["utype"]=="Administrator")
{
$sql1 = "INSERT into user (User_Name,Password,User_Type, First_Name,Last_Name,Address,Gender, Date_Of_Birth,TP_No) VALUES ('$email','$password', '$utype','$first_name', '$last_name', '$address', '$gender','$dob','$contact_no')";
$sql6 = "INSERT into admin (User_ID) VALUES ('$User_count')";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql6)) 
{
    echo "New admin created successfully";
} else {
   echo "Could not able to execute $sql1. " . mysqli_error($conn);
}

}
}


if (isset($_POST['view1'])) {
$query = 
"select *
from user inner join instructor on user.User_ID=instructor.User_ID
inner join instructor_available_days ON instructor.Instructor_ID=instructor_available_days.Instructor_ID
inner join subjects on instructor_available_days.Instructor_ID = subjects.Instructor_ID"; 

$result = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
print " 
<table border=\"2\" cellpadding=\"2\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"50&#37;\" id=\"AutoNumber2\" bgcolor=\"#CCCCC\"><tr> 
<th width=50>User ID</td> 
<th width=50>Instructor ID</td> 
<th width=50>User Type</td> 
<th width=50>First Name</td> 
<th width=100>Last Name</td> 
<th width=100>Address</td> 
<th width=100>Gender</td> 
<th width=100>Date Of Birth</td> 
<th width=100>Contact Number</td> 
<th width=100>Email</td> 
<th width=100>Category</td> 
<th width=100>Subjects</td> 
<th width=100>Available Days</td> 
 
</tr>"; 

while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>";
print "<td>" . $row['User_ID'] . "</td>"; 
print "<td>" . $row['Instructor_ID'] . "</td>"; 
print "<td>" . $row['User_Type'] . "</td>"; 
print "<td>" . $row['First_Name'] . "</td>"; 
print "<td>" . $row['Last_Name'] . "</td>";
print "<td>" . $row['Address'] . "</td>";
print "<td>" . $row['Gender'] . "</td>";
print "<td>" . $row['Date_Of_Birth'] . "</td>";
print "<td>" . $row['TP_No'] . "</td>";
print "<td>" . $row['User_Name'] . "</td>";
print "<td>" . $row['Category'] . "</td>";
print "<td>" . $row['Subjects'] . "</td>";
print "<td>" . $row['Available_Days'] . "</td>";
//print "<td>" . $row['Date'] . "</td>"; 
print "</tr>"; 
} 
print "</table>";
}

if (isset($_POST['view2'])) {
$query = 
"select *
from user inner join customer on user.User_ID=customer.User_ID"; 

$result = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
print " 
<table border=\"2\" cellpadding=\"2\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"50&#37;\" id=\"AutoNumber2\" bgcolor=\"#CCCCC\"><tr> 
<th width=50>User ID</td> 
<th width=50>Customer ID</td> 
<th width=50>User Type</td> 
<th width=50>First Name</td> 
<th width=100>Last Name</td> 
<th width=100>Address</td> 
<th width=100>Gender</td> 
<th width=100>Date Of Birth</td> 
<th width=100>Contact Number</td> 
<th width=100>Email</td> 
 
</tr>"; 

while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>";
print "<td>" . $row['User_ID'] . "</td>"; 
print "<td>" . $row['Customer_ID'] . "</td>"; 
print "<td>" . $row['User_Type'] . "</td>"; 
print "<td>" . $row['First_Name'] . "</td>"; 
print "<td>" . $row['Last_Name'] . "</td>";
print "<td>" . $row['Address'] . "</td>";
print "<td>" . $row['Gender'] . "</td>";
print "<td>" . $row['Date_Of_Birth'] . "</td>";
print "<td>" . $row['TP_No'] . "</td>";
print "<td>" . $row['User_Name'] . "</td>";

//print "<td>" . $row['Date'] . "</td>"; 
print "</tr>"; 
} 
print "</table>";
}


if (isset($_POST['view3'])) {
$query = 
"select *
from user inner join admin on user.User_ID=admin.User_ID"; 

$result = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
print " 
<table border=\"2\" cellpadding=\"2\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"50&#37;\" id=\"AutoNumber2\" bgcolor=\"#CCCCC\"><tr> 
<th width=50>User ID</td> 
<th width=50>Admin ID</td> 
<th width=50>User Type</td> 
<th width=50>First Name</td> 
<th width=100>Last Name</td> 
<th width=100>Address</td> 
<th width=100>Gender</td> 
<th width=100>Date Of Birth</td> 
<th width=100>Contact Number</td> 
<th width=100>Email</td> 
 
</tr>"; 

while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>";
print "<td>" . $row['User_ID'] . "</td>"; 
print "<td>" . $row['Admin_ID'] . "</td>"; 
print "<td>" . $row['User_Type'] . "</td>"; 
print "<td>" . $row['First_Name'] . "</td>"; 
print "<td>" . $row['Last_Name'] . "</td>";
print "<td>" . $row['Address'] . "</td>";
print "<td>" . $row['Gender'] . "</td>";
print "<td>" . $row['Date_Of_Birth'] . "</td>";
print "<td>" . $row['TP_No'] . "</td>";
print "<td>" . $row['User_Name'] . "</td>";

//print "<td>" . $row['Date'] . "</td>"; 
print "</tr>"; 
} 
print "</table>";
}

mysqli_close($conn);

?>



	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<button type="Submit" name="view1" class="btn btn-success pull-right" value="Save" onclick="style.display='none'">View Instructor List</button>
<button type="Submit" name="view2" class="btn btn-warning pull-right" value="Save" onclick="style.display='none'">View Customer List</button>
<button type="Submit" name="view3" class="btn btn-danger pull-right" value="Save" onclick="style.display='none'">View Admin List</button>
<br>
<br>
<h5><span class="error">* required fields</span></h5>	

 <div class="form-group">
 <div class="col-md-2">
    <label for="UserType">User Type</label>
	</div>
	
	<div class="col-md-7">
  <select name="utype" id="utype" class="form-control" selected="none" onChange="changetextbox()">
  <option selected disabled value="">----Select User Type----</option>
    <option value="Instructor">Instructor</option>
    <option value="Administrator">Administrator</option>
    
</select>
</div>
<div class="col-md-3">
<span class="error">* <?php echo $utypeErr;?></span></div>
<br>
</div>

 
 <br>
 
  <div class="form-group">
	<div class="col-md-2">
    <label for="InputName1">First Name</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputName1" placeholder="First Name" name="FirstName">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $fnameErr;?></span>
	</div>
	<br>
	</div>
  <br>
  
   <div class="form-group">
	<div class="col-md-2">
    <label for="InputName2">Last Name</label>
	</div>
		
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputName2" placeholder="Last Name" name="LastName">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $lnameErr;?></span>
	</div>
	<br>
  </div>
  
   <br>
   
   <div class="form-group">
   <div class="col-md-2">
    <label for="InputAddress">Address</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputAddress" placeholder="Address" name="Address">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $addressErr;?></span>
  </div>
  <br>
  </div>
 
 <br> 
 
   <div class="form-group">
   <div class="col-md-2">
    <label for="InputContactNumber">Contact Number</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputContactNumber" placeholder="Contact Number" name="ContactNumber">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $cntErr;?></span>
	</div>
	<br>
  </div>
 
 <br>
 
  <div class="form-group">
  <div class="col-md-2">
    <label for="InputEmail">Email (This is your User Name)</label>
	</div>
	
	<div class="col-md-7">
    <input type="email" class="form-control" id="InputEmail" placeholder="user@gmail.com" name="Email">
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $emailErr;?></span>
  </div>
  <br>
</div>

 <br>
 
 <div class="form-group">
  <div class="col-md-2">
    <label for="InputPw">Enter a Password</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="Inputpw" placeholder="Password" name="Password">

	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $pwErr;?></span>
  </div>
  <br>
</div>

 <br>
 
 <div class="form-group">
  <div class="col-md-2">
    <label for="InputPw1">Confirm Password</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="Inputpw" placeholder="Confirm Password" name="Password">

	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $pwErr;?></span>
  </div>
  <br>
</div>

 <br>

<div class="form-group">
  <div class="col-md-2">
    <label for="InputGender">Gender</label>
	</div>
	
	<div class="col-md-7">
   
	<input type="radio" name="Gender" value="Male"  id="InputGender">Male
	<input type="radio" name="Gender" value="Female"  id="InputGender">Female
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $genderErr;?></span>
  </div>
  <br>
</div>

 <br>
 
 <div class="form-group">
  <div class="col-md-2">
	 <label for="InputDate">Date Of Birth</label>
	 </div>
	 
	 
	  <div class="col-md-7">
    <input type="date" class="form-control" id="InputDate" placeholder="Date Of Birth" name="DOB">
	</div>
	
	  <div class="col-md-3">
	<span class="error">* <?php echo $dobErr;?></span>
	</div>
	
  </div>
  <br>
  
  <br>
 
 <div class="form-group">
 
  <div class="col-md-2">
    <label for="InputCategory">Category</label>
</div>

	
	<div class="col-md-7">
  <select id="Category" class="form-control" name="category" onChange="showUser(this.value)" disabled>
  <option selected disabled value="">----Select the Category----</option>
  
  <?php
  
  
   while ($row = mysqli_fetch_array($categoryResults, MYSQLI_ASSOC)): ?>
  
       <option><?php echo $row['Category']; ?></option>
       <?php endwhile; ?>
  
</select>
</div>

<div class="col-md-3">
<span class="error">* <?php echo $catErr; ?></span>
</div>
<br>
</div>
<br>


 
 
  <div class="form-group">
  

  <div class="col-md-2">
    <label for="InputSubjects">Select Subject /s </label>
	</div>

	  <div class="col-md-7" id="txtHint" disabled><b> Select a category to view Subject info here...</b></div>
  


<div class="col-md-3">
<span class="error">* <?php echo $subjErr;?></span>
 </div>
<br> 
<br>
<br>
<br>
<br>
 </div>
 <br>
 
 <div class="form-group">
 <div class="col-md-2">
    <label for="InputDays">Available Days</label>
</div>

	
	<div class="col-md-7">
  <select name="days[]" id="days" multiple="multiple" class="form-control" disabled>
  
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
	<option value="Sunday">Sunday</option>
</select>
</div>

<div class="col-md-3">
<span class="error">* <?php echo $dayErr;?></span>
</div>
 <br>
 </div>
 <br>
 
 <br>
 <br>
 

 
   <br>
 <br>
 
  <div class="form-group">
  <div class="col-md-2">
    <label for="InputRate">Hourly Rate</label>
	</div>
	
	<div class="col-md-7">
    <input type="text" class="form-control" id="InputRate" placeholder="Rate" name="Rate" disabled>
	</div>
	
	<div class="col-md-3">
	<span class="error">* <?php echo $rateErr;?></span>
	</div>
	<br>
  </div>
  <br>
  
 
  <div class="form-group">
  <div class="col-md-2">
	 <label for="InputDate">Date</label>
	 </div>
	 
	 
	  <div class="col-md-7">
    <input type="date" class="form-control" id="InputDate" placeholder="Date" name="Date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
	</div>
	
	  <div class="col-md-3">
	<span class="error">* <?php echo $dateErr;?></span>
	</div>
	
  </div>
  <br>
  </div>
  <br>
 <button type="Submit" name="submit" class="btn btn-primary pull-right" value="Save">Add User</button>
  
 
	
</form>
</div>
</div>
</div>
<br>
<br>


</body>
</html>