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
    <h2 class="text-center mt-5 mb-4">Teachers Registration</h2>
    <div class="container d-flex justify-content-center">

        <form method="post" action="" enctype='multipart/form-data'>
            <div class="mt-2 mb-2 form-group">
                <label class="mb-2"> Name</label>
                <input value="" type="text" class="form-control" placeholder="Enter teacher name" name="tname">
            </div>
            <div class="form-group">
                <label class="mb-2">  Course</label>
                <input value="" type="text" class="form-control" placeholder="Enter teacher course" name="tcname">
            </div>
            <div class="mt-2 mb-2 form-group">
                <label class="mb-2">Email</label>
                <input value="" type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label class="mb-2">Password</label>
                <input value="" type="password" class="form-control" placeholder="Enter password" name="password">
            </div>

            <div class="mt-2 mb-2 form-group">
                <label class="mb-2">Confirm Password</label>
                <input value="" type="password" class="mb-3 form-control" placeholder="Confirm password" name="cpassword">
            </div>


            <button type="submit" name="submit" class="btn btn-info">Register</button>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $teacher_name = $_POST['tname'];
        $teacher_course = $_POST['tcname'];
        $teacher_email = $_POST['email'];
        $teacher_password = $_POST['password'];
        $teacher_cpassword = $_POST['cpassword'];
        //md5 password

        $teacher_password = md5($teacher_password);
        $teacher_cpassword = md5($teacher_cpassword);
        //check if password and confirm password match


        //check if all fields are filled
        if(empty($teacher_name) || empty($teacher_course) || empty($teacher_email) || empty($teacher_password) || empty($teacher_cpassword))
            echo '<div class="alert alert-danger">All fields are required</div>';
    
        if($teacher_password == $teacher_cpassword){
            //check if email is already registered
            $sql = "SELECT * FROM teachers WHERE teacher_email = '$teacher_email'";
            $result = mysqli_query($con,$sql);
            //num rows
            $num = mysqli_num_rows($result);

            if($num > 0){
                echo '<div class="alert alert-danger">Email already registered</div>';
            }else{
                //insert data
                $sql = "INSERT INTO teachers (teacher_name,teacher_course,teacher_email,teacher_password) VALUES ('$teacher_name','$teacher_course','$teacher_email','$teacher_password')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo '<div class="alert alert-success">Teacher registered successfully</div>';
                    //redirect to login page
                    header('location:teachers_login.php');
                }else{
                    //echo '<div class="alert alert-danger">Error registering teacher</div>';
                    //error
                    echo "Error: <br>" . mysqli_error($con);
                    //error no


                }
            }
        }else{
            echo '<div class="alert alert-danger">Password and confirm password do not match</div>';
        }
            
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>