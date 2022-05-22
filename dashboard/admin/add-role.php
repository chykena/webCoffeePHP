<?php include "header.php"; ?>

    <div class="login-form">
        <form action="" method="POST">
            <h1>Add Role</h1>
            <table style="text-align:left;">
                <tr>
                    <th>Role name</th>
                    <td><input class="ip-b" name="name" type="text" required></td>
                </tr>
                <tr>
                    <th>Salary/day</th>
                    <td><input class="ip-b" name="value" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
                </tr>
            </table>
            <br>
            <div class="btn-box" style="position:relative; left:150px;">
                <button name="submit" type="submit">Change</button>
            </div>
        </form>
    </div>


<?php  
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $value = $_POST['value'];

        $sql ="SELECT `name` FROM `role` INTERSECT (SELECT `name` FROM role WHERE `name`='$name')";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
        ?>
            <br><p style="position: relative;left:100px;"><?php echo "The role name already existed!";?></p>
        <?php
        } 
        else{
            $sql = "INSERT INTO `role`(`name`, `value`) VALUES ('$name','$value')";
            $query = mysqli_query($conn, $sql);
        ?>
            <br><p style="position: relative;left:100px;"><?php echo "Success!";?></p>
        <?php
        }
    }
?>

<?php include "footer.php"; ?>