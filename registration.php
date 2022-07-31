<style>p{
  color:blue;
  font-weight: bold;
  font-size: 30px;
  
}
a{
  color:darkblue;
  font-size: 40px;
  font-weight: bold;
}
body {
          background-image: url('resources/background.jpg');
        }
    </style>
<?php
require('resources/connection.php');
// registering the candidate
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $email=$_POST['email'];
    $password=$_POST['password'];
$store="INSERT INTO `voter` (`voter_id`, `fname`, `lname`, `gender`, `phone_no`, `address`, `pincode`, `email`, `password`) VALUES (NULL, '$fname', '$lname', '$gender', '$phoneno', '$address', '$pincode', '$email', '$password');";
$status=mysqli_query($con,$store) or die(mysqli_error($con));
if($status){
    // after successfully submitted
echo'
<center>
    <div>
        <p>Successfully submitted</p>
        <p>Your form submitted successfully. Please login by clicking below</p>
        <a href="login.html">Click for signin</a>
    </div>
</center>   
';

}
// in case any error 
else{
    echo'
    <center>
        <div>
            <p>ERROR</p>
            <p>Your form does not submitted. please try again !!</p>
            <a href="login.html">Click here for registration</a>
        </div>
    </center>   
    ';
}

mysqli_close($con);


?>