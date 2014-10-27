// underscore-pickrandom.js
// (c) 2012 Simon Kågedal Reimer
// This file is freely distributable under the MIT license.

// _.pickRandom - a mixin for underscore.js. 
//
// Pick random elements from an array. Works similar to 
// `_.first(_.shuffle(array, n))`, but is more efficient -- operates 
// in time proportional to `n` rather than the length of the whole 
// array. 
//
// If the argument `n` is given, an array is returned.
// If no `n` is specified, only the one element is returned. This also
// happens if three or more arguments are specified -- this is so that
// _.map(array, _.pickRandom) will work as expected. This behavior is
// similar to other underscore functions, such as `_.first`. 
//
// The algorithms mutates the input array while working, but restores 
// everything before returning. This provides for an optimally
// efficient algorithm in all situations.  

_.mixin({
  pickRandom: function(array, n, guard) {
    if (n == null  || guard)
       return array[Math.floor(Math.random() * array.length)];

    n = Math.max(0, Math.min(array.length, n));

    return (function pickR(array, n, length) {
      var i, picked, rest, hasIndex;

      if (n === 0) return [];

      i = Math.floor(Math.random() * length);
      hasIndex = array.hasOwnProperty(i);	// This is needed for restoration of dense arrays
      picked = array[i];
      array[i] = array[length - 1];
      rest = pickR(array, n - 1, length - 1);
      // Restore array
      if (hasIndex) {
        array[i] = picked;
       } else {
        delete array[i];
      }
      rest.push(picked);
      return rest;
    }) (array, n, array.length);
  }
});

// Unit test for pickRandom. Put this code somewhere in your unit testing framework, if you want. 
// Also see https://gist.github.com/1701014 for a speed test and a test to see if the pickRandom
// algorithm is fair. 

function pickRandom_qunit() { 
  test("arrays: pickRandom", function() {
    var arr = [1,2,3,4,5];
    equals(_.pickRandom([1]), 1, 'can pick a single element correctly');
    equals(_([1]).pickRandom(), 1, 'can perform OO-style "pickRandom()"');
    var pick = _.pickRandom(arr, 3);
    equals(pick.length, 3, 'picks the right number of elements');
    ok(_.all(pick, function (e) { return _.indexOf(arr, e) != -1; }), 'all picks are from array');
    pick.sort();
    equals(pick.join(","), _.uniq(pick, true).join(","), 'picks unique elements');
    var result = _.pickRandom(arr, 5);
    result.sort();
    equals(result.join(","), '1,2,3,4,5', 'picks all elements correctly');
    var a = _.range(20);
    var b = _.clone(a);
    _.pickRandom(a, 5);
    ok(_.isEqual(a, b), 'does not corrupt a sparse array');
    a = new Array(20);
    a[4] = "x";
    b = _.clone(a);
    _.pickRandom(a, 5);
    ok(_.isEqual(a, b), 'does not corrupt a dense array');
    result = (function(){ return _.pickRandom(arguments, 5); })(1, 2, 3, 4, 5);
    result.sort();
    equals(result.join(","), '1,2,3,4,5', 'works on an arguments object');
    equals(_.map([[1],[2]], _.pickRandom).join(","), '1,2', 'works well with _.map');
  });
} 



