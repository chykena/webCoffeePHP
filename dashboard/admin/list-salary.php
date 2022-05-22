<?php
	include 'header.php';

	if(isset($_GET['month'])) { //Chưa validate month
		$src = explode('-', $_GET['month']);

		$sql = "SELECT `username`, `role`, count(day), `value` FROM `salary`, `role` WHERE month(`day`)='$src[1]' AND year(`day`)='$src[0]' AND salary.role=role.name GROUP BY username";
	} else {
		$month = date('m');
		$year = date('Y');
		$sql = "SELECT `username`, `role`, count(day), `value` FROM `salary`, `role` WHERE month(`day`)='$month' AND year(`day`)='$year' AND salary.role=role.name GROUP BY username";
	}
	$query = mysqli_query($conn, $sql);
	$i = 1;
?>
	<div>
		<form action="" method="GET">
			<label for="month">Month:</label>
			<input name="month" type="month" value=<?php echo date('Y').'-'.date('m')?>>
			<button id="find" type="submit">Find</button>
		</form>
	<br>
	<table class='list_salary'>
		<tr>
			<th>Username</th>
			<th>Role</th>
			<th>Work day</th>
			<th>Salary/day</th>
			<th>Total salary</th>
			<th>Edit</th>
		</tr>
		<?php while($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $row[0];?></td>
			<td><?php echo $row[1];?></td>
			<td><?php echo $row[2];?></td>
			<td><?php echo $row[3];?></td>
			<td pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency"><?php echo $row[2]*$row[3];?></td>
			<td><a href=<?php echo 'edit-account.php?usr='.$row['username']?> >edit</a></td>
		</tr>
		<?php } ?>
		
	</table>
	</div> 
<!-- footer -->
<?php include 'footer.php'; ?>

<?php
	if(isset($_POST['remove'])) {
		$username = $_POST['remove'];
		if($username == $_SESSION['user']) die(header('location:list-account.php'));
		$sql = "DELETE FROM `login` WHERE username='$username'";
		$query = mysqli_query($conn, $sql);
		header("refresh: 0");
	}
?> 

