<?php

class reqWsSearchFlight
{

    /**
     * @var string $Username
     */
    protected $Username = null;

    /**
     * @var string $Password
     */
    protected $Password = null;

    /**
     * @var string $ReturnStatus
     */
    protected $ReturnStatus = null;

    /**
     * @var string $CityFrom
     */
    protected $CityFrom = null;

    /**
     * @var string $CityTo
     */
    protected $CityTo = null;

    /**
     * @var string $DepartDate
     */
    protected $DepartDate = null;

    /**
     * @var string $ReturnDate
     */
    protected $ReturnDate = null;

    /**
     * @var string $PromoCode
     */
    protected $PromoCode = null;

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

    
    public function __construct()
    {
    
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
     * @return reqWsSearchFlight
     */
    public function setUsername($Username)
    {
      $this->Username = $Username;
      return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
      return $this->Password;
    }

    /**
     * @param string $Password
     * @return reqWsSearchFlight
     */
    public function setPassword($Password)
    {
      $this->Password = $Password;
      return $this;
    }

    /**
     * @return string
     */
    public function getReturnStatus()
    {
      return $this->ReturnStatus;
    }

    /**
     * @param string $ReturnStatus
     * @return reqWsSearchFlight
     */
    public function setReturnStatus($ReturnStatus)
    {
      $this->ReturnStatus = $ReturnStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityFrom()
    {
      return $this->CityFrom;
    }

    /**
     * @param string $CityFrom
     * @return reqWsSearchFlight
     */
    public function setCityFrom($CityFrom)
    {
      $this->CityFrom = $CityFrom;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityTo()
    {
      return $this->CityTo;
    }

    /**
     * @param string $CityTo
     * @return reqWsSearchFlight
     */
    public function setCityTo($CityTo)
    {
      $this->CityTo = $CityTo;
      return $this;
    }

    /**
     * @return string
     */
    public function getDepartDate()
    {
      return $this->DepartDate;
    }

    /**
     * @param string $DepartDate
     * @return reqWsSearchFlight
     */
    public function setDepartDate($DepartDate)
    {
      $this->DepartDate = $DepartDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getReturnDate()
    {
      return $this->ReturnDate;
    }

    /**
     * @param string $ReturnDate
     * @return reqWsSearchFlight
     */
    public function setReturnDate($ReturnDate)
    {
      $this->ReturnDate = $ReturnDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getPromoCode()
    {
      return $this->PromoCode;
    }

    /**
     * @param string $PromoCode
     * @return reqWsSearchFlight
     */
    public function setPromoCode($PromoCode)
    {
      $this->PromoCode = $PromoCode;
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
     * @return reqWsSearchFlight
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
     * @return reqWsSearchFlight
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
     * @return reqWsSearchFlight
     */
    public function setInfant($Infant)
    {
      $this->Infant = $Infant;
      return $this;
    }

}
