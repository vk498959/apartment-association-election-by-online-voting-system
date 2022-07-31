<?php
session_start();
include"../resources/connection.php";
$query="select * from descpoll";
$fetch=mysqli_query($con,$query) or die(mysqli_error($con));

?>
<html>
    <head>
        <title>Result</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../resources/main.css">
        <style>
            #heading{
    background-color: blue;
    font-size: 30px;
    color:orange;
    }
    body {
          background-image: url('../resources/background.jpg');
        }
        </style>
    </head>
    <body>
        <center>
        <header>Admin</header>
        <div id="heading">Please select the correct option for result</div>
        <div id="menu">
        <a href="home.php">HOME</a>
        <a href="addcandidate.html">ADD CANDIDATE</a>
        <a href="result.php">RESULT</a>
        <a href="signout.php">SIGN OUT</a>
        </div>
        <div>
            <!-- form for selecting the result for pincode and designation -->
            <form action="finalresult.php" method="post">
            <table>
                <tr>
                    <td>Select the pincode</td>
                    <td>
                        <select name="pincode" id="pincode" required>
                      <?php  
                        while($data1=mysqli_fetch_assoc($fetch)){
                        echo'<option class="apincode" value="'.$data1['pincode'].'">'.$data1['pincode'].'</option>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select the Designation</td>
                    <td id="candidate">
                        
                    </td>
                </tr>
                
            </table>
            <input type="submit" value="Show Result">
            <input type="reset" value="reset">
            </form>
        </div>
        </center>
        <script>
            $(document).ready(function(){
                 $("#pincode").click(function(){
                     $(".apincode").click(function(){
                        var pincode= $(this).val() ;
                        $.ajax({
                     url : "misc.php",
                     type : "POST",
                     data : {pincode:pincode},
                     success : function(data){
                        $("#candidate").html(data);
                     }
                 });
                     });
            });
            });
        </script>
    </body>
</html>
