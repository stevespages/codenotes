fetch()
=======

This asynchronous function results in an HTTP request. The response is returned with a body which can be displayed in the existing webpage. This procedure is referred to as Ajax (Asynchronous JavaScript and XML) and also XHR (XMLHTTPRequest).

HTTP requests use the GET, POST, PUT, and DELETE (and possibly others) methods. Examples of fetch() requests using GET and POST are shown below. Both  the ``.then`` and ``await`` / ``async`` approaches to handling promises are illustrated.

``fetch()`` returns a promise which is an object called ``response`` which also returns a promise called ``body``. Different methods of the ``response`` method are used to access the appropriate type of ``body`` object. The type of ``body`` will have been determined within the Ajax handler (in the examples here these are the PHP scripts which respond to the Ajax requests).

GET, POST, DELETE, PUT etc
--------------------------

Specifications for HTTP indicate that different methods should be used for different types of interaction with the server. For example the GET request method should be used when nothing is to be changed on the server and it is only desired to obtain information from the server in the response. A DELETE request should be made when something should be deleted from the server. POST should be used when something is required to be saved to the server. PUT should be used when a record is required to be changed. It is noted that GET is a `safe` method as the server is unaltered. PUT is `idempotent`, meaning the server state is altered but multiple requests with the same information do not alter the server unlike POST requests where multiple requests do alter the server's state (for example creating duplicates of an order).

Use GET and POST for everything
-------------------------------

In practice web browsers only use GET and POST. They use GET for hyperlinks and POST for form submissions. If a form is provided for a user to delete a resource then a POST request will be sent even though the HTTP specs indicate that a DELETE request should have been sent.

In PHP there are two superglobal variables called $_GET and $_POST. There are no equivalents for PUT and DELETE.

In view of this it seems that when crafting HTTP requests, which one has to do for ``fetch()`` requests, it is not unreasonable to only use the GET and POST methods even if this departs from the HTTP specification.

GET
---

In the example shown here ``fetch()`` only takes the mandatory, ``URL``, parameter. When an HTTP method is not specified in the second, optional, ``options`` parameter, ``fetch()`` will use the GET method. In the example, the URL is a relative URL indicating the current page. Accordingly the Ajax handler, written in PHP, is on this page. Note that the handler uses the ``echo`` statement to print out the response which is to be returned to the ``fetch()`` function. It then calls exit to make sure that subsequent content in the file is not processed.

.. code-block:: php
   :caption: GET fetch(). 

    <?php
   
      if(isset($_GET['ajax-get-request'])){
      
      // ajax handler
      $arr = ['information' => 'x, y and z',];
      echo json_encode($arr);
      exit();
   
    }
    
    ?>

.. code-block:: html

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8">
      </head>
      <body>
        <button>Get Information</button>
        <script>
          const button = document.querySelector('button');
          button.addEventListener('click', async function(){
            const response = await fetch(
              './?ajax-get-request=yes'
            );
            console.log(await response.json());
          });
        </script>
      </body>
    </html>

POST
----

Note that in a POST request we need to supply the optional, `options`, argument to ``fetch()``. `options` should be an object with a ``method`` property with a value of ``POST``. `options` also is likely to need ``body`` and ``headers`` properties as shown in the example where the value of ``body`` is the content that needs to be saved on the server and the value of ``headers`` gives the `Content-Type` of the data in the `body`.

.. code-block:: php
   :caption: POST fetch(). 

   <?php

     if($_SERVER['REQUEST_METHOD'] === 'POST'){

       // ajax handler
       echo "{$_POST['person']} has been saved!";
       exit();

     }

   ?>

.. code-block:: html

   <!DOCTYPE html>
   <html lang="en">
     <head>
       <meta charset="UTF-8">
     </head>
     <body>
       <p>Fred
         <button data-person='Fred'>Post Data</button>
       </p>
       <script>
         const button = document.querySelector('button');
         button.addEventListener('click', function(){
           const headers = {
             'Content-Type': 'application/x-www-form-urlencoded'
           };
           const body = new URLSearchParams({
             'person': button.dataset.person
           });
           fetch(
             './',
             {
                 method: 'POST',
                 headers: headers,
                 body: body
             }
           )
             .then((response) => response.text())
             .then((data) => console.log(data));
         });
       </script>
     </body>
   </html>

The response object
-------------------

This is a promise which is returned from fetch. See MDN for details. It has a number of methods for extracting the body of the response. I have used the `response.json()` and `response.text()` methods in the examples above. If your server sends back a JSON string you need to use `response.json()`. If it sends back a string use `response.text()`. Other possibilities are detailed at MDN.

Security
--------

Given that the JavaScript will be visible to the user on their browser they will be able to construct their own requests which could enable them to make changes to the database which are unintended by the programmer. In order to minimize the potential for this users should be logged in unless the page is only granting read access for material which you are happy for anyone to read. Any Ajax handler (the backend script on the server which responds to the Ajax request) which makes changes to the database or delivers sensitive material should not carry out these tasks if the request does not include a session cookie which is used to demonstrate that the user is authenticated. The PHP code for this is shown below:

.. code-block:: php
   :caption: Check user is logged in

   session_start();

   if(empty($_SESSION['user'])){
     echo 'error: not logged in';
     exit();
   }

The JavaScript handling the response from the ``fetch()`` request would then need to act appropriately to the situation which is that a request is being made without authorization. It could be that the user has been logged out due to inactivity for a certain time and so should not be assumed to be malicious. It might be appropriate to redirect them to the login page or perhaps the home page from where they can log in if they want to.

It might be more convenient to deal with an object than a string so I have modified the PHP code above to echo a JSON string generated from an associative array. Then I go on to show how this could be used in the JavaScript to direct the user to the home page if they are not logged in. If they are logged in the script displays the body of the response in the console. In the code below it is possible to simulate a logged in user or a logged out user by commenting appropriate lines of code as indicated. If the user is logged in some sensitive information is displayed in the browser console. If they are not logged in they are redirected to the home page.

.. code-block:: php
   :caption: Respond according to whether user is logged in or out.

   session_start();

   // uncomment to simulate logged in user
   //$_SESSION['user'] = 'fred@gmail.com';

   // uncomment to simulate logged out user
   session_destroy();

   if(isset($_GET['get-data'])){
     if(empty($_SESSION['user'])){

       // response to request if user is not logged in
       $message = ['login-message' => 'not logged in'];
       echo json_encode($message);
       exit();

     }

     // response to request if user is logged in
     $responseToRequest = [
       'property1' => 'one',
       'property2' => 'two'
     ];
     echo json_encode($responseToRequest);
     exit();

   }

.. code-block:: html

   <!DOCTYPE html>
   <html lang="en">
     <head>
       <meta charset="UTF-8">
     </head>
     <body>
       <button>Get Sensitive Data</button>
       <script>
         const button = document.querySelector('button');
         button.addEventListener('click', function(){
           fetch('./?get-data=yes')
             .then((response) => response.json())
             .then(function(data){

               // test if PHP indicates they were logged in
               if(data.hasOwnProperty('login-message')){
                 if(data['login-message'] === 'not logged in'){
                  
                   // redirect to home page with message
                   window.location.href = '../?msg=not-logged-in';

                 }
               }

               // display sensitive date
               console.log(data);

             })
         });
       </script>
     </body>
   </html>
