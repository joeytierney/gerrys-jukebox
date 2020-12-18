<?php
/**
 * Cart class
 */

namespace Itb;

/**
 * Class CartItem
 * @package Itb
 */
class CartItem
{
    /**
     * album variable
     * @var mixed|null
     */
    private $album;

    private $song;

    /**
     * quantity variable
     * @var int
     */
    private $quantity = 1;

    /**
     * CartItem constructor.
     * @param $albumID
     */
    public function __construct($albumID, $type)
    {
        if ($type == 'Album') {
            $this->album = Album::getAlbumByAlbumID($albumID);
        } else {
            $this->song= Single::getSingleById($albumID);
        }
    }

    /**
     * get quantity
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * set quantity
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * get album
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    public function getSong()
    {
        return $this->song;
    }
}