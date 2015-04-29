<?php

class InputReqArrayKeys
{

    /**
     * @var string $Key
     */
    protected $Key = null;

    /**
     * @var string $Category
     */
    protected $Category = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getKey()
    {
      return $this->Key;
    }

    /**
     * @param string $Key
     * @return InputReqArrayKeys
     */
    public function setKey($Key)
    {
      $this->Key = $Key;
      return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
      return $this->Category;
    }

    /**
     * @param string $Category
     * @return InputReqArrayKeys
     */
    public function setCategory($Category)
    {
      $this->Category = $Category;
      return $this;
    }

}
