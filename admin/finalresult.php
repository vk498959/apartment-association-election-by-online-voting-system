<!DOCTYPE html>
<html>
    <head>
        <title>Final Result</title>
        <link rel="stylesheet" type="text/css" href="../resources/main.css">
        <style>
            table,td{
    border:solid;
    font-size: 25px;
    font-weight: bold;
    background-color: skyblue;
}
#heading{
    background-color: blue;
    font-size: 30px;
    font-weight: bold;
    color:rgb(0, 255, 42);
}
body {
          background-image: url('../resources/background.jpg');
        }
        </style>
</head>
<body>
<center>
<header>ADMIN</header>
    <div id="menu">
        <a href="home.php">HOME</a>
        <a href="addcandidate.html">ADD CANDIDATE</a>
        <a href="result.php">RESULT</a>
        <a href="signout.php">SIGN OUT</a>
    </div>
    <div id="heading">Final result </div>
<?php
include"../resources/connection.php";
$pincode=$_POST['pincode'];
$designation=$_POST['designation'];
//for voting result fetching all available candidate on common pincode and designation
$query="select * from candidate where c_pincode='$pincode' and c_designation='$designation';";
$fetch=mysqli_query($con,$query) or die(mysqli_error($con));
echo'<table>';
echo'<tr><td>Candidate ID</td><td>Full name</td><td>Designation</td><td>Pincode</td><td>Total vote</td></tr>';
while($data=mysqli_fetch_assoc($fetch)){
$candidateid=$data['candidate_id'];
echo'<tr><td>'.$data['candidate_id'].'</td><td>'.$data['c_name'].'</td><td>'.$data['c_designation'].'</td><td>'.$data['c_pincode'].'</td>';
//fetching the no of vote gain by the candidate
$get=mysqli_query($con,"select * from poll where candidate_id='$candidateid';") or die(mysqli_error($con));
$totalvote=mysqli_num_rows($get);
echo '<td>'.$totalvote;
echo'</td></tr>';
}
echo'</table>';
?>
</center>
</body>
</html>