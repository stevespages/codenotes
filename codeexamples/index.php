<?php require $_SERVER['DOCUMENT_ROOT'].'/code-examples/head.php'; ?>
<title>Code Examples Home</title>
</head>
<body>
  <div class="content">
    <nav>HOME</nav>
    <h1>Code Examples</h1>
    <p>
      A number of examples of code which may be useful for writing websites is presented here
    </p>
    <h2>File Uploads</h2>
    <p>
      An HTML <a href="file-upload">form</a> that uploads a file to my Bytemark Apache server is demonstrated here. It is mainly concerned with the necessary and hopefully secure ownership change of the directory the files are uploaded to.
    </p>
    <h2>Reduce Image File Size</h2>
    <p>
      An HTML <a href="reduce-image-file-size/">form</a> that uploads an image file and saves it as well as a 1/10th size version is implemented here.    </p>
    <h2>SQLite</h2>
    <p>
      An HTML <a href="sqlite">form</a> uploads data to a database on my Bytemark Apache server. It is mainly concerned with the necessary and hopefully secure change of ownership of the SQLite database file and the directory it is in.
    </p>
    <h2>Find</h2>
    <p>
      <em>grep -R "DOCUMENT_ROOT" .</em> is very good for finding files which contain a particular string (in this case "DOCUMENT_ROOT"). Don't forget the trailing dot!
    </p>
    <h2>.htaccess</h2>
    <p>
      A .htaccess file can be used to display errors. This advice came from https://stackify.com/display-php-errors/ The required code in the .htaccess file is:
    </p>
    <pre><code>
      php_flag display_startup_errors on
      php_flag display_errors on
    </code></pre>
    <p>
      A <a href="htaccess/rewrite/catch.php">start</a> has been made to understand Apache Mod_Rewrite rules and apply them to directing all HTTP requests to an index.php file in a particular directory. This could be useful if a routing approach to web building was taken.
    </p>
    <h2>Download a CSV File to Browser</h2>
    <p>
      Data on the server, whether in a file or generated from a script, can be sent to the browser with appropriate http headers which cause the browser to ask the user to save the data as a file. This is <a href="download-to-file/">shown</a> with just three lines of PHP.
    </p>
    <p>
      If you echo <em>PHP_EOL</em> you will get a <a href="download-to-file/new-line">new line</a> in a text editor and new row in a spreadsheet.
    </p>
    <h2>Paths</h2>
    <p>
      Note that <em>href</em> values for hyperlinks, including to some resources like CSS files, are URLs. Like paths, in PHP include and require statements, they can be absolute or relative. They are not part of PHP and a lot of what is covered in this section does not apply to them.
    </p>
    <p>
      A website involves a great deal of linking files, generally in different directories, together. The paths between the linked files have to be described accurately and of course modified whenever the structure of the website is changed. Some approaches can make this easier to manage but any approach will require considerable care.
    </p>
    <p>
      <a href="paths">Paths</a> are either relative or absolute. Relative paths can be convenient to use as they are normally shorter and therefore less effort to write. Absolute paths have the advantage that they will work independently of where in the file system they are used.
    </p>
    <p><a href="paths/include">Including a file which includes a file</a> is a particular problem although the answer is to make sure you use an absolute path. Then you can choose the most convenient and robust method to form that absolute path but that will depend on personal preferences and priorities.
    <h2><a href="nav/">Nav</a></h2>
    <p>
      A header with <a href="nav/dotted-squirrel">nested dropdowns</a> taken from a tutorial by Dotted Squirrel. The dropdowns can be nested infinitely without changing the CSS.
    </p>
    <p>
      A debugging excercise resulted in an interesting point being noted about the requirement for <em>focus-within</em> to be applied to an element where its child not sibling <em>ul</em> is the dropdown. Read <a href="nav/dropdown/child.php">child.php</a> first and then <a href="nav/dropdown/sibling.php">sibling.php</a>. A semantically better version called <a href="nav/dropdown/semantic.php">semantic.php</a> was also made.
    </p>
    <p>
      A <a href="nav/hamburger-to-flex/hamburger.php">hamburger</a> icon with a dropdown navigation list is built first. Then the same navigation list is used to build a horizontal <a href="nav/hamburger-to-flex/flex.php">flex</a> navigation panel. Finally the two are merged to give <a href="nav/hamburger-to-flex/responsive.php">responsive</a> navigation which consists of a hamburger on mobiles and flex navigation panel on larger width screens.
    </p>
    <h2>Query String Question</h2>
    <p>
      I was not sure if query strings could be used when the url ends in the name of a directory inside which there is an index.php file. Both the following URLs, which point to the same file, work on my Bytemark server. Try them: <a href="query-strings/index.php?name=Steve"><em>query-strings/index.php?name=Steve</em></a> and <a href="query-strings/?name=Steve"><em>query-strings/?name=Steve</em></a>.
    </p>
    <h2>Stripe Payment</h2>
    <p>
      A stripe account was opened, a product created from the Stripe dashboard, and the code to sell that generated by Stripe was added to a webpage. This, <a href="stripe-payment/client-only-dashboard">Client Only Dashboard</a> approach gives limited control over how a product(s) can be sold but can be extended to allow the user to <a href="stripe-payment/client-only-dashboard/choose-how-many/">choose how many</a> units of a product they want to buy.
    </p>
    <p>
      A start has been made implementing webhooks which enable events occurring on your Stripe account, such as a card payment from a web page, to be sent to your server and logged or otherwise dealt with. Firstly <a href="stripe-payment/webhooks/">webhooks</a> are created on the Stripe command line and the response from our server detected on the Stripe command line. Then in <a href="stripe-payment/webhooks-two/">webhooks-two</a> we detect webhooks on the server sent from Stripe in response to a purchase on our site. We need to extract the information about the purchase event from the webhook so it can be used to fulfill business logic on our site.
    </p>
    <p>
      A more involved procedure, <a href="stripe-payment/client-only-api">Client Only API</a> approach, allowing greater control, for dynamic pricing was attempted but is not working.
    </p> 
    <h2>Server Probe</h2>
    <p>
      A number of scripts have been linked to from  a page I have called <a href="probe">probe</a>. These reveal information about the environment, for example about PHP and Apache, they are served from.
    </p>
    <h2>Build Overview</h2>
    <p>
      Key steps and the order they are taken in are <a href="build-overview/">considered</a>
    </p>
    <h2><a href="geolocation">Geolocation</a></h2>
    <p>
      This page uses javascript to access the user's location with the Geolocation API. The Location is displayed using console.log(position).
    </p>
    <h2><a href="exif/">EXIF</a></h2>
    <p>
      This page uses PHP's EXIF extension to access and display EXIF data from a jpg file. 
    <p/>
    <h2><a href="login/">Login</a></h2>
    <p>
      Implenting login solutions for websites.
    </p>
    <h2><a href="favicons/">Favicons</a></h2>
    <p>
      How to make those pesky things...
    </p>
    <h2><a href="serviceworker/">Service Worker</a></h2>
    <p>
      How to implement service workers so that website can have offline functionality. 
    </p>
    <h2><a href="dev-prod-github/">Dev-Prod-GitHub</a></h2>
    <p>
        A workflow for developing, putting into production, version control and back up.
    </p>
    <h2><a href="compare-sqlite/">Compare SQLite databases</a></h2>
    <p>
        Comparing two SQLite databases can be useful for testing and other reasons.
    </p>
    <h2><a href="js-modules/">JavaScript Modules</a></h2>
    <p>
        A variable representing a DOM element is declared inside a module. Also, in the module the variable has an event handler added to it. The variable (not the event handler code) is exported from the module and imported into main.js which is linked to from index.php. When invoked from index.php the variable and event handler all work as they should.
    </p>
    <h2><a href="delete-cancel-confirm/">JavaScript Delete button: Confirm or Cancel</a></h2>
    <p>
        If a user clicks a delete button it is possibly inadvertant but the consequences may be quite painful. So, a generic method for applying a cancel or confirm step is provided here.
    </p>
    <h2><a href="bootable-usb/">Make, and reuse, Bootable USB Stick</a></h2>
    <p>
        Creating a bootable usb stick is slightly different from just putting data on the stick. Also once the stick does have an iso image on it and is rebootable you can not use it again without reformatting the disk. How I did these procedures is described here.
    </p>
  </div>
<?php require 'foot.php'; ?>
