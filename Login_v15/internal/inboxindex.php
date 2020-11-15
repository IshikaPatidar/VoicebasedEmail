<!DOCTYPE html>
<html lan="en" ng-app="voiceCommands">
<head> 
    <title>Inbox</title>

    <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="inbox.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.9/angular.min.js"></script>
   <script type="text/javascript" src="voice-commands.min.js"></script>
  <script type="text/javascript" src="voice-commands.js"></script>
   <style>
  h2{
 text-align: center;
  } 
.step {
  zoom: .6;
  opacity: .5;
}
.step:first-child {
  zoom: 1;
  opacity: 1;
}
.step:last-child {
  border-bottom: none;
}
  </style>
</head>
<body ng-controller="demopage" onmouseup="speakText()">
    <div class="step" ng-if="step > 0"></div>
    <div class="container">
        <br>
        <div> 
    <form action="internal.php">
  <button class='btn btn-dark pull-left' type="submit"> 
        Back
          </button>
        </form>
 </div>
     <h1 ng-if="step > 0" class="step" ></h1>   
<h1 align="center">Inbox Mails</h1>

<h4 align="center">See all your messages here!!</h4>

 </div>

<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>

<script type="text/javascript">
  
  function speakText(){
    responsiveVoice.speak("you have a new message. Say show message to see the full message");
    // alert('successful');
  }
</script>


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
    echo '<table><tr><th style="color:white">Id</th><th style="color:white">From</th><th style="color:white">Email</th><th style="color:white">Subject</th><th style="color:white">Sent</th><th style="color:white">Seen</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "<tr><td><a href='message.php'>" . $row["id"]. "</a></td><td>" . $row["sender"]. "</td><td> " . $row["email"]."</td><td>".$row["subject"]."</td><td>".$row["date"]." - ".time_passed($row["time"])."</td><td>".$row["open"] ."</td></tr>";
      echo "<tr><td>" . $row["id"]. "</td><td>" . $row["sender"]. "</td><td> " . $row["email"]."</td><td><a href='msg.html'>".$row["subject"]."</a></td><td>".$row["date"]."</td><td>".$row["open"] ."</td></tr>";
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

<script>
'use strict';
angular.module('voiceCommands', [])
.controller('demopage', function($scope, $timeout) {
  $scope.step = 0;
  $scope.results = [];
  SPEECH.addVoiceCommands([
     {
  
      command: 'show message',
      callback: function() {
              if($scope.step > 0){
             window.location.href = 'msg.html';
           
       } 
      }
    },
   
    {
    command :'back',
     callback: function() {
              if($scope.step > 0){
             window.location.href = './internal.php';
           }
         }
       }

  ]);
  SPEECH.onStart(function() {
    $timeout(function() {
      $scope.step = 1;
    });
  });
  SPEECH.onResult(function(result) {
    $timeout(function() {
      if ($scope.step === 1) {
        $scope.name = result.transcript;
        $scope.step = 2;
      }
      $scope.results.push(result);
    });
  });
  SPEECH.start({
    min_confidence: .2
  });
});

</script>

</body>
</html>
