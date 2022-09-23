JS Snippets
===========

In-place
--------

This is some code which removes consequtive duplicates from an array.

.. code-block:: javascript

        function removeDuplicates(a) {

          let i = 0;
          for (j = 1; j < a.length; j++) {
              if (a[i] != a[j]) {
                  i++;
                  a[i] = a[j];
              }
          }

          return i + 1;

        }

How does this work? Say we want to remove duplicates from an array such as ``[0, 1, 1, 2]``. The code above steps through the following.

+-------+-------+---+---+----------------+---------+
| step  |       | i | j | (a[i] != a[j]) | 0,1,1,2 |
+=======+=======+===+===+================+=========+
|       | start | 0 | 1 | 0 != 1 > true  | 0,1,1,2 |
|   1   +-------+---+---+----------------+---------+
|       |  end  | 1 | 1 |  a[1] = a[1]   | 0,1,1,2 |
+-------+-------+---+---+----------------+---------+
|       | start | 1 | 2 | 1 != 1 > false | 0,1,1,2 |
|   2   +-------+---+---+----------------+---------+
|       |  end  | 1 | 2 |    no action   | 0,1,1,2 |
+-------+-------+---+---+----------------+---------+
|       | start | 1 | 3 | 1 != 2 > true  | 0,1,1,2 |
|   3   +-------+---+---+----------------+---------+
|       |  end  | 2 | 3 |  a[2] = a[3]   | 0,1,2,2 |
+-------+-------+---+---+----------------+---------+
|       | start | 2 | 4 | 2 != - > true  | 0,1,2,2 |
|   4   +-------+---+---+----------------+---------+
|       |  end  | 3 | 4 |  a[3] = a[4]   | 0,1,2   |
+-------+-------+---+---+----------------+---------+

*step 1* does seem to be pointles as the original array has the element at index position 1 set to equal the (same!) element at index position 1. Obviously this results in no change to the original array.

*step 2* also results in no change. This time the condition in the if clause is not met and so ``i`` is not incremented and also no change is made to the array.

*step 3* is the first step which results in a change to the array. The if clause evaluates to true so ``i`` is incremented by 1 and ``a[2]`` (1) is set equal to ``a[3]`` (2). So, now the array is ``[0,1,2,2]``.

*step 4* results in the last element in the array being deleted. The if clause evaluates to true so ``i`` is incremented by 1 to equal 3  and then ``a[3]`` is set equal to ``a[4]``. However, ``a[4]`` does not exist. So, the effect of setting ``a[3]`` to a non existant element is that ``a[3]`` now ceases to exist ie. ``a[3]``, the last element in the array, is removed from the array. 

*return value* There are no more steps as the condition ``j < a.length`` is no longer true. The value of ``i +1`` (4) .
