<?php

class InfantNamesArray
{

    /**
     * @var InputReqArrayInf[] $InfantNamesArray
     */
    protected $InfantNamesArray = null;

    /**
     * @param InputReqArrayInf[] $InfantNamesArray
     */
    public function __construct(array $InfantNamesArray)
    {
      $this->InfantNamesArray = $InfantNamesArray;
    }

    /**
     * @return InputReqArrayInf[]
     */
    public function getInfantNamesArray()
    {
      return $this->InfantNamesArray;
    }

    /**
     * @param InputReqArrayInf[] $InfantNamesArray
     * @return InfantNamesArray
     */
    public function setInfantNamesArray(array $InfantNamesArray)
    {
      $this->InfantNamesArray = $InfantNamesArray;
      return $this;
    }

}
