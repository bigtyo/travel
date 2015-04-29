<?php

class FareComponentArray
{

    /**
     * @var FareComponentArrays[] $FareComponentArray
     */
    protected $FareComponentArray = null;

    /**
     * @param FareComponentArrays[] $FareComponentArray
     */
    public function __construct(array $FareComponentArray)
    {
      $this->FareComponentArray = $FareComponentArray;
    }

    /**
     * @return FareComponentArrays[]
     */
    public function getFareComponentArray()
    {
      return $this->FareComponentArray;
    }

    /**
     * @param FareComponentArrays[] $FareComponentArray
     * @return FareComponentArray
     */
    public function setFareComponentArray(array $FareComponentArray)
    {
      $this->FareComponentArray = $FareComponentArray;
      return $this;
    }

}
