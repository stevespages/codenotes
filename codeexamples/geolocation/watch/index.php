<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Watch</title>
<link rel="stylesheet" href="../main.css">
</head>
<body>
  <div class="content">
    <nav><a href="/code-examples/">HOME</a></nav>
    <h1>Watch</h1>
    <h2>Explanation</h2>
    <script>
      var id, target, options;
      function success(position) {
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
      }
      function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
      }
      options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      };
      id = navigator.geolocation.watchPosition(success, error, options);
    </script>
    <div id="div1">
    </div>
  </div>

</body>
</html>

