<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Hamburger To Flex</title>
<style>
  /***** General Styles ******************************************************/
  .new-code {
    color: red;
  }
  /***** Finished Product: used for example at top of the page. **************/
  #nav #hamburger-button {
    width: 3rem;
    background: transparent;
    cursor: pointer;
    border: none;
  }
  #nav .hamburger-bar {
    width: 100%;
    height: 0.2rem;
    background: black;
    display: block;
    margin: 0.4rem 0;
  }
  #nav .top-level-list {
    display: none;
    position: absolute;
  }
  #nav:focus-within .top-level-list {
    display: block;
    background-color: lightgrey;
  }
  #nav #hamburger-button {
    position: relative;
  }
  /***** End of Finished Product *********************************************/
  /***** One *****************************************************************/
  #nav-1 #hamburger-button {
    width: 3rem;
    background: transparent;
    position: relative;
    cursor: pointer;
    border: none;
  }
  #nav-1 .hamburger-bar {
    width: 100%;
    height: 0.2rem;
    background: black;
    display: block;
    margin: 0.4rem 0;
  }
  /***** End of One **********************************************************/
  /***** Two *****************************************************************/
  #nav-2 #hamburger-button {
    width: 3rem;
    background: transparent;
    position: relative;
    cursor: pointer;
    border: none;
  }
  #nav-2 .hamburger-bar {
    width: 100%;
    height: 0.2rem;
    background: black;
    display: block;
    margin: 0.4rem 0;
  }
  #nav-2 .top-level-list {
    display: none;
  }
  #nav-2 #hamburger-button:focus + .top-level-list {
    display: block;
  }
  /***** End of Two **********************************************************/
  /***** Three ***************************************************************/
  #nav-3 #hamburger-button {
    width: 3rem;
    background: transparent;
    position: relative;
    cursor: pointer;
    border: none;
  }
  #nav-3 .hamburger-bar {
    width: 100%;
    height: 0.2rem;
    background: black;
    display: block;
    margin: 0.4rem 0;
  }
  #nav-3 .top-level-list {
    display: none;
  }
  #nav-3:focus-within .top-level-list {
    display: block;
  }
  /***** End of Three ********************************************************/
  /***** Four ****************************************************************/
  #nav-4 #hamburger-button {
    width: 3rem;
    background: transparent;
    cursor: pointer;
    border: none;
  }
  #nav-4 .hamburger-bar {
    width: 100%;
    height: 0.2rem;
    background: black;
    display: block;
    margin: 0.4rem 0;
  }
  #nav-4 .top-level-list {
    display: none;
    position: absolute;
  }
  #nav-4:focus-within .top-level-list {
    display: block;
    background-color: lightgrey;
  }
  #nav-4 #hamburger-button {
    position: relative;
  }
  /***** End of Four **********************************************************/
