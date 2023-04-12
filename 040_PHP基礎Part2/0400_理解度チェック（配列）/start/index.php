<?php

/**
 * 商品名 => [価格, 在庫数]
 */
$products = [
    'table' => [1000, 2],
    'chair' => [500, 4],
    'bed' => [10000, 1],
    'light' => [5000, 1]
];
var_dump($products);

/**
 * 問１：商品一覧
 * 
 * 商品一覧
 * tableは1000円で2個存在します。
 * chairは500円で4個存在します。
 * bedは10000円で2個存在します。
 * lightは5000円で1個存在します。
 */
echo '<div>商品一覧</div>';
foreach ($products as $key => $val) {
    $p_name = $key;
    $p_name = $val[0];
    $p_num = $val[1];
    echo '<br>' . "{$p_name}は{$p_name}円で{$p_num}個存在します。" . '</br>';
}

/**
 * 問２：商品購入
 * 
 * $cartの品物を買いたいと想定して、
 * $productsの在庫数が足りている場合、足りていない場合で
 * 以下のように画面に表示してください。
 * 
 * 商品購入
 * tableを1個ください。
 * はい。ありがとうございます。 <- 足りている場合
 * bedを2個ください。
 * すいません。bedは1個しかありません。 <- 足りていない場合
 */

// 購入希望 商品数
$cart = [
    'table' => 1,
    'bed' => 2,
];
echo '<div>商品購入</div>';
foreach ($cart as $c_key => $c_val) {
    echo "<div>{$c_key}を{$c_val}個ください。</div>";
    $p_num = $products[$c_key][1];
    if ($c_val < $p_num) {
        echo '<br>' . 'はい、ありがとうございます。' . '</br>';
    } else {
        echo '<br>' . "すみません。{$c_key}は{$p_num}しかありません。" . '</br>';
    }
}
