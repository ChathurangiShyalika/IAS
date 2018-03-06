<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>View Instructor</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
<script type="text/javascript" src="jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />

<script type="text/javascript" src="bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="bootstrap-multiselect.css" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

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


<form action="admin-panel.php">
<button type="Submit" name="submit1" class="btn btn-warning pull-right" value="Save">
    Back To Admin Panel
</button>

  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


	<p>User Details as at <?php echo date('Y/m/d h:i:s a', time());?></p>
	<br>
	
	<table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
	<thead>
		<tr>
			
			<th>User Name</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Date Of Birth</th>
			<th>Telephone No</th>
			
			<th></th>
		</tr>
	</thead>
	
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

		
		$getInstrs = mysqli_query($conn,"SELECT * FROM user");

			while ($value = mysqli_fetch_row($getInstrs)){
				
				$getIns = mysqli_query($conn,"SELECT * FROM user WHERE user.User_ID=$value[0]");
				$getArr='';
				
				while ($valuePlot = mysqli_fetch_row($getIns)){
					$getArr.=$valuePlot[2].", ";
				}
				
				
				echo '<tr><td>'.$value[1].'</td><td>'.$value[4].'</td><td>'.$value[5].'</td><td>'.$value[6].'</td><td>'.$value[7].'</td><td>'.$value[8].'</td><td>'.$value[9].'</td><td><a href="add-user2.php?eid='.$value[0].'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a></td></tr>';
				$type="";
		}
		
		?>
	
	</table>
	  
	  
    </div>
  </div>
  <!-- End Page -->


 

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

</body>

</html>
