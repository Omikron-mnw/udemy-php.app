<?php
namespace lib;

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
?>