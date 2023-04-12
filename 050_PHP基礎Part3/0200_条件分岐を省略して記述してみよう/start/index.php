<?php
// const TAX_RATE = 0.1;
if (!defined('TAX_RATE')) { // if文の中では、constではなく、defineを使用。
  define('TAX_RATE', 0.1);
}
function with_tax($base_price, $tax_rate = GlobalTAX_RATE) {
  $sum_price = $base_price + ($base_price * $tax_rate);
  $sum_price = round($sum_price);
  return $sum_price;
}
$price = with_tax(1000, 0.08);
echo $price;