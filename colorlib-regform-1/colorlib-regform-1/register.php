<?php
require "config.php";

$Fname = $_POST["fname"];
$Lname = $_POST["lname"];
$DOB = $_POST["dob"];
$Email = $_POST["email"];
$password = $_POST["password"];
$gender=$_POST["gender"];

$sql = "SELECT * FROM login where email='$Email' ";

$result = $conn->query($sql);

if (!$result->num_rows>0) 
{
    
	$sql = "insert into login(Fname,Lname,DOB,Email,password,gender)values('$Fname','$Lname','$DOB','$Email','$password','$gender') ";
    if ($conn->query($sql) === TRUE) 
	{
		echo "Registred successfully!!";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else {
 echo "<center><b>User already Exist. Try again with new Email.<b></center>";
}


$conn->close();
?>


<!DOCTYPE html>
<html lan="en" ng-app="voiceCommands">
<head>
	  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.9/angular.min.js"></script>
   <script type="text/javascript" src="voice-commands.min.js"></script>
  <script type="text/javascript" src="voice-commands.js"></script>
</head>
<body ng-controller="demopage" onclick ="speakText(); this.onclick=null;">

<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>


 <script type="text/javascript">
  
  function speakText(){
    responsiveVoice.speak("say login for login ");
    // alert('successful');
  }
 
  
</script>
<h1 ng-if="step > 0" class="step" ></h1>

<h2 align="center"> Click to the below link for Login</h2>
<h2 align="center"><a href="../../Login_v15/Login_v15/index.html">LoginPage</a></h2>


<script>
'use strict';
angular.module('voiceCommands', [])
.controller('demopage', function($scope, $timeout) {
  $scope.step = 0;
  $scope.results = [];
  SPEECH.addVoiceCommands([
   
    {
    command :'login',
     callback: function() {
              if($scope.step > 0){
             window.location.href = '../../Login_v15/Login_v15/index.html';
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