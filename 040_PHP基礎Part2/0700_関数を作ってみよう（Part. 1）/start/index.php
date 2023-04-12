<?php
$num = [1, 2, 3, 4];
$num_2 = [1, 2, 3];

function sum($nums)
{
  $sum = 0;
  foreach ($nums as $v_num) {
    $sum += $v_num;
    echo "<div>{$sum}</div>";
  }
  // echo "合計は{$sum}";
  return $sum;
}
$result = sum($num);
echo "合計は{$result}";
// echo "合計は{$sum}";
// sum($num);
// sum($num_2);


// $sum = 0;
// foreach ($num as $v_num) {
//   // $sum = $sum + $v_num;
//   $sum += $v_num;
//   echo "<div>{$sum}</div>";
// }
// echo "合計は{$sum}";

// $sum_2 = 0;
// foreach ($num_2 as $v_num) {
//   // $sum = $sum + $v_num;
//   $sum_2 += $v_num;
//   echo "<div>{$sum_2}</div>";
// }
// echo "合計は{$sum_2}";
