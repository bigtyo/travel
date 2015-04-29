<?php

class AdditionalInformationArrays
{

    /**
     * @var string $Reasons
     */
    protected $Reasons = null;

    /**
     * @var string $Value
     */
    protected $Value = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getReasons()
    {
      return $this->Reasons;
    }

    /**
     * @param string $Reasons
     * @return AdditionalInformationArrays
     */
    public function setReasons($Reasons)
    {
      $this->Reasons = $Reasons;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param string $Value
     * @return AdditionalInformationArrays
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
