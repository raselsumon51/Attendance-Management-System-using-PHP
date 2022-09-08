<?php
include 'connect.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    $course_name = trim($_GET['cname']);
    $course_attd = $course_name . " attd";
    ?>
    <div class="container">
        <h2 style="padding: 25px 0px;text-align:center;"> Total Classes and Student's Marks In Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Present</th>
                    <th scope="col">Total Absent</th>
                    <th scope="col">Total Class</th>
                    <th scope="col">Attendance Percentage</th>
                    <th scope="col">Marks</th>
                </tr>
            </thead>

            <tbody>
                <?php



                //get marks form marks table
                $sql_marks = "SELECT * FROM marks";
                $marks =  mysqli_query($con, $sql_marks);
                $all_marks =  mysqli_fetch_assoc($marks);
                $count_marks_rows = mysqli_num_rows($marks);
                // if ($count_marks_rows > 0) {
                //     $marks1 = $all_marks['Marks1'];
                //     $marks2 = $all_marks['Marks2'];
                //     $marks3 = $all_marks['Marks3'];
                //     $marks4 = $all_marks['Marks4'];
                //     $marks5 = $all_marks['Marks5'];
                //     $marks6 = $all_marks['Marks6'];
                //     $marks7 = $all_marks['Marks7'];
                //     $marks8 = $all_marks['Marks8'];
                //     $marks9 = $all_marks['Marks9'];
                // }

                //select all students
                $sql_all_std = "SELECT * FROM `$course_name`  order by id asc";
                $students_details = mysqli_query($con, $sql_all_std);
                if ($students_details)
                    echo "Students information fetched<br>";
                else
                    echo "Failed to fetch student information" . mysqli_error($con);

                //calculate total attendance 
                $sql_count_attd =  "SELECT COUNT(DISTINCT att_time) as countAttd FROM `$course_attd`";

                $students_attd =  mysqli_query($con, $sql_count_attd);
                if (mysqli_query($con, $sql_count_attd))
                    echo "Attendance counted<br>";
                else
                    echo "Attendance count failed " . mysqli_error($con);
                $total_attd_array = mysqli_fetch_assoc($students_attd);
                $total_attd = $total_attd_array['countAttd'];

                while ($each_student = mysqli_fetch_assoc($students_details)) {
                    //get each student details
                    $std_id = $each_student['id'];
                    $std_name = $each_student['name'];
                    $std_email = $each_student['email'];

                    //get total presents of a student
                    $sql_std_attd = "SELECT COUNT(DISTINCT att_time) as stduent_total_attd FROM `$course_attd` WHERE `roll` = '$std_id'";
                    $std_attd = mysqli_query($con, $sql_std_attd);
                    $std_attd_total = mysqli_fetch_assoc($std_attd);

                    $total_present = $std_attd_total['stduent_total_attd'];

                    if ($total_attd != 0) {
                        $attd_percentage = ($total_present / $total_attd) * 100;
                    }
                    
                    //get marks based on given marks
                    if ($attd_percentage >= 95) {
                        $marks = $all_marks['Marks1'];
                    } else if ($attd_percentage >= 90 && $attd_percentage <= 94)
                        $marks = $all_marks['Marks2'];
                    else if ($attd_percentage >= 85 && $attd_percentage <= 89)
                        $marks = $all_marks['Marks3'];
                    else if ($attd_percentage >= 80 && $attd_percentage <= 84)
                        $marks = $all_marks['Marks4'];
                    else if ($attd_percentage >= 75 && $attd_percentage <= 79)
                        $marks = $all_marks['Marks5'];
                    else if ($attd_percentage >= 70 && $attd_percentage <= 74)
                        $marks = $all_marks['Marks6'];

                    else if ($attd_percentage >= 65 && $attd_percentage <= 69)
                        $marks = $all_marks['Marks7'];
                    else if ($attd_percentage >= 60 && $attd_percentage <= 64)
                        $marks = $all_marks['Marks8'];
                    else if ($attd_percentage <= 59)
                        $marks = $all_marks['Marks9'];

                    //print values in tables
                    echo '<tr>
                    <th scope="row">' . $std_id . '</th>
                    <td>' . $std_name . '</td>
                    <td>' . $total_present . '</td>
                    <td>' . ($total_attd - $total_present) . '</td>
                    <td>' . $total_attd . '</td>
                    <td>' . $attd_percentage . '%</td>
                     <td>' . $marks . '</td>
                       </tr>';
                }

                ?>
            </tbody>
        </table>
    </div>
    < </body>

</html>

<!-- <td>    
             <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light" >Update</a></button>
             <button  class="btn btn-danger"><a href="delete.php?deleteid='.$id.'"  class="text-light" >Delete</a></button>
         </td> -->

<!-- // echo $marks1;
                        
                        //  echo "<pre>";
                        //  print_r($row8);
                        //  echo "</pre>";

                // if(isset($_POST['submit'])){
                //     $marks1 = $_POST['marks1'];
                //     $marks2 = $_POST['marks2'];
                //     $marks3 = $_POST['marks3'];
                //     $marks4 = $_POST['marks4'];
                //     $marks5 = $_POST['marks5'];
                //     $marks6 = $_POST['marks6'];
                //     $marks7 = $_POST['marks7'];
                //     $marks8 = $_POST['marks8'];
                //     $marks9 = $_POST['marks9'];
                //     // $sql3 = "UPDATE `student` SET `marks1`='$marks1',`marks2`='$marks2',`marks3`='$marks3',`marks4`='$marks4',`marks5`='$marks5',`marks6`='$marks6',`marks7`='$marks7',`marks8`='$marks8',`marks9`='$marks9' WHERE id=1";
                //     // $result3 = mysqli_query($con, $sql3);
                //     echo $marks3;
                // } -->

<!-- // $marks1=null;
                // $marks2=null;
                // $marks3=null;
                // $marks4=null;
                // $marks5=null;
                // $marks6=null;$marks7=null;
                // $marks8=null;$marks9=null; -->