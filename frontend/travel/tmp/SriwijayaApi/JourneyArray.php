<?php

class JourneyArray
{

    /**
     * @var JourneyArrays[] $JourneyArray
     */
    protected $JourneyArray = null;

    /**
     * @param JourneyArrays[] $JourneyArray
     */
    public function __construct(array $JourneyArray)
    {
      $this->JourneyArray = $JourneyArray;
    }

    /**
     * @return JourneyArrays[]
     */
    public function getJourneyArray()
    {
      return $this->JourneyArray;
    }

    /**
     * @param JourneyArrays[] $JourneyArray
     * @return JourneyArray
     */
    public function setJourneyArray(array $JourneyArray)
    {
      $this->JourneyArray = $JourneyArray;
      return $this;
    }

}
