<?php
include"../../resources/connection.php";
$query="select * from candidate";
$data=mysqli_query($con,$query) or die(mysqli_error($con));
//all available candidate shown
echo'<table>
<tr>
    <td>Candidate ID</td>
    <td>Full name</td>
    <td>Designation</td>
    <td>Pincode</td>
</tr>';
while($i=mysqli_fetch_array($data)){
echo'<tr>';
for($j=0;$j<4;$j++){
echo'
        <td class="candidateid">'.$i[$j].'</td>
        
';
}
echo'   <td><button value='.$i[0].' class="edit">Edit</button></td>
        <td><button value="'.$i[0].'" class="delete">Delete</button></td>
        </tr>';
}
echo'</table>';
echo'
<script>
function load(){
$.ajax({
        url : "addcandidate/listallcandidate.php",
        type : "POST",
        success : function(data){
            $("#show").html(data);
        }
     
    });
}
$(".delete").click(function(){
     var id=$(this).val();
     $.ajax({
        url : "addcandidate/delete.php",
        type : "POST",
        data : {candidateid:id},
        success : function(data){
          load();     
        }
    });
 });
 $(".edit").click(function(){
         var urlid=$(this).val();
         var ref="addcandidate/edit.php?id="+urlid;
         console.log(ref);
         $(location).attr("href", ref);
 });
</script>';
?>