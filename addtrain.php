<?php
session_start();
if(empty($_SESSION['user_info'])){
	echo "<script type='text/javascript'>alert('Login Required');</script>";

}
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Login Required');</script>";
	}
$conn = mysqli_connect("localhost","test","malak","railway");
if(!$conn){
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());
}
if (isset($_POST['addtrain']))
{
$tno=$_POST['t_no'];
$tname=$_POST['t_name'];
$dur=$_POST['dur'];
$des=$_POST['dest'];
$src=$_POST['source'];
$seats=$_POST['nseats'];
$status=$_POST['st'];
$type=$_POST['type'];
$sql = "INSERT INTO trains VALUES ( $tno, '$tname', '$src', '$des', '$type', '$status', $seats, $dur)";
	if(mysqli_query($conn, $sql))
{
	$message = "Train Has Been Successfully Added";
}
else
{
	$message = "Could not Insert Record Please Try Again";
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<HTML>
<HEAD>
<TITLE>Add Trains</TITLE>
<LINK REL="STYLESHEET" >
<style type="text/css">
*	{
	color: #222;
}
#register_form	{
	background-color: white;
	width: 40%;
	margin: auto;
	border-radius: 25px;
	border: 2px solid blue;
	margin-top: 25px;
}
#nav	{
	color: white;
}
#logintext	{
	margin-top: 10px;
}
#login	{
	margin-top: 10px;
	margin-bottom: 20px;
}
</style>
<SCRIPT src="validation.js"></SCRIPT>
</HEAD>
<BODY  background="img/wallpaper1.jpg" link="white" alink="white" vlink="white" width="1024" height="768">
<?php include("header.php") ?>
<div id="register_form" align="center" height="200" width="200">
<FORM name="addtrain" method="post" action="addtrain.php" >
<TABLE border="0">
<CAPTION><FONT size="6" color="WHITE"><br/>Enter Train details:</FONT></CAPTION>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="3" color="WHITE">Train Number:</FONT></TD>
<TD><INPUT name="t_no" type="TEXT" placeholder="Enter Train Number" size="30" maxlength="6" align="center" id="tno"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="3" color="WHITE">Train Name:</FONT></TD>
<TD><INPUT type="TEXT" name="t_name" align="center" size="30" maxlength="30" placeholder="Enter Train Name" id="t_name"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="3" color="WHITE">Duration:</FONT></TD>
<TD><INPUT type="TEXT" name="dur" align="center" size="30" maxlength="3" placeholder="Enter Journey Duration" id="dur"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="3" color="WHITE">Source:</FONT></TD>
<TD><INPUT type="TEXT" name="source" size="30" maxlength="6" placeholder="Enter Source Station" id="source"></TD>
</TR><tr></tr><tr></tr>
<TD><FONT size="3" color="WHITE">Destination:</FONT></TD>
<TD><INPUT type="TEXT" name="dest" size="30" maxlength="6" placeholder="Enter Destination " id="dest"></TD>
</TR><tr></tr><tr></tr>
<TD><FONT size="3" color="WHITE">Number Of Seats:</FONT></TD>
<TD><INPUT type="TEXT" name="nseats" size="30" maxlength="4" placeholder="Enter Total Number Of Seats" id="nseats"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
  <TD><FONT size="3" color="WHITE">Type:</FONT></TD>
  <TD><INPUT type="TEXT" name="type" size="30" maxlength="30" placeholder="Enter Train Type" id="type"></TD>
  </TR><tr></tr><tr></tr>
  <TR class="left">

<TD><FONT size="3" color="WHITE">Status:</FONT></TD>
<TD><INPUT name= "st" type="TEXT" id="st" placeholder="Enter Status" size="30" maxlength="30"></TD>
</TR><tr></tr><tr></tr>
</TR><tr></tr><tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
</TABLE>
<P><INPUT TYPE="Submit" value="addtrain" name="addtrain" id="addtrain" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM><br/>
<HR width="450" style="border-color: blue;display: block;" noshade>
</div>
</BODY>
</HTML>
