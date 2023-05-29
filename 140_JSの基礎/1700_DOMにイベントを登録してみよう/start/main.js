const btn = document.querySelector('#btn');
const h1 = document.querySelector('h1');
// btn.addEventListener('click', function() {
//   alert('hello');
// });

// OR

// const hello = function() {
//   alert('hello');
// }
// btn.addEventListener('click', hello);

// OR

function hello() {
  alert('hello');
}
function changeColor() {
  h1.style.color = 'red';
}
function changeBgColor() {
  h1.style.backgroundColor = 'green';
}
// btn.addEventListener('click', hello);
btn.addEventListener('click', changeColor);
btn.addEventListener('click', changeBgColor);
btn.removeEventListener('click', changeBgColor);
