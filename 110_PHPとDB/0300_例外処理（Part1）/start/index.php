<?php
/**
 * 例外処理とは
 */
try {
  new PDO('', '', '');
  $bool = false;
  $bool->method();
  echo '例外処理が最後まで実行されました。<br>';
} catch (PDOException $e) {
  echo '例外処置が実行されました。<br>';
  echo $e->getMessage();
} catch (Error $e) {
    echo '例外処置が実行されました。<br>';
    echo $e->getMessage();
} finally {
  echo '終了処理が実行されました。<br>';
}