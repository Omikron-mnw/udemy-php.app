function a(name) {
  return 'hello ' + name;
}
// const b = function(name) {
//   return 'hello' + name;
// }
// const b = name => 'hello ' + name;
const b = (name, name1) => 'hello ' + name;
console.log(b('Tom'));