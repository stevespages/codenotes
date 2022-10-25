JavaScript ES6 Modules
======================

ES6 modules provide a number of useful features. Perhaps the most important of these is the ability to keep your JavaScript in separate scopes. This means you do not have to worry about a variable in your code having the same name as a variable in some other JavaScript code on a given page. This is achieved without the need for namespaces. It is this aspect of ES6 modules that I want to discuss here but it is important to know about the other properties that ES6 modules have and some of these will be considered. The intention of this article is to illustrate some behaviours of ES6 modules in order to make it easier to use them effectively. The article does not attempt to describe how they should be used in production code. There is a section on further reading at the end which may be helpful for that and other information.

In an HTML document, JavaScript is deployed by using the HTML, ``<script>``, element. The JavaScript can be written as the content of the ``<script>`` element or it can be written in a file which is referenced by the ``src`` attribute of the ``<script>`` element. Examples of these two methods are given below but first it is important to point out that in order to make a ``<script>`` element an ES6 module it needs a type attribute with a value of ``module``. So it will look like this: ``<script type='module'>``.

An example of JavaScript written as the content of a ``<script>`` element is: ``<script type='module'> console.log('Hello World'); </script>``

If the JavaScript was written in a file called `main.js` in the same directory as the HTML document that needs to use the JavaScript, it could be used by including this code in the HTML document: ``<script type='module' src='./main.js'></script>``.

ES6 modules behave as if they had the ``defer`` attribute. Normally one would have to write ``<script defer>`` in order to achieve this but ``<script type='module'>`` will behave as if ``defer`` had been specified. The main feature of ``defer`` is that the JavaScript will not run until the HTML code has been loaded. Because ES6 modules have this property it means that it does not matter where, in the HTML, the ``<script>`` tag is placed. It is conventional to put the tags inside the ``<head>`` element. Without the behaviour conferred by ``defer``, it was sometimes necessary to put the ``<script>`` tag at the end of the ``<body>`` section in order to ensure that the HTML was downloaded before the JavaScript tried to access it.

Module Scope
------------

If we create an HTML file, which we will call `index.html`, with two ``<script>`` elements in it which both declare a variable with the same name then we get an error:

.. code-block:: html
   :caption: Figure 1. index.html

   <!DOCTYPE html>
   <html lang="en">
       <head>
           <meta charset="UTF-8">
       </head>
       <body>
           <h1>ES6 Modules</h1>

           <script>
               let myVar = 42;
               console.log('myVar', myVar);
           </script>

   	   <script>
               let myVar = 43;
               console.log('myVar', myVar);
           </script>

       </body>
   </html>

When this code is run in a browser with developer tools open we get the following displayed in the console:

.. code-block:: console
   :caption: Figure 2. browser console output

   myVar 42
   Uncaught SyntaxError: redeclaration of let myVar

If we now convert the code in one of the ``<script>`` elements into an ES6 module by adding the ``type='module'`` attribute to it, there will be no error in the console when `index.html` is run although in the visual studio code editor there is a warning (`Cannot redeclare block-scoped variable 'myVar'`).

.. code-block:: html
   :caption: Figure 3. index.html

   <!DOCTYPE html>
   <html lang="en">
       <head>
           <meta charset="UTF-8">
       </head>
       <body>
           <h1>ES6 Modules</h1>

           <script>
               let myVar = 42;
               console.log('myVar', myVar);
           </script>

           <!-- ES6 Module -->
   	   <script type='module'>
               let myVar = 43;
               console.log('myVar', myVar);
   	   </script>
   
       </body>
   </html>

In the example above we have the variable ``myVar`` in global scope with a value of 42 and we also have the variable ``myVar`` in a module scope with a value of 43. We could add as many ES6 modules as we liked and declare a ``myVar`` variable in all of them without error as they would all be in their own scope. The output in the browser console when `index.html` is run is shown in figure 4.

.. code-block:: console
   :caption: Figure 4. browser console output

   myVar 42
   myVar 43

Import and Export
-----------------

One of the most useful features of ES6 modules is that code can be exported from one module and imported into another one. However, this can not be done when JavaScript is written as the content of ``<script>`` elements as in the examples above. In order to use the import and export statements we need to create a file with JavaScript in it and use the ``src`` attribute of the ``<script>`` element to reference it.

