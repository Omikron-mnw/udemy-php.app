function hello(name) {
  console.log('hello ' + name());
}

function get_name() {
  return 'Code'
}

hello(get_name);

hello(function() {
  return 'Code';
});

hello(() =>  'Code');

function do_something(a, b, callback) {
  const result = callback(a, b);
  console.log(result);
}

function multiply(a, b) {
  return a * b;
}

function plus(a, b) {
  return a + b;
}

do_something(2, 2, multiply);

do_something(2, 3, plus);