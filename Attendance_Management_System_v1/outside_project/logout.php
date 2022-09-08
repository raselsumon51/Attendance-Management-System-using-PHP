<?php
    session_start();
    session_destroy();
?>

<?php
if(!isset($_SESSION['email'])){
    header("Location:login.php");
}
    header("Location:teachers_login.php");
?>


