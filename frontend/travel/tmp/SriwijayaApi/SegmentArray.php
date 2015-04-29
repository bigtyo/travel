<?php

class SegmentArray
{

    /**
     * @var SegmentArrays[] $SegmentArray
     */
    protected $SegmentArray = null;

    /**
     * @param SegmentArrays[] $SegmentArray
     */
    public function __construct(array $SegmentArray)
    {
      $this->SegmentArray = $SegmentArray;
    }

    /**
     * @return SegmentArrays[]
     */
    public function getSegmentArray()
    {
      return $this->SegmentArray;
    }

    /**
     * @param SegmentArrays[] $SegmentArray
     * @return SegmentArray
     */
    public function setSegmentArray(array $SegmentArray)
    {
      $this->SegmentArray = $SegmentArray;
      return $this;
    }

}
