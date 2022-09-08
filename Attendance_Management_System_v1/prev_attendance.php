
<?php
      if(isset($_GET['cid'])){
          $cid = $_GET['cid'];
          $cname = $_GET['cname'];
          $cteacher = $_GET['cteacher'];
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
    <h2 class="text-center mt-5 mb-4">Select Date</h2>
    <div class="container d-flex justify-content-center">
        <form method="post" action="index2.php" enctype='multipart/form-data'>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Select Date</label>
                <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                <input type="hidden" name="cname" value="<?php echo $cname; ?>">
                <input type="hidden" name="cteacher" value="<?php echo $cteacher; ?>">
            </div>            
            <button type="submit" name="submit" style="color:white; text-decoration:none" class="btn btn-info">Confirm </button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>