</style>
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <div id="nav">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="1">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="1">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <h1>Hamburger To Flex</h1>
    <p>
      In this code example we create the responsive navigation shown at the top of this page. On screen widths up to 500px there is a hamburger icon which on receiving focus displays a navigation list. Screen widths over 500px screen display the top level list of links and dropdowns horizontally using flex layout.
    </p>
    <p>
      In this navigation system items in the top level list are either links or they contain a list of links. I think it is confusing for the user if they can be both so have avoided that.
    </P>
    <p>
      A mobile first approach has been taken to writing the CSS code. The Code for the smaller width size comes first. A media query contains code for the wider screen layout. This code is additional to the code for the smaller width size. CSS which is necessary for the smallest width size needs to be reset to default values or to values necessary for the new screen size. This can be complex and it may be more straightforward to simply write a different set of code for each screen size.
    </p>
    <h2>The HTML</h2>
    <p>
      Here is the HTML code for the navigation. This does not change throughout this demonstration except for the container element which starts as <em>&lt;div id="nav-0"></em> and is incremented by 1 in each successive example as the CSS is built up. So, we get <em>&lt;div id="nav-0"></em>, <em>&lt;div id="nav-1"></em>, <em>&lt;div id="nav-2"></em> etc. This enables us to target essentially the same HTML with different CSS code as we develop the CSS from start to end product.
    </p>
    <p>
      It may be useful to have the HTML code open in a second browser window alongside this web page so it can be referred to as the CSS is built up. CSS code which is newly introduced to the demonstration is colored red.
    </p>
    <pre><code>
      &lt;div id="nav-0">
        &lt;button id="hamburger-button">
          &lt;span class="hamburger-bar">&lt;/span>
          &lt;span class="hamburger-bar">&lt;/span>
          &lt;span class="hamburger-bar">&lt;/span>
        &lt;/button>
        &lt;ul class="top-level-list">
          &lt;li>
            &lt;span class="no-link" tabindex="1">INFO&lt;/span>
            &lt;ul>
              &lt;li>&lt;a href="#">SHOPS&lt;/a>&lt;/li>
              &lt;li>&lt;a href="#">TRAVEL&lt;/a>&lt;/li>
            &lt;/ul>
          &lt;/li>
          &lt;li>&lt;a href="#">LINE-UP&lt;/a>&lt;/li>
          &lt;li>
            &lt;span class="no-link" tabindex="1">MORE&lt;/span>
            &lt;ul>
              &lt;li>&lt;a href="#">WORKSHOPS&lt;/a>&lt;/li>
              &lt;li>&lt;a href="#">CONTACT&lt;/a>&lt;/li>
            &lt;/ul>
          &lt;/li>
        &lt;/ul>
      &lt;/div>
    </code></pre>
    <p>
      Here is what it looks like without any CSS applied:
    </p>
    <div id="nav-0">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="1">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="1">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <h2>Styling the Hamburger</h2>
    <p>
      The approach here is to use CSS to create a hamburger icon inside a button element. An image icon or a font version of a hamburger could have been used. As this is not the main purpose of this demonstration I will not explain this CSS. Here it is:
    </p>
    <pre><code>
      <span class="new-code">
        #nav-1 #hamburger-button {
          width: 3rem;
          background: transparent;
          position: relative;
          cursor: pointer;
          border: none;
        }
        #nav-1 .hamburger-bar {
          width: 100%;
          height: 0.2rem;
          background: black;
          display: block;
          margin: 0.4rem 0;
        }
      </span>
    </code></pre>
    <p>
      Here is the result:
    </p>
    <div id="nav-1">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="1">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="1">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <p>
      In future when the CSS is shown I will not show the code for styling the hamburger button.
    </p>
    <h2><em>display: none / block</em></h2>
    <p>
      We will hide the whole navigation list like this: <em>#nav .top-level-list {display: none;}</em>
    </p>
    <p>
      To show the list we need to revert the display property of the top level navigation list to the default value of <em>block</em>. Note that <em>ul</em> elements are block level elements by default. We need to do this when the hamburger icon receives focus ie. is touched on a mobile or clicked with a mouse on a laptop or desktop.
    </p>
    <p>
      We can achieve this (but don't for reasons that will be discussed) by using the <em>:focus</em> CSS pseudo class on the <em>#hamburger-button</em> as the first part of the selector and then the top-level-list as the second part of the selector. The CSS looks like this:
    </p>
    <pre><code>
    <span class="new-code">
      #nav-2 .top-level-list {
        display: none;
      }
      #nav-2 #hamburger-button:focus + .top-level-list {
        display: block;
      }
    </span>
    </code></pre>
    <p>
      Note that the CSS sibling selector symbol, <em>+</em> is used to select the sibling element with the class attribute value of <em>top-level-list</em>. Here is the result which can be clicked on to show the navigation list:
    </P>
    <div id="nav-2">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="1">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="1">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <p>
      There are two issues here. One is that when the hamburger is clicked and the list become visible it causes content below it to reposition. This may or may not be wanted. If it is not wanted then the <em>position</em> property of the navigation list can be given a value of <em>absolute</em>. Then it will be taken out of the normal flow of the document and will sit on top of content in the normal flow. The list will then need a background so the underlying content does not make it difficult to read. We will do this later.
    </p>
    <p>
      The other issue is more serious. If the hamburger is clicked so the list becomes visible and then a link in the list is clicked, then the list immediately disappears. This is because it is only the hamburger button that received focus and when you click on one of the list link items you are clicking outside the focussed element so it loses focus. Once the hamburger element loses focus the top level list's <em>display</em> property reverts to the value of <em>none</em>. This happens and the intended action, that the browser should load the page linked to by the list element that was clicked on, does not happen. Note here that in this demonstration we are using <em>href="#"</em> for the links which causes the current page to reload if the link works. If the page is scrolled down it will cause the page to jump to the top. This is not happening here when you click on one of the links for the reason outlined above. A solution to this is to use the <em>:focus-within</em> pseudo class instead of the <em>:focus</em> pseudo class. MDN has this to say about it:
    </p>
    <blockquote>
      The <em>:focus-within</em> CSS pseudo-class represents an element that has received focus or contains an element that has received focus. In other words, it represents an element that is itself matched by the <em>:focus</em> pseudo-class or has a descendant that is matched by <em>:focus</em>.
    </blockquote>
    <p>So we need to use <em>:focus-within</em> on a common parent of both the hamburger button and the top level navigation list. Now when any element, for example the hamburger button, within that common parent element is clicked, focus will be conferred to all the elements inside the parent container and this includes the top level navigation list. Now clicking on one of the links in the navigation list will not cause focus to be lost and the link will function as it should.
    </p>
    <h2>#nav:focus-within</h2>
    <p>
      Let us change the CSS code to:
    </p>
    <pre><code>
      #nav-3 .top-level-list {
        display: none;
      }
      <span class="new-code">
      #nav-3:focus-within .top-level-list {
        display: block;
      }
      </span>
    </code></pre>
    <p>
      ... and see what it does (if you click on one of the links you may need to scroll back down to this point):
    </p>
    <div id="nav-3">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="1">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="1">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <p>
      Now when you click on a link in the navigation list the page should jump to the top because clicking on the link does not close the list and the intended action of the link can happen. When you scroll back down to the point where you clicked the list is still displayed. This is irrelevant to the user as normally they would have been taken to a new page specified in the link element.
    </p>
    <h2>Absolute Position</h2>
    <p>
      When the list appears it pushes content below it down which may be considered an unwanted distraction. In order to prevent this from happening the navigation list can be given a <em>position</em> property value of <em>absolute</em>. This takes it out of normal flow and it will sit on top of content in normal flow. The position it occupies will by default be related to the browser window. We want its position to be relative to the hamburger icon from which it appeared. An absolutely positioned element will be relative to the window or to a parent element that has a <em>position</em> property with a value of <em>relative</em>. We also set a <em>background-color</em> property on the navigation list so it is not made difficult to read by the content underneath it showing through. Thus our CSS code now looks like this:
    </p>
    <pre><code>
      #nav-4 .top-level-list {
        display: none;
        <span class="new-code">position: absolute;</span>
      }
      #nav-4:focus-within .top-level-list {
        display: block;
        <span class="new-code">background-color: lightgrey;</span>
      }
      <span class="new-code">
      #nav-4 #hamburger-button {
        position: relative;
        }
      </span>
    </code></pre>
    <p>
      Click the hamburger to see the result:
    <p>
    <div id="nav-4">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="1">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="1">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <p>
      That is the end of the demonstration. Considerable more styling would need to be done to make the list more attractive. I have put some <em>Lorem Ipsum</em> text below because the hamburger dropdown list will extend below the bottom of the screen and be invisible if there is not sufficient content below it.
    </p> 
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    </p>
    <p>
  "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
    </p>
  </div>
</body>
</html>
