<?php

// defineでは名前空間には登録されない。
// if(!defined('TAX_RATE')) {
//     define('TAX_RATE', 0.1);
// }
require_once 'lib.php';
use function lib\with_tax;
use const lib\sub\TAX_RATE;
$price = with_tax(1000, 0.08);
echo $price;
echo '<br>';
echo TAX_RATE;

function my_echo() {
}
\my_echo();
class Globalclass {

}