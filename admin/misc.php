<?php
include"../resources/connection.php";
   //fetching the designation from table
    if($_POST['pincode']!=null){
    echo'<select name="designation" required>';
    $tpincode=$_POST['pincode'];
  $query2="select * from descpoll where pincode='$tpincode';";
  $fetch2=mysqli_query($con,$query2) or die(mysqli_error($con));
  while($data2=mysqli_fetch_assoc($fetch2)){
  echo'<option value="'.$data2['designation'].'">'.$data2['designation'].'</option>';
  }
}
else
echo "error";
 ?>