<?php
$array = ['taro', 'hanako', 'jro'];
var_dump($array);
echo $array[1];
$array[1] = 'sachiko';
$array[] = 'saburo';
var_dump($array);

for ($i = 0; $i < count($array); $i++) {
  echo '<div>', $array[$i], '</div>';
}

foreach ($array as $i => $v) {
  echo '<div>', $i, $v, '</div>';
}
