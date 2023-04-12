<?php
$array = [
  ['table', 1000],
  ['chair', 100],
  ['chair', 100],
  ['chair', 100],
  ['bed', 10000],
];

foreach ($array as $val) {
  echo '<br>';
  print_r($val);
  echo '</br>';
}

$array[1][1] = 500;
// array_shift($array);
// array_pop($array);
array_splice($array, 2, 2, ['replace']);
// unset($array[0]);

foreach ($array as $val) {
  echo '<br>';
  print_r($val);
  echo '</br>';
}
foreach ($array as $val) {
  echo '<br>';
  echo "{$val[0]}は{$val[1]}円です。";
  echo '</br>';
}
