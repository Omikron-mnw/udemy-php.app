function print_type_and_value(val) {
  console.log(typeof val, val)
}

let a = 0;
print_type_and_value(a);

let b = '1' + a;
// let b = parseInt('1') + a;
print_type_and_value(b);

let c= 15 - b;
print_type_and_value(c);

let d = c - null;
print_type_and_value(d);

let e = d - true;
print_type_and_value(e);