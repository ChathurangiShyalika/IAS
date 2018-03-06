<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Subjects</title>

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

<div class="container-fluid" id="section1">
<div class="container">

<form action="admin-logout.php">
<button type="Submit" name="submit1" class="btn btn-primary pull-right" value="Save">
    Log out
</button>
</form>



<br>
<br>

<div class="col-md-2">

</div>
<div class="col-md-2">
<img src="graduated.png" class="img-rounded" height="174" width="175" />

</div>
<div class="col-md-4">
<h1> Subjects Details</h1><br>
<p>Add A Subject</p>
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



$catErr = $subjErr = "";
$category = $subjects= "";

$categoryResults = mysqli_query($conn, "SELECT * FROM Category;");

if (isset($_POST['submit'])) {
	
 if (empty($_POST["category"])) {
    $catErr = "Category is are required";
	}else{
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	
  } 

if (empty($_POST["subjects"])) {
    $subjErr = "Subject Name is required";
  } else {
    $subjects = mysqli_real_escape_string($conn, $_POST['subjects']);
    // check if first_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$subjects)) {
      $subjErr = "Only letters and white space allowed";
    }
}
}
if (!empty($_POST["category"]) && ($_POST["subjects"]) && !($catErr) && !($subjErr))
{
	
$sql = "INSERT into subjectcategory (Subjects, Category) VALUES ('$subjects', '$category')";

if (mysqli_query($conn, $sql)) {
    echo "New Subject added successfully";
} else {
   echo "Could not able to execute $sql. " . mysqli_error($conn);
}
}

if (isset($_POST['view'])) {


$query = "SELECT * FROM subjectcategory";
$result = mysqli_query($conn,$query) 
or die(mysqli_error()); 
print " 
<table align=\"center\" border=\"2\" cellpadding=\"2\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"30&#37;\" id=\"AutoNumber4\" bgcolor=\"#CCCCC\">
<tr> 
<th width=50>Category Name</td> 
<th width=50>Subject Name</td> 

</tr>"; 

while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['Category'] . "</td>"; 
print "<td>" . $row['Subjects'] . "</td>"; 
print "</tr>"; 
} 
print "</table>";
}
mysqli_close($conn);

?>



	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<button type="Submit" name="view" class="btn btn-success pull-right" value="Save" onclick="style.display='none'">View Subjects List</button>
<br>
<br>
<h5><span class="error">* required fields</span></h5>	

<div class="form-group">
 
  
    <label for="InputCategory">Category</label>

	<span class="error">* <?php echo $catErr;?></span>
	<br>
  <select id="Category" class="form-control" name="category" onChange="showUser(this.value)">
  <option selected disabled value="">----Select the Category----</option>
  
  <?php
  
  
   while ($row = mysqli_fetch_array($categoryResults, MYSQLI_ASSOC)): ?>
  
       <option><?php echo $row['Category']; ?></option>
       <?php endwhile; ?>
  
</select>
</div>

  <div class="form-group">
  
    <label for="InputName1">Subject Name</label>
	<span class="error">* <?php echo $subjErr;?></span>
    <input type="text" class="form-control" id="InputName1" placeholder="Subject Name" name="subjects">
	</div>
  
  <br>
 
 <button type="Submit" name="submit" class="btn btn-primary pull-right" value="Save">Add Subject</button>
  
 
	
</form>
</div>
</div>
</div>
<br>
<br>


</body>
</html>