<?php
session_start();
?>
<html>
    <head>
        <title>Session out</title>
        <style>
            a{
  font-size: 30px;
  color:darkblue;
  font-weight: bold;
}
div{
  font-size:30px;
  color:red;
  font-weight: bold;
  
}
            </style>
    </head>
    <body>
        <!-- logout -->
        <center>
            <?php
            session_destroy();
            ?>
           <div>You are signout successfully.</div>
           <div>Thank you!</div>
           <div>Click below to go home page.</div>
           <div><a href="index.html">Click here</a></div>
        </center> 
    </body>
</html>