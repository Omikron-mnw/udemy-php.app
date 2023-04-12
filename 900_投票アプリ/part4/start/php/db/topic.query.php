<?php 
namespace db;

use db\DataSource;
use model\TopicModel;

class TopicQuery {
    public static function fetchByUserId($user) {

        if(!$user->isValidId()) {
            return false;
        }

        $db = new DataSource;
        $sql = 'select * from topics where user_id = :id and del_flg != 1 order by id desc;';

        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, TopicModel::class);

        return $result;

    }


    public static function fetchPublishedTopics() {

        $db = new DataSource;
        $sql = '
        select 
            t.*, u.nickname 
        from topics t 
        inner join users u 
            on t.user_id = u.id 
        where t.del_flg != 1
            and u.del_flg != 1
            and t.published = 1
        order by t.id desc
        ';

        $result = $db->select($sql, [], DataSource::CLS, TopicModel::class);

        return $result;

    }

    public static function fetchById($topic) {

        if(!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        select 
            t.*, u.nickname 
        from topics t 
        inner join users u 
            on t.user_id = u.id 
        where t.id = :id
            and t.del_flg != 1
            and u.del_flg != 1
        order by t.id desc
        ';

        $result = $db->selectOne($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, TopicModel::class);

        return $result;

    }

    public static function incrementViewCount($topic) {
        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource;

        $sql = 'update topics set views = views + 1 where id = :id;';

        return $db->execute($sql, [
            ':id' => $topic->id
        ]);
    }

    public static function isUserOwnTopic($topic_id, $user) {

        if(!(TopicModel::validateId($topic_id) && $user->isValidId())) {
            return false;
        }

        $db = new DataSource;
        $sql =
        'SELECT COUNT(1)
            FROM pollapp.topics t
        WHERE t.id = :topic_id
            AND t.user_id = :user_id
            AND t.del_flg != 1
        ;';

        $result = $db->select($sql, [
            ':user_id' => $user->id,
            ':topic_id' => $topic_id
        ]);

        return $result;

    }

    public static function update($topic) {

        // 値のチェック
        if (!($topic->isValidId()
            * $topic->isValidTitle()
            * $topic->isValidPublished())) {
            return false;
        }

        $db = new DataSource;
        $sql = 'UPDATE topics SET published = :published, title = :title WHERE id = :id';

        return $db->execute($sql, [
            ':published' => $topic->published,
            ':title' => $topic->title,
            ':id' => $topic->id,
        ]);

    }

    public static function insert($topic, $user) {

        // 値のチェック
        if (!($user->isValidId()
            * $topic->isValidTitle()
            * $topic->isValidPublished())) {
            return false;
        }

        $db = new DataSource;
        $sql = 'insert into topics(title, published, user_id) values (:title, :published, :user_id)';

        return $db->execute($sql, [
            ':title' => $topic->title,
            ':published' => $topic->published,
            ':user_id' => $user->id,
        ]);

    }

    public static function incrementLikesOrDislikes($comment) {

        // 値のチェック
        if (!($comment->isValidTopicId()
            * $comment->isValidAgree())) {
            return false;
        }

        $db = new DataSource;

        if ($comment->agree) {
            $sql = 'UPDATE topics SET likes = likes + 1 WHERE id = :topic_id';
        } else {
            $sql = 'UPDATE topics SET dislikes = dislikes + 1 WHERE id = :topic_id';
        }

        return $db->execute($sql, [
            ':topic_id' => $comment->topic_id
        ]);

    }
}