<?php
session_start();
// $_SESSION['logout']= 'user';
if(!isset($_SESSION['user']))
  {
      header("location:internal.php");
      die();
  }
$x = $_SESSION['user'];  
?>

<h2 style="color:white;">Hello <?php echo "$x"?> !</h2>

<!DOCTYPE html>
<html lan="en" ng-app="voiceCommands">
<head>
  <title>Home</title>
  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/card.css">
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.9/angular.min.js"></script>
   <script type="text/javascript" src="voice-commands.min.js"></script>
  <script type="text/javascript" src="voice-commands.js"></script>

<style type="text/css">
  body {
  background-color:  #eee;
}
.title {
 
    margin-bottom: 50px;
    text-transform: uppercase;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
     
}
.card {
    font-size: 1em;
    overflow: hidden;
    padding: 5;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
    margin-top:20px;
}

.carousel-indicators li {
    border-radius: 12px;
    width: 12px;
    height: 12px;
    background-color: #404040;
}
.carousel-indicators li {
    border-radius: 12px;
    width: 12px;
    height: 12px;
    background-color: #404040;
}
.carousel-indicators .active {
    background-color: white;
    max-width: 12px;
    margin: 0 3px;
    height: 12px;
}

 lex-direction: column;
}

.btn {
  margin-top: auto;
}

.button1{
   background-color: white; 
  color: black; 
  border: 2px solid white;
  margin-right: 30px;
  padding: 5px 20px;
  border-radius: 4px;
}
.button1:hover{
  background-color:#1E4AB1;
  color:white;
}
.step {
  zoom: .6;
  border-bottom: 1px solid #ccc;
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

</style>
</head>
<!-- <body style="background-image: url('p5.jpg')"> -->
  <body ng-controller="demopage" onmouseup="speakText()" style="background-image: url('p5.jpg')">
<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>


 <script type="text/javascript">
  
  function speakText(){
    responsiveVoice.speak("Say compose to compose a new message say inbox to check your messages and say sent box to check messages you have sent");
    // alert('successful');
  }

  
</script>

 <div> 
    <form action="../Login_v15/index.html">
  <button class='button1 float-right' type="submit"> 
        Sign out
          </button>
        </form>
 </div>


<div class="container py-3">
  <div class="title h1 text-center" style="color:white;">Choose Your Action!</div>
  <!-- Card Start -->
  <div class="card">
    <div class="row ">

      <div class="col-md-7 px-3">
        <div class="card-block px-6">
          <h3 class="card-title">Compose a Mail here. </h3>
          <p class="card-text">
            Write your mail with the help of our voice based system. 
          </p>
         
          <br>
          <a href="compose.php" class="mt-auto btn btn-primary">ComposeMail</a>
          <!-- compose model -->
  

        </div>
      </div>
      
      <div class="col-md-5">
        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block" src="p3.png" alt="">
            </div>
           
          </div>
        </div>
      </div>
         </div>
  </div>

</div>

<div class="container">
  <div class="card float-left">
    <div class="row ">

      <div class="col-sm-7">
        <div class="card-block">
                    <h4 class="card-title">Check your Inbox</h4>
          <p>Check your inbox here. </p>
          <!-- <p>Change around the content for awsomenes</p> -->
          <!-- <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button> -->

          <a href="inboxindex.php" class="btn btn-primary btn-sm">Inbox</a>
        </div>
      </div>

      <div class="col-sm-5">
        <img class="d-block w-100" src="p7.jpg" alt="">
      </div>
    </div>
  </div>

 
    <div class="card float-right">
      <div class="row">
        <div class="col-sm-5">
          <img class="d-block w-100" src="p3.jpg" alt="">
        </div>
        <div class="col-sm-7">
          <div class="card-block">
                      <h4 class="card-title">Sent Mails</h4>
            <p ng-if="step > 0">Check your mails that you send .</p>
            <!-- <p>Change around the content for awsomenes</p> -->
            <br>
            <a href="sent.php" class="btn btn-primary btn-sm float-right" ng-if="step > 0">SentMail</a>
          </div>
        </div>
 
      </div>
    </div>
  </div>
 
 <br>
<br ng-if="step > 0">

<script>
'use strict';
angular.module('voiceCommands', [])
.controller('demopage', function($scope, $timeout) {
  $scope.step = 0;
  $scope.results = [];
  SPEECH.addVoiceCommands([
    {
  
      command: 'compose',
      callback: function() {
              if($scope.step > 0){
             window.location.href = './compose.php';
             $scope.step++;
       } 
      }
    },
    {
    command :'inbox',
     callback: function() {
              if($scope.step > 0){
             window.location.href = './inboxindex.php';
           }
         }
       },
  {
    command :'sent box',
     callback: function() {
              if($scope.step > 0){
             window.location.href = 'sent.php';
           }
         }
       },   
       {
    command :'logout',
     callback: function() {
              if($scope.step > 0){
             window.location.href = '../Login_v15/index.html';
           }
         }
       },    

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