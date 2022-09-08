<?php
session_start();
?>
<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Attendance Management System</title>
</head>

<body>
    <h2 class="text-center mt-5 mb-4">Teacher's Login</h2>
    <!-- <div class="container d-flex justify-content-center">

        <form method="post" action="" enctype='multipart/form-data'>
            <div class="form-group">
                <label>User Email</label>
                <input value="" type="text" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
            <label>Password</label>
                <input value="" type="text" class="form-control" placeholder="Enter password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>  -->
    <div class="container d-flex justify-content-center">
        <form method="post" action="" enctype='multipart/form-data'>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="submit" style="color:white; text-decoration:none" class="btn btn-info">Login</button><br>
            <button type="submit" name="submit" class="mb-3 mt-3 btn btn-info"><a style="color:white; text-decoration:none" href="teachers_registration.php">Register for New Account</a></button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $user_email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $user_email;
        $query = "SELECT * FROM teachers WHERE teacher_email = '$user_email' AND teacher_password = '$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $user_email;
            $_SESSION['password'] = $password;
            //header("Location:welcome.php");
            //  echo "Login Successful";
            // echo "<a href='welcome.php'>Click here to continue</a>";
            header("Location:welcome.php");
        } else {
            echo "Invalid email or password";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>