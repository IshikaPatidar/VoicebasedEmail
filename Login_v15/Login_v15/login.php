<?php
require "config.php";

$t1 = $_POST["name"];
$t2 = $_POST["password"];

$sql = "SELECT * FROM login where Email='$t1' ";

$result = $conn->query($sql);

if ($result->num_rows>0) 
{
    
    while($row = $result->fetch_assoc()) 
	{
        if ($row["password"]==$t2) 
			{
				 session_start();
				 $_SESSION['user'] = $row["Fname"];
				 header("location:../internal/internal.php ");
			// echo "hello user!!";

			} 
		else
			{
				echo "Password is Incorrect";
			} 	
    }
} 

else 
{
   echo "Incorrect Email! <br> Please Enter valid Email.";
}
$conn->close();

?> 