
<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" href="StyleSheet.css" type="text/css">
        <link rel="stylesheet" href="http://localhost/font-awesome-4.4.0/css/font-awesome.min.css">
       <meta charset="utf-8" />
        <title>KAR CABS</title>
    </head>
    <body>
	
        <div id="header">
		<div id="logo"><a href="home.html"><img src="uploads/KAR_logo.png" height="100px" width="100px"></a></div>
		<div id="title">KAR CABS</div>
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
 $servername="localhost";
 $username="root";
 $dbname="test";
 $password="";
 $conn=mysqli_connect($servername,$username,$password);
 if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
mysqli_select_db($conn,"test");
$u=mysqli_real_escape_string($conn,$_POST['user']);
$query="SELECT * FROM customer WHERE user='$u'";
$result=mysqli_query($conn,$query);
WHILE($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
if($_POST['user']=="")
{
	echo"Please Enter the required details...<a href='http://localhost/login.html'>Go back</a>";
	exit();
}
if($row['user']!=$_POST['user'])
{
	echo"Invalid Username.....<a href='http://localhost/login.html'>Go back</a>";
exit();
	}
if($_POST["pass"]=="")
{
	echo"Enter the required Details...<a href='http://localhost/login.html'>Go back</a>";
exit();
	}
if($row["pass"]!=$_POST["pass"])
{
	echo"Invalid Password...<a href='http://localhost/login.html'>Go back</a>";
exit();
	}
}
$query1="SELECT * FROM driverstat";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1,MYSQLI_BOTH);

$id=mysqli_real_escape_string($conn,$row1['Driver_ID']);
$user=mysqli_real_escape_string($conn,$_POST['user']);
 $source=mysqli_real_escape_string($conn,$_POST['src']);
 $destination=mysqli_real_escape_string($conn,$_POST['dest']);
 $query3="INSERT INTO booking(Driver_ID,Username,source,destination) VALUES('$id','$user','$source','$destination')";
 $result3=mysqli_query($conn,$query3);
 
$query2="SELECT * FROM booking";
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
?>
<div class="col_1">
<h1>Welcome,<?php echo"$user";?></h1><br/>
<h2>Your booking status is:</h2><?php if($row1['dstatus']=='Free')
{
	if($row1['dsource']==$row2['source'])
	{
		$_SESSION['booking']=$user;
		echo"Your booking shall be done with driver ".$row1['Driver_ID']." to ".$row2['destination']." at ".$_POST['time'];
	}
}
else
{
	echo"No drivers available ";
}

$query4="DELETE FROM driverstat WHERE 1";
$result4=mysqli_query($conn,$query4);
$query5="DELETE FROM booking WHERE 1";
$result5=mysqli_query($conn,$query5);
mysqli_close($conn);
?>
</div>
</body>
</html>