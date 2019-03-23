<?php
session_start();
require("auth.php");
require('settings.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Noticeboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="sidenav.js"></script>
</head>
<body style="width: 81%; float:right; margin-right:5px;">
<br /><br />
<div id="sidenav" class="sidenav">
<?php echo $sidenav?>
 
</div>

<span style="font-size:25px; cursor:pointer; font-family: 'Give You Glory', cursive;" onclick="openNav()">&#9776; Menu</span>


<center>
<div>

<h3>Noticeboard</h3>
<table width="100%" border="2" style="border-collapse:collapse;">
<thead>
<tr>
	<th><strong>Id</strong></th>
	<th><strong>Title</strong></th>
	<th><strong>Description</strong></th>
	<th><strong>Uploaded On<strong></th>
	
</tr>
</thead>
	<tbody>
<?php
$count=1;
$query="Select * from noticeboard ORDER BY notice_id desc;";
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["title"]; ?></td>
<td align="center"><?php echo $row["description"]; ?></td>
<td align="center"><?php echo $row["reg_date"]; ?></td>

<td align="center" class="ED"><a href="update_notice.php?id=<?php echo $row["notice_id"]; ?>">Update</a></td>
<td align="center" class="ED"><a href="delete_notice.php?id=<?php echo $row["notice_id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
	</tbody>
</table>
<br/><br/>
		<form action="add_notice.php" style="float:right;">
    <input type="submit" value="+ Add" />
</form>
</center>
</body>
</html>