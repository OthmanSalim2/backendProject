<?php
include "context/navbar.php";
include "context/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from loginadmin where id = '$id'";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        echo "Deleted Admin";
        header("location:manage-admin.php");
    } else {
        header("location:manage-admin.php");
    }
} else {
    header("location:manage-admin.php");
}
