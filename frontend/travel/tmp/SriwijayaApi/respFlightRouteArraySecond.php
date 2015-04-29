<?php

class respFlightRouteArraySecond
{

    /**
     * @var string $CityFrom
     */
    protected $CityFrom = null;

    /**
     * @var string $CityTo
     */
    protected $CityTo = null;

    /**
     * @var string $Std
     */
    protected $Std = null;

    /**
     * @var string $Sta
     */
    protected $Sta = null;

    /**
     * @var string $FlightTime
     */
    protected $FlightTime = null;

    /**
     * @var respSegmentsArray $Segments
     */
    protected $Segments = null;

    /**
     * @var respClassAvailableArray $ClassesAvailable
     */
    protected $ClassesAvailable = null;

    /**
     * @param respSegmentsArray $Segments
     * @param respClassAvailableArray $ClassesAvailable
     */
    public function __construct($Segments, $ClassesAvailable)
    {
      $this->Segments = $Segments;
      $this->ClassesAvailable = $ClassesAvailable;
    }

    /**
     * @return string
     */
    public function getCityFrom()
    {
      return $this->CityFrom;
    }

    /**
     * @param string $CityFrom
     * @return respFlightRouteArraySecond
     */
    public function setCityFrom($CityFrom)
    {
      $this->CityFrom = $CityFrom;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityTo()
    {
      return $this->CityTo;
    }

    /**
     * @param string $CityTo
     * @return respFlightRouteArraySecond
     */
    public function setCityTo($CityTo)
    {
      $this->CityTo = $CityTo;
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
     * @return respFlightRouteArraySecond
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
     * @return respFlightRouteArraySecond
     */
    public function setSta($Sta)
    {
      $this->Sta = $Sta;
      return $this;
    }

    /**
     * @return string
     */
    public function getFlightTime()
    {
      return $this->FlightTime;
    }

    /**
     * @param string $FlightTime
     * @return respFlightRouteArraySecond
     */
    public function setFlightTime($FlightTime)
    {
      $this->FlightTime = $FlightTime;
      return $this;
    }

    /**
     * @return respSegmentsArray
     */
    public function getSegments()
    {
      return $this->Segments;
    }

    /**
     * @param respSegmentsArray $Segments
     * @return respFlightRouteArraySecond
     */
    public function setSegments($Segments)
    {
      $this->Segments = $Segments;
      return $this;
    }

    /**
     * @return respClassAvailableArray
     */
    public function getClassesAvailable()
    {
      return $this->ClassesAvailable;
    }

    /**
     * @param respClassAvailableArray $ClassesAvailable
     * @return respFlightRouteArraySecond
     */
    public function setClassesAvailable($ClassesAvailable)
    {
      $this->ClassesAvailable = $ClassesAvailable;
      return $this;
    }

}
