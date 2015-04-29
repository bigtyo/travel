<?php

class ItineraryDetailsArray
{

    /**
     * @var JourneyArray $Journey
     */
    protected $Journey = null;

    /**
     * @param JourneyArray $Journey
     */
    public function __construct($Journey)
    {
      $this->Journey = $Journey;
    }

    /**
     * @return JourneyArray
     */
    public function getJourney()
    {
      return $this->Journey;
    }

    /**
     * @param JourneyArray $Journey
     * @return ItineraryDetailsArray
     */
    public function setJourney($Journey)
    {
      $this->Journey = $Journey;
      return $this;
    }

}
