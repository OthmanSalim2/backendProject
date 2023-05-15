<?php
include "context/navbar.php";
include "context/config.php";

if (!$connection) {
    echo "Failed Connection";
} else {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (
            strlen($username) > 5 && !empty($username) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email) && strlen($password) >= 8
            && preg_match("/\w/", $password) && !empty($password)
        ) {
            $sql = "insert into loginadmin set username=?, email=?, password=? ";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sss", $username, $email, md5($password));
            $stmt->execute();
            echo "Admin is Added";
            header("location:manage-admin.php");
        } else {
            echo "Error Entries";
            header("refresh:0.5");
        }
    }
}

?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add Admin</title>
</head>

<body>


    <div>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <h1 style="margin-bottom: 30px;" class="display-6">Enter Admin Information : </h1>
                        <form action="#" method="post">

                            <!-- Username input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control form-control-lg" name="username" placeholder="Enter a username" required />
                                <label class="form-label" for="form3Example3">Username</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control form-control-lg" name="email" placeholder="Enter a valid email address" required />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="text" id="form3Example4" class="form-control form-control-lg" name="password" placeholder="Enter password" required />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" required />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <button name="submit" style="margin-top: 30px;" type="submit" class="btn btn-dark">Add</button>

                        </form>
                    </div>
                </div>
            </div>
            <?php

            require "context/footer.php";
            ?>
        </section>
    </div>


</body>

</html>