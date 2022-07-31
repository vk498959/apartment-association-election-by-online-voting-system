<?php
//update the candidate details
$id=$_GET['id'];
if(isset($_POST['update'])){
    include"../../resources/connection.php";
    $id=$_GET['id'];
    $fullname=$_POST['fullname'];
    $designation=$_POST['designation'];
    $pincode=$_POST['pincode'];
   $query="UPDATE candidate SET c_name = '$fullname', c_designation = '$designation', c_pincode = '$pincode' WHERE candidate_id = '$id'; ";
   mysqli_query($con,$query) or die(mysqli_error($con));
   echo"Updated successfully.";
   echo'
   <a href="../home.php">Click here to go to homepage</a>
   ';
   }

//showing the candidate details
include"../../resources/connection.php";
$query="select * from candidate where candidate_id='$id';";
$data=mysqli_query($con,$query) or die(mysqli_error($con));
echo'<form action="" method="post">';
echo'<table>';
$i=mysqli_fetch_assoc($data);
echo'<tr>
        <td>Full name</td>
        <td><input type="text" name="fullname" value="'.$i['c_name'].'"></td>
     </tr>
     <tr>
        <td>Designation</td>
        <td><input type="text" name="designation" value="'.$i['c_designation'].'"></td>
     </tr>
     <tr>
        <td>Pincode</td>
        <td><input type="text" name="pincode" value="'.$i['c_pincode'].'"></td>
     </tr>
     
     </table>
     <input type="submit" value="Update" name="update">
     </form>
        ';
 ?>