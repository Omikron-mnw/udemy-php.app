<?php
/**
 * 理解度チェック（クラス）
 * 
 * ファイル書き込みを行うためのクラスを定義してみましょう。
 * 
 * ヒント）PHP_EOL: 改行するための特殊な定数です。
 */
class MyFileWriter {
    public $filename;
    public $content;
    public const APPEND = FILE_APPEND;

    function __construct($filename, $content) {
        $this->filename = $filename;
        $this->content = '';
    }

    function append($content) {
      // $this->content .= $content;
      // return $this;
        return $this->append(PHP_EOL);
    }

    function newline() {
        $this->content .= PHP_EOL;
        return $this;
    }

    function commit($flg = null) {
        file_put_contents($this->filename, $this->content, $flg);
        $content = '';
        return $this;
    }
}

$content = 'Hello, Bob.'; // append
$content .= PHP_EOL; // newline
$content .= 'Bye, '; // append
$content .= 'Bob.'; // append
$content .= PHP_EOL; // newline

// commit
file_put_contents('sample.txt', $content);
$content = '';

$content = 'Good night, Bob.'; // append

// commit
file_put_contents('sample.txt', $content, FILE_APPEND);
$content = '';

/* クラスの呼び出し方は以下のようにするものとします。*/

// require_once('MyFileWriter.php');

// use lib\MyFileWriter;

$file = new MyFileWriter('sample.txt');
$file->append('Hello, Bob.')
    ->newline()
    ->append('Bye, ')
    ->append('Bob.')
    ->newline()
    ->commit()
    ->append('Good night, Bob.')
    ->commit(MyFileWriter::APPEND);


