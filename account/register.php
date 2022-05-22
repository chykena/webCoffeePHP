<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../libs/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main style="background:white;">
            <div class="container" style="position:relative; top: 150px;">
            <div class="login-form">
                <form action="" method="post">
                    <h1>Register</h1>

<?php 
    include '../libs/config.php';
    session_start();
    if(isset($_POST['submit']) && validate_username($_POST['username']) && validate_password($_POST['password']) && validate_phone($_POST['phone']) && $_POST['password'] == $_POST['repassword']) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $phone = $_POST['phone'];
        $role = 0;

        $sql1 = "SELECT * FROM login WHERE username='$username'";
        $query1 = mysqli_query($conn, $sql1);

        $sql2 = "SELECT * FROM login WHERE phone='$phone'";
        $query2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($query1) > 0) {
            echo "The username has been registered, please enter another username!";
        }
        else if(mysqli_num_rows($query2) > 0) {
            echo "The Phone Number has been registered, please enter another Phone Number!";
        } else {
            $sql = "INSERT INTO `login` (`username`, `password`, `fullname`, `phone`, `role`) VALUES ('$username', '$password', '$fullname', '$phone', '$role')";
            $query = mysqli_query($conn, $sql);
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $role;
            header("location:../");
        }
    }
    elseif(isset($_POST['phone']) && !validate_phone($_POST['phone'])) {
        ?>
            <br><p style="position: relative;left:120px;"><?php echo "Please enter the correct phone number!"; ?></p>
        <?php
    }
    elseif(isset($_POST['fullname']) && !validate_fullname($_POST['fullname'])) {
        ?>
            <br><p style="position: relative;left:120px;"><?php echo "Please enter the correct full name!"; ?></p>
        <?php
    }
?>
                    <div class="input-box">
                        <i ></i>
                        <input name="fullname" type="text" placeholder="Fullname" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="username" type="text" placeholder="Username" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="repassword" type="password" placeholder="Re-Password" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="phone" type="text" placeholder="PhoneNumber" required>
                    </div>
                    <a href="login.php">I had account! Login</a>
                    <br>
                    <a href="../">Back to Home</a>
                    <div class="btn-box">
                        <button name="submit" type="submit">
                            Register
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>
    </body>
</html>

