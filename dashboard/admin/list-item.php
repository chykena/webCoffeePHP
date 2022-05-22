<?php include "header.php"; ?>
<?php
	if(isset($_GET['src']) && isset($_GET['val'])) {
		$src = $_GET['src'];
		$value = $_GET['val'];

		$sql = "SELECT * FROM `item` WHERE $src='$value' ORDER BY id ASC";
	} else {
		$sql = "SELECT * FROM `item` ORDER BY id ASC";
	}
	$query = mysqli_query($conn, $sql);
	$i = 1;
?>

	<div>
		<form action="" method="GET">
			<label for="src">Search:</label>
			<select name="src">
				<option value="id">ID</option>
				<option value="name">Name</option>
			</select>
			<label for="val">Value:</label>
			<input name="val" type="text">
			<button id="find" type="submit">Find</button>
		</form>
	<br>
	<table class="list_account">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Amount</th>
			<th>Image</th>
			<th>Descript</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
		<?php while($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['amount'];?></td>
			<td><img src="<?php echo "../../libs/img/".$row['image'];?>" style="width: 200px; height: 200px;"> </td>
			<td><?php echo $row['descript'];?></td>
			<td><a href="<?php echo "edit-item.php?edit=".$row['id'];?>" >edit</a></td>
			<td><form action="" method="POST" onsubmit="return confirm('Are you sure?');">
				<button class="remove" type="submit" name="remove" value=<?php echo $row['id'];?> >Remove</button>
			</form></td>
		</tr>
		<?php } ?>
		
	</table>
	</div> 

<?php include "footer.php"; ?>

<?php
	if(isset($_POST['remove'])) {
		$id = $_POST['remove'];
		$sql = "DELETE FROM `item` WHERE id='$id'";
		$query = mysqli_query($conn, $sql);
		header("refresh: 0");
	}
?> 

