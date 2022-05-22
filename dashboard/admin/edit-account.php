<?php include "header.php"; ?>

<?php
    if(empty($_GET['usr'])) die();
    $username = $_GET['usr'];
    $sql = "SELECT * FROM login WHERE username='$username'";
    $row = db_get_row($sql);
?>
    <div class="login-form">
        <form action="" method="POST">
            <h1>Account Information</h1>
            <a href="list-account.php">Back to List Account</a>
            <table style="text-align:left;">
                <tr>
                    <th>Full Name:</th>
                    <td><input class="ip-b" name="name" type="text" value="<?php echo $row['fullname']; ?>" required></td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td><input class="ip-b" name="username" type="text" value="<?php echo $row['username']; ?>" disabled></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input class="ip-b" name="password" type="password" placeholder="Input if you want change password"></td>
                </tr>
                <tr>
                    <th>RePassword:</th>
                    <td><input class="ip-b" name="repassword" type="password" placeholder="Repeat if you want change password"></td>
                </tr>
                <tr>
                    <th>Sex:</th>
                    <td><input name="sex" type="radio" value="Male" <?php if($row['sex'] == '0') echo "checked" ?>>
                        <label for="sex">Male</label>
                        <input name="sex" type="radio" value="Female" <?php if($row['sex'] == '1') echo "checked" ?>>
                        <label for="sex">Female</label>
                    </td>   
                </tr>
                <tr>
                    <th>Birthday:</th>
                    <td><input class="ip-b" name="birthday" type="date" value="<?php echo $row['birthday'] ?>"></td>
                </tr>
                <tr>
                    <th>Phone Number:</th>
                    <td><input class="ip-b" name="phone" type="text" value="<?php echo $row['phone']; ?>" required></td>
                </tr>
                <tr>
                    <th>Role:</th>
                    <td><input name="role" list="role" placeholder="<?php echo $row['role'];?>" >
                        <datalist id="role">
                            <?php $sql2="SELECT * FROM `role` WHERE 1";
                                $query2 = mysqli_query($conn,$sql2);
                                while($row2 = mysqli_fetch_array($query2)) { ?>
                        <option> <?php echo $row2['name'];?> </option>
                            <?php }?>
                        </datalist>
                    </td>   
                </tr>
            </table>
            <br>
            <div class="btn-box" style="position:relative; left:150px;">
                <button name="submit" type="submit">Change</button>
            </div>
        </form>
    </div>


<?php  
    if(isset($_POST['submit']) && validate_phone($_POST['phone']) && $_POST['password'] == $_POST['repassword']) {
        $name = $_POST['name'];
        $sex = ($_POST['sex'] == 'Male') ? 0 : 1;
        $password =$_POST['password'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];

        if($_POST['role'] != '') {
            $role = $_POST['role'];
            $sql_role = "UPDATE `login` SET `role`='$role' WHERE username='$username'";
            $query_role = mysqli_query($conn, $sql_role);
        }

        $sql1 = "SELECT phone FROM login WHERE phone='$phone' EXCEPT SELECT phone FROM login WHERE username='$username'";
        $query1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($query1) > 0) {
        ?>
            <br><p style="position: relative;left:120px;"><?php echo "The phone number already existed!"; ?></p>
        <?php
        } 
        elseif($password == '') {
            $sql = "UPDATE `login` SET `fullname`='$name',`sex`='$sex',`phone`='$phone',`birthday`='$birthday' WHERE username='$username'";
            $query = mysqli_query($conn, $sql);
        ?>
            <br><p style="position: relative;left:120px;"><?php echo "Change infomation success!"; ?></p>
        <?php
            header("refresh: 2");
        }
        elseif($password != '') {
            $password = md5($_POST['password']);
            $sql = "UPDATE `login` SET `password`='$password',`fullname`='$name',`sex`='$sex',`phone`='$phone',`birthday`='$birthday' WHERE username='$username'";
            $query = mysqli_query($conn, $sql);
        ?>
            <br><p style="position: relative;left:120px;"><?php echo "Change infomation success!"; ?></p>
        <?php
            header("refresh: 2");
        }
    }
    elseif(isset($_POST['phone']) && !validate_phone($_POST['phone'])) {
        ?>
            <br><p style="position: relative;left:120px;"><?php echo "Please enter the correct phone number!"; ?></p>
        <?php

    }
?>

<?php include "footer.php"; ?>