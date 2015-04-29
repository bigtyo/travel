<?php

class respTripDetailArrayFirst
{

    /**
     * @var respTripDetailArraySecond[] $respTripDetailArrayFirst
     */
    protected $respTripDetailArrayFirst = null;

    /**
     * @param respTripDetailArraySecond[] $respTripDetailArrayFirst
     */
    public function __construct(array $respTripDetailArrayFirst)
    {
      $this->respTripDetailArrayFirst = $respTripDetailArrayFirst;
    }

    /**
     * @return respTripDetailArraySecond[]
     */
    public function getRespTripDetailArrayFirst()
    {
      return $this->respTripDetailArrayFirst;
    }

    /**
     * @param respTripDetailArraySecond[] $respTripDetailArrayFirst
     * @return respTripDetailArrayFirst
     */
    public function setRespTripDetailArrayFirst(array $respTripDetailArrayFirst)
    {
      $this->respTripDetailArrayFirst = $respTripDetailArrayFirst;
      return $this;
    }

}
