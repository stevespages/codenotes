<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Position Button</title>
<link rel="stylesheet" href="../main.css">
</head>
<body>
  <div class="content">
    <nav><a href="/code-examples/">HOME</a></nav>
    <h1>Position Button</h1>
    <h2>Explanation</h2>
    <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $treename = $_POST['treename'];
        $position = $_POST['position'];
        var_dump($treename);
        var_dump($position);
      }
    ?>
    <form method="post">
    <label>Tree Name
      <input type="text" name="treename">
    </label>
    <br/>
    <button type="button" onclick="findPosition()">Position</button>
    <br/>
    <div id="div1"></div>
    <br/>
    <input type="submit" value="submit">
    </form>
    <script>
      function findPosition(){
        const successCallback = (position) => {
          console.log(position);
          var input = document.createElement("input");
          input.setAttribute("name", "position");
          input.setAttribute("type", "text");
          input.setAttribute("value", position);
          var element = document.getElementById("div1");
          element.appendChild(input);
        };
        const errorCallback = (error) => {
          console.log(error);
        };
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
      }
    </script>
    <div id="div1">
    </div>
  </div>

</body>
</html>

