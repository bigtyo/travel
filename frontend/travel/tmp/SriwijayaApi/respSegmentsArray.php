<?php

class respSegmentsArray
{

    /**
     * @var respSegmentsArraySecond[] $respSegmentsArray
     */
    protected $respSegmentsArray = null;

    /**
     * @param respSegmentsArraySecond[] $respSegmentsArray
     */
    public function __construct(array $respSegmentsArray)
    {
      $this->respSegmentsArray = $respSegmentsArray;
    }

    /**
     * @return respSegmentsArraySecond[]
     */
    public function getRespSegmentsArray()
    {
      return $this->respSegmentsArray;
    }

    /**
     * @param respSegmentsArraySecond[] $respSegmentsArray
     * @return respSegmentsArray
     */
    public function setRespSegmentsArray(array $respSegmentsArray)
    {
      $this->respSegmentsArray = $respSegmentsArray;
      return $this;
    }

}
