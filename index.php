<HTML>
<HEAD>
<TITLE>Indian Railways</TITLE>
<style type="text/css">
@import url(style.css);
#logo	{
	border-radius: 25px;
    border: 1px solid blue;
		width: 100px;
		height: 100px;
		margin-left: 500px;
}
*	{
	color: blue;
}
#main	{
		width:1150px;
		height: 520px;
		margin: 0 auto;
		margin-top: 0px;
		color:black;
		border-radius: 10px;
  		padding-top: 25px;
    	padding-right: 25px;
    	padding-bottom: 25px;
    	padding-left: 25px;
    	background-color: rgba(0,0,255,0.3);
	}
</style>
</HEAD>
<BODY>
<?php
session_start();
include("header.php"); ?>
<div id="main"><div id="logo1">
<a href="index.php">
<IMG SRC="img/logo.png" alt="Home" id="logo" width="150" height="150"></IMG>

</A></div>
<br/>
<marquee><h1 align="center">Welcome to Indian Railways</h1><br/><br/><br/></marquee>
<h2 align="center">Have a safe journey with us</h2>



<br/><br/><br/>
<?php
if(isset($_SESSION['user_info']))
  echo '<h3 align="center"><a href="booktkt.php">Book here</a></h3>';
else
{  echo '<h3 align="center"><a href="register.php">Please register/login before booking</a></h3>';
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
echo'<h3 align="center"><a href="admin.php">Admin login</a></h3>';

}
echo "<br>";
echo "<br>";
echo "<h3 align = 'center'><a href = 'about.php'>About Us</a></h3>"
?>
</div>
</BODY>
</HTML>
