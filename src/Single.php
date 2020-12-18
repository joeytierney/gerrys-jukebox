<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 18/12/2017
 * Time: 14:46
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class Single extends DatabaseTable
{
    private $songID;
    private $songTrackNo;
    private $songName;
    private $songWriter;
    private $songLength;
    private $songImage;
    private $songPrice;
    private $songCat;
    private $artistID;
    private $albumID;

    /**
     * @return mixed
     */
    public function getSongCat()
    {
        return $this->songCat;
    }

    /**
     * @param mixed $songCat
     */
    public function setSongCat($songCat)
    {
        $this->songCat = $songCat;
    }

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
    public function getAlbumID()
    {
        return $this->albumID;
    }

    /**
     * @param mixed $albumID
     */
    public function setAlbumID($albumID)
    {
        $this->albumID = $albumID;
    }

    /**
     * @return mixed
     */
    public function getSongID()
    {
        return $this->songID;
    }

    /**
     * @param mixed $songID
     */
    public function setSongID($songID)
    {
        $this->songID = $songID;
    }

    /**
     * @return mixed
     */
    public function getSongTrackNo()
    {
        return $this->songTrackNo;
    }

    /**
     * @param mixed $songTrackNo
     */
    public function setSongTrackNo($songTrackNo)
    {
        $this->songTrackNo = $songTrackNo;
    }

    /**
     * @return mixed
     */
    public function getSongName()
    {
        return $this->songName;
    }

    /**
     * @param mixed $songName
     */
    public function setSongName($songName)
    {
        $this->songName = $songName;
    }

    /**
     * @return mixed
     */
    public function getSongWriter()
    {
        return $this->songWriter;
    }

    /**
     * @param mixed $songWriter
     */
    public function setSongWriter($songWriter)
    {
        $this->songWriter = $songWriter;
    }

    /**
     * @return mixed
     */
    public function getSongLength()
    {
        return $this->songLength;
    }

    /**
     * @param mixed $songLength
     */
    public function setSongLength($songLength)
    {
        $this->songLength = $songLength;
    }

    /**
     * @return mixed
     */
    public function getSongImage()
    {
        return $this->songImage;
    }

    /**
     * @param mixed $songImage
     */
    public function setSongImage($songImage)
    {
        $this->songImage = $songImage;
    }

    /**
     * @return mixed
     */
    public function getSongPrice()
    {
        return $this->songPrice;
    }

    /**
     * @param mixed $songPrice
     */
    public function setSongPrice($songPrice)
    {
        $this->songPrice = $songPrice;
    }

    public static function getSinglesByAlbum($albumID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM singles WHERE albumID=:albumID';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':albumID', $albumID, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetchAll()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function getAllSinglesInOrder()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM singles ORDER BY songname';

        $statement = $connection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\' .  static::class);
        $statement->execute();

        $objects = $statement->fetchAll();
        return $objects;

    }

    public static function deleteSinglesFromAlbum($albumID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM singles WHERE albumID=$albumID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function deleteSinglesFromArtist($artistID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM singles WHERE artistID=$artistID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function getSingleById($songID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "SELECT * FROM singles WHERE songID=$songID";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':songID', $songID, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
    public static function getSingleByName($songName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql ='SELECT * FROM singles WHERE songName=:songName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(":songName", $songName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function updateSingle($songID, $songName, $songCat, $songTrackNo, $songWriter, $songLength, $songPrice,$artistID,$albumID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE singles SET songName = '$songName', songCat = '$songCat', songTrackNo = $songTrackNo, albumID = $albumID,
        songCat = '$songCat',songWriter = '$songWriter',songLength = '$songLength',songPrice = $songPrice, artistID = $artistID WHERE songID = $songID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }
        return $queryWasSuccessful;
    }

    public static function updateSingles($songID, $songName, $songCat, $songTrackNo, $songWriter, $songLength, $songPrice,$artistID,$albumID, $songImage)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE singles SET songName = '$songName', songCat = '$songCat', songTrackNo = $songTrackNo, albumID = $albumID, songImage = 'images/singles/$songImage',
        songCat = '$songCat',songWriter = '$songWriter',songLength = '$songLength',songPrice = $songPrice, artistID = $artistID WHERE songID = $songID";
        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }
        return $queryWasSuccessful;
    }

    public static function newSingle($songName, $songCat, $songTrackNo, $songWriter, $songLength, $songPrice,$artistID,$albumID, $songImage)
    {
        //return $queryWasSuccessful;
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "INSERT into singles (songName, songPrice, songTrackNo, songCat, songWriter, songLength, artistID, albumID, songImage) VALUES ('$songName',$songPrice,$songTrackNo,'$songCat','$songWriter','$songLength',$artistID,$albumID,'images/singles/$songImage')";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }
        return $queryWasSuccessful;
    }

    public static function deleteSingle($songID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM singles WHERE songID=$songID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

}