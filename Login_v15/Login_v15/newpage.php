<?php
session_start();
if(!isset($_SESSION['user']))
  {
      header("location:index.html");
      die();
  }
$x = $_SESSION['user'];
?>


<h2>Hello <?php echo "$x"?> !</h2>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  		
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<center>
<section>

	<div class="container">
  <h1 class=" text-capitalize font-weight-bold text-center pt-5 "> Choose your action!!</h1>
  <hr class="w-25 mx-auto">
  <div class="row pt-2">

<div class="col-lg-6 col-lg-6 col-sm-12">
    <div class="card">
      <!-- <img class="card-img-top" src="images/foodf.png" alt="Card image"> -->
        <div class="card-body">
          <h4 class="card-title">COMPOSE MAIL</h4>
          <p class="card-text">Write you Emails here...</p>
          <a href="#" class="btn btn-light">Click here</a>
        </div>
    </div>
   </div>
<br>
<br>
   <div class="col-lg-6 col-lg-6 col-sm-12">
    <div class="card">
      <!-- <img class="card-img-top" src="images/foodf.png" alt="Card image"> -->
        <div class="card-body">
          <h4 class="card-title">INBOX</h4>
          <p class="card-text">Check your Emails here...</p>
          <a href="#" class="btn btn-light">click here</a>
        </div>
    </div>
   </div>

</div>
</div>
</section>
</center> 
</body>
</html>

