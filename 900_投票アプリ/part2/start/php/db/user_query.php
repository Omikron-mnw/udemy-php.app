<?php 
namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery {

  public static function fetchByuId($id) {

    $db = new DataSource;
    $sql = "SELECT * FROM pollapp.users WHERE id = :id;";

    $result = $db->selectOne($sql, [
      ':id' => $id
    ], DataSource::CLS, UserModel::class);

    return $result;
  }

  public static function insert($user) {

    $db = new DataSource;
    $sql = "INSERT INTO users(id, pwd, nickname) VALUES (:id, :pwd, :nickname)";

    $user->pwd = password_hash($user->pwd, PASSWORD_BCRYPT);

    return $db->execute($sql, [
      ':id' => $user->id,
      ':pwd' => $user->pwd,
      ':nickname' => $user->nickname
    ]);;
  }
}
?>