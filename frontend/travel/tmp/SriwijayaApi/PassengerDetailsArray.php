<?php

class PassengerDetailsArray
{

    /**
     * @var PassengerDetailsArrays[] $PassengerDetailsArray
     */
    protected $PassengerDetailsArray = null;

    /**
     * @param PassengerDetailsArrays[] $PassengerDetailsArray
     */
    public function __construct(array $PassengerDetailsArray)
    {
      $this->PassengerDetailsArray = $PassengerDetailsArray;
    }

    /**
     * @return PassengerDetailsArrays[]
     */
    public function getPassengerDetailsArray()
    {
      return $this->PassengerDetailsArray;
    }

    /**
     * @param PassengerDetailsArrays[] $PassengerDetailsArray
     * @return PassengerDetailsArray
     */
    public function setPassengerDetailsArray(array $PassengerDetailsArray)
    {
      $this->PassengerDetailsArray = $PassengerDetailsArray;
      return $this;
    }

}
