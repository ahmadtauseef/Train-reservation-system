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
$train=$_POST['train'];

$sql = "SELECT t_no FROM trains WHERE t_no = '$train'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$dat= $_POST['dat'];
$email=$_SESSION['user_info'];
$query="UPDATE passengers SET t_no='$row[t_no]' WHERE email='$email';";
$tnum = $row['t_no'];
	if(mysqli_query($conn, $query))
{

	$query2="SELECT * FROM passengers  WHERE  email='$email';";
	$result2=mysqli_query($conn,$query2);
	$row =  mysqli_fetch_array($result2,MYSQLI_ASSOC);
	$newbal = $row['Balance'];
	echo "<script type='text/javascript'>alert('Pay Rs 100');</script>";
	$newbal = $newbal - 100;
	$query3="UPDATE passengers SET Balance= '$newbal' WHERE email='$email';";
	$result3=mysqli_query($conn,$query3);
	echo "<script type='text/javascript'>alert('$dat');</script>";
	$query4 = "INSERT INTO tickets(t_status,t_fare,p_email,train_no,t_date) values('Confirmed','100','$email','$tnum','$dat');";
	mysqli_query($conn,$query4);

	$message = "Ticket Booked successfully";
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
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" >
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 70%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;

		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
	<script type="text/javascript">
	function gettrains(source,destination) {
    if (source.length == 0 || destination.length == 0 ) {
				alert('Please Enter Valid Stations');
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "temp.php?sorc=" + source+"&des="+destination, true);
        xmlhttp.send();
    }
}
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;
			}
		}

	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Plan your Journey</h1><br/><br/>
	<form method="post" name="journeyform" onsubmit="return validate()">
		<table>
			<tr><td><div class="data">From Station:</div></td><td><input type="text" id="From" size="30" maxlength="30" name="Desitination"/></td><td></td><div class= "data">Date:</div></td>
			<td><input type="date" id="dat" name="dat" /></td><br></tr>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			<tr><td><div class="data">Destinaion:</div></td><td><input type="text" id="To" size="30" maxlength="30" name="From Station"/></td></tr>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			<tr><td><button type = "button" id = "submit" onclick = "gettrains(document.getElementById('From').value,document.getElementById('To').value)"> gettrains</button></td>
		</table>
			<p>Train List:&nbsp;&nbsp;&nbsp;&nbsp; <span id="txtHint"></span></p>
	</form>
	</div>
	</body>
	</html>
