<?php include 'header.php';?>

<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $descript = $_POST['descript'];

        if(isset($_FILES['image'])) {
            $target_dir = "../../libs/img/";
            $file_name = basename($_FILES["image"]["name"]);
            $target_file_path = $target_dir.$file_name; 

            $file_type = pathinfo($target_file_path, PATHINFO_EXTENSION);
            $allow_types = array('jpg', 'png', 'jpeg', 'gif');
            if(in_array($file_type, $allow_types)) {
                if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file_path)) {
                    $sql = "INSERT INTO `item`(`name`, `price`, `amount`, `image`, `descript`) VALUES ('$name','$price','$amount','$file_name','$descript')";
                    if(mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Failure";
                    }
                }
            } else {
                echo "File extension not allow!";
            }
        }

       
    }   
?>

<!-- <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script><div class="login-form"> -->
    <form id="edit_item" action="" method="POST" enctype="multipart/form-data">
        <h1>Add item</h1>
        <table style="text-align:left;">
            <tr>
                <th>Name:</th>
                <td><input class="ip-b" name="name" type="text" required></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><input class="ip-b" name="price" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required></td>
            </tr>
            <tr>
                <th>Amount:</th>
                <td><input class="ip-b" name="amount" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required ></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input class="ip-b" name="image" type="file" required></td>
            </tr>
            <tr>
                <th>Descript:</th>
                <td><input class="ip-b" name="descript" type="textarea" style="oth;" required ></td>  
                <!-- <script>
                    CKEDITOR.replace( 'descript' );
                </script> -->
            </tr>
        </table>
        <br>
        <div class="btn-box" style="position:relative; left:150px;">
            <button name="submit" type="submit">Change</button>
        </div>
    </form>
</div>

<?php include 'footer.php';?>