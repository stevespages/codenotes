<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>HTML Template</title>
<style>
  .dropdown ul {
    display: none;
  }
  .dropdown:focus-within ul {
    display: block;
  }
</style>
</head>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <ul>
      <li class="dropdown" tabindex="-1">
        Menu
        <ul>
          <li><a href="http://link-1.com">Link 1</a></li>
          <li><a href="http://link-2.com">Link 2</a></li>
        </ul>
      </li>
    </ul>
    <h1>CSS Dropdown: Works</h1>
    <h2>Why this does work?</h2>
    <p>
      In the HTML there is a <em>ul</em> whose first <em>li</em> item contains both the content that when clicked activates the dropdown (ie. the word <em>Menu</em>) and the <em>ul</em> which is the dropdown list.
    </p>
    <p>
      The CSS selects the dropdown list when the <em>li</em> containing it is focussed. Because <em>focus-within</em> is used the focus is conferred to the dropdown list itself. So, when a link in the dropdown list is clicked it does not close the dropdown because it is part of the focussed entity and only clicking outside the focussed entity will take the focus away from it. Because the dropdown does not close the intended action of following the hyperlink to a new page is able to happen.
    </p>
    <p>
      If the CSS is unaltered but the dropdown list is placed outside the <em>li</em> which contains the clickable entity which activates the dropdown (see sibling.html) then when a link in the dropdown is clicked the <em>li</em> will lose focus and so the hyperlink will not work.
    </p>
    <p>
      If <em>focus</em> instead of <em>focus-within</em> is used then the dropdown will not be part of the focussed entity and so clicking a link in the dropdown will close the dropdown preventing the hyperlink from working.
    </p>
    <p>
      As the links are for non-existant web pages they don't work but it can be seen that the browser is trying to connect to them.
    </p>
  </div>
</body>
</html>

