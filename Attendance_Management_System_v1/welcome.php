<?php
session_start();
?>
<?php
include 'connect.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
<div class="mt-5 mb-4 container">
    <div class="text-end">

<h2>Welcome ! </h2>
   <h5 class="mb-2"> <a href="teachers_login.php">Logout</a> </h5>
   <h2 class="text-center mt-0 mb-4">All Courses</h2>

    <?php
    if(!isset($_SESSION['email'])){
        header("Location:teachers_login.php");  
    }
//show each course name , teacher name, date from course table
    $sql = "SELECT * FROM course";
    $result = mysqli_query($con, $sql);
    //fetch all data from course table

    //show each course name , teacher name, date in a table
    if ($result) {
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<th>Courses Name</th>";
        echo "<th>Teachers Name</th>";
        echo "<th>Creation Date</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $course_id = $row['cid'];
            $course_name = $row['cname'];
            $course_teacher = $row['cteacher'];
            $course_date = $row['date'];
            echo "<tr>";
            echo "<td>
            <h5>
            <a href='course_details.php?cid=$course_id && cname=$course_name && cteacher=$course_teacher'>$course_name</a>
           </h5>
            </td>";
            echo "<td>$course_teacher</td>";
            echo "<td>$course_date</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    <button type="submit" name="submit"  class="btn btn-info text-start"><a style="color:white; text-decoration:none" href="create_course.php">Create Course</a></button><br>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

