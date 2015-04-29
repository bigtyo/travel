<?php

class PaymentDetailsArray
{

    /**
     * @var string $BasicFare
     */
    protected $BasicFare = null;

    /**
     * @var string $Others
     */
    protected $Others = null;

    /**
     * @var string $Sti
     */
    protected $Sti = null;

    /**
     * @var string $Total
     */
    protected $Total = null;

    /**
     * @var string $Nta
     */
    protected $Nta = null;

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
    public function getBasicFare()
    {
      return $this->BasicFare;
    }

    /**
     * @param string $BasicFare
     * @return PaymentDetailsArray
     */
    public function setBasicFare($BasicFare)
    {
      $this->BasicFare = $BasicFare;
      return $this;
    }

    /**
     * @return string
     */
    public function getOthers()
    {
      return $this->Others;
    }

    /**
     * @param string $Others
     * @return PaymentDetailsArray
     */
    public function setOthers($Others)
    {
      $this->Others = $Others;
      return $this;
    }

    /**
     * @return string
     */
    public function getSti()
    {
      return $this->Sti;
    }

    /**
     * @param string $Sti
     * @return PaymentDetailsArray
     */
    public function setSti($Sti)
    {
      $this->Sti = $Sti;
      return $this;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
      return $this->Total;
    }

    /**
     * @param string $Total
     * @return PaymentDetailsArray
     */
    public function setTotal($Total)
    {
      $this->Total = $Total;
      return $this;
    }

    /**
     * @return string
     */
    public function getNta()
    {
      return $this->Nta;
    }

    /**
     * @param string $Nta
     * @return PaymentDetailsArray
     */
    public function setNta($Nta)
    {
      $this->Nta = $Nta;
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
     * @return PaymentDetailsArray
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

}
