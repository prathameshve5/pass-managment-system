<?php 
require 'admin_nav.php'; ?><!DOCTYPE html>
<html>
<head>
	<title>approve agent</title>
	<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
	</style>
</head>
<body>
	<div style="padding:20px; border-style: solid; margin: 20px;">
<table >
	<thead>
		<tr>
			<th>id</th>
			<th>username</th>
			<th>name</th>
			<th>status</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
		<?php require 'config.php';

		$q= mysqli_query($connect, "select * from agent_details");
		while ($row = mysqli_fetch_array($q)) {
		 	?><td><?php echo $row['a_id']; ?></td>
		 	<td><?php echo $row['uname']; ?></td>
		 	<td><?php echo $row['fname']." ".$row['lname'];?></td>
		 	<td><?php if ($row['status']=="0")

		 	echo "not allowed"; else echo "allowed"; ?></td>
		 	<td><?php if ($row['status']=="0") {

		 ?><a href="/travel/allow.php?id=<?php echo $row['a_id'];?>" >allow</a><?php } else {

		 ?><a href="/travel/notallow.php?id=<?php echo $row['a_id'];?>" >not allow</a><?php }  ?></td><tr>
		 	<?php
		 } ?>
	</tbody>
</table>
</div>
</body>
</html>