The next example puts the ES6 module ``<script>`` element inside the ``<head>`` element and moves the content of the element into a file called `main.js` which it references using the ``src`` attribute.

.. code-block:: html
   :caption: Figure 5. index.html

   <!DOCTYPE html>
   <html lang="en">
       <head>
           <meta charset="UTF-8">

           <!-- ES6 Module -->
           <script type='module' src='./main.js'></script>

       </head>
       <body>
           <h1>ES6 Modules</h1>

           <script>
               let myVar = 42;
               console.log('myVar', myVar);
           </script>

       </body>
   </html>

.. code-block:: javascript
   :caption: Figure 6. main.js

   let myVar = 43;
   console.log('myVar', myVar);

This situation is equivalent to that shown in figure 3 and like that does not generate an error in the console giving the same output as shown in figure x. Also, no warnings are shown in visual studio code. The previous method is certainly not recommended but is useful to consider.

Now we can create another JavaScript file and export a variable from it and import it into `main.js`. We will call the new file `utilities.js` and we will declare a variable called ``utilityVar`` in it. The declaration is followed by the ``export`` statement. Then we use the ``import`` statement inside `main.js` to import ``utilityVar``. Finally, in `main.js` we will ``console.log()`` the ``utilityVar`` and ``myVar`` variables:

.. code-block:: javascript
   :caption: Figure 7. utilities.js

   let utilityVar = 'u';
   export { utilityVar };

.. code-block:: javascript
   :caption: Figure 8. main.js

   import { utilityVar } from './utilities.js'
   let myVar = 43;
   console.log('utilityVar', utilityVar);
   console.log('myVar', myVar);

There is no need to change `index.html`, which remains as it was in figure 5. When we now access `index.html` from the browser we get the result shown in figure 9.

.. code-block:: console
   :caption: Figure 9. browser console output

   myVar 42
   utilityVar u
   myVar 43

Module Scopes versus Modules
----------------------------

In `main.js` the variable ``myVar`` is declared and assigned a value of 43. We can declare a variable also called ``myVar`` in `utilities.js` and export it so long as we do not import it into `main.js`. We could import it into another file, say `main2.js`. If ``main2.js`` was the entry point for another ES6 module ``<script>`` element in `index.html` then we could have two ``myVar`` variables operating in our `index.html` in different `module scopes` as well as the ``myVar`` variable in global scope. In this case the same module, `utilities.js`, would be contributing code to two separate `module scopes`. The contents of these files is shown below:

.. code-block:: html
   :caption: Figure 10. index.html

   <!DOCTYPE html>
   <html lang="en">
       <head>
           <meta charset="UTF-8">

           <script type='module' src='./main.js'></script>

           <script type='module' src='./main2.js'></script>

       </head>
       <body>
           <h1>ES6 Modules</h1>

           <script>
               let myVar = 42;
               console.log('myVar', myVar);
           </script>

       </body>
   </html>

.. code-block:: javascript
   :caption: Figure 11. utilities.js

   let utilityVar = 'u';
   let myVar = 45;
   export { utilityVar, myVar };

.. code-block:: javascript
   :caption: Figure 12. main.js
   
   import { utilityVar } from './utilities.js';
   let myVar = 43;
   console.log('utilityVar', utilityVar);
   console.log(myVar);
 
.. code-block:: javascript
   :caption: Figure 13. main2.js

   import { myVar } from './utilities.js';
   console.log('myVar', myVar);

When we run `index.html` in a browser the output to the developer tools console is shown in figure 14.

.. code-block:: console
   :caption: Figure 14. browser console output
  
   myVar 42
   utilityVar u
   myVar 43 
   myVar 45

This shows that we can have the same variable name with different values because they are in different module scopes and one is in global scope. We can also see that the `utilities.js` file declares and assigns two different variables (``utilityVar`` and ``myVar``) which end up in different module scopes because one of the variables is imported into `main.js` and the other into `main2.js`. These two files are the entry points for two different ES6 module ``<script>`` elements and hence go into separate scopes. The `utilities.js` file is considered to be a module but its contents can contribute to more than one module scope.

I would like to stress that this is not a guide to how ES6 modules should be used but it is an effort to try and illustrate how they behave which should make it easier to use them effectively.

Further Reading
---------------

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Modules

https://hacks.mozilla.org/2018/03/es-modules-a-cartoon-deep-dive/

