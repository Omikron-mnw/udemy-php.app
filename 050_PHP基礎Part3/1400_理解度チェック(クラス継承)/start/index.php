<?php

use MyFileWriter as GlobalMyFileWriter;

/**
 * 理解度チェック（クラス継承）
 * 
 * MyFileWriterを継承してログをファイルに書き込む
 * LogWriterクラスを作成してみてください。
 * 
 * LogWriterクラスではformatメソッドにより
 * 出力したい文字列に時間を設定できるものとします。
 * 
 * 例）
 * 2021/04/04 23:02:59 これはログです。
 * 
 * ヒント）
 * MyFileWriterのメソッドも一部変更する
 * 必要があります。
 */
class MyFileWriter {
    protected $filename;
    protected $content = '';
    public const APPEND = FILE_APPEND;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    function append($content)
    {
        $this->content .= $this->format($content);
        return $this;
    }

    protected function format($content)
    {
        return $content;
    }

    function newline()
    {
        $this->content .= PHP_EOL;
        return $this;
    }


    function commit($flag = null)
    {
        file_put_contents($this->filename, $this->content, $flag);
        $this->content = '';
        return $this;
    }
}

/*
ヒント）
文字列のフォーマット
*/
// $info_msg = 'これはログです。';
// $error_msg = 'これはエラーログです。';

class Logwriter extends MyFileWriter {

    // public $time_str;
    // public $info_msg;
    // public $error_msg;

    // function __construct($time_str, $info_msg, $error_msg) {
    //     $this->time_str = $time_str;
    //     $this->info_msg = $info_msg;
    //     $this->error_msg = $error_msg;
    // }

    protected function format($content) {
        $time_str = date('Y/m/d H:i:s');
        return sprintf('%s %s', $time_str, $content);
    }
}

$time_str = date('Y/m/d H:i:s');

$info = new LogWriter('info.log');
$error = new LogWriter('error.log');

$info->append('これは通常ログです。')
    ->newline()
    ->commit(LogWriter::APPEND);

$error->append('これはエラーログです。')
    ->newline()
    ->commit(LogWriter::APPEND);
?>