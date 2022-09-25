<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Feet From the Shed</title>
<link rel="stylesheet" href="../main.css">
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <h1>Feet From the Shed</h1>
    <h2>Explanation</h2>
    <p>Here we display the position of the device with the position of the shed subtracted from it. The position of the shed was determined by standing outside the front door with my Android phone and by visiting stevespages.org.uk/code-examples/geolocation</p>
    <script>
      const successCallback = (position) => {
        console.log(position);
        var para = document.createElement("p");
        var node = document.createTextNode((position.coords.latitude-51.6798265)*364000);
        para.appendChild(node);
        var element = document.getElementById("div1");
        element.appendChild(para);
        var para = document.createElement("p");
        var node = document.createTextNode((position.coords.longitude-(-1.7711004))*288200);
        para.appendChild(node);
        var element = document.getElementById("div1");
        element.appendChild(para);
      };
      const errorCallback = (error) => {
        console.log(error);
      };
      navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    </script>
    <div id="div1">
    </div>
  </div>

</body>
</html>

