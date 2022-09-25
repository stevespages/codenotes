<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Tree List</title>
<link rel="stylesheet" href="../main.css">
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <h1>Tree List</h1>
    <h2>Explanation</h2>
    <script>
      var id, options, x, y, dist, listItem;
      var treeArray = [
        ["copper beech", 51.6608577, -1.7470349, 2],
        ["plane", 51.6612221, -1.7470246, 5],
        ["nut tree", 51.6608739, -1.7457832, 0]
      ]
      function success(position) {
        var div1 = document.getElementById("div1");
        div1.remove();
        var div1 = document.createElement("div");
        div1.setAttribute("id", "div1");
        var div0 = document.getElementById("div0");
        div0.appendChild(div1);
        var i;
        for(i=0; i<treeArray.length; i++){
          x = (position.coords.latitude-treeArray[i][1])*364000;
          y = (position.coords.longitude-treeArray[i][2])*288200;
          dist = Math.sqrt(x*x + y*y);
          treeArray[i][3] = Math.round(dist);
        }
        treeArray.sort(function(a, b){
          return a[3] - b[3];
        })
        var j;
        for(j=0; j<treeArray.length; j++){
          listItem = treeArray[j][0];
          listItem += ", ";
          listItem += treeArray[j][3];
          listItem += " feet"
          var para = document.createElement("p");
          var node = document.createTextNode(listItem);
          para.appendChild(node);
          var element = document.getElementById("div1");
          element.appendChild(para);
          var para = document.createElement("p");
        }
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
    <div id="div0">
      <div id="div1">
      </div>
    </div>
  </div>

</body>
</html>


