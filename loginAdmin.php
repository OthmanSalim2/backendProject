<?php

include "context/config.php";
if (!$connection) {
    echo "Failed Connection";
} else {
    if (isset($_POST['send'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from loginadmin where email =? and password =?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $email, md5($password));
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res && $res->num_rows > 0) {
            header("location:manage-admin.php");
        } else {
            echo "Error Entries";
            header("location:loginAdmin.php");
        }
    }
}


?>

<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login Admin</title>
</head>

<body>


    <div>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="images/admin.jpg" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="#" method="post">
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="le
                                ad fw-normal mb-10 me-3">Sign in : <a style="margin-right: 10px; text-decoration:none;" href="loginUser.php">User</a></p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control form-control-lg" name="email" placeholder="Enter a valid email address" required />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" placeholder="Enter password" required />
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
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button name="send" type="submit" class="btn btn-primary">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="registerAdmin.php" class="link-danger">Register</a></p>
                            </div>

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