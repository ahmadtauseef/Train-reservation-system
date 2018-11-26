<?php

$res = $_REQUEST['sorc'];
$des = $_REQUEST['des'];
$conn  = mysqli_connect("localhost","test","malak","railway");
$query = "SELECT t_name,t_no,t_type FROM trains WHERE t_source  = '$res' AND t_destination = '$des'";
$result  = mysqli_query($conn,$query);
$main ="<form action  = 'booktkt.php' method = 'post'>";
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
   $main .="<input type ='radio' value = "."'".$row['t_no']."'"." name ='train' align = 'center' id ='train' required>". $row['t_no']."    ".$row['t_name']." ".$row['t_type']."<br>";
}
echo $main;
?>
<td><input type="submit" name="submit" id="submit" class = "button" /></td></tr>
</form>
