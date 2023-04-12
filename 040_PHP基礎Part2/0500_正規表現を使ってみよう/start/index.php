<?php
//正規表現
// * よく使う表現
//  * . 任意の一文字
//  * * 0回以上の繰り返し
//  * + 1回以上の繰り返し
//  * {n} n回の繰り返し
//  * [] 文字クラスの作成
//  * [abc] aまたはbまたはc
//  * [^abc] aまたはbまたはc以外
//  * [0-9] 0~9まで
//  * [a-z] a~zまで
//  * $ 終端一致
//  * ^ 先頭一致
//  * \w 半角英数字とアンダースコア
//  * \d 数値
//  * \ エスケープ
//  * () 文字列の抜き出し
//  */
// $char = '<h2>ZAabd12_sscc</h2>';
$char = 'a';
// if (preg_match("/.{2,}/i", $char, $result)) {
//   echo '検索成功';
//   print_r($result);
// } else {
//   echo '検索失敗';
// }
// if (preg_match("/<h2>(.){0,})<\/h2>/i", $char, $result)) {
//   echo '検索成功';
//   print_r($result);
// } else {
//   echo '検索失敗';
// }
if (preg_match("/.+/i", $char, $result)) {
  echo '検索成功';
  print_r($result);
} else {
  echo '検索失敗';
}
