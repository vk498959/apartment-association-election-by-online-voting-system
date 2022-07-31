<style>
    p{
  font-size: 30px;
  font-weight: bold;
  color:red; 
}
a{
  font-size: 40px;
}
body {
          background-image: url('resources/background.jpg');
        }
    </style>
<!-- verifying the user and fetching the detail of user from db -->
<?php
include 'resources/connection.php';
$email=$_POST['email'];
$password=$_POST['password'];
$query="select * from voter where email='$email' and password='$password' ;";
$fetch=mysqli_query($con,$query) or die(mysqli_error($con));
$validate=mysqli_num_rows($fetch);

if($validate>0){
    session_start();
    $data=mysqli_fetch_assoc($fetch);
    $_SESSION['name']=$data['fname'];
    $_SESSION['pincode']=$data['pincode'];
    $_SESSION['validate']=$validate;
    $_SESSION['voter_id']=$data['voter_id'];
    header("location:home.php");

}
// if user put wrong credentials
else{
    echo'
<center>
    <div>
        <p>Login error</p>
        <p>Either your password or email or both is wrong please check carefully.</p>
        <p>Wrong credentials. Please try again</p>
        <a href="login.html">Click for signin</a>
    </div>
</center>   
';
}
?>