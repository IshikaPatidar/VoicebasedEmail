<?php 
require "config.php";
// require_once "time.php";
?>

<!DOCTYPE html>
<html lan="en" ng-app="voiceCommands">
<head>
	<title>SentBox</title>
	
    <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="inbox.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.9/angular.min.js"></script>
   <script type="text/javascript" src="voice-commands.min.js"></script>
  <script type="text/javascript" src="voice-commands.js"></script>
</head>
<body ng-controller="demopage">
     <h1 ng-if="step > 0" class="step" ></h1> 
    <div class="container">
<br>
<div> 
    <form action="internal.php">
  <button class='btn btn-dark pull-left' type="submit"> 
        Back
          </button>
        </form>
 </div>
<h1 align="center">SentBox Mails</h1>
<h4 align="center">Messages you have sent will be shown here!</h4>

 </div>
<?php 


$sql = "SELECT * FROM sentbox ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '<table><tr><th style="color:white; text-align:center;">To</th><th style="color:white; text-align:center;">Subject</th><th style="color:white; text-align:center;">Message</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["email"]. "</td><td> " . $row["sub"]."</td><td>".$row["message"]."</td></tr>";
    }
    echo "</table>";

     	

}

?>
<script>
'use strict';
angular.module('voiceCommands', [])
.controller('demopage', function($scope, $timeout) {
  $scope.step = 0;
  $scope.results = [];
  SPEECH.addVoiceCommands([
   
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