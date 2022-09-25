<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>HTML Template</title>
<style>
  .dropdown + ul {
    display: none;
  }
  .dropdown:focus-within + ul {
    display: block;
  }
</style>
</head>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <ul>
      <li class="dropdown" tabindex="-1">Menu</li>
      <ul>
        <li><a href="http://link-1.com">Link 1</a></li>
        <li><a href="http://link-2.com">Link 2</a></li>
      </ul>
    </ul>
    <h1>CSS Dropdown: Fails</h1>
    <h2>Why does this fail?</h2>
    <p>
      This should be read after looking at <em>child.html</em>.
    </p>
    <p>
      The dropdown list is not part of the focussed entity because <em>focus-within</em> only focusses elements within the element it is applied to (as well as the element itself) and in this case the dropdwon list is a sibling of the <em>li</em> element which <em>focus-within</em> is applied to. So, when the links in the dropdown list are clicked the <em>li</em> element loses focus and so the dropdown list closes before the hyperlink can be activated.
    </p>
  </div>
</body>
</html>

