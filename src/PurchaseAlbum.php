<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 27/03/2018
 * Time: 18:44
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class PurchaseAlbum extends DatabaseTable
{
    private $purchaseAlbumID;
    private $albumID;
    private $userID;

    /**
     * @return mixed
     */
    public function getPurchaseAlbumID()
    {
        return $this->purchaseAlbumID;
    }

    /**
     * @param mixed $purchaseAlbumID
     */
    public function setPurchaseAlbumID($purchaseAlbumID)
    {
        $this->purchaseAlbumID = $purchaseAlbumID;
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
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public static function newArtist($albumID, $userID)
    {
        //return $queryWasSuccessful;
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "INSERT into purchaseAlbums (albumID, userID) VALUES (3,3)";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }
        return $queryWasSuccessful;
    }
}