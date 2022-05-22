<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../libs/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main style="background:white;">
            <div class="container" style="position:relative; top: 150px;">
            <div class="login-form">
                <form action="" method="post">
                    <h1>Login</h1>

                <?php
                    include '../libs/config.php'; 
                    if(isset($_POST['submit']) && validate_username($_POST['username']) && validate_password($_POST['password'])) {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        $sql = "SELECT * FROM login WHERE username='$username' and password='$password'";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($query);

                        if(mysqli_num_rows($query) > 0) {
                            session_start();
                            $_SESSION['user'] = $row['username'];
                            $_SESSION['role'] = $row['role'];

                            if($_SESSION['role'] == 0) header("location:../");
                            else if($_SESSION['role'] == 'admin') header("location:../dashboard/admin");
                            else header("location:../dashboard/employee");
                        } else echo "Please check your username or password!";
                    }  
                ?>

                    <div class="input-box">
                        <i ></i>
                        <input name="username" type="text" placeholder="Username" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="password" type="password" placeholder="Password" required>
                    </div>
                    <a href="register.php">I did not account! Register</a>
                    <br>
                    <a href="../">Back to Home</a>
                    <div class="btn-box">
                        <button name="submit" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>
    </body>
</html>