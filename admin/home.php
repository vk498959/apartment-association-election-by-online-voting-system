<?php
//session is active with correct credentials
session_start();
if($_SESSION['validate']){
echo'
    <html>
    <head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="../resources/main.css">
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
    </center>
    </body>
    </html>
';
}
//redirecting to, if any intrusion or wrong credentials
else{
    header("location:index.html");
}


?>