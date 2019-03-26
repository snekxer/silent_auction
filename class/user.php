<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 2:43 PM
 */

class user {
    private $paddle_num;
    private $name;

    function buildUser($data){
        $this->paddle_num = $data['paddle_num'] ?? '';
        $this->name = $data['name'] ?? '';
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



}