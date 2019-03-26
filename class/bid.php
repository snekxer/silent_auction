<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 2:44 PM
 */

class bid {
     private $item_id;
     private $paddle_num;
     private $quantity;
     private $bid_amount;
     private $timestamp;

    function buildBid($data){
        $this->item_id = $data['item_id'] ?? '';
        $this->paddle_num = $data['paddle_num'] ?? '';
        $this->quantity = $data['quantity'] ?? '';
        $this->bid_amount = $data['bid_amount'] ?? '';
        $this->timestamp = $data['timestamp'] ?? '';
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * @param mixed $item_id
     */
    public function setItemId($item_id): void
    {
        $this->item_id = $item_id;
    }

    /**
     * @return mixed
     */
    public function getPaddleNum()
    {
        return $this->paddle_num;
    }

    /**
     * @param mixed $paddle_num
     */
    public function setPaddleNum($paddle_num): void
    {
        $this->paddle_num = $paddle_num;
    }

    /**
     * @return mixed
     */
    public function getBidAmount()
    {
        return $this->bid_amount;
    }

    /**
     * @param mixed $bid_amount
     */
    public function setBidAmount($bid_amount): void
    {
        $this->bid_amount = $bid_amount;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp): void
    {
        $this->timestamp = $timestamp;
    }






}