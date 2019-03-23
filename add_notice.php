<?php
include "db_connect.php";
require "auth.php";

if(isset($_POST['submit'])){
$title = $_POST['title'];
$description = $_POST['description'];
$reg_date = date("Y-m-d H:i:s");
$posted_by = $_SESSION['staff_id'];

$result = mysqli_query($db,"INSERT INTO noticeboard (`title`, `description`, `reg_date`, `posted_by`) VALUES ('$title', '$description', '$reg_date', '$posted_by')");
  
  if ($result){
     echo "New notice added! ";
	 header("Location: noticeboard.php"); 
}
	else {
		echo "Error adding notice";
	}
}
?>

<html>
<head>
	<title>Add Notice</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="sidenav.js"></script>

</head>
<body style= "width: 60%;">
<div id="sidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="register_user.php">Add new user</a>
  <a href="view_users.php">View users</a>
  <a href="view_users.php">Update or Delete user</a><br /><br />
  <a href="logout.php">Logout</a>
</div>

<span style="font-size:25px; cursor:pointer; font-family: 'Give You Glory', cursive;" onclick="openNav()">&#9776; Menu</span>
<center>
	<form method="POST" action="">
		<fieldset>
			<legend>Add Notice</legend>
		<span class="required">*</span><label for="title">Title: </label><input type="text" name="title" required /><br /><br/><br/>
		<span class="required">*</span><label for="description">Description: </label><textarea rows="6" cols="50" name="description" required style="float:right;border-bottom-color: #808080;border-bottom-left-radius: 3px;border-bottom-right-radius: 3px;border-bottom-style: solid;border-bottom-width: 1px;border-left-color: #808080;border-left-style: solid;border-left-width: 1px;border-right-color: #808080;border-right-style: solid;border-right-width: 1px;border-top-color: #808080;border-top-left-radius: 3px;border-top-right-radius: 3px;border-top-style: solid;border-top-width: 1px;margin-bottom:30px;"></textarea><br/>
		<center>
			<input type="reset" name="clear" value="Clear"/><input type="submit" value="Add" name="submit"/>
			</center>
		</fieldset>
	</form>
	</center>
</body>
</html>	