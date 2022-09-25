<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Dotted Squirrel</title>
<style>
  .simple {
    border: 1px solid black;
  }
  .simple ul {
    padding: 0;
    background: #0d47a1;
  }
  .simple li {
    display: inline-block;
  }
  .simple a {
    text-decoration: none;
    color: white;
    padding: 10px;
    display: block;
    transition: 0.2s all linear;
  }
  .simple a:hover {
    background: #e3f2fd;
    color: black;
    transition: 0.2s all linear;
  }
  .dropdown ul {
    display: flex;
    align-items: center;
    justify-content: space-around;
    position: relative;
  }
  .dropdown li > ul {
    position: absolute;
    background: #1565c0;
  }
  .dropdown li > ul li {
   display: block; 
  }
  .dropdown li > ul {
    display: none;
  }
  ul li:focus-within > ul,
  .dropdown li:hover > ul {
    display: block;
    transition: 0.2s all linear;
  }
  .multi li {
    position: relative;
  }
  .multi ul ul ul {
    background: green;
    position: absolute;
    left: 100%;
    top: 0;
  }
/* *****End of CSS for finished example **************************************/
/*******Start of CSS for #simple-2 *******************************************/
  #simple-2 ul {
    padding: 0;
  }
  #simple-2 a {
    text-decoration: none;
    padding: 10px;
  }
  #simple-2 li {
    display: inline-block;
  }
/*******Start of CSS for #simple-3 *******************************************/
  #simple-3 ul {
    padding: 0;
    position: relative;
  }
  #simple-3 a {
    text-decoration: none;
    padding: 10px;
  }
  #simple-3 li {
    display: inline-block;
  }
  #simple-3 li > ul {
    position: absolute;
  }
/*******Start of CSS for #simple-4 *******************************************/
  #simple-4 ul {
    padding: 0;
    position: relative;
  }
  #simple-4 a {
    text-decoration: none;
    padding: 10px;
  }
  #simple-4 li {
    display: inline-block;
  }
  #simple-4 li > ul {
    position: absolute;
  }
  #simple-4 li > ul li {
    display: block;
  }
/*******Start of CSS for #simple-5 *******************************************/
  #simple-5 ul {
    padding: 0;
    position: relative;
  }
  #simple-5 a {
    text-decoration: none;
    padding: 10px;
  }
  #simple-5 li {
    display: inline-block;
  }
  #simple-5 li > ul {
    position: absolute;
    display: none;
  }
  #simple-5 li:hover > ul {
    display: block;
  }
  #simple-5 li > ul li {
    display: block;
  }
/*******Start of CSS for #simple-6 *******************************************/
  #simple-6 ul {
    padding: 0;
    position: relative;
  }
  #simple-6 a {
    text-decoration: none;
    padding: 10px;
  }
  #simple-6 li {
    display: inline-block;
  }
  #simple-6 li > ul {
    position: absolute;
    background-color: lightblue;
    display: none;
  }
  #simple-6 li:hover > ul {
    display: block;
  }
  #simple-6 li > ul li {
    display: block;
  }
/*******Start of CSS for #simple-7 *******************************************/
  #simple-7 ul {
    padding: 0;
/*    position: relative;  */
  }
  #simple-7 a {
    text-decoration: none;
    padding: 10px;
  }
  #simple-7 li {
    display: inline-block;
    position: relative;
  }
  #simple-7 li > ul {
    position: absolute;
    background-color: lightblue;
    display: none;
  }
  #simple-7 ul ul ul {
    background: lightgreen;
    position: absolute;
    left: 100%;
    top: 0;
  }
  #simple-7 li:hover > ul {
    display: block;
  }
  #simple-7 li > ul li {
    display: block;
  }
