<?php

class FareComponentArrays
{

    /**
     * @var string $FareChargeTypeCode
     */
    protected $FareChargeTypeCode = null;

    /**
     * @var string $FareChargeTypeDesc
     */
    protected $FareChargeTypeDesc = null;

    /**
     * @var string $Amount
     */
    protected $Amount = null;

    /**
     * @var string $CurrencyCode
     */
    protected $CurrencyCode = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getFareChargeTypeCode()
    {
      return $this->FareChargeTypeCode;
    }

    /**
     * @param string $FareChargeTypeCode
     * @return FareComponentArrays
     */
    public function setFareChargeTypeCode($FareChargeTypeCode)
    {
      $this->FareChargeTypeCode = $FareChargeTypeCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareChargeTypeDesc()
    {
      return $this->FareChargeTypeDesc;
    }

    /**
     * @param string $FareChargeTypeDesc
     * @return FareComponentArrays
     */
    public function setFareChargeTypeDesc($FareChargeTypeDesc)
    {
      $this->FareChargeTypeDesc = $FareChargeTypeDesc;
      return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param string $Amount
     * @return FareComponentArrays
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param string $CurrencyCode
     * @return FareComponentArrays
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

}
