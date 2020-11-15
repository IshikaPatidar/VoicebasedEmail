<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "email_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}




?>

<!DOCTYPE html>
<html lan="en" ng-app="voiceCommands">
<head>
  <title>ComposeMail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.9/angular.min.js"></script>
   <script type="text/javascript" src="voice-commands.min.js"></script>
  <script type="text/javascript" src="voice-commands.js"></script>

</head>
<body ng-controller="demopage" style="background-image: url('p5.jpg')" onclick ="speakText(); this.onclick=null;">
  

<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>


 <script type="text/javascript">
  
  function speakText(){
    responsiveVoice.speak("Enter Recipient's Email ");
    // alert('successful');
  }

function textspeak() {
  setTimeout(function(){speakText1();}, 8000);
}
   function speakText1(){
    responsiveVoice.speak("enter subject of your mail");
    
  }
  // --------------
  function textspeak1() {
  setTimeout(function(){speakText2();}, 8000);
}
   function speakText2(){
    responsiveVoice.speak("Enter your message here");
    
  }
</script>
<h1 ng-if="step > 0" class="step" ></h1>
<center>
  <div class="container" >
    <br>
    <div> 
    <form action="internal.php">
  <button class='btn btn-Light pull-left' type="submit"> 
        Back
          </button>
        </form>
 </div>
          <div style="background-color:  ;width: 50%">
      <h1 style="color:white">ComposeMail Box</h1>     <br>

    </div>

  
      
    
      <div style="border-style:inset; width: 50%; background-color: white; padding: 10px;">
        <form action="" method="post" id="labnol">
      <label style=" font-size: 25px;" ><b>TO</b></label>
      <br>
      <input style="width: 90%; height: 40px;"   id="l1" onclick="myFunction();startDictation();textspeak();" type="text" name="email" placeholder="Recipient Email" autofocus="autofocus">
      <br>
      <br>
      <label style=" font-size: 25px;"><b>SUBJECT</b></label>
      <br>
      <input style="width: 90%; height: 40px;" id="l2" onclick="myFunction1();startDictation1();textspeak1()" type="text" name="sub" placeholder="Subject">
      <br>
      <br>
      <label style=" font-size: 25px;">MESSAGE</label>
      <br>
      <textarea name="message" id="l3" onclick="startDictation2();" placeholder="Write Your Message here.." rows="6" cols="70"></textarea>
      <br>
      <br>

      <!-- <button style=" border-radius: 4px; font-size: 20px; padding-right:10px; padding-left: 10px"><b>Send</b></button> -->
      <input style=" border-radius: 4px; font-size: 20px; padding-right:10px; padding-left: 10px; font-weight: bold;" type="submit" name="submit" value="Send">
    </form>
    </div>
 </div> 
</center>



<!-- required -->

<?php

if(isset($_POST['submit'])){
$Email = $_POST["email"];
$Sub = $_POST["sub"];
$Message = $_POST["message"];
// $date=date("M/D/Y");
// $time= time();


  if (!$Email == '' && !$Sub == '' && !$Message == '' ) {
      
    $sql="INSERT INTO sentbox VALUES('$Email','$Sub','$Message')";
if (mysqli_query($conn,$sql)) {
  echo '<h3 style="text-align:center; color:white; margin:2% 0 0 0;">Message sent</h3>';
}else{
  echo "error:".$sql."<br>".mysqli_error($conn);
}
}
  else{
    // echo "<h1><center> All fields are required! </center></h1>";
    echo '<h3 style="text-align:center; color:white; margin:2% 0 0 0;"> All Fields are Required! </h3>';
  }
}
mysqli_close($conn);

?>

<!-- end of required -->


<script >

    function myFunction() {
  setTimeout(function(){hello();}, 8000);
}


function hello(){
 document.getElementById('l2').focus();

}
// ----------
    function myFunction1() {
  setTimeout(function(){hello1();}, 8000);
}


function hello1(){
 document.getElementById('l3').focus();

}


  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('l1').value = e.results[0][0].transcript.replace(/ /g,'');
        recognition.stop();

       
      };
      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }


  function startDictation1() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('l2').value = e.results[0][0].transcript;
        recognition.stop();

        
      };
      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }

  function startDictation2() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('l3').value = e.results[0][0].transcript;
        recognition.stop();

        document.getElementById('labnol').submit();
      };
      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>

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

