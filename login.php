<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","test","malak","railway");
if(!$conn){
	echo "<script type='text/javascript'>alert('CONNECTION TO DATABASE  FAILED');</script>";
  	die('PLEASE TRY AGAIN CONNECTION FAILED: '.mysqli_connect_error());
}
$email=$_POST['email'];
$pswrd=$_POST['pswrd'];
$sql = "SELECT * FROM passengers WHERE email = '$email' AND password = '$pswrd';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['email'];
			$message='LOGGING IN SUCCESSFUL';
		}
		else{
			$message = 'PLEASE ENTER CORRECT CREDENTIALS.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("email");
		var atloc = EmailId.value.indexOf("@");
    	var periodPos = EmailId.value.lastIndexOf(".");
		var pswrd=document.getElementById("pswrd");
		if (atloc<1 || periodPos<atloc+2 || periodPos+2>=EmailId.value.length)
		{
        	alert("Enter valid email-ID");
			EmailId.focus();
        	return false;
   		}
   		if(pswrd.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pswrd.focus();
			return false;
		}
		return true;
	}
</script>
<style type="text/css">
	#loginarea{
		background-color: white;
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px solid blue;
		margin-top: 100px;
		background-color: rgba(0,0,0,0.2);
	    padding: 40px;
	    font-family:sans-serif;
		font-size: 12px;
		color: black;
	}
	/*html {
		background: url(img/bg4.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}*/
	#submit	{
		border-radius: 5px;
		border: 2px solid blue;
		background-color: rgba(0,0,0,0);
		padding: 7px 7px 7px 7px;
		box-shadow: inset -1px -1px rgba(0,0,0,0.5);
		font-family:"Comic Sans MS", cursive, sans-serif;
		font-size: 18px;
		margin:auto;
		margin-top: 20px;
  		display:block;
  		color: black;
	}
	#logintext	{
		text-align: center;
	}
	.data	{
		color: black;
	}
</style>
<body>
	<?php include("header.php") ?>
	<div id="loginarea">
	<form id="login" action="login.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext">Login to Indian Railways!</div><br/><br/>
	<table>
		<tr><td><div class="data">Enter E-Mail ID:</div></td><td><input type="text" id="email" size="30" maxlength="30" name="email"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Enter Password:</div></td><td><input type="password" id="pswrd" size="30" maxlength="30" name="pswrd"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">
	</form></div>
</body>
</html>
