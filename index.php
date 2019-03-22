<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="width: 40%;">

	<form method="POST" action="">
	<br /><br /><br /><br /><br /><br />
  <fieldset>
    <legend>Login Below</legend>
      <span class="required">*</span> <label for="staff_id">Staff Id: </label> <input type="number" name="staff_id" required /><br /><br />
      <span class="required">*</span> <label for="password">Password: </label> <input type="password" name="password" required /><br /><br /><br />	 
      <input type="reset" name="clear" value="Clear"><input type="submit" value="Login" name="submit">
     </fieldset>
 </form>
</body>
</html>	

<?php
session_start();

include "db_connect.php";

if(isset($_POST['submit'])){
$staff_id = $_POST['staff_id'];
$password = $_POST['password'];

  $result = mysqli_query($db,"SELECT * FROM staff WHERE staff_id = '$staff_id' && password='".md5($password)."'");
  $hold = mysqli_fetch_array($result);
//var_dump($result);
  if ($hold['usertype'] == "staff"){
	  $_SESSION['staff_id'] = $staff_id;
	 header("LOCATION:emp_dashboard.php");
     echo "Login successful!";
}
	else if($hold['usertype'] == "admin"){
		$_SESSION['staff_id'] = $staff_id;
	header("LOCATION:admin_dashboard.php");
	echo "Login successful!";
	}
	else {
		echo "<span style='color:red;'>Incorrect user id or password</span>";
	}
}
?>