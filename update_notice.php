<?php
include('db_connect.php');
require("auth.php");

$id=$_REQUEST['id'];
$query = "SELECT * from noticeboard where notice_id='".$id."'"; 
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>

<title>Update Notice</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="sidenav.js"></script>
</head>
<body style="width:30%;">

<div id="sidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="register_user.php">Add new user</a>
  <a href="view_users.php">View users</a>
  <a href="view_users.php">Update or Delete user</a><br /><br />
  <a href="logout.php">Logout</a>
</div>

<span style="font-size:25px; cursor:pointer; font-family: 'Give You Glory', cursive;" onclick="openNav()">&#9776; Menu</span> -->
<br /><br /><br /><br /><br />
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$upd_date = date("Y-m-d H:i:s");
$title =$_REQUEST['title'];
$description =$_REQUEST['description'];

$update="UPDATE noticeboard SET reg_date='".$upd_date."', title='".$title."', description='".$description."' WHERE notice_id='".$id."'";

mysqli_query($db, $update) or die(mysqli_error());
$status = "Record Updated Successfully.";
echo '<p style="color:#FF0000;">'.$status.'</p>';
header("LOCATION:noticeboard.php");
}else {
?>
</div>
<form name="form" method="post" action=""> 
<fieldset>
	<legend>Update Notice</legend>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['notice_id'];?>" />

<span class="required">*</span><label for="title">New Title: </label><input type="text" name="title" placeholder="Enter New Title" required value="<?php echo $row['title'];?>" /><br /><br/>

<span class="required">*</span><label for="title">New Description: </label><input type="text" name="description" placeholder="Enter New Description" required value="<?php echo $row['description'];?>" />

<input type="submit" name="submit" value="Update" style="margin-top:20px;"/>
</fieldset>
</form>
<form action="noticeboard.php"><input type="submit" value="Back" /></form>

<?php } ?>