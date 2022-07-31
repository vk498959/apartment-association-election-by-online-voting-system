<!DOCTYPE html>
<html>
   <head>
      <title>My profile</title>

      <style>
         center{
  background-color: skyblue;
  border: solid;
  margin-left: 25%;
  margin-right: 25%;
}
body {
          background-image: url('resources/background.jpg');
        }
         </style>
   </head>
   <body>
      <center>
<?php
session_start();
//update the details if the candidate click the update button
if(isset($_POST['update'])){
    include"resources/connection.php";
    $voterid=$_SESSION['voter_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $email=$_POST['email'];
   $query="UPDATE voter SET fname = '$fname', lname = '$lname', gender = '$gender', phone_no = '$phoneno', address = '$address', pincode ='$pincode', email = '$email' WHERE voter_id = '$voterid'; ";
   mysqli_query($con,$query) or die(mysqli_error($con));
   echo"Updated successfully. Please login again to see the changes.";
   echo"Thank you!";
   session_destroy();
   echo'
   <a href="login.html">Click here to go to login page</a>
   ';
   }

//showing all user data stored in database
$voterid=$_SESSION['voter_id'];
include"resources/connection.php";
$query="select * from voter where voter_id='$voterid';";
$data=mysqli_query($con,$query) or die(mysqli_error($con));
echo'<form action="" method="post">';
echo'<table>';
$i=mysqli_fetch_assoc($data);
echo'<tr>
        <td>First name</td>
        <td><input type="text" name="fname" value="'.$i['fname'].'"></td>
     </tr>
     <tr>
        <td>Last name</td>
        <td><input type="text" name="lname" value="'.$i['lname'].'"></td>
     </tr>
     <tr>
        <td>Gender</td>
        <td><input type="text" name="gender" value="'.$i['gender'].'"></td>
     </tr>
     <tr>
        <td>Phone no</td>
        <td><input type="text" name="phoneno" value="'.$i['phone_no'].'"></td>
     </tr>
     <tr>
        <td>Address</td>
        <td><input type="text" name="address" value="'.$i['address'].'"></td>
     </tr>
     <tr>
        <td>Pincode</td>
        <td><input type="text" name="pincode" value="'.$i['pincode'].'"></td>
     </tr>
     <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="'.$i['email'].'"></td>
     </tr>
     </table>
     <input type="submit" value="Update" name="update">
     </form>
        ';
 
?>
</center>
</body>
</html>