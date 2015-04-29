<?php

class ChildNamesArray
{

    /**
     * @var InputReqNameArray[] $ChildNamesArray
     */
    protected $ChildNamesArray = null;

    /**
     * @param InputReqNameArray[] $ChildNamesArray
     */
    public function __construct(array $ChildNamesArray)
    {
      $this->ChildNamesArray = $ChildNamesArray;
    }

    /**
     * @return InputReqNameArray[]
     */
    public function getChildNamesArray()
    {
      return $this->ChildNamesArray;
    }

    /**
     * @param InputReqNameArray[] $ChildNamesArray
     * @return ChildNamesArray
     */
    public function setChildNamesArray(array $ChildNamesArray)
    {
      $this->ChildNamesArray = $ChildNamesArray;
      return $this;
    }

}
