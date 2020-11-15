<!DOCTYPE html>
<html>
<head>
    <title>Inbox</title>
<link rel="stylesheet" type="text/css" href="inbox.css">
</head>
<body>
<h1 align="center">Inbox Mails</h1>
<h3 align="center">Messages you have received will be shown here!</h3>

<?php

require_once "time.php";


$servername = "localhost";
$username = "root";
$password = "";
$database = "email_system";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Id</th><th>From</th><th>email</th><th>subject</th><th>sent</th><th>seen</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><a href='message.php'>" . $row["id"]. "</a></td><td>" . $row["sender"]. "</td><td> " . $row["email"]."</td><td>".$row["subject"]."</td><td>".$row["date"]." - ".time_passed($row["time"])."</td><td>".$row["open"] ."</td></tr>";
    }
    echo "</table>";

     if($row['open']==0){
     	$open="opened";

     } 	
     else{
     	$open="not opened";   }	

}


$conn->close();
?>


</body>
</html>