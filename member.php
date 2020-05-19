
<!DOCTYPE html>

<head>
    <title>header </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<p><?php include 'header.html'?></p>
<?php
require "connection.php";

if(isset($_POST['bottom'])){
	
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
<p><?php include 'footer.html'?></p>
</div>

</body>
</html>	