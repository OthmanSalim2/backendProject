<?php
ob_start();
include "context/navbar.php";
include "context/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from loginadmin where id='$id'";
    $res = mysqli_query($connection, $sql);
    if ($res && $res->num_rows > 0) {
        $admin = $res->fetch_assoc();
        $password = $admin['password'];
    }
} else {
    header("location:manage-admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Password Admin Page</title>
</head>

<body>
    <div style="padding: 50px; width: 700px;">
        <form method="post">
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="exampleInputPassword1">Current Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="" name="currentPassword" required>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="" name="newPassword" required>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="" name="confirmPassword" required>
            </div>
            <div class="form-check" style="margin-bottom: 20px;">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>

<?php

include "context/footer.php";

if (isset($_POST['submit'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password == md5($currentPassword)) {
        if ($newPassword == $confirmPassword) {
            $sql = "update loginadmin set password = '" . md5($newPassword) . "'";
            $res = mysqli_query($connection, $sql);
            if ($res) {
                header("location:manage-admin.php");
            } else {
                header("location:update-password-admin.php");
            }
        } else {
            header("location:update-password-admin.php");
        }
    } else {
        header("location:update-password-admin.php");
    }
}

?>