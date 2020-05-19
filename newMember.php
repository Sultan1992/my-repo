

<?php
// initialize the variable for error handle
$data_error='';
$email_error='';
// REGISTER USER

require 'connection.php';
if (isset($_POST['Sign'])) {
	if(empty($_POST['id'])||empty($_POST['fname'])||empty($_POST['lname'])||empty($_POST['address'])||empty($_POST['email'])){
		$data_error="Please fill all required field";
		include 'newMember.html';
		exit;
	}
$email = mysqli_real_escape_string($conn, $_POST['email']);
	$email_array=explode("@",$email);
if($email_array[1]!="gmail.com"){
	$email_error ="<p style='color:red;'>Email must be a valid format</p>";
	include 'newMember.html';
	exit;
}
  // receive all input values from the form and create short variable.
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);




//insert data to the table
$quary="insert into memberInfo (memberID,FirstName,lastName,Address,email,password)Values(?,?,?,?,?,?)";
$stmt=$conn->prepare($quary);
$stmt->bind_param('ssssss',$id,$fname,$lname,$address,$email,$password);
$stmt->execute();
if($stmt->affected_rows>0){
	echo"<style='color:green;'>Congratulation!. You are successfully become a member of the club</p>";
}else{
	echo"<p style='color:red;'>Unknown error occurred</p>";
}
	
}

//include 'newMember.html';
 ?>