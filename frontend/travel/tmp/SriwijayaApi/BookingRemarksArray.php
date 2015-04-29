<?php

class BookingRemarksArray
{

    /**
     * @var BookingRemarksArrays[] $BookingRemarksArray
     */
    protected $BookingRemarksArray = null;

    /**
     * @param BookingRemarksArrays[] $BookingRemarksArray
     */
    public function __construct(array $BookingRemarksArray)
    {
      $this->BookingRemarksArray = $BookingRemarksArray;
    }

    /**
     * @return BookingRemarksArrays[]
     */
    public function getBookingRemarksArray()
    {
      return $this->BookingRemarksArray;
    }

    /**
     * @param BookingRemarksArrays[] $BookingRemarksArray
     * @return BookingRemarksArray
     */
    public function setBookingRemarksArray(array $BookingRemarksArray)
    {
      $this->BookingRemarksArray = $BookingRemarksArray;
      return $this;
    }

}
