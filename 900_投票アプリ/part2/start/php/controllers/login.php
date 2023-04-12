<?php 
namespace controller\login;

use lib\Auth;
use lib\Msg;
use model\UserModel;
use Throwable;

function get() {
  require_once SOURCE_BASE . 'views/login.php';
}


function post() {

  try {
    $id = get_param('id', '');
    $pwd = get_param('pwd', '');

    Msg::push(Msg::DEBUG, 'デバッグメッセージです。');

    if (Auth::login($id, $pwd)) {

      $user = UserModel::getSession();
      Msg::push(Msg::INFO, "{$user->nikname}さん、ようこそ。");
      redirect(GO_HOME);

    } else {
      redirect(GO_REFERER);
    }
  } catch (Throwable $e) {

    redirect(GO_REFERER);

  }

}
?>