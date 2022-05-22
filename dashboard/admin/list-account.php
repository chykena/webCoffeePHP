<?php include "header.php"; ?>
<?php
	if(isset($_GET['src']) && isset($_GET['val']) && validate_name($_GET['src']) && validate($_GET['val'])) {
		$src = $_GET['src'];
		$value = $_GET['val'];

		$sql = "SELECT * FROM login WHERE $src='$value' ORDER BY role ASC";
	} else {
		$sql = "SELECT * FROM login ORDER BY role ASC";
	}
	$query = mysqli_query($conn, $sql);
	$i = 1;
?>

	<br>
	<div>
		<form action="" method="GET">
			<label for="src">Search:</label>
			<select name="src">
				<option value="name">Full name</option>
				<option value="username">Username</option>
				<option value="sex">Sex</option>
				<option value="phone">Phone number</option>
				<option value="role">Sex</option>
			</select>
			<label for="val">Value:</label>
			<input name="val" type="text">
			<button id="find" type="submit">Find</button>
		</form>
	 <br>
	<table class="list_account">
		<tr>
			<th>Number</th>
			<th>Full name</th>
			<th>Username</th>
			<th>Sex</th>
			<th>Phone Number</th>
			<th>Birthday</th>
			<th>Role</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
		<?php while($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $i; $i++;?></td>
			<td><?php echo $row['fullname'];?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo ($row['sex'] == 0) ? 'Male' : 'Female';?></td>
			<td><?php echo $row['phone'];?></td>
			<td><?php echo $row['birthday'];?></td>
			<td ><?php echo ($row['role'] == 0) ? 'User' : $row['role'];?></td>
			<td><a href=<?php echo 'edit-account.php?usr='.$row['username']?> >edit</a></td>
			<td><form action="" method="POST" onsubmit="return confirm('Are you sure?');">
				<button class="remove" type="submit" name="remove" value=<?php echo $row['username']?> >Remove</button>
			</form></td>
		</tr>
		<?php } ?>
		
	</table>
	</div>

<?php include "footer.php"; ?>

<?php
	if(isset($_POST['remove'])) {
		$username = $_POST['remove'];
		if($username == $_SESSION['user']) die(header('location:list-account.php'));
		$sql = "DELETE FROM `login` WHERE username='$username'";
		$query = mysqli_query($conn, $sql);
		header("refresh: 0");
	}
?> 

