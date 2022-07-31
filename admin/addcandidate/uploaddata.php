<?php
//upload new candate details in the table candidate
$fullname=$_POST['fullname'];
$designation=$_POST['designation'];
$pincode=$_POST['pincode'];
include"../../resources/connection.php";
$query="INSERT INTO candidate (`candidate_id`, `c_name`, `c_designation`, `c_pincode`) VALUES (NULL, '$fullname', '$designation', '$pincode');";
//upload the common detail in the descpoll table for filtering
$query2="select * from descpoll where pincode='$pincode' and designation='$designation';";
mysqli_query($con,$query) or die(mysqli_error($con));
$fetch=mysqli_query($con,$query2) or die(mysqli_error($con));
$num=mysqli_num_rows($fetch);
if($num<1){
    $query3="INSERT INTO descpoll (`sno`, `pincode`,`designation`) VALUES (NULL, '$pincode', '$designation');";
    mysqli_query($con,$query3) or die(mysqli_error($con));
}
?>