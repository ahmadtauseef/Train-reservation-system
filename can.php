<?php
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Login Required');</script>";
	}
$conn = mysqli_connect("localhost","test","malak","railway");
if(!$conn){
	echo "<script type='text/javascript'>alert('CONNECTION TO DATABASE FAILED');</script>";
  	die('Could not connect: '.mysqli_connect_error());
}
if (isset($_POST['submit']))
{
$can = $_POST['can'];
$sql = "SELECT train_no FROM tickets WHERE t_id = '$can';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$_SESSION['user_info'];
$query = "UPDATE tickets SET t_status = 'Cancelled' WHERE t_id = '$can';";
$tnum = $row['train_no'];
	if(mysqli_query($conn, $query))
{
	$query2 = "SELECT Balance FROM passengers WHERE email = '$email' ;";
	$result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($result2);
	$newbal = $row2['Balance'];
	$newbal = $newbal + 100;
	echo "<script type='text/javascript'>alert('$newbal');</script>";
	$query3="UPDATE passengers SET Balance= '$newbal' WHERE email='$email';";
	mysqli_query($conn, $query3);
	$message = "Ticket Cancelled successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tickets</title>
  <style>
  table, th, td {
      border: 1px solid black;
  }
  #submit	{
    margin-left: 600px;
    margin-bottom: 100;
    margin-top: 300px
  }
  #list{
    margin-left: 500px;
  }
  </style>
</head>
<body>
  <?php include "header.php"; ?>
  <br><br><br>
  <form id= "cancel" action= "can.php" method= "post">
<?php
$email = $_SESSION['user_info'];
$query = "SELECT * FROM tickets WHERE p_email = '$email'; ";
$result = mysqli_query($conn,$query);
$main = "<table id='list' align = 'center'><tr><th>Date</th><th>Train No</th><th>Status</th><th>Fare</th><th>Action</th></tr>";
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
  $main.="<tr><td>".$row['t_date']."</td>"."<td>".$row['train_no']."</td>"."<td>".$row['t_status']."</td>"."<td>".$row['t_fare']."</td>";
	if($row['t_status'] == "Confirmed"){
			$main.="<td>CAN: <input type = 'radio' value=".$row['t_id']." id = 'can' name = 'can' /></td></tr>";
}
}
echo $main;
?>
</table>
<br>
<input type="submit" name="submit" id="submit" class = "button" />
</body>
</html>
