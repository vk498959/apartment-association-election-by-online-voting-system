<!DOCTYPE html>
<html>
    <head>
        <title>VOTING</title>
        <link rel="stylesheet" type="text/css" href="resources/main.css">
        <style>form{
    background-color: skyblue;
    margin:10%;
    font-weight: bold;
    font-size: 30px;
    
} 
body {
          background-image: url('resources/background.jpg');
        }
        td{
    border:solid;
}
            </style>
    </head>
    <body>
<?php
session_start();
$pincode=$_SESSION['pincode'];
$voterid=$_SESSION['voter_id'];
include"resources/connection.php";
$a="select * from poll where voter_id='$voterid';";
$b=mysqli_query($con,$a) or die(mysqli_error($con));
$c=mysqli_num_rows($b);
// if voter already voted then showing the choosed candidate details
if($c>0){
    $d=mysqli_fetch_assoc($b);
    $candidateid=$d['candidate_id'];
    $aa="select * from candidate where candidate_id=$candidateid;";
    $bb=mysqli_query($con,$aa) or die(mysqli_error($con));
    $dd=mysqli_fetch_assoc($bb);
    echo'
    <center>
    <header>'.$_SESSION['name'].',Welcome to appartment voting portal </header>
    <div id="menu">
        <a href="home.php">HOME</a>
        <a href="voting.php">VOTE</a>
        <a href="myprofile.php">MY PROFILE</a>
        <a href="signout.php">SIGN OUT</a>
    </div>';
    echo"<div>";
    echo"You voted to ".$dd['c_name']." for ".$dd['c_designation']." on date ".$d['date']." at time ".$d['time'];
    echo"</div>";
    echo'</center>
 ';
}
else{
$query="select * from candidate where c_pincode=$pincode;";
$fetch=mysqli_query($con,$query) or die(mysqli_error($con));
$count=mysqli_num_rows($fetch);
// if voter does not voted yet then showing all available candidates
echo'
 <center>
    <header>'.$_SESSION['name'].',Welcome to appartment voting portal </header>
    <div id="menu">
        <a href="home.php">HOME</a>
        <a href="voting.php">VOTE</a>
        <a href="myprofile.php">MY PROFILE</a>
        <a href="signout.php">SIGN OUT</a>
    </div>
    <div>
    <form action="savevote.php" method="post">
    <table>';
    while($result=mysqli_fetch_assoc($fetch)){
        
        echo'<tr>
                <td>'.$result['c_name'].'</td>
                <td>'.$result['c_designation'].'</td>
                <td><input type="radio" value="'.$result['candidate_id'].'" name="cast"</td>
            </tr>';
    }
    echo'
    </table>
    <input type="submit" value="Save vote">
    <input type="reset">
    </form>
    </div>
    </center>
';
}
?>
   </body>
    </html>