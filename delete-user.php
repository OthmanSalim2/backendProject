<?php
include "context/navbar.php";
include "context/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from loginuser where id = '$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        echo "Deleted User";
        header("location:manage-user.php");
    } else {
        header("location:manage-user.php");
    }
} else {
    header("location:manage-user.php");
}
