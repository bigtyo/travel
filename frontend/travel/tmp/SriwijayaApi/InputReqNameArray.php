<?php

class InputReqNameArray
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
     * @var string $Suffix
     */
    protected $Suffix = null;

    /**
     * @var string $Dob
     */
    protected $Dob = null;

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
     * @return InputReqNameArray
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
     * @return InputReqNameArray
     */
    public function setLastName($LastName)
    {
      $this->LastName = $LastName;
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
     * @return InputReqNameArray
     */
    public function setSuffix($Suffix)
    {
      $this->Suffix = $Suffix;
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
     * @return InputReqNameArray
     */
    public function setDob($Dob)
    {
      $this->Dob = $Dob;
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
     * @return InputReqNameArray
     */
    public function setIdNo($IdNo)
    {
      $this->IdNo = $IdNo;
      return $this;
    }

}
