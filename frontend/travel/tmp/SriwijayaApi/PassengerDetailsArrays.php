<?php

class PassengerDetailsArrays
{

    /**
     * @var string $No
     */
    protected $No = null;

    /**
     * @var string $Suffix
     */
    protected $Suffix = null;

    /**
     * @var string $FirstName
     */
    protected $FirstName = null;

    /**
     * @var string $LastName
     */
    protected $LastName = null;

    /**
     * @var string $SeatQty
     */
    protected $SeatQty = null;

    /**
     * @var string $TicketNumber
     */
    protected $TicketNumber = null;

    /**
     * @var string $SpecialRequest
     */
    protected $SpecialRequest = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getNo()
    {
      return $this->No;
    }

    /**
     * @param string $No
     * @return PassengerDetailsArrays
     */
    public function setNo($No)
    {
      $this->No = $No;
      return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
      return $this->Suffix;
    }

    /**
     * @param string $Suffix
     * @return PassengerDetailsArrays
     */
    public function setSuffix($Suffix)
    {
      $this->Suffix = $Suffix;
      return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
      return $this->FirstName;
    }

    /**
     * @param string $FirstName
     * @return PassengerDetailsArrays
     */
    public function setFirstName($FirstName)
    {
      $this->FirstName = $FirstName;
      return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
      return $this->LastName;
    }

    /**
     * @param string $LastName
     * @return PassengerDetailsArrays
     */
    public function setLastName($LastName)
    {
      $this->LastName = $LastName;
      return $this;
    }

    /**
     * @return string
     */
    public function getSeatQty()
    {
      return $this->SeatQty;
    }

    /**
     * @param string $SeatQty
     * @return PassengerDetailsArrays
     */
    public function setSeatQty($SeatQty)
    {
      $this->SeatQty = $SeatQty;
      return $this;
    }

    /**
     * @return string
     */
    public function getTicketNumber()
    {
      return $this->TicketNumber;
    }

    /**
     * @param string $TicketNumber
     * @return PassengerDetailsArrays
     */
    public function setTicketNumber($TicketNumber)
    {
      $this->TicketNumber = $TicketNumber;
      return $this;
    }

    /**
     * @return string
     */
    public function getSpecialRequest()
    {
      return $this->SpecialRequest;
    }

    /**
     * @param string $SpecialRequest
     * @return PassengerDetailsArrays
     */
    public function setSpecialRequest($SpecialRequest)
    {
      $this->SpecialRequest = $SpecialRequest;
      return $this;
    }

}
