<?php
	include '../../libs/config.php';
	session_start();
	if(!is_admin()) header('location:../../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../libs/css/account.css">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
        <li><a href="add-item.php">Add Item</a></li>
        <li><a href="add-role.php">Add Role</a></li>
        <li><a href="list-item.php">List Item</a></li>
        <li><a href="list-role.php">List Role</a></li>
        <li><a href="list-account.php">List Account</a></li>
        <li><a href="list-salary.php">Salary employee</a></li>
      </ul>
    </div>
  </div>
  <div class="right_menu">