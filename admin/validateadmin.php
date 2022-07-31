<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN ERROR</title>
        <style>
  a{
  font-weight: bold;
  font-size:40px;
  color:darkblue;
}
p{
  color:red;
  font-weight: bold;
  font-size: 30px;
}
        </style>
    </head>
<body>
    <!-- if admin has correct credential then forwarded to next page -->
<?php
include("../resources/connection.php");
$email=$_POST['email'];
$password=$_POST['password'];
$query="select * from admin where email='$email' and password='$password';";
$fetch=mysqli_query($con,$query);
$validate=mysqli_num_rows($fetch);
if($validate>0){
    session_start();
    $_SESSION['validate']=$validate;
    header("location:home.php");
}
// for every error login
else{
    echo'
<center>
    <div>
        <p>Login error</p>
        <p>Either your password or email or both is wrong please check carefully.</p>
        <p>Wrong credentials. Please try again</p>
        <a href="index.html">Click for signin</a>
    </div>
</center>   
';
}

?>