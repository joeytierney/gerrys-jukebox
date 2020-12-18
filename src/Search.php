<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 24/01/2018
 * Time: 17:52
 */

namespace Itb;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class Search extends DatabaseTable
{
    public $type;

    public static function getSearchResults($keyword)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "(SELECT artistName, 'art' as type FROM artists WHERE artistName LIKE '$keyword')
        UNION
        (SELECT albumName, 'alb' as type FROM albums WHERE albumName LIKE '$keyword')
        UNION
        SELECT songName, 'son' as type FROM singles WHERE songName LIKE '$keyword'";

        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\' .  static::class);
        $statement->execute();

        $objects = $statement->fetchColumn();
        return $objects;

    }
}


