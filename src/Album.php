<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 13/01/2018
 * Time: 11:43
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class Album extends DatabaseTable
{
    private $albumID;
    private $albumName;
    private $albumImage;
    private $albumPrice;
    private $artistID;
    private $albumRelease;
    private $albumVideo;
    private $albumCat;

    /**
     * @return mixed
     */
    public function getAlbumCat()
    {
        return $this->albumCat;
    }

    /**
     * @param mixed $albumCat
     */
    public function setAlbumCat($albumCat)
    {
        $this->albumCat = $albumCat;
    }

    /**
     * @return mixed
     */
    public function getAlbumRelease()
    {
        return $this->albumRelease;
    }

    /**
     * @param mixed $albumRelease
     */
    public function setAlbumRelease($albumRelease)
    {
        $this->albumRelease = $albumRelease;
    }

    /**
     * @return mixed
     */
    public function getAlbumVideo()
    {
        return $this->albumVideo;
    }

    /**
     * @param mixed $albumVideo
     */
    public function setAlbumVideo($albumVideo)
    {
        $this->albumVideo = $albumVideo;
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
    public function getAlbumName()
    {
        return $this->albumName;
    }

    /**
     * @param mixed $albumName
     */
    public function setAlbumName($albumName)
    {
        $this->albumName = $albumName;
    }

    /**
     * @return mixed
     */
    public function getAlbumImage()
    {
        return $this->albumImage;
    }

    /**
     * @param mixed $albumImage
     */
    public function setAlbumImage($albumImage)
    {
        $this->albumImage = $albumImage;
    }

    /**
     * @return mixed
     */
    public function getAlbumPrice()
    {
        return $this->albumPrice;
    }

    /**
     * @param mixed $albumPrice
     */
    public function setAlbumPrice($albumPrice)
    {
        $this->albumPrice = $albumPrice;
    }

    public static function getAlbumsByArtistID($artistID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM albums WHERE artistID=:artistID';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':artistID', $artistID, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetchAll()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function getAlbumByAlbumID($albumID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM albums WHERE albumID=:albumID';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':albumID', $albumID, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function getAlbumNameByArtistID($artistID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT albumName FROM albums WHERE artistID=:artistID';
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

    public static function getOneByAlbum($albumName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM albums WHERE albumName=:albumName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':albumName', $albumName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public function getChartImage($albumName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "SELECT * FROM albums WHERE albumName=:albumName";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':albumName', $albumName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

    public static function updateAlbum($albumID,$albumName,$albumPrice,$albumRelease,$albumVideo,$artistID,$albumCat)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE albums SET albumName = '$albumName', albumPrice = $albumPrice, albumRelease = '$albumRelease', albumVideo = '$albumVideo', albumCat = '$albumCat',
        artistID = $artistID WHERE albumID = $albumID";
        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function updateAlbums($albumID,$albumName,$albumPrice,$albumRelease,$albumVideo,$artistID,$albumImage,$albumCat)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE albums SET albumName = '$albumName', albumPrice = $albumPrice, albumRelease = '$albumRelease', albumVideo = '$albumVideo',
        artistID = $artistID, albumImage = 'images/albums/$albumImage', albumCat = '$albumCat' WHERE albumID = $albumID";
        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function deleteAlbum($albumID)
    {
        Single::deleteSinglesFromAlbum($albumID);
        Chart::deleteAlbumFromChart($albumID);
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM albums WHERE albumID=$albumID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    public static function newAlbum($albumName,$albumPrice,$albumRelease,$albumVideo,$artistID,$albumImage,$albumCat)
    {
        //return $queryWasSuccessful;
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "INSERT into albums (albumName, albumPrice, albumRelease, albumVideo, artistID, albumImage,albumCat) VALUES ('$albumName',$albumPrice,'$albumRelease','$albumVideo','$artistID','images/albums/$albumImage','$albumCat')";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }
        return $queryWasSuccessful;
    }

    public function changeImage($albumID, $albumImage)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "UPDATE albums SET albumImage = '/images/albums/$albumImage' WHERE albumID=$albumID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;// = true;
    }

    public static function deleteAllAlbumsFromArtist($artistID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM albums WHERE artistID=$artistID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }
}