<?php include "header.php"; ?>
<?php
	
	$sql = "SELECT * FROM role ORDER BY name DESC";
	$query = mysqli_query($conn, $sql);
	$i = 1;
?>

	<br>
	<table class="list_account">
		<tr>
			<th>Number</th>
			<th>Role Name</th>
			<th>Salary/day</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
		<?php while($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $i; $i++;?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['value'];?></td>
			<td><a href=<?php echo 'edit-role.php?role='.$row['name']?> >edit</a></td>
			<td><form action="" method="POST" onsubmit="return confirm('Are you sure?');">
				<button class="remove" type="submit" name="remove" value=<?php echo $row['name']?> >Remove</button>
			</form></td>
		</tr>
		<?php } ?>
		
	</table>
<!-- </body>
</html> -->

<?php include "footer.php"; ?>

<?php
	if(isset($_POST['remove'])) {
		$name = $_POST['remove'];
		if($name == 'admin') die(header('location:list-role.php'));
		$sql = "DELETE FROM `role` WHERE `name`='$name'";
		$query = mysqli_query($conn, $sql);
		header("refresh: 0");
	}
?> 

