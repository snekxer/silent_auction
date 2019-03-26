<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 2:43 PM
 */

class item {
    private $id;
    private $name;
    private $amount;
    private $min_bid;
    private $description;
    private $donors;
    private $est_value;
    private $address;
    private $phone;

    function buildItem($data){
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->amount = $data['amount'] ?? '';
        $this->min_bid = $data['min_bid'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->donors = $data['donors'] ?? '';
        $this->est_value = $data['est_value'] ?? '';
        $this->address = $data['address'] ?? '';
        $this->phone = $data['phone'] ?? '';
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDonors()
    {
        return $this->donors;
    }

    /**
     * @param mixed $donors
     */
    public function setDonors($donors): void
    {
        $this->donors = $donors;
    }

    /**
     * @return mixed
     */
    public function getEstValue()
    {
        return $this->est_value;
    }

    /**
     * @param mixed $est_value
     */
    public function setEstValue($est_value): void
    {
        $this->est_value = $est_value;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getMinBid()
    {
        return $this->min_bid;
    }

    /**
     * @param mixed $min_bid
     */
    public function setMinBid($min_bid): void
    {
        $this->min_bid = $min_bid;
    }



}