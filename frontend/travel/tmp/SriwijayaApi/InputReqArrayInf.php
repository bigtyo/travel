<?php

class InputReqArrayInf
{

    /**
     * @var string $FirstName
     */
    protected $FirstName = null;

    /**
     * @var string $LastName
     */
    protected $LastName = null;

    /**
     * @var string $Dob
     */
    protected $Dob = null;

    /**
     * @var string $AdultRefference
     */
    protected $AdultRefference = null;

    /**
     * @var string $IdNo
     */
    protected $IdNo = null;

    
    public function __construct()
    {
    
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
     * @return InputReqArrayInf
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
     * @return InputReqArrayInf
     */
    public function setLastName($LastName)
    {
      $this->LastName = $LastName;
      return $this;
    }

    /**
     * @return string
     */
    public function getDob()
    {
      return $this->Dob;
    }

    /**
     * @param string $Dob
     * @return InputReqArrayInf
     */
    public function setDob($Dob)
    {
      $this->Dob = $Dob;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdultRefference()
    {
      return $this->AdultRefference;
    }

    /**
     * @param string $AdultRefference
     * @return InputReqArrayInf
     */
    public function setAdultRefference($AdultRefference)
    {
      $this->AdultRefference = $AdultRefference;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdNo()
    {
      return $this->IdNo;
    }

    /**
     * @param string $IdNo
     * @return InputReqArrayInf
     */
    public function setIdNo($IdNo)
    {
      $this->IdNo = $IdNo;
      return $this;
    }

}
