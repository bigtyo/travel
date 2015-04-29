<?php

class AgentDetailsArray
{

    /**
     * @var string $BookedBy
     */
    protected $BookedBy = null;

    /**
     * @var string $IssuedBy
     */
    protected $IssuedBy = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getBookedBy()
    {
      return $this->BookedBy;
    }

    /**
     * @param string $BookedBy
     * @return AgentDetailsArray
     */
    public function setBookedBy($BookedBy)
    {
      $this->BookedBy = $BookedBy;
      return $this;
    }

    /**
     * @return string
     */
    public function getIssuedBy()
    {
      return $this->IssuedBy;
    }

    /**
     * @param string $IssuedBy
     * @return AgentDetailsArray
     */
    public function setIssuedBy($IssuedBy)
    {
      $this->IssuedBy = $IssuedBy;
      return $this;
    }

}
