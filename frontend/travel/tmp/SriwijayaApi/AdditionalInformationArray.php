<?php

class AdditionalInformationArray
{

    /**
     * @var AdditionalInformationArrays[] $AdditionalInformationArray
     */
    protected $AdditionalInformationArray = null;

    /**
     * @param AdditionalInformationArrays[] $AdditionalInformationArray
     */
    public function __construct(array $AdditionalInformationArray)
    {
      $this->AdditionalInformationArray = $AdditionalInformationArray;
    }

    /**
     * @return AdditionalInformationArrays[]
     */
    public function getAdditionalInformationArray()
    {
      return $this->AdditionalInformationArray;
    }

    /**
     * @param AdditionalInformationArrays[] $AdditionalInformationArray
     * @return AdditionalInformationArray
     */
    public function setAdditionalInformationArray(array $AdditionalInformationArray)
    {
      $this->AdditionalInformationArray = $AdditionalInformationArray;
      return $this;
    }

}
