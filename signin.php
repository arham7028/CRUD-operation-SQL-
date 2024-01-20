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
   
    $prn1=$_POST["prn1"];
    $pass1=$_POST["pass1"];
  
  
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
</head>
<body>
<form action="/crud/signin.php" method="post">
<label for="prn">Prn:</label>
<input type="text" id="prn1" name="prn1">
<br>
<label for="pass">Password:</label>
<input type="password" id="pass1" name="pass1">
<br>
<button type="submit">Signin</button>
</form>
<br>
<a href="/crud/signup.php">Signup</a>
<?php
  $sql = "SELECT * FROM `form`"; 
  $result= mysqli_query($conn, $sql);
  
  while ($db = mysqli_fetch_assoc($result)) {
   if (($db['prn']==$prn1) && $db['pass']==$pass1) {
    echo "success";
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: home.php");

   }
}
?>
</body>
</html>