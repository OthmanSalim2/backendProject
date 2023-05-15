<?php
ob_start();
include "context/navbar.php";
include "context/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from loginuser where id='$id'";
    $res = mysqli_query($connection, $sql);
    if ($res && $res->num_rows > 0) {
        $user = $res->fetch_assoc();
        $username = $user['username'];
        $email = $user['email'];
        $password = $user['password'];
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
    <title>Update User Page</title>
</head>

<body>
    <div style="padding: 50px; width: 700px;">
        <form method="post">
            <div class="form-group" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email ?>" name="email" required>
            </div>
            <div class="form-group" style="margin-bottom: 30px;">
                <label for="exampleInputUsername1">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Enter username" value="<?php echo $username ?>" name="username" required>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $password ?>" name="password" required>
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
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];

    $sql = "update loginuser set email = '$newEmail', username = '$newUsername', password = '" . md5($newPassword) . "' where id = '$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        header("location:manage-user.php");
    } else {
        header("location:manage-user.php");
    }
}

?>