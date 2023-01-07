Asynchronous Code
=================

Much of the time we expect each line of our code to execute before the next line. However many useful behaviours take a significant amount of time to happen and are designed to run asynchronously. That is they start and continue to happen but, before they complete, the execution of code moves on to the next line of code. This means we have to be careful that subsequent lines of code do not need the asynchronous code to have completed before they run. If this is the case we have to restructure our code so that the lines of code that depend on the asynchronous code only run when the asynchronous code has completed.

Simple Example
--------------

Let us take a simple example of some HTML and some JavaScript that acts on it. In the example shown in figure 1 we have two paragraphs and some JavaScript that adds exclamation marks to the end of the paragraphs.

.. code-block:: html
   :caption: Figure 1. index.html

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
   </head>
   <body>
       <p>First paragraph</p>
       <p>Second paragraph</p>
       <script>

           // code to add exclamation marks
           const ps = document.querySelectorAll('p');
           ps.forEach(function(p){
               p.innerHTML += '!';
           })

       </script>
   </body>
   </html>

When we run this in a browser we see that an exclamation mark is added to the end of each paragraph as shown in figure 2.

.. code-block:: console
   :caption: Figure 2. output

   First paragraph!
   Second paragraph!

If we removed the second paragraph from the HTML and created it using JavaScript we would still get the same result. This is shown in figure 3 (only the content of the ``<body>`` element is shown):

.. code-block:: html
   :caption: Figure 3 index.html

   <p>First paragraph</p>
   <script>

      // code to create paragraph
      const p2 = document.createElement('p');
      p2.innerHTML = 'Second Paragraph';
      document.body.append(p2);

      // code to add exclamation marks
      const ps = document.querySelectorAll('p');
      ps.forEach(function(p){
          p.innerHTML += '!';
      })

   </script>

This works because the JavaScript code that creates the paragraph runs synchronously. That is it completes before the next line of code (``const ps = document.querySelectorAll('p');``) runs.

Now we will see what happens when we put the code to create a paragraph in the ``setTimeout()`` function which runs the code inside it asynchronously. The code that setTimeout() runs is the first argument to ``setTimeout()``. The second argument is the length of time in microseconds that ``setTimeout()`` waits before running the code. The new code is shown if figure 4.

.. code-block:: html
   :caption: Figure 4 index.html

   <p>First paragraph</p>
   <script>
      setTimeout(() => {

          // code to create paragraph
          const p2 = document.createElement('p');
          p2.innerHTML = 'Second Paragraph';
          document.body.append(p2);

      }, "1000");

      // code to add exclamation marks
      const ps = document.querySelectorAll('p');
      ps.forEach(function(p){
          p.innerHTML += '!';
      });
 
   </script>

When we run the code in figure 4 the first paragraph appears immediately and it has an exclamation mark. The second paragraph appears after a delay of one second and it does not have an exclamation mark. That is because the code to add exclamation marks ran before the second paragraph had been created.

We need to make the code add exclamation marks both to paragraphs that are hard coded in the HTML and to paragraphs that are created within asynchronous functions such as ``setTimeout()`` and of course functions that make Ajax requests and other useful things. In order to do this we need to move the code to add exclamation marks inside the asynchronous function after that function has created the paragraph. Figure 5 shows this.

.. code-block:: html
   :caption: Figure 5 index.html

   <p>First paragraph</p>
   <script>
      setTimeout(() => {

          // code to create paragraph
          const p2 = document.createElement('p');
          p2.innerHTML = 'Second Paragraph';
          document.body.append(p2);

          // code to add exclamation marks
          const ps = document.querySelectorAll('p');
          ps.forEach(function(p){
              p.innerHTML += '!';
          });


      }, "1000");

   </script>

The result of running the code in figure 5 is that we get an exclamation mark after both paragraphs as was shown in figure 2.

It should be noted that, although the code to add exclamation marks is run after the code to create a paragraph, it still modifies the paragraphs which were hardcoded into the HTML. Care has to be taken with code which runs in different contexts, for example on elements made before and during the execution of an asynchronous function, so that it operates as intended in both contexts.

`ES6 Modules <./es6modules.html>`_
----------------------------------

We could put the code for creating a paragraph in a module called `main.js` in the same directory as `index.html`  and reference this with the ``src`` attribute. Our code for adding exclamation marks could go into a module called `exclamation-marks.js` also in the same directory. Figures 6, 7 and 8 show these three files.

.. code-block:: html
   :caption: Figure 6. index.html

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <script type='module' src='./main.js'></script>
   </head>
   <body>
       <p>First paragraph</p>
   </body>
   </html>

.. code-block:: javascript
   :caption: Figure 7. main.js

   import { addExclamationMarks } from './exclamation-marks.js';
   setTimeout(() => {

       // code to create paragraph
       const p2 = document.createElement('p');
       p2.innerHTML = 'Second Paragraph';
       document.body.append(p2);

       addExclamationMarks();
   }, "1000");

.. code-block:: javascript
   :caption: Figure 8. exclamation-marks.js

   function addExclamationMarks(){
       
       // code to add exclamation marks
       const ps = document.querySelectorAll('p');
       ps.forEach(function(p){
           p.innerHTML += '!';
       });
   
   }
   export { addExclamationMarks }

The output from running `index.html` in this situation is the same as in figure 2. The first paragraph is hardcoded. The second is created asynchronously using setTimeout() and then ``addExclamationMarks()`` is also run from the asynchronous ``setTimeout`` function. The ``addExclamationMarks`` function acts on the hardcoded first paragraph as well as the second paragraph that was generated in the same ``setTimeout`` function it was in itself.

