<?php

class SegmentArrays
{

    /**
     * @var string $FlownDate
     */
    protected $FlownDate = null;

    /**
     * @var string $FlightNo
     */
    protected $FlightNo = null;

    /**
     * @var string $CityFrom
     */
    protected $CityFrom = null;

    /**
     * @var string $CityTo
     */
    protected $CityTo = null;

    /**
     * @var string $CityFromName
     */
    protected $CityFromName = null;

    /**
     * @var string $CityToName
     */
    protected $CityToName = null;

    /**
     * @var string $StdLT
     */
    protected $StdLT = null;

    /**
     * @var string $StaLT
     */
    protected $StaLT = null;

    /**
     * @var string $ReservationStatus
     */
    protected $ReservationStatus = null;

    /**
     * @var string $Class
     */
    protected $Class = null;

    /**
     * @var string $CheckInStatus
     */
    protected $CheckInStatus = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getFlownDate()
    {
      return $this->FlownDate;
    }

    /**
     * @param string $FlownDate
     * @return SegmentArrays
     */
    public function setFlownDate($FlownDate)
    {
      $this->FlownDate = $FlownDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getFlightNo()
    {
      return $this->FlightNo;
    }

    /**
     * @param string $FlightNo
     * @return SegmentArrays
     */
    public function setFlightNo($FlightNo)
    {
      $this->FlightNo = $FlightNo;
      return $this;
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
     * @return SegmentArrays
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
     * @return SegmentArrays
     */
    public function setCityTo($CityTo)
    {
      $this->CityTo = $CityTo;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityFromName()
    {
      return $this->CityFromName;
    }

    /**
     * @param string $CityFromName
     * @return SegmentArrays
     */
    public function setCityFromName($CityFromName)
    {
      $this->CityFromName = $CityFromName;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityToName()
    {
      return $this->CityToName;
    }

    /**
     * @param string $CityToName
     * @return SegmentArrays
     */
    public function setCityToName($CityToName)
    {
      $this->CityToName = $CityToName;
      return $this;
    }

    /**
     * @return string
     */
    public function getStdLT()
    {
      return $this->StdLT;
    }

    /**
     * @param string $StdLT
     * @return SegmentArrays
     */
    public function setStdLT($StdLT)
    {
      $this->StdLT = $StdLT;
      return $this;
    }

    /**
     * @return string
     */
    public function getStaLT()
    {
      return $this->StaLT;
    }

    /**
     * @param string $StaLT
     * @return SegmentArrays
     */
    public function setStaLT($StaLT)
    {
      $this->StaLT = $StaLT;
      return $this;
    }

    /**
     * @return string
     */
    public function getReservationStatus()
    {
      return $this->ReservationStatus;
    }

    /**
     * @param string $ReservationStatus
     * @return SegmentArrays
     */
    public function setReservationStatus($ReservationStatus)
    {
      $this->ReservationStatus = $ReservationStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
      return $this->Class;
    }

    /**
     * @param string $Class
     * @return SegmentArrays
     */
    public function setClass($Class)
    {
      $this->Class = $Class;
      return $this;
    }

    /**
     * @return string
     */
    public function getCheckInStatus()
    {
      return $this->CheckInStatus;
    }

    /**
     * @param string $CheckInStatus
     * @return SegmentArrays
     */
    public function setCheckInStatus($CheckInStatus)
    {
      $this->CheckInStatus = $CheckInStatus;
      return $this;
    }

}
