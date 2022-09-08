<?php
include 'connect.php';
?>

<?php
    $sql = "SELECT * FROM `course`";
    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $course_id = $row['cid'];
        $course_name = $row['cname'];
        $course_teacher = $row['cteacher'];

    ?>
         
          <div>
            <?php
            echo "<a href='index1.php?cid=$course_id && cname=$course_name && cteacher=$course_teacher'>$course_name</a>";
            if(isset($_GET['cid'])){
                //redirect
                header('Location: index1.php');
                
            }
           
           ?>
          </div>
    <?php
    //pass multiple values in url
    // echo "<a href='show_cources.php?cid=$course_id && cname=$course_name && cteacher=$course_teacher'>$course_name</a>";
      }
    } 
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
    <h3 class="text-center mt-4">All Courses</h3>
    <div class="container d-flex justify-content-center">

        <form method="post" action="index1.php" enctype='multipart/form-data'>
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
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        //redirect
        header('Location: index1.php');
        
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>