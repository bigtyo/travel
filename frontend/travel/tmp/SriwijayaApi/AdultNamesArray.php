<?php

class AdultNamesArray
{

    /**
     * @var InputReqNameArray[] $AdultNamesArray
     */
    protected $AdultNamesArray = null;

    /**
     * @param InputReqNameArray[] $AdultNamesArray
     */
    public function __construct(array $AdultNamesArray)
    {
      $this->AdultNamesArray = $AdultNamesArray;
    }

    /**
     * @return InputReqNameArray[]
     */
    public function getAdultNamesArray()
    {
      return $this->AdultNamesArray;
    }

    /**
     * @param InputReqNameArray[] $AdultNamesArray
     * @return AdultNamesArray
     */
    public function setAdultNamesArray(array $AdultNamesArray)
    {
      $this->AdultNamesArray = $AdultNamesArray;
      return $this;
    }

}
