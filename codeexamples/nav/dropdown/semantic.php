<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>HTML Template</title>
<style>
  #hamburger ul {
    display: none;
  }
  #hamburger:focus-within ul {
    display: block;
  }
</style>
</head>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <div id="hamburger">
      <button>HAMBURGER</button>
      <ul>
        <li>
          INFO
          <ul>
            <li><a href="#">SHOPS</a></li>
            <li><a href="#">TRAVEL</a></li>
          </ul>
        </li>
        <li><a href="#">LINE-UP</a></li>
      </ul>
    </div>
    <h1>Semantically Better?</h1>
  </div>
</body>
</html>

