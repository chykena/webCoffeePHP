<?php
    $conn = mysqli_connect("localhost", "root", "", "coffee");

    function is_employee() {
		if(isset($_SESSION['user']) && !is_null($_SESSION['user']) && ($_SESSION['role'] != 0) && ($_SESSION['role'] != 'admin')) {
			return true;
		} 
		return false;
	}

	function is_admin() {
		if(isset($_SESSION['user']) && !is_null($_SESSION['user']) && $_SESSION['role'] == 'admin') {
			return true;
		}
		return false;
	}

	function db_get_row($sql) {
		global $conn;
		$query = mysqli_query($conn, $sql);
		$row = array();
		if(mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
		}
		return $row;
	}
	
	function validate_username($check) {
		$parttern = "/^[A-Za-z0-9_\.]{1,30}$/";
		if (preg_match($parttern, $check))
			return true;
	    else return false;
	}
	function validate_password($check) {
		$parttern = "/^[A-Za-z0-9@$&\.]{1,30}$/";
		if (preg_match($parttern, $check))
			return true;
	    else return false;
	}

	function validate_phone($check) {
		$parttern = "/^[0-9]{10}$/";
		if(preg_match($parttern, $check))
			return true;
		else return false;
	}
?>