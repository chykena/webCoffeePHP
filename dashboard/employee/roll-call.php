<?php
	include '../../libs/config.php';
	// date_default_timezone_set('	Asia/Ho_Chi_Minh');
	session_start();
	if(!is_employee()) header('location:../../');
?>

<?php 
		if(isset($_POST['roll_call'])) {
			$value = $_POST['roll_call'];
      $user = $_SESSION['user'];
      $role = $_SESSION['role'];
      $sql = "INSERT INTO `salary`(`username`, `role`, `day`) VALUES ('$user','$role',now())";
      if(mysqli_query($conn, $sql)) {
        if($value == 1) {
          $sql = "";
          setcookie("roll_call", "true", strtotime("tomorrow"));
          header("refresh:0");
        } else {
          setcookie("roll_call", "false", strtotime("tomorrow"));
          header("refresh:0");
        }
      }
		}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../libs/css/account.css">
  <title>Document</title>
</head>
<body>
  <div class="topnav">
    <a href="index.php">Hello <?php echo $_SESSION['user']; ?></a>
    <a href="../../account/logout.php" class='topright'>Logout</a>
    <a href="../../" class='topright'>Home</a>
  </div>
  <div class="left_menu">
    <div class="menu_heading">Panel</div>
    <div class="menu_item">
      <ul>
        <!-- <li><a href="list-salary.php" active>Salary employee</a></li>
        <li><a href="list-account.php">List Account</a></li>
        <li><a href="edit-item.php">Add Item</a></li>
        <li><a href="list-item.php">List Item</a></li> -->
        <li><a href="role-call.php">Role call</a></li>
      </ul>
    </div>
  </div>
  <div class="right_menu">	

<?php if(!isset($_COOKIE["roll_call"])) {?>
		<div>
		<form action="" method="POST">
			<label for="roll_call">Do you work today?</label>
			Yes<input type="radio" name="roll_call" id="roll_call" value="1">
			No<input type="radio" name="roll_call" id="roll_call" value="0">
			<input type="submit" value="Submit">
		</form>
	</div>
<?php } else {echo "You had roll_call!";} ?>


  </div>
    <footer>
        &copy;2022
    </footer>
</body>
</html>

