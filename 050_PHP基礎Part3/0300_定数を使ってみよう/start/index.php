<?php
$array = [
  'num' => 0
];

require('file1.php'); //requireはfileがなかったら、その後の処理は実行されない。
// require('file1.php');
// require('file1.php');
include('file,php'); //includeはfileがなくても、その後の処理に通る。
// require_once('file2.php');
// fn1();
echo $array['num'];