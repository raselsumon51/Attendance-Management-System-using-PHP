<?php
include 'connect.php';
date_default_timezone_set('Asia/Dhaka');

$id = $_POST['std_id'];
$course = $_POST['std_course'];
// $id = 180139;
// $course = "TOC";
$course_attd_tbl= $course . " attd";

// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
//   }

    $sql_course_tbl = "CREATE TABLE IF NOT EXISTS `$course_attd_tbl` (
    sl INT(11) AUTO_INCREMENT PRIMARY KEY,
    roll INT(11),
    attendance VARCHAR(255),
    att_time VARCHAR(255)
    )";


mysqli_query($con, $sql_course_tbl);
    //echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($con);
//   }




$date = date("Y-m-d");

$sql1 = "SELECT * FROM `$course_attd_tbl` WHERE roll = '$id' AND att_time = '{$date}' limit 1";
$result = mysqli_query($con, $sql1);
if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['attendance'] == 'present') {
            $sql3 = "Delete FROM `$course_attd_tbl` WHERE roll = '$id' AND att_time = '{$date}'";
            //$result3 = mysqli_query($con, $sql);
            if (mysqli_query($con, $sql3)) {
                echo 0;
            }
        }
    } else {
        $sql2 = "insert into `$course_attd_tbl` (roll,attendance,att_time) values('$id','present','$date')";
        //$result4 = mysqli_query($con, $sql2);
        if (mysqli_query($con, $sql2)) {
            echo 1;
        }
    }
}
?>