<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Watch Shed</title>
<link rel="stylesheet" href="../main.css">
</head>
<body>
  <div class="content">
    <nav><a href="/code-examples/">HOME</a></nav>
    <h1>Watch Shed</h1>
    <h2>Explanation</h2>
    <script>
      var id, options, x, y, dist;
      function success(position) {
        var para = document.createElement("p");
        x = (position.coords.latitude-51.6615515)*364000;
        // var node = document.createTextNode(x);
        // para.appendChild(node);
        // var element = document.getElementById("div1");
        // element.appendChild(para);
        // var para = document.createElement("p");
        y = (position.coords.longitude-(-1.7472491))*288200;
        // var node = document.createTextNode(y);
        // para.appendChild(node);
        // var element = document.getElementById("div1");
        // element.appendChild(para);
        var para = document.createElement("p");
        dist = Math.sqrt(x*x + y*y);
        var node = document.createTextNode(dist);
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

