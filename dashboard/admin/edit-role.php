<?php include "header.php"; ?>

<?php
    if(empty($_GET['role'])) {
        die();
    }
    $name = $_GET['role'];
    $sql = "SELECT * FROM role WHERE name='$name'";
    $row = db_get_row($sql);
?>

    <div class="login-form">
        <form action="" method="POST">
            <h1>Edit Role</h1>
            <a href="list-role.php">Back to List Role</a> 
            <table style="text-align:left;">
                <tr>
                    <th>Role name</th>
                    <td><input class="ip-b" name="name" type="text" value="<?php echo $row['name']; ?>" required></td>
                </tr>
                <tr>
                    <th>Salary/day</th>
                    <td><input class="ip-b" name="value" type="text" value="<?php echo $row['value']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
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
        $new_name = $_POST['name'];
        $value = $_POST['value'];

        $sql ="SELECT `name` FROM `role` INTERSECT (SELECT `name` FROM role WHERE `name`='$new_name') EXCEPT SELECT `name` FROM `role` WHERE `name`='$name'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
        ?>
            <br><p style="position: relative;left:100px;"><?php echo "The role name already existed!";?></p>
        <?php
        } 
        else{
            $sql = "UPDATE `role` SET `name`='$new_name',`value`='$value' WHERE `name`='$name'";
            $query = mysqli_query($conn, $sql);
        ?>
            <br><p style="position: relative;left:100px;"><?php echo "Success!";?></p>
        <?php
            header("refresh: 2; url=edit-role.php?role=".$new_name);
        }
    }
?>

<?php include "footer.php"; ?>