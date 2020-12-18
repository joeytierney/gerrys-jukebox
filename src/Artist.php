<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 18/12/2017
 * Time: 14:40
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class Artist extends DatabaseTable
{
    private $artistID;
    private $artistName;
    private $artistImage;
    private $artistBio;
    private $artistLabel;
    private $artistCat;
    /**
     * Artist constructor.
     * @param $artistID
     * @param $artistName
     * @param $artistImage
     * @param $artistBio
     * @param $artistLabel
     */


    /**
     * @return mixed
     */
    public function getArtistID()
    {
        return $this->artistID;
    }

    /**
     * @param mixed $artistID
     */
    public function setArtistID($artistID)
    {
        $this->artistID = $artistID;
    }

    /**
     * @return mixed
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param mixed $artistName
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;
    }

    /**
     * @return mixed
     */
    public function getArtistImage()
    {
        return $this->artistImage;
    }

    /**
     * @param mixed $artistImage
     */
    public function setArtistImage($artistImage)
    {
        $this->artistImage = $artistImage;
    }

    /**
     * @return mixed
     */
    public function getArtistBio()
    {
        return $this->artistBio;
    }

    /**
     * @param mixed $artistBio
     */
    public function setArtistBio($artistBio)
    {
        $this->artistBio = $artistBio;
    }

    /**
     * @return mixed
     */
    public function getArtistLabel()
    {
        return $this->artistLabel;
    }

    /**
     * @param mixed $artistLabel
     */
    public function setArtistLabel($artistLabel)
    {
        $this->artistLabel = $artistLabel;
    }

    /**
     * @return mixed
     */
    public function getArtistCat()
    {
        return $this->artistCat;
    }

    /**
     * @param mixed $artistCat
     */
    public function setArtistCat($artistCat)
    {
        $this->artistCat = $artistCat;
    }

    public static function getOneByArtist($artistName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM artists WHERE artistName=:artistName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':artistName', $artistName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function getArtistById($artistID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "SELECT artistName FROM artists WHERE artistID=$artistID";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':artistID', $artistID, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function getArtistByArtistID($artistID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "SELECT * FROM artists WHERE artistID=$artistID";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':artistID', $artistID, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function updateArtist($artistID,$artistName,$artistLabel,$artistBio, $artistCat)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE artists SET artistName = '$artistName', artistBio = '$artistBio', artistLabel = '$artistLabel',
        artistCat = '$artistCat' WHERE artistID = $artistID";
        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function updateArtists($artistID,$artistName,$artistLabel,$artistBio, $artistCat, $artistImage)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE artists SET artistName = '$artistName', artistBio = '$artistBio', artistLabel = '$artistLabel',
        artistCat = '$artistCat', artistImage = 'images/artists/$artistImage' WHERE artistID = $artistID";
        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function newArtist($artistName,$artistLabel,$artistBio, $artistCat, $artistImage)
    {
        //return $queryWasSuccessful;
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "INSERT into artists (artistName, artistLabel, artistBio, artistCat, artistImage) VALUES ('$artistName','$artistLabel','$artistBio','$artistCat','images/artists/$artistImage')";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }
        return $queryWasSuccessful;
    }

    public static function deleteArtist($artistID)
    {
        Single::deleteSinglesFromArtist($artistID);
        Album::deleteAllAlbumsFromArtist($artistID);
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM artists WHERE artistID=$artistID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }
}