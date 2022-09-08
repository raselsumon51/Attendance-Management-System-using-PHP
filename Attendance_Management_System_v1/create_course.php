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
    <h3 class="text-center mt-4">Course Information</h3>
    <div class="container d-flex justify-content-center">

        <form method="post" action="" enctype='multipart/form-data'>
            <div class="form-group">
                <label>Course Name</label>
                <input value="" type="text" class="form-control" placeholder="Enter course name" name="cname">
            </div>
            <div class="form-group">
                <label>Course Teacher</label>
                <input value="" type="text" class="form-control" placeholder="Enter course teacher" name="tname">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input value="" type="date" class="form-control" placeholder="Enter date" name="date">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        //insert data into course table
        $course_name = $_POST['cname'];
        $course_teacher = $_POST['tname'];
        $course_date = $_POST['date'];
        $sql = "INSERT INTO course (cname, cteacher,date) VALUES ('$course_name', '$course_teacher', '$course_date')";
        if(mysqli_query($con, $sql)){
            //echo course craeted
            echo "<div class='alert alert-success'>Course Created</div>";
        }   
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>