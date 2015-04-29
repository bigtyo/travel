<?php

class respClassAvailableArraySecond
{

    /**
     * @var string $Key
     */
    protected $Key = null;

    /**
     * @var string $Availability
     */
    protected $Availability = null;

    /**
     * @var string $Class
     */
    protected $Class = null;

    /**
     * @var string $SeatAvail
     */
    protected $SeatAvail = null;

    /**
     * @var string $Price
     */
    protected $Price = null;

    /**
     * @var PriceDetailArray $PriceDetail
     */
    protected $PriceDetail = null;

    /**
     * @var string $Currency
     */
    protected $Currency = null;

    /**
     * @var string $StatusAvail
     */
    protected $StatusAvail = null;

    /**
     * @param PriceDetailArray $PriceDetail
     */
    public function __construct($PriceDetail)
    {
      $this->PriceDetail = $PriceDetail;
    }

    /**
     * @return string
     */
    public function getKey()
    {
      return $this->Key;
    }

    /**
     * @param string $Key
     * @return respClassAvailableArraySecond
     */
    public function setKey($Key)
    {
      $this->Key = $Key;
      return $this;
    }

    /**
     * @return string
     */
    public function getAvailability()
    {
      return $this->Availability;
    }

    /**
     * @param string $Availability
     * @return respClassAvailableArraySecond
     */
    public function setAvailability($Availability)
    {
      $this->Availability = $Availability;
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
     * @return respClassAvailableArraySecond
     */
    public function setClass($Class)
    {
      $this->Class = $Class;
      return $this;
    }

    /**
     * @return string
     */
    public function getSeatAvail()
    {
      return $this->SeatAvail;
    }

    /**
     * @param string $SeatAvail
     * @return respClassAvailableArraySecond
     */
    public function setSeatAvail($SeatAvail)
    {
      $this->SeatAvail = $SeatAvail;
      return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
      return $this->Price;
    }

    /**
     * @param string $Price
     * @return respClassAvailableArraySecond
     */
    public function setPrice($Price)
    {
      $this->Price = $Price;
      return $this;
    }

    /**
     * @return PriceDetailArray
     */
    public function getPriceDetail()
    {
      return $this->PriceDetail;
    }

    /**
     * @param PriceDetailArray $PriceDetail
     * @return respClassAvailableArraySecond
     */
    public function setPriceDetail($PriceDetail)
    {
      $this->PriceDetail = $PriceDetail;
      return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
      return $this->Currency;
    }

    /**
     * @param string $Currency
     * @return respClassAvailableArraySecond
     */
    public function setCurrency($Currency)
    {
      $this->Currency = $Currency;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatusAvail()
    {
      return $this->StatusAvail;
    }

    /**
     * @param string $StatusAvail
     * @return respClassAvailableArraySecond
     */
    public function setStatusAvail($StatusAvail)
    {
      $this->StatusAvail = $StatusAvail;
      return $this;
    }

}