</style>
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <div class="simple dropdown multi">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li><a href="#">Sub Item xxx</a></li>
            <li>
              <a href="#">Sub Item</a>
              <ul>
                <li><a href="#">Sub Sub Item</a></li>
                <li>
                  <a href="#">Sub Sub Item</a>
                  <ul>
                  <a href="#">S...... Item</a>
                  <a href="#">S...... Item</a>
                  <a href="#">S...... Item</a>
                  <a href="#">S...... Item</a>
                  </ul>
                </li>
                <li><a href="#">Sub Sub Item</a></li>
              </ul>
            </li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>

    <h1>Drop Downs from Dotted Squirrel</h1>
    <p>
      This was implemented by following the tutorial at https://dottedsquirrel.com/css/pure-css-dropdown-navigation/
    </p>
    <p>
      Item 1 on the finished navigation bar (above) is a dropdown with dropdowns within it.
    </p>
    <h2>Explanation</h2>
    <p>
      This should be read in conjunction with the source code for this page (<em>.../nav/dotted-squirrel/index.html</em>).
    </p>
    <p>
      Using a class or id (in this case (<em>simple</em>) on a div containing the html for the navigation enables CSS selectors to be specific to this part of the webpage.
    </p>
    <h3>#simple-1</h3>
    <P>
      We start with a simple list inside a div with id="simple-1". There is no CSS associated with simple-1. The HTML is:
    </p>
    <pre><code>
    &lt;div id="simple-1">
      &lt;ul>
        &lt;li>&lt;a href="#">Item 1&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Item 2&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Item 3&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
    </code></pre>
    <p>
      It looks like this:
    </p>
    <div id="simple-1">
      <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <h3>#simple-2</h3>
    <p>
      Lets apply some simple CSS:
    </p>
    <div id="simple-2">
      <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <p>
      Note the CSS looks like this inside the <em>style</em> element of this page:
    </p>
    <pre><code>
    #simple-2 ul {
      padding: 0;
    }
    #simple-2 a {
      text-decoration: none;
      padding: 10px;
    }
    #simple-2 li {
      display: inline-block;
    }
    </code></pre>
    <p>
      Removing the padding from <em>ul</em> removes the bullet points.
    </p>
    <p>
      The underlines are removed from the anchor elements.
    </p>
    <p>
      Adding padding to the anchor elements spaces them out and also provides a more generous area for the user to click. They do not need to be so precise.
    <p>
      The list items are converted from block to inline-block so now they are on the same line.
    </p>
    <p>
      Lets Make <em>Item 1</em> a dropdown. We add a <em>ul</em> to Item 1 so the HTML becomes:
    </p>
    <pre><code>
    &lt;div id="simple-2">
      &lt;ul>
        &lt;li>
          &lt;a href="#">Item 1&lt;/a>
          &lt;ul>
            &lt;li>&lt;a href="#">Sub Item&lt;/a>&lt;/li>
            &lt;li>&lt;a href="#">Sub Item&lt;/a>&lt;/li>
            &lt;li>&lt;a href="#">Sub Item&lt;/a>&lt;/li>
          &lt;/ul>
        &lt;/li>
        &lt;li>&lt;a href="#">Item 2&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Item 3&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
    </code></pre>
    <div id="simple-2">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <p>
      Note that the <em>ul</em> inside the item 1 <em>li</em> element is a block element so is on a new line. The <em>li</em> elements inside this <em>ul</em> element are styled by the <em>#simple-2 li {display: inline-block;}</em> rule set so they are on the same line as each other as well as the remaining <em>li</em> elements from the first level <em>ul</em>.
    <h3>#simple-3</h3>
    <p>
      Keeping the HTML the same (except changing the <em>div</em> id to <em>simple-3</em>) we can use the <em>position</em> property to take the inner <em>ul</em> out of the normal flow.
    </p>
    <div id="simple-3">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <p>
      The new CSS is:
    </p>
    <pre><code>
    #simple-3 ul {
      padding: 0;
      position: relative;
    }
    #simple-3 a {
      text-decoration: none;
      padding: 10px;
    }
    #simple-3 li {
      display: inline-block;
    }
    #simple-3 li > ul {
      position: absolute;
    }
    </code></pre>
    <p>
      Making the first level <em>ul</em> position property relative makes it the 'base container' for any element within it which has absolute position. The second level <em>ul</em> is given absolute position so it is now taken out of the flow and positioned relative to the first level <em>ul</em>. Note the greater than (>) symbol is a sibling is used for sibling selectors in CSS: <em>li > ul</em> means <em>ul</em>s hat are siblings of <em>li</em>s will be selected.
    </p>
    <h3>#simple-4</h3>
    <p>
      The inner <em>ul</em> <em>li</em> elements are still being targeted by the <em>display: inline-block;</em> rule. We want them to be vertical so we add this rule set: <em>#simple-4 li > ul li {display: block;}</em> is added to the CSS. The result is:
    <div id="simple-4">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <h3>#simple-5</h3>
    <p>
      Now we have a problem! the <em>position: absolute</em> rule takes the innder <em>ul</em> out of normal flow so the content below it moves up to follow directly after the outer <em>ul</em>. Hence the overlapping text (hopefully you can read this). In fact this problem was evident in the last examples but less obvious because all the <em>li</em> items were on the same line.
    </p>
    <p>
      Now for the magic. We add two new rule sets to the CSS:<br>
      <em>#simple li > ul {display: none;}</em>
      <em>#simple li:hover > ul {display: block;}</em>
    <div id="simple-5">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <p>
      Now the inner <em>ul</em> is hidden until we hover over its parent <em>li</em> element at which point its display value becomes block.
    </p>
    <h3>#simple-6</h3>
    <p>
      Now the dropdown is working we can give the dropped down list a background colorso it is easier to read without the underlying text showing through. We add <em>.simple li > ul {background-color: lightblue;}</em> to our CSS with result:
    </p>
    <div id="simple-6">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <h3>#simple-6: Part Two</h3>
    <p>We can leave the <em>div</em> unchanged because we are extending the HTML but not changing the CSS.
    </p>
    <p>
      The HTML structure and CSS that we have allow further nesting of <em>ul</em> elements to become dropdowns from <em>li</em> elements that are themselves drop downs. The HTML has been extended to include a list in one of the Sub Item <em>li</em> elements and another list inside one of these <em>li</em> elements:
    </p>
    <pre><code>
     &lt;div id="simple-6">
        &lt;ul>
          &lt;li>
            &lt;a href="#">Item 1&lt;/a>
            &lt;ul>
              &lt;li>
                &lt;a href="#">Sub Item&lt;/a>
                 &lt;ul>
                  &lt;li>&lt;a href="#">2nd lvl sub item&lt;/a>&lt;/li>
                  &lt;li>&lt;a href="#">2nd lvl sub item&lt;/a>&lt;/li>
                  &lt;li>&lt;a href="#">2nd lvl sub item&lt;/a>
                      &lt;ul>
                        &lt;li>&lt;a href="#">3nd lvl sub item&lt;/a>&lt;/li>
                        &lt;li>&lt;a href="#">3nd lvl sub item&lt;/a>&lt;/li>
                        &lt;li>&lt;a href="#">3nd lvl sub item&lt;/a>&lt;/li>
                    &lt;/ul>
                   &lt;/li>
                &lt;/ul>
              &lt;/li>
              &lt;li>&lt;a href="#">Sub Item&lt;/a>&lt;/li>
              &lt;li>&lt;a href="#">Sub Item&lt;/a>&lt;/li>
            &lt;/ul>
          &lt;/li>
          &lt;li>&lt;a href="#">Item 2&lt;/a>&lt;/li>
          &lt;li>&lt;a href="#">Item 3&lt;/a>&lt;/li>
        &lt;/ul>
      &lt;/div>
    </code></pre>
    <p>
      And the result:
    </p>
    <div id="simple-6">
      <ul>
        <li>
          <a href="#">Item 1</a>
          <ul>
            <li>
              <a href="#">Sub Item</a>
              <ul>
                <li><a href="#">2nd lvl sub item</a></li>
                <li><a href="#">2nd lvl sub item</a></li>
                <li>
                  <a href="#">2nd lvl sub item</a>
                  <ul>
                    <li><a href="#">3nd lvl sub item</a></li>
                    <li><a href="#">3nd lvl sub item</a></li>
                    <li><a href="#">3nd lvl sub item</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <h3>Infinitely nested dropdown lists</h3>
    <p>
      The CSS selector, <em>ul ul</em> will act on a list inside another list. If another list is put inside the second list the same CSS selector will act on that list as well because it is a list inside a list just as its parent is a list inside a list. The only list the selector will not act on is the first <em>ul</em> element.
    </p>
    <p>
      Previously when we just had one drop down the parent <em>ul</em> was given <em>position: relative;</em> and the <em>ul</em> inside the list element was given <em>position: absolute;</em>. We can make all <em>li</em> elements have <em>position: relative;</em> and all <em>ul</em> elements except the one which is parent of all of them <em>position: absolute;</em>.
    <div id="simple-7">
      <ul>
        <li><a href="#">Item 1</a>
          <ul>
            <li>
              <a href="#">Sub Item</a>
              <ul>
                <li><a href="#">2nd</a></li>
                <li><a href="#">2nd</a></li>
                <li>
                  <a href="#">2nd</a>
                  <ul>
                    <li><a href="#">3nd</a></li>
                    <li><a href="#">3nd</a></li>
                    <li><a href="#">3nd</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Sub Item</a></li>
            <li><a href="#">Sub Item</a></li>
          </ul>
        </li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
    </div>
    <h3>Some Lorem Ipsum</h3>
    <p>
      This is because a dropdown as the last thing in a webpage is a pain because when it drops down it disappears off the bottom of the page. So this is just filler text so you can see the dropdown.
    </p>
    <p>
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
    <p>
      It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
    </p>
    <p>
      Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
    </p>
    <p>
      The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
    </p>
  </div>
</body>
</html>
