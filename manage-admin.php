<?php

class DB
{

    private $host;
    private $username;
    private $password;
    private $dbName;

    public function connect()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "phpproject";

        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        return $conn;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Pages</title>
</head>

<body style="padding: 50px;">
    <div style="padding: 50px;" class="border border border-3 rounded">
        <?php include "context/navbar.php"; ?>
        <h1 class="display-6">The Admins</h1>
        <table class="table table-striped " style="margin-top: 50px;">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                class Admin extends DB
                {

                    public function getUser()
                    {
                        $sql = "select * from loginadmin";
                        $stmt = $this->connect()->query($sql);
                        if ($stmt && $stmt->num_rows > 0) {
                            while ($admin = $stmt->fetch_assoc()) {
                                $id = $admin['id'];
                                $username = $admin['username'];
                                $email = $admin['email'];
                                $created_at = $admin['created_at'];
                ?>
                                <tr>
                                    <th scope="row"><?php echo $id ?></th>
                                    <td><?php echo $username ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $created_at ?></td>
                                    <td><a href="update-admin.php?id=<?php echo $id ?>" class="btn btn-success">Update</a>
                                        <a href="update-password-admin.php?id=<?php echo $id ?>" class="btn btn-primary">Update Password</a>
                                        <a href="delete-admin.php?id=<?php echo $id ?>" class="btn btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                <?php
                            }
                        } else {
                            echo "<tr><td>No User Yet !!</td></tr>";
                        }
                    }
                }
                $admin = new Admin();
                echo $admin->getUser();
                ?>
            </tbody>
        </table>
        <a href="add-admin.php" style="color: #fff;" type="button" class="btn btn-info">Add Admin</a>
    </div>
</body>

</html>

<?php
require "context/footer.php";

?>