<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Instructor</title>

<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
<script type="text/javascript" src="jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />

<script type="text/javascript" src="bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="bootstrap-multiselect.css" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<script type="text/javascript">
    $(document).ready(function() {
        $('#subs').multiselect();
    });
</script>

</head>


<body>
 <div class="form-group">
<?php
$q = strval($_GET['q']);

$con = mysqli_connect('localhost','root','123','sowpassignmentnew');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT Subjects FROM subjectcategory WHERE Category = '".$q."'";
$result = mysqli_query($con,$sql);


echo "<select name='subjects[]' id='subs' multiple='multiple' class='form-control'>";
while($row = mysqli_fetch_array($result))  {
    echo "<option>" . $row['Subjects'] . "</option>";

}
echo "</select>";
mysqli_close($con);
?>
</div>
</body>
</html>