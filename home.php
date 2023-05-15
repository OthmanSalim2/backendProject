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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>

<body style="padding: 40px;">
    <div style="padding: 50px;" class="border border border-3 rounded">
        <?php include "context/navbar.php"; ?>
        <h1 style="padding: 20px;" class="display-6">The Users</h1>
        <!-- THis The Table For All Users -->
        <table class="table" style="margin-bottom: 40px;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php

                class User extends DB
                {

                    public function getUser()
                    {
                        $sql = "select * from loginuser";
                        $stmt = $this->connect()->query($sql);
                        if ($stmt && $stmt->num_rows > 0) {
                            while ($user = $stmt->fetch_assoc()) {
                                $id = $user['id'];
                                $username = $user['username'];
                                $email = $user['email'];
                                $created_at = $user['created_at'];
                ?>
                                <tr>
                                    <th scope="row"><?php echo $id ?></th>
                                    <td><?php echo $username ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $created_at ?></td>
                                </tr>
                <?php
                            }
                        } else {
                            echo "<tr><td>No User Yet !!</td></tr>";
                        }
                    }
                }
                $user = new User();
                echo $user->getUser();
                ?>

            </tbody>
        </table>

        <hr style="height: 2px;">

        <!-- This is The Table For All Admins -->
        <h1 style="padding: 20px;" class="display-6">The Admins</h1>
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
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
    </div>
</body>

</html>

<?php
require "context/footer.php";
?>