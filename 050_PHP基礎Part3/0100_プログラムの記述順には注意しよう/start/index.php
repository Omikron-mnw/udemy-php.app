<?php
function counter($step = 1) {
    global $num;
    $num += $step;
    echo $num;
    return $num;
}
$num = 0;
counter(2);
counter(2);