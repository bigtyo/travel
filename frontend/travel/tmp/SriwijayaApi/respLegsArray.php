<?php

class respLegsArray
{

    /**
     * @var respLegsArraySecond[] $respLegsArray
     */
    protected $respLegsArray = null;

    /**
     * @param respLegsArraySecond[] $respLegsArray
     */
    public function __construct(array $respLegsArray)
    {
      $this->respLegsArray = $respLegsArray;
    }

    /**
     * @return respLegsArraySecond[]
     */
    public function getRespLegsArray()
    {
      return $this->respLegsArray;
    }

    /**
     * @param respLegsArraySecond[] $respLegsArray
     * @return respLegsArray
     */
    public function setRespLegsArray(array $respLegsArray)
    {
      $this->respLegsArray = $respLegsArray;
      return $this;
    }

}
