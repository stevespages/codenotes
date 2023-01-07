Debounce
========

.. code-block:: html
   :caption: HTML for debounce demo

   <input type="text"></input>

.. code-block:: javascript
   :caption: My debounce function

  
   function processContent(content){
     processContentTime = Date.now();
     console.log(content)
   }
   
   function debounce(content, callback){
     if(
       Date.now() - processContentTime > 800 &&
       Date.now() - processContentTime < 2000
     ){
       clearTimeout(timeoutId);
       callback(content);
       return;
     }
     clearTimeout(timeoutId);
     timeoutId = setTimeout(callback, 400, content);
   }
   
   let timeoutId = '';
   let processContentTime = Date.now();

   const input = document.querySelector('input');
   
   input.addEventListener('input', function(event){
     debounce(event.target.value, processContent);
   });
   
