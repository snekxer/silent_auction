<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 4:47 PM
 */

class winner {
    private $item;
    private $winner_bids;

    /**
     * winner constructor.
     * @param $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }


    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item): void
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getWinnerBids()
    {
        return $this->winner_bids;
    }

    /**
     * @param mixed $winner_bids
     */
    public function setWinnerBids($winner_bids): void
    {
        $this->winner_bids = $winner_bids;
    }




}