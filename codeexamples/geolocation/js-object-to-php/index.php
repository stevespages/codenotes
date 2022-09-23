<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      echo '<p>'.$_POST['position'].'</p>';
      console.log("GeolocationPosition");
    }
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HTML Template</title>
</head>
<body>
<form method='post'>
  <div id='div1'>
  </div>
  <script>
      const success = (position) => {
        var input = document.createElement("input");
        input.setAttribute("name", "position");
        input.setAttribute("type", "text");
        input.setAttribute("value", position);
        var element = document.getElementById("div1");
        element.appendChild(input);
      }
      var id = navigator.geolocation.getCurrentPosition(success);
    </script>
  <input type='submit' value='submit'>
</body>
</html>
