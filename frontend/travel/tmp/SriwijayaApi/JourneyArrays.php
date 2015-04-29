<?php

class JourneyArrays
{

    /**
     * @var SegmentArray $Segment
     */
    protected $Segment = null;

    /**
     * @param SegmentArray $Segment
     */
    public function __construct($Segment)
    {
      $this->Segment = $Segment;
    }

    /**
     * @return SegmentArray
     */
    public function getSegment()
    {
      return $this->Segment;
    }

    /**
     * @param SegmentArray $Segment
     * @return JourneyArrays
     */
    public function setSegment($Segment)
    {
      $this->Segment = $Segment;
      return $this;
    }

}
