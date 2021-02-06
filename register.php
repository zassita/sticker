<?php
if (isset($_POST['btn_submit'])) {
    require 'dbconnect.php';
    $student_name = $_POST['student_name'];
    $matric = $_POST['matric'];
    $phone = $_POST['phone'];
    $program = $_POST['program'];
    $fakulti = $_POST['fakulti'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $repeatpassword = md5($_POST['repeatpassword']);

    // check repeat password\
    if ($password != $repeatpassword) {
        header("Location: register.php?error=passwordnotsame");
        exit();
    }

    // check the user if already register
    $check_user = mysqli_query($conn, "SELECT matric_number FROM user WHERE matric_number ='$matric' ");
    if ($check_user == false) {
        echo "Failed find user <br>";
        echo "SQL error :" . mysqli_error($conn);
        exit();
    }
    if (is_null($check_user)) {
        header("Location: login.php?error=alreadyregister");
        exit();
    } else {
        // save user into database
        $saveuser = mysqli_query($conn, "INSERT INTO user (matric_number,password) VALUES ('$matric','$password')");
        if ($saveuser == false) {
            echo "Failed to register student <br>";
            echo "SQL error :" . mysqli_error($conn);
            exit();
        } else {
            // save user information in database
            $last_id = mysqli_insert_id($conn);
            $saveuserdata = mysqli_query($conn,"INSERT INTO student_info (matric_number,user_id,address,phone,name,program,fakulti) VALUES ('$matric','$last_id','$address','$phone','$student_name','$program','$fakulti') ");

            if ($saveuserdata == false) {
                echo "Failed to save user information <br>";
                echo "SQL error :" . mysqli_error($conn);
                exit();
            }
            // return to login page
            header("Location: login.php?success=registed");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="register.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control" id="student_name" name="student_name" placeholder="Full name" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control" id="matric" name="matric" placeholder="Matric Number" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control" id="phone" name="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control" id="program" name="program" placeholder="Program" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control" id="fakulti" name="fakulti" placeholder="Fakulti" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control form-control" placeholder="Address" id="address" name="address" required></textarea>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <input class="btn btn-primary btn btn-block" type="submit" name="btn_submit" value="Register Now">
                                <hr>

                            </form>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>