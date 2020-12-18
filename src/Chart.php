<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 21/12/2017
 * Time: 13:31
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class Chart extends DatabaseTable
{
    private $chartID;
    private $albumID;
    private $chartWeeks;

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
    public function getChartID()
    {
        return $this->chartID;
    }

    /**
     * @param mixed $chartID
     */
    public function setChartID($chartID)
    {
        $this->chartID = $chartID;
    }


    /**
     * @return mixed
     */
    public function getChartWeeks()
    {
        return $this->chartWeeks;
    }

    /**
     * @param mixed $chartWeeks
     */
    public function setChartWeeks($chartWeeks)
    {
        $this->chartWeeks = $chartWeeks;
    }

    public static function deleteAlbumFromChart($albumID)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "DELETE FROM charts WHERE albumID=$albumID";

        $numRowsAffected = $connection->exec($sql);

        if($numRowsAffected > 0){
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }
}