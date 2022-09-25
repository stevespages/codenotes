<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<link rel="stylesheet" href="main.css">
<title>Query Strings</title>
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <h1>Query Strings</h1>
    <h2>
      <?php
        echo 'Hello '.htmlspecialchars($_GET["name"]);
      ?>
    </h2>
    <p>
      See the section in <em>Code Examples</em> relating to this. The code for the title above is:
    </p>
    <pre><code>
      &lt;?php
        echo 'Hello '.htmlspecialchars($_GET["name"]);
      ?>
    </code></pre>
  </div>
</body>
</html>
