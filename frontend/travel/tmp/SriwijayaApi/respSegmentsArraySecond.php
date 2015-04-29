<?php

class respSegmentsArraySecond
{

    /**
     * @var string $CarrierCode
     */
    protected $CarrierCode = null;

    /**
     * @var string $NoFlight
     */
    protected $NoFlight = null;

    /**
     * @var string $DepartureStation
     */
    protected $DepartureStation = null;

    /**
     * @var string $ArrivalStation
     */
    protected $ArrivalStation = null;

    /**
     * @var string $Std
     */
    protected $Std = null;

    /**
     * @var string $Sta
     */
    protected $Sta = null;

    /**
     * @var respLegsArray $Legs
     */
    protected $Legs = null;

    /**
     * @param respLegsArray $Legs
     */
    public function __construct($Legs)
    {
      $this->Legs = $Legs;
    }

    /**
     * @return string
     */
    public function getCarrierCode()
    {
      return $this->CarrierCode;
    }

    /**
     * @param string $CarrierCode
     * @return respSegmentsArraySecond
     */
    public function setCarrierCode($CarrierCode)
    {
      $this->CarrierCode = $CarrierCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoFlight()
    {
      return $this->NoFlight;
    }

    /**
     * @param string $NoFlight
     * @return respSegmentsArraySecond
     */
    public function setNoFlight($NoFlight)
    {
      $this->NoFlight = $NoFlight;
      return $this;
    }

    /**
     * @return string
     */
    public function getDepartureStation()
    {
      return $this->DepartureStation;
    }

    /**
     * @param string $DepartureStation
     * @return respSegmentsArraySecond
     */
    public function setDepartureStation($DepartureStation)
    {
      $this->DepartureStation = $DepartureStation;
      return $this;
    }

    /**
     * @return string
     */
    public function getArrivalStation()
    {
      return $this->ArrivalStation;
    }

    /**
     * @param string $ArrivalStation
     * @return respSegmentsArraySecond
     */
    public function setArrivalStation($ArrivalStation)
    {
      $this->ArrivalStation = $ArrivalStation;
      return $this;
    }

    /**
     * @return string
     */
    public function getStd()
    {
      return $this->Std;
    }

    /**
     * @param string $Std
     * @return respSegmentsArraySecond
     */
    public function setStd($Std)
    {
      $this->Std = $Std;
      return $this;
    }

    /**
     * @return string
     */
    public function getSta()
    {
      return $this->Sta;
    }

    /**
     * @param string $Sta
     * @return respSegmentsArraySecond
     */
    public function setSta($Sta)
    {
      $this->Sta = $Sta;
      return $this;
    }

    /**
     * @return respLegsArray
     */
    public function getLegs()
    {
      return $this->Legs;
    }

    /**
     * @param respLegsArray $Legs
     * @return respSegmentsArraySecond
     */
    public function setLegs($Legs)
    {
      $this->Legs = $Legs;
      return $this;
    }

}
