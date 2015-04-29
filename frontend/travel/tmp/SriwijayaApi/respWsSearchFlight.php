<?php

class respWsSearchFlight
{

    /**
     * @var string $Username
     */
    protected $Username = null;

    /**
     * @var string $Adult
     */
    protected $Adult = null;

    /**
     * @var string $Child
     */
    protected $Child = null;

    /**
     * @var string $Infant
     */
    protected $Infant = null;

    /**
     * @var respTripDetailArrayFirst $TripDetail
     */
    protected $TripDetail = null;

    /**
     * @var string $SearchKey
     */
    protected $SearchKey = null;

    /**
     * @var string $ErrorCode
     */
    protected $ErrorCode = null;

    /**
     * @var string $ErrorMessage
     */
    protected $ErrorMessage = null;

    /**
     * @param respTripDetailArrayFirst $TripDetail
     */
    public function __construct($TripDetail)
    {
      $this->TripDetail = $TripDetail;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
      return $this->Username;
    }

    /**
     * @param string $Username
     * @return respWsSearchFlight
     */
    public function setUsername($Username)
    {
      $this->Username = $Username;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdult()
    {
      return $this->Adult;
    }

    /**
     * @param string $Adult
     * @return respWsSearchFlight
     */
    public function setAdult($Adult)
    {
      $this->Adult = $Adult;
      return $this;
    }

    /**
     * @return string
     */
    public function getChild()
    {
      return $this->Child;
    }

    /**
     * @param string $Child
     * @return respWsSearchFlight
     */
    public function setChild($Child)
    {
      $this->Child = $Child;
      return $this;
    }

    /**
     * @return string
     */
    public function getInfant()
    {
      return $this->Infant;
    }

    /**
     * @param string $Infant
     * @return respWsSearchFlight
     */
    public function setInfant($Infant)
    {
      $this->Infant = $Infant;
      return $this;
    }

    /**
     * @return respTripDetailArrayFirst
     */
    public function getTripDetail()
    {
      return $this->TripDetail;
    }

    /**
     * @param respTripDetailArrayFirst $TripDetail
     * @return respWsSearchFlight
     */
    public function setTripDetail($TripDetail)
    {
      $this->TripDetail = $TripDetail;
      return $this;
    }

    /**
     * @return string
     */
    public function getSearchKey()
    {
      return $this->SearchKey;
    }

    /**
     * @param string $SearchKey
     * @return respWsSearchFlight
     */
    public function setSearchKey($SearchKey)
    {
      $this->SearchKey = $SearchKey;
      return $this;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
      return $this->ErrorCode;
    }

    /**
     * @param string $ErrorCode
     * @return respWsSearchFlight
     */
    public function setErrorCode($ErrorCode)
    {
      $this->ErrorCode = $ErrorCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
      return $this->ErrorMessage;
    }

    /**
     * @param string $ErrorMessage
     * @return respWsSearchFlight
     */
    public function setErrorMessage($ErrorMessage)
    {
      $this->ErrorMessage = $ErrorMessage;
      return $this;
    }

}
