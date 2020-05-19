


<!DOCTYPE html>

<head>
    <title>wel come page </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div  class="container">
 <?php
 include 'header.html';
 ?>
<hr></hr>
 <form  action="Welcome.php"method="post" >
    <div class="form-group">
    <label for="user">Enter emeil address to view the member information.</label>
   <input type ="username" name="email" class="form-control">
   </div>
  <p><input type="submit" Name ="bottom"value="look up"class="submit btn-success"id="loginbottom"></p>
  
   
<?php
//require connection here.
require "connection.php";

if(isset($_POST['bottom'])){
 $email = mysqli_real_escape_string($conn,$_POST['email']);

  //check data in the data base.
  	$sql = "SELECT * FROM memberInfo WHERE email='$email'";
  	$results = mysqli_query( $conn, $sql);
	//check if Id exists.
  	if (mysqli_num_rows($results) > 0) {
	 echo"<strong style='color:green;'>Hello!.$email.Thanks for being a member</strong>";
	 echo"<table border='1' style='color: #1a0000;background-color:white;text-align:center;padding:'>";
	echo '<tr>'.
    '<th>MemberID</th>'.
    '<th>First Name</th>'.
	'<th>Last Name</th>'.
	 '<th>Address</th>'.
    '<th>email</th>'.
  ' </tr>';
	while( $row=$results->fetch_assoc()){
		echo "<tr><td>"
		.$row["memberID"]."</td><td>".
		$row["FirstName"]."</td><td>".
		$row["lastName"]."</td><td>".
		$row["Address"]."</td><td>".
		$row["email"]."</tr>";
	}
	echo"</thead>";
	echo "</table>";
	 
	}
	 else{
		 echo " <strong style='color:red;'>user does not exist.</strong>";
	 }

	
	}
?>
 </form>
 <div class="container">
 <form action="welcome.php" method="post">
     <p><input type="submit" Name ="member" value="View all members"class="submit btn-success"id="bottom"></p>	
 </form>
 <?php
//require "connection.php";

if(isset($_POST['member'])){
	
//display all member in the data base.
  echo "Here is a list of all members";
		$sql="SELECT *from memberInfo";
	$results= mysqli_query( $conn, $sql);
if (mysqli_num_rows($results) > 0) {
echo"<table border='1' style='color: #1a0000;background-color:#ffffff;'>";
	echo '<tr>'.
    '<th>MemberID</th>'.
    '<th>First Name</th>'.
	'<th>Last Name</th>'.
	 '<th>Address</th>'.
    '<th>email</th>'.
  ' </tr>';
	while( $row=$results->fetch_assoc()){
		echo "<tr><td>"
		.$row["memberID"]."</td><td>".
		$row["FirstName"]."</td><td>".
		$row["lastName"]."</td><td>".
		$row["Address"]."</td><td>".
		$row["email"]."</tr>";
	}
	echo"</thead>";
	echo "</table>";
}
else{
	echo"Unknown error happened";
}
	}//end file 
?>
 </div>
 <hr></hr>
   <?php
 include 'footer.html';
 ?>
 </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>







