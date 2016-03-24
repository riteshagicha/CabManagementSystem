<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

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
$name = mysqli_real_escape_string($conn, $_POST['name']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$email_address = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['mob_no']);

$city = mysqli_real_escape_string($conn, $_POST['city']);
$query="SELECT * FROM customer";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	if($row['user']==$user)
	{
		echo"User already exists please choose another username...<a href='http://localhost/register_form.html'>Go back</a>";
		exit();
	}
	if($row['email_address']==$email_address)
	{
		echo "Email ID already exists please choose another...<a href='http://localhost/register_form.html'>Go back</a>";
	    exit();
	}
	if($row['number']==$number)
	{
		echo"Mobile number already registered...<a href='http://loclhost/register_form.html'>Go back</a>";
		exit();
	}
}
$sql = "INSERT INTO Customer (name, user, pass, email_address, number, city)VALUES ('$name', '$user', '$pass', '$email_address', '$number', '$city')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!...<a href='http://localhost/login.html'>Login</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
