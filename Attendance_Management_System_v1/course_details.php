<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 10px;
  background-color:aqua;
}
.grid-item {
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
a{
    color:rebeccapurple;
    text-decoration:none;
}
</style>
</head>
<body>
<?php
      if(isset($_GET['cid'])){
          $cid = $_GET['cid'];
          $cname = $_GET['cname'];
          $cteacher = $_GET['cteacher'];
      }
?>
<div class="container">
<h2 class="mb-4 mt-5 text-center">Choose Options</h2>

<div class="grid-container">
  <div class="grid-item">
    <?php
    echo "<a href='index1.php?cid=$cid && cname=$cname && cteacher=$cteacher'>Take Todays Attendance</a>";
    ?>
  </div>
  <div class="grid-item">
    <?php
    echo "<a href='prev_attendance.php?cid=$cid&&cname=$cname&& cteacher=$cteacher'>Take Previous Attendance</a>";
    ?>
  </div>
  <div class="grid-item"><a href="setmarks.php">Set Marks</a></div>  
  <div class="grid-item"><a href="add_new_student.php?cname=<?php echo $cname ?>">Add Students</a></div>
  <div class="grid-item"><a href="student_list.php?cname=<?php echo $cname ?>" >See ALL Students</a></div>
  <div class="grid-item">
  <a href="students_attd_marks_summary.php?cname=<?php echo $cname ?> " > Students' Marks</a>
    <!-- <?php
      echo "<a href='student_list_1.php?cname=$cname>Students' Marks</a>";
    ?> -->
  </div>

  
</div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

