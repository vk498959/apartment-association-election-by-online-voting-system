<!DOCTYPE html>
<html>
    <head>
        <title>VOTING</title>
        <link rel="stylesheet" type="text/css" href="resources/main.css">
        <style>
                    body {
          background-image: url('resources/background.jpg');
        }
            </style>
    </head>
    <body>
<?php
// for saving the vote from voter
session_start();
$voterid=$_SESSION['voter_id'];
$cast=$_POST['cast'];
include"resources/connection.php";
$store="INSERT INTO `poll` (`candidate_id`, `voter_id`, `date`, `time`) VALUES ('$cast', '$voterid', curdate(), curtime());";
$confirm=mysqli_query($con,$store) or die(mysqli_error($con));
if($confirm){
    header("location:voting.php");
   }
else{
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
    echo"Something went wrong. While saving your vote please try again!";
    echo"<div>";
    echo'</center>

    ';
}
?>
    </body>
    </html>