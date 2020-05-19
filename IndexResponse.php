
<?php
require "connection.php";
$error="";
if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

   $stmt = $conn->prepare("select*from memberInfo where email=? and password=?");
	$stmt->bind_param('ss',$email,$password);
	$stmt->execute();;
	if($stmt->fetch()){
		header("location:Welcome.php");
	}
		
 else{
	$error ="<p style='color:red;'>Incorrect username and/or password *</p>";
 }
}
include 'index.html';
?>
 





