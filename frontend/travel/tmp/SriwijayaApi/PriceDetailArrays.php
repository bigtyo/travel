<?php

class PriceDetailArrays
{

    /**
     * @var string $PaxCategory
     */
    protected $PaxCategory = null;

    /**
     * @var string $Total_1
     */
    protected $Total_1 = null;

    /**
     * @var string $Nta_1
     */
    protected $Nta_1 = null;

    /**
     * @var FareComponentArray $FareComponent
     */
    protected $FareComponent = null;

    /**
     * @param FareComponentArray $FareComponent
     */
    public function __construct($FareComponent)
    {
      $this->FareComponent = $FareComponent;
    }

    /**
     * @return string
     */
    public function getPaxCategory()
    {
      return $this->PaxCategory;
    }

    /**
     * @param string $PaxCategory
     * @return PriceDetailArrays
     */
    public function setPaxCategory($PaxCategory)
    {
      $this->PaxCategory = $PaxCategory;
      return $this;
    }

    /**
     * @return string
     */
    public function getTotal_1()
    {
      return $this->Total_1;
    }

    /**
     * @param string $Total_1
     * @return PriceDetailArrays
     */
    public function setTotal_1($Total_1)
    {
      $this->Total_1 = $Total_1;
      return $this;
    }

    /**
     * @return string
     */
    public function getNta_1()
    {
      return $this->Nta_1;
    }

    /**
     * @param string $Nta_1
     * @return PriceDetailArrays
     */
    public function setNta_1($Nta_1)
    {
      $this->Nta_1 = $Nta_1;
      return $this;
    }

    /**
     * @return FareComponentArray
     */
    public function getFareComponent()
    {
      return $this->FareComponent;
    }

    /**
     * @param FareComponentArray $FareComponent
     * @return PriceDetailArrays
     */
    public function setFareComponent($FareComponent)
    {
      $this->FareComponent = $FareComponent;
      return $this;
    }

}
