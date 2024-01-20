<?php
$servername="localhost";
$username = "root";
$password ="";
$database="dbarham";
$conn= mysqli_connect($servername, $username, $password, $database);
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location: signin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home <?php $_SESSION['first_name']?></title>
</head>
<body>
    <h1>Wellcome <?php $_SESSION['first_name']?></h1>
</body>
</html>