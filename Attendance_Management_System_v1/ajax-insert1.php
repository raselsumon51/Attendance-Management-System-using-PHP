<?php
include 'connect.php';
date_default_timezone_set('Asia/Dhaka');

$id = $_POST['std_id'];
$course = $_POST['std_course'];
$date = $_POST['std_date'];
// $id="180139";
// $course="CSE";
// $date="2022-05-17";

// $sql = "insert into `atttendance` (roll,attendance,att_time,marks,att_percentage) values('$id','present','$date','$course','')";
//         $result = mysqli_query($con, $sql);

$sql = "SELECT * FROM `atttendance` WHERE roll = '$id' AND att_time = '{$date}' limit 1";
$result = mysqli_query($con, $sql);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// $row = mysqli_fetch_assoc($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['attendance'] == 'present') {
            $sql = "Delete FROM `atttendance` WHERE roll = '$id' AND att_time = '{$date}'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo 0;
            }
        }
    } else {
        $sql = "insert into `atttendance` (roll,attendance,att_time,marks,att_percentage) values('$id','present','$date','$course','')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo 1;
        }
    }
}
?>