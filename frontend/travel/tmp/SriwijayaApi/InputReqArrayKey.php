<?php

class InputReqArrayKey
{

    /**
     * @var InputReqArrayKeys[] $InputReqArrayKey
     */
    protected $InputReqArrayKey = null;

    /**
     * @param InputReqArrayKeys[] $InputReqArrayKey
     */
    public function __construct(array $InputReqArrayKey)
    {
      $this->InputReqArrayKey = $InputReqArrayKey;
    }

    /**
     * @return InputReqArrayKeys[]
     */
    public function getInputReqArrayKey()
    {
      return $this->InputReqArrayKey;
    }

    /**
     * @param InputReqArrayKeys[] $InputReqArrayKey
     * @return InputReqArrayKey
     */
    public function setInputReqArrayKey(array $InputReqArrayKey)
    {
      $this->InputReqArrayKey = $InputReqArrayKey;
      return $this;
    }

}
