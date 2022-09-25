<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Responsive</title>
<style>
  /***** Finished Product Taken From hamburger.html ***************************/
  #nav-hamburger #hamburger-button {
    width: 3rem;
    background: transparent;
    cursor: pointer;
    border: none;
  }
  #nav-hamburger .hamburger-bar {
    width: 100%;
    height: 0.2rem;
    background: black;
    display: block;
    margin: 0.4rem 0;
  }
  #nav-hamburger .top-level-list {
    display: none;
    position: absolute;
  }
  #nav-hamburger:focus-within .top-level-list {
    display: block;
    background-color: lightgrey;
  }
  #nav-hamburger #hamburger-button {
    position: relative;
  }
  /***** End of Finished Product Taken From hamburger.html ********************/
  /***** Four (flex): taken from flex.html ************************************/
  #nav-flex #hamburger-button {
    display: none;
  }
  #nav-flex .top-level-list {
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  #nav-flex .top-level-list ul {
    display: none;
    position: absolute;
    background-color: lightgrey;
  }
  #nav-flex .top-level-list li:focus-within ul {
    display: block;
  }
  /***** End of Four (flex) ***************************************************/
  /***** One ******************************************************************/
  #nav-1 #hamburger-button {
    width: 3rem;
    background: transparent;
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
  #nav-1 .top-level-list {
    display: none;
    position: absolute;
  }
  #nav-1:focus-within .top-level-list {
    display: block;
    background-color: lightgrey;
  }
  #nav-1 #hamburger-button {
    position: relative;
  }
  @media screen and (min-width: 500px) {
    #nav-1 #hamburger-button {
      display: none;
    }
    #nav-1 .top-level-list {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }
    #nav-1 .top-level-list ul {
      display: none;
      position: absolute;
      background-color: lightgrey;
    }
    #nav-1 .top-level-list li:focus-within ul {
      display: block;
    }
  }
  /***** End of One ***********************************************************/
  /***** Two ******************************************************************/
  #nav-2 #hamburger-button {
    width: 3rem;
    background: transparent;
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
    position: absolute;
  }
  #nav-2:focus-within .top-level-list {
    display: block;
    background-color: lightgrey;
  }
  #nav-2 #hamburger-button {
    position: relative;
  }
  @media screen and (min-width: 500px) {
    #nav-2 #hamburger-button {
      display: none;
    }
      #nav-2:focus-within .top-level-list {
        display: flex;
        background-color: transparent;
      }
    #nav-2 .top-level-list {
      display: flex;
      justify-content: space-around;
      align-items: center;
        position: relative;
    }
    #nav-2 .top-level-list ul {
      display: none;
      position: absolute;
      background-color: lightgrey;
    }
    #nav-2 .top-level-list li:focus-within ul {
      display: block;
    }
  }
  /***** End of Two ***********************************************************/
