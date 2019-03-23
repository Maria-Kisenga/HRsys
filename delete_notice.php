<?php 
require('db_connect.php');
require ('auth.php');

$notice_id = $_REQUEST['id'];
$posted_by = $_SESSION['staff_id'];

$result = mysqli_query($db,"SELECT * FROM noticeboard WHERE posted_by ='$posted_by'");
$hold = mysqli_fetch_array($result);

//admin id = 1
if($_SESSION['staff_id'] == 1 || $hold['posted_by'] == $_SESSION['staff_id']){
$query = "DELETE FROM noticeboard WHERE notice_id= $notice_id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: noticeboard.php"); 
	}
else{
	header("refresh:1;url=noticeboard.php"); 
	echo '<script language="javascript">';
	echo 'alert("You cannot deleted this notice")';
	echo '</script>';
	exit;
}
?>
