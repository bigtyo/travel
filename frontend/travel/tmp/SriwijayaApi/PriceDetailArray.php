<?php

class PriceDetailArray
{

    /**
     * @var PriceDetailArrays[] $PriceDetailArray
     */
    protected $PriceDetailArray = null;

    /**
     * @param PriceDetailArrays[] $PriceDetailArray
     */
    public function __construct(array $PriceDetailArray)
    {
      $this->PriceDetailArray = $PriceDetailArray;
    }

    /**
     * @return PriceDetailArrays[]
     */
    public function getPriceDetailArray()
    {
      return $this->PriceDetailArray;
    }

    /**
     * @param PriceDetailArrays[] $PriceDetailArray
     * @return PriceDetailArray
     */
    public function setPriceDetailArray(array $PriceDetailArray)
    {
      $this->PriceDetailArray = $PriceDetailArray;
      return $this;
    }

}