</style>
</head>
<body>
  <div class="content">
    <nav><a href="https://stevespages.org.uk/codenotes/codeexamples/">HOME</a></nav>
    <div id="nav-2">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="0">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="0">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <h1>Responsive Navigation</h1>
    <h2>No CSS</h2>
    <p>
      The same HTML is used here as in the <a href="hamburger.html">hamburger</a> and <a href="flex.html">flex</a> demonstrations. The HTML is shown in the hamburger page and it would be a good idea to open that in a separate window so it can be referred to. Without any CSS styling applied the browser renders the HTML like this:
    </p>
    <div id="nav-0">
      <button id="hamburger-button">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </button>
      <ul class="top-level-list">
        <li>
          <span class="no-link" tabindex="0">INFO</span>
          <ul>
            <li><a href="#">SHOPS</a></li>
            <li><a href="#">TRAVEL</a></li>
          </ul>
        </li>
        <li><a href="#">LINE-UP</a></li>
        <li>
          <span class="no-link" tabindex="0">MORE</span>
          <ul>
            <li><a href="#">WORKSHOPS</a></li>
            <li><a href="#">CONTACT</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <h2>Hamburger CSS</h2>
    <p>
      With the finished Hamburger CSS applied this is the result:
    </p>
    <div id="nav-hamburger">
      <button id="hamburger-button">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </button>
      <ul class="top-level-list">
        <li>
          <span class="no-link" tabindex="0">INFO</span>
          <ul>
            <li><a href="#">SHOPS</a></li>
            <li><a href="#">TRAVEL</a></li>
          </ul>
        </li>
        <li><a href="#">LINE-UP</a></li>
        <li>
          <span class="no-link" tabindex="0">MORE</span>
          <ul>
            <li><a href="#">WORKSHOPS</a></li>
            <li><a href="#">CONTACT</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <h2>Flex CSS</h2>
    <p>
      With the finished Flex CSS applied this is the result:
    </p>
    <div id="nav-flex">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="0">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="0">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <h2>Responsive CSS</h2>
    <p>
      With the finished Responsive CSS the result can be seen at the top of this page. If the browser window is greater than or equal to 500px you see the Flex layout. If the browser window is less than 500px the Hamburger is presented.
    </p>
    <p>
      To create responsive navigation with a mobile first approach we include all the hamburger CSS at the top of the CSS for the navigation styling. We then place the flex CSS below it inside a media query so it is only applied above a certain screen width. When we do this we get this result:
    </p>
    <div id="nav-1">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="0">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="0">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <p> 
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    </p>
    <p>
      When the screen size is below 500px wide we get the hamburger menu exactly as before. At screen sizes above 500px both the hamburger CSS and the flex CSS are being applied and we get a mess. I put the Lorem Ipsum text after the demo so it did not obscure the explanation.
    </p>
    <p>
      Here is the CSS which results in this mess:
    </p>
    <pre><code>
        #nav-1 #hamburger-button {
          width: 3rem;
          background: transparent;
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
        #nav-1 .top-level-list {
          display: none;
          position: absolute;
        }
        #nav-1:focus-within .top-level-list {
          display: block;
          background-color: lightgrey;
        }
        #nav-1 #hamburger-button {
          position: relative;
        }
        @media screen and (min-width: 500px) {
          #nav-1 #hamburger-button {
            display: none;
          }
          #nav-1 .top-level-list {
            display: flex;
            justify-content: space-around;
            align-items: center;
          }
          #nav-1 .top-level-list ul {
            display: none;
            position: absolute;
            background-color: lightgrey;
          }
          #nav-1 .top-level-list li:focus-within ul {
            display: block;
          }
        }
    </code></pre>
    <p>
      This CSS is simply the hamburger CSS followed by the flex CSS inside a media query. When the media query does not apply, below 500px screen width, the hamburger menu is displayed exactly as before. When the media query does apply the hamburger code interferes with the flex code in the media query.
    </p>
    <p>
      In the hamburger section of the CSS we have 
      <pre><code>
        #nav-1 .top-level-list {
          display: none;
          position: absolute;
        }
      </code></pre>
      In the flex section, in the media query, we have exactly the same selector conferring display, justify-content and align-item properties but not the position property. So our flex top level list has absolute position which disrupts the flex behaviour. We need to add <em>position: relative;</em> to the top level list. We want the top level list to be relative so that the absolutely positioned second level lists will be relative to it. You can see, colored in red, in the next section <em>position: relative</em> is applied to the top level list in the flex section of the CSS.
    </p>
    <p>
      We also have the problem that in the hamburger section of the CSS code we have the following rule set:
    </p>
    <pre><code>
      #nav-1:focus-within .top-level-list {
        display: block;
        background-color: lightgrey;
      }
    </code></pre>
    <p>
      The selector here is more specific than the selector in the flex section of the CSS code which confers <em>display: flex</em> on the top level list. Also nowhere in the flex CSS code is background-color set for the top level list. So, when focus is received anywhere in the <em>nav</em> element, the display reverts from flex to block and the color of the top level list becomes lightgrey as opposed to the default, transparent, value. Again the adjustment to the CSS code to achieve this is shown in red in the next section.
    </p>
    <h2>The Finished Product</h2>
    <div id="nav-2">
        <button id="hamburger-button">
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
          <span class="hamburger-bar"></span>
        </button>
        <ul class="top-level-list">
          <li>
            <span class="no-link" tabindex="0">INFO</span>
            <ul>
              <li><a href="#">SHOPS</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </li>
          <li><a href="#">LINE-UP</a></li>
          <li>
            <span class="no-link" tabindex="0">MORE</span>
            <ul>
              <li><a href="#">WORKSHOPS</a></li>
              <li><a href="#">CONTACT</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <p>
      Here is the finished CSS:
    </p>
    <pre><code>
      #nav-2 #hamburger-button {
        width: 3rem;
        background: transparent;
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
        position: absolute;
      }
      #nav-2:focus-within .top-level-list {
        display: block;
        background-color: lightgrey;
      }
      #nav-2 #hamburger-button {
        position: relative;
      }
      @media screen and (min-width: 500px) {
        #nav-2 #hamburger-button {
          display: none;
        }<span class="new-code">
        #nav-2:focus-within .top-level-list {
          display: flex;
          background-color: transparent;
        }</span>
        #nav-2 .top-level-list {
          display: flex;
          justify-content: space-around;
          align-items: center;<span class="new-code">
          position: relative;</span>
        }
        #nav-2 .top-level-list ul {
          display: none;
          position: absolute;
          background-color: lightgrey;
        }
        #nav-2 .top-level-list li:focus-within ul {
          display: block;
        }
      }
    </code></pre>
    <p>
      Hopefully the responsive navigation page replicates the two independent navigation systems at the appropriate screen widths. Keyboard tabbing is not particularly relevant to the smaller screen widths which being mobiles and tablets normally do not have keyboards. At larger screen widths the flex arrangement is displayed and that does retain the keyboard accessibility required.
  </div>
</body>
</html>
