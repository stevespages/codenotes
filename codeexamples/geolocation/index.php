<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Geolocation</title>
<link rel="stylesheet" href="../main.css">
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <h1>Geolocation</h1>
    <h2>Explanation</h2>
    <script>
      const successCallback = (position) => {
        console.log(position);
        var para = document.createElement("p");
        var node = document.createTextNode(position.coords.latitude);
        para.appendChild(node);
        var element = document.getElementById("div1");
        element.appendChild(para);
        var para = document.createElement("p");
        var node = document.createTextNode(position.coords.longitude);
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
