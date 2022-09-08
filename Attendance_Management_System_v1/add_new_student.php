<?php
//connect to db
include 'connect.php';

//get course name from GET
$course_name =  trim($_GET['cname']);

//Create Course  Student INFO Table
$sql_course = "CREATE TABLE IF NOT EXISTS `$course_name` (
    sl INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    id INT(11),
    email VARCHAR(255),
    mobile INT(11),
    img_file_name VARCHAR(255)
    )";


if (mysqli_query($con, $sql_course)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}


// Insert into course table
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $filename = $_FILES['image']['name'];

    $sql_std_info = "insert into `$course_name` (name,id,email,mobile,img_file_name) values('$name','$id','$email','$mobile','$filename')";
    
    if (mysqli_query($con, $sql_std_info)) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data " . mysqli_error($con);
    }
    move_uploaded_file($_FILES["image"]["tmp_name"], 'upload/' . $filename);
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
    <h3 class="text-center mt-4">Add a New Student</h3>
    <div class="container d-flex justify-content-center">

        <form method="post" action="" enctype='multipart/form-data'>
            <div class="form-group">
                <label>Name</label>
                <input value="" type="text" class="form-control" placeholder="Enter your name" name="name">
            </div>
            <div class="form-group">
                <label>ID</label>
                <input value="" type="text" class="form-control" placeholder="Enter your id" name="id">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile" name="mobile">
            </div>
            <div class="form-group">
                <h5>Select Image To Upload</h5>
                <input type="file" name="image" id="file">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>