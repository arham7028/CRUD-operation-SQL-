<?php
 $servername="localhost";
 $username = "root";
 $password ="";
 $database="dbarham";
 $conn= mysqli_connect($servername, $username, $password, $database);
 if (!$conn) {
   die("Sorry we faield to connect".mysqli_connect_error());
 } 
 else {
    echo "Connection is success";
 }
 if ($_SERVER['REQUEST_METHOD'] =="POST") {
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $prn=$_POST["prn"];
    $pass=$_POST["pass"];
    $cpass=$_POST["cpass"]; 
  if ($pass == $cpass) {
    $sql= "INSERT INTO `form` (`first_name`, `last_name`, `prn`, `pass`, `cpass`, `date`) VALUES ('$firstname', '$lastname', '$prn', '$pass', '$cpass', current_timestamp())";
    $result= mysqli_query($conn,$sql);
  } else {
    echo "enter a valid password";
  }
  
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="/crud/signup.php" method="post">
        <label for="firstname">Name:</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="First name">
        <input type="text" id="lastname" name="lastname" placeholder="last name">
<br>
<label for="prn">Prn:</label>
<input type="text" id="prn" name="prn">
<br>
<label for="pass">Password:</label>
<input type="password" id="pass" name="pass">
<br>
<label for="pass">Confirm Password:</label>
<input type="password" id="cpass" name="cpass">
<br>
<button type="submit">Submit</button>
<br>
<a href="signin.php">Signin</a>


    </form>
</body>
</html>