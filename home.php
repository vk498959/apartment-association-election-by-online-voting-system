<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="resources/main.css">
    <style>
        body {
          background-image: url('resources/background.jpg');
        }
        </style>
    </head>
    <body>
<?php
session_start();
// top bar menu
if($_SESSION['validate']){
echo'
    <center>
    <header>'.$_SESSION['name'].',Welcome to appartment voting portal </header>
    <div id="menu">
        <a href="home.php">HOME</a>
        <a href="voting.php">VOTE</a>
        <a href="myprofile.php">MY PROFILE</a>
        <a href="signout.php">SIGN OUT</a>
    </div>
    </center>

';
}
// if user failed to login
else{
    header("location:login.html");
}
?>
    </body>
    </html>