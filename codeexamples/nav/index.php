<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Nav</title>
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <h1>Nav</h1>
    <p>
      Currently I am concentrating on using HTML and CSS without Javascript or any external libraries etc to implement Navigation
    </p>
    <p>
      There are challenges for ensuring navigation is possible using the keyboard alone.
    </p>
    <p>
      Positioning needs to be applied so that when the dropdown appears it does not cause other content to reposition (unless that is wanted).
    </p>
    <p>
      The dropdown list is hidden using <em>ul {display: none;}</em>. It is shown in response to an item in the container element of that <em>ul</em> being hovered or receiving <em>focus-within</em>. Mobiles and tablets don't have an equivalent of mouse hover, hence the need to use <em>focus-within</em> as well.
    </p>
    <p>
      Note that <em>focus-within</em> as opposed to <em>focus</em> is used on the container of the dropdown list because it results in the list itself receiving focus. Thus when hyperlinks are clicked in the dropped down list the focussed state is retained.
    </p>
    <p>
      Also, note that the dropdown list must be a child, not for example, a sibling of the element that the user clicks on to activate the dropdown. This is because <em>focus-within</em> will only give focus to the element itself and elements within it.
    </p>
    <p>
      The use of <em>focus-within</em> and the need for the dropdown list to be the child of the element the user gives focus to in order to activate the dropdownis demonstrated in <a href="dropdown/child.html"><em>dropdown/child.html</a></em> and <a href="dropdown/sibling.html"><em>dropdown/sibling.html</em></a>.
    <h2>Horizontal List of Dropdowns</h2>
    <p>See <a href="dotted-squirrel"><em>dotted-squirrel/</em></a></p>
    <h2>Hamburger Menu</em>
    <p>
      This is a specific example of a dropdown. A hamburger icon is used instead of a word such as <em>Menu</em> or <em>Products</em>.
    </p>
    <h2>Responsive: Hamburger to Horizontal List...</h2>
    <p>
      Using a mobile first approach to create a hamburger menu on mobile which changes to a horizontal list, members of which, can dropdown is a challenge.
    </p>
  </div>
</body>
</html>
