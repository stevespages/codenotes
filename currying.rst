Currying
========

We can make a function which takes a parameter and returns a function which uses that parameter in its body. Here a function which takes a parameter, x, returns a function which returns x.

.. code-block:: javascript
   :caption: A function that returns a function

   const func = x => () => x;

   console.log(func('hello')); // [Function]

   console.log(func('hello')()); // 'hello'

If we have a function which takes 2 numbers as arguments and adds them together, we could convert this into a function which takes 1 argument and returns a function which takes 1 argument and adds it to the argument taken by the first function. In the code below we build up to this in two steps. In the first step we simply have an argument that takes a parameter and then returns the parameter. In the second step we have an argument that takes a parameter, b, and then returns a function which takes a parameter, a, and adds a and b together. We then extend this process to make a function which can be called with three arguments, a, b, and c, successively. The last invocation returns the result of adding a, b and c together.

.. code-block:: javascript
   :caption: Building up to a currying function

   const add1N = a => a;
   
   const add2N = b => a => a + b;
   
   const add3N = c => b => a => a + b + c; 
   
   console.log(add1N(2)); // 2
   
   console.log(add2N(2)(3)); // 5
   
   console.log(add3N(2)(3)(4)); // 9

Note that, strictly speaking, we are not invoking the same function three times. We invoke the function once, say ``add3N(2)``. This returns a function which we could denote as `add3N(2)`. We then invoke this function: ``add3N(2)(3)``. This returns a function which we could denote as `add3N(2)(3)`. We then invoke this function ``add3N(2)(3)(4)``. This returns the sum of 2, 3, and 4 which is 9.
