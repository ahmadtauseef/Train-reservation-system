<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:24px;
	}
	#dropdown{
		color: white;
		text-decoration: none;
		display: block;
		font-size: 18px;
		font-style: italic;
	}
</style>
<script src="jquery.js"></script>
        <script>
          /*  $(document).ready(function(){
              $("#Logout").hide();
            };*/
        /*    $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });*/
        </script>
</head>
<body link="white" alink="white" vlink="white">
     <div class="container dark">
        <div class="wrapper">
          <div class="Menu">
            <ul id="navmenu">
            <li><A HREF="index.php">Home</A></li>
            <li><a href="booktkt.php">Book a ticket</a></li>
            <li><?php
				if(isset($_SESSION['user_info'])){
					?>
					<a href = "logout.php">Logout</a>
					<?php
				}
				else
					echo '<A HREF="register.php">Login/Register</A>';
				?>
			</li>
			<li><?php
				if(isset($_SESSION['user_info'])){
					?>
					<a href = "can.php">Previous&nbsp;Bookings</a>
					<?php
				}
				?>
			</li>
            </ul>
          </div>
        </div>
      </div>
</body>
</html>
