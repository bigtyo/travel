<?php

class respLegsArraySecond
{

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

    
    public function __construct()
    {
    
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
     * @return respLegsArraySecond
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
     * @return respLegsArraySecond
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
     * @return respLegsArraySecond
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
     * @return respLegsArraySecond
     */
    public function setSta($Sta)
    {
      $this->Sta = $Sta;
      return $this;
    }

}
