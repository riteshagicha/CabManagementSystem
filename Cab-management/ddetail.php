<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" href="StyleSheet.css" type="text/css">
        <link rel="stylesheet" href="http://localhost/font-awesome-4.4.0/css/font-awesome.min.css">
       <meta charset="utf-8" />
        <title>KWICK KAR</title>
    </head>
    <body>
	<div style="float:right;color:white"><h4><a href="http://localhost/login.html">Login</a>&nbsp;|<a href="http://localhost/register_form.html">New User</a>&nbsp;</h4></div>
    <div id="header" style="clear:both">
		<div id="logo"><a href="home.html"><img src="uploads/KAR_logo.png" height="100px" width="100px"></a></div>
		<div id="title">KWICK KAR</div>
		<div id="slogan">Hop in. Let's go!</div>
		<div id="nav">
		<div id="drop">
		<ul>
		<a href="feedback.html"><li><span class="fa fa-users"></span>&nbsp;Feedback</li></a>
	    <a href="ratecard.html"><li><span class="fa fa-taxi"></span>&nbsp;Rate Card</a>
		
		</li>
		<a href="#"><li><span class="fa fa-question"></span>&nbsp;About Us
		<ul>
		<a href="#"><li><span class="fa fa-phone"></span>&nbsp;Contact Us</li></a>
		<a href="#"><li><span class="fa fa-question"></span>&nbsp;Who Are We</li></a>
		</ul>
		</li></a>
		<a href="home.html"><li><span class="fa fa-home"></span>Home</li></a>

		</ul>
		</div>
		</div>
		</div>
<?php
session_start();
$servername="localhost";
$username="root";
$dbname="test";
$password="";
$_SESSION['booking']="";
$conn=mysqli_connect($servername,$username,$password);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
mysqli_select_db($conn,"test");
$id=mysqli_real_escape_string($conn,$_POST['login']);
$query="SELECT * FROM driver WHERE Driver_ID='$id'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{

if($_POST['login']=="")
{
	echo"Please Enter the required details...<a href='http://localhost/login.html'>Go back</a>";
	exit();
}
if($row['Driver_ID']!=$_POST['login'])
{
	echo"Invalid Driver Id.....<a href='http://localhost/login.html'>Go back</a>";
    exit();
	}
if($_POST['driverpass']=="")
{
	echo"Enter the required Details...<a href='http://localhost/login.html'>Go back</a>";
exit();
	}
if($row['Password']!=$_POST['driverpass'])
{
	echo"Invalid Password...<a href='http://localhost/login.html'>Go back</a>";
exit();
	}
}
$dsource=mysqli_real_escape_string($conn,$_POST['loc']);
$dstatus=mysqli_real_escape_string($conn,$_POST['status']);
$id=mysqli_real_escape_string($conn,$_POST['login']);
$query="INSERT INTO driverstat(Driver_ID,dsource,dstatus) VALUES('$id','$dsource','$dstatus')";
$exec=mysqli_query($conn,$query);
$sql="SELECT * FROM driverstat";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
$query1="UPDATE driver SET Status='$dstatus' WHERE Driver_ID='$id'";
$exec1=mysqli_query($conn,$query1);
?>
<div class="col_1">
<?php
if($row['dstatus']=='Free')
{
  echo"You shall get a customer...";
  $s=mysqli_real_escape_string($conn,$_POST['loc']);

if($_SESSION['booking']!="")
{
	echo"<br/>Your customer is ".$_SESSION['booking'];
}
}

mysqli_close($conn);
?>
</div>
</body>
</html>