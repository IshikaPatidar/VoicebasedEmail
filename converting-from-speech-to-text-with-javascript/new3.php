<!DOCTYPE html>
<html>
<head>
    <title>mypage</title>
</head>
<body>

<input type="text" name="" id="txt1" onclick="myFunction();startDictation();">
<input type="text" name="" id="txt2">

<!-- <button onclick="myFunction();startDictation();">Try it</button> -->

<script>
// function myFunction() {
//   setTimeout(function(){ alert("hello");}, 4000);
// }
function myFunction() {
  setTimeout(function(){hello();}, 4000);
}


function hello(){
 document.getElementById('txt2').focus();

}


function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('txt1').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol').submit();
      };
      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>

</body>
</html>
