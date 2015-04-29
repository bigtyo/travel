<?php

class respClassAvailableArray
{

    /**
     * @var respClassAvailableArraySecond[] $respClassAvailableArray
     */
    protected $respClassAvailableArray = null;

    /**
     * @param respClassAvailableArraySecond[] $respClassAvailableArray
     */
    public function __construct(array $respClassAvailableArray)
    {
      $this->respClassAvailableArray = $respClassAvailableArray;
    }

    /**
     * @return respClassAvailableArraySecond[]
     */
    public function getRespClassAvailableArray()
    {
      return $this->respClassAvailableArray;
    }

    /**
     * @param respClassAvailableArraySecond[] $respClassAvailableArray
     * @return respClassAvailableArray
     */
    public function setRespClassAvailableArray(array $respClassAvailableArray)
    {
      $this->respClassAvailableArray = $respClassAvailableArray;
      return $this;
    }

}
