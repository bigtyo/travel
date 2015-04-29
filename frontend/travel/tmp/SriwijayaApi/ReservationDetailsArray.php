<?php

class ReservationDetailsArray
{

    /**
     * @var string $BookingCode
     */
    protected $BookingCode = null;

    /**
     * @var string $BookingDate
     */
    protected $BookingDate = null;

    /**
     * @var string $BalanceDue
     */
    protected $BalanceDue = null;

    /**
     * @var string $BalanceDueRemarks
     */
    protected $BalanceDueRemarks = null;

    /**
     * @var string $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @var string $Time
     */
    protected $Time = null;

    /**
     * @var string $TimeDescription
     */
    protected $TimeDescription = null;

    /**
     * @var string $Status
     */
    protected $Status = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getBookingCode()
    {
      return $this->BookingCode;
    }

    /**
     * @param string $BookingCode
     * @return ReservationDetailsArray
     */
    public function setBookingCode($BookingCode)
    {
      $this->BookingCode = $BookingCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getBookingDate()
    {
      return $this->BookingDate;
    }

    /**
     * @param string $BookingDate
     * @return ReservationDetailsArray
     */
    public function setBookingDate($BookingDate)
    {
      $this->BookingDate = $BookingDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getBalanceDue()
    {
      return $this->BalanceDue;
    }

    /**
     * @param string $BalanceDue
     * @return ReservationDetailsArray
     */
    public function setBalanceDue($BalanceDue)
    {
      $this->BalanceDue = $BalanceDue;
      return $this;
    }

    /**
     * @return string
     */
    public function getBalanceDueRemarks()
    {
      return $this->BalanceDueRemarks;
    }

    /**
     * @param string $BalanceDueRemarks
     * @return ReservationDetailsArray
     */
    public function setBalanceDueRemarks($BalanceDueRemarks)
    {
      $this->BalanceDueRemarks = $BalanceDueRemarks;
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
     * @return ReservationDetailsArray
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
      return $this->Time;
    }

    /**
     * @param string $Time
     * @return ReservationDetailsArray
     */
    public function setTime($Time)
    {
      $this->Time = $Time;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeDescription()
    {
      return $this->TimeDescription;
    }

    /**
     * @param string $TimeDescription
     * @return ReservationDetailsArray
     */
    public function setTimeDescription($TimeDescription)
    {
      $this->TimeDescription = $TimeDescription;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param string $Status
     * @return ReservationDetailsArray
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

}
