<?php
// 正規表現を使って形式が正しいかチェックしてみよう。
/**
 * よく使う表現
 * . 任意の一文字
 * * 0回以上の繰り返し
 * + 1回以上の繰り返し
 * {n} n回の繰り返し
 * [] 文字クラスの作成
 * [abc] aまたはbまたはc
 * [^abc] aまたはbまたはc以外
 * [0-9] 0~9まで
 * [a-z] a~zまで
 * $ 終端一致
 * ^ 先頭一致
 * \w 半角英数字とアンダースコア
 * \d 数値
 * \ エスケープ
 */


/**
 * 郵便番号
 * 
 * 001-0012 -> OK
 * 001-001 -> NG
 * 2.2-3042 -> NG
 * wd3-2132 -> NG
 * 124-56789 -> NG
 */
$post = array(
  "001-0012",
  "001-001",
  "2.2-3042",
  "wd3-2132",
  "124-56789"
);
$pattern_post = "/^\d{3}-\d{4}$/";
foreach ($post as $post_val) {
  if (preg_match($pattern_post, $post_val)) {
    echo "<br>{$post_val}->OK</br>";
  } else {
    echo "<br>{$post_val}->NG</br>";
  }
}

/**
 * Email
 * . _ - と半角英数字が可能
 * 
 * example000@gmail.com -> OK
 * example-0.00@gmail.com -> OK
 * example-0.00@ex.co.jp -> OK
 * example/0.00@ex.co.jp -> NG
 */
$mail = array(
  'example000@gmail.com',
  'example-0.00@gmail.com',
  'example-0.00@ex.co.jp',
  'example/0.00@ex.co.jp'
);
// $pattern_mail = "/^[0-9a-zA-Z]*[\w.\-]+[0-9a-zA-Z]*@[a-zA-Z]*.[a-zA-Z]*.*[a-zA-Z]$/";
$pattern_mail = "/^[\w.\-]+@[\w\-]+\.[\w\.\-]+$/";
foreach ($mail as $m_val) {
  if (preg_match($pattern_mail, $m_val)) {
    echo "<br>{$m_val} -> OK</br>";
  } else {
    echo "<br>{$m_val} -> NG</br>";
  }
}

/**
 * HTML
 * 見出しタグ(h1~h6)の中身のみ取得してみよう。
 */

$html = "<!DOCTYPE html>

<html>

<head>

    <title>Document</title>

</head>

<body>

    <h1>見出し１</h1>   

    <h2>見出し２</h2>   

    <h3>見出し３</h3>   

    <header>ヘッダー</header>

</body>

</html>";
// $h_tag = array(
//   "<h1>h1</h1>",
//   "<h2>h2</h2>",
//   "<h3>h3</h3>",
//   "<h4>h4</h4>",
//   "<h5>h5</h5>",
//   "<h6>h6</h6>"
// );
$pattern_h_tag = "/<h[1-6]>(.+)<\/h[1-6]>/";
if (preg_match_all($pattern_h_tag, $html, $result)) {
  print_r($result);
  echo '<br>';
  print_r($result[count($result) - 1]);
}
