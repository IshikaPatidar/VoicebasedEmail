<!DOCTYPE html>
<html>
<head></head>
<body>


 <?php
 
	if(isset($_GET['msg'])){

		$id = $_GET['msg'];
	
		$msg = mysqli_query("SELECT * FROM messages WHERE id = '$id'",$conn);
		$row = mysqli_fetch_assoc($msg);
		$from = $row['from'];
			$email = $row['email'];
			$date = $row['date'];
			$time = time_passed($row['time']);
			$message = $row['message'];
		}
		?>

<div id="msg">

<a href="./">← Back to Inbox</a>

<table>
	<tr>
		<td>From : <strong><?php echo $from; ?></strong></td>
		<td>Email : <strong><?php echo $email; ?></strong></td>
		<td>Date : <strong><?php echo $date; ?></strong></td>
		<td>Time : <strong><?php echo $time; ?></strong></td>
	</tr>
</table>

<pre><?php echo $message; ?></pre>

<a class="remove btn danger" href="?remove=<?php echo $id; ?>">Delete this message</a>
			

</div>


</body>
</html>