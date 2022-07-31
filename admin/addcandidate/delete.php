<?php
// deleting the candidate from list
include"../../resources/connection.php";
$candidateid=$_POST['candidateid'];
$query="DELETE FROM candidate WHERE candidate_id='$candidateid';";
mysqli_query($con,$query) or die(mysqli_error($con));
?>