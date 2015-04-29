<?php

class reqWsGeneratePNR
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
     * @var string $Received
     */
    protected $Received = null;

    /**
     * @var string $ReceivedPhone
     */
    protected $ReceivedPhone = null;

    /**
     * @var string $Email
     */
    protected $Email = null;

    /**
     * @var string $SearchKey
     */
    protected $SearchKey = null;

    /**
     * @var string $ExtraCoverAddOns
     */
    protected $ExtraCoverAddOns = null;

    /**
     * @var AdultNamesArray $AdultNames
     */
    protected $AdultNames = null;

    /**
     * @var ChildNamesArray $ChildNames
     */
    protected $ChildNames = null;

    /**
     * @var InfantNamesArray $InfantNames
     */
    protected $InfantNames = null;

    /**
     * @var InputReqArrayKey $Keys
     */
    protected $Keys = null;

    /**
     * @param AdultNamesArray $AdultNames
     * @param ChildNamesArray $ChildNames
     * @param InfantNamesArray $InfantNames
     * @param InputReqArrayKey $Keys
     */
    public function __construct($AdultNames, $ChildNames, $InfantNames, $Keys)
    {
      $this->AdultNames = $AdultNames;
      $this->ChildNames = $ChildNames;
      $this->InfantNames = $InfantNames;
      $this->Keys = $Keys;
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
     * @return reqWsGeneratePNR
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
     * @return reqWsGeneratePNR
     */
    public function setPassword($Password)
    {
      $this->Password = $Password;
      return $this;
    }

    /**
     * @return string
     */
    public function getReceived()
    {
      return $this->Received;
    }

    /**
     * @param string $Received
     * @return reqWsGeneratePNR
     */
    public function setReceived($Received)
    {
      $this->Received = $Received;
      return $this;
    }

    /**
     * @return string
     */
    public function getReceivedPhone()
    {
      return $this->ReceivedPhone;
    }

    /**
     * @param string $ReceivedPhone
     * @return reqWsGeneratePNR
     */
    public function setReceivedPhone($ReceivedPhone)
    {
      $this->ReceivedPhone = $ReceivedPhone;
      return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
      return $this->Email;
    }

    /**
     * @param string $Email
     * @return reqWsGeneratePNR
     */
    public function setEmail($Email)
    {
      $this->Email = $Email;
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
     * @return reqWsGeneratePNR
     */
    public function setSearchKey($SearchKey)
    {
      $this->SearchKey = $SearchKey;
      return $this;
    }

    /**
     * @return string
     */
    public function getExtraCoverAddOns()
    {
      return $this->ExtraCoverAddOns;
    }

    /**
     * @param string $ExtraCoverAddOns
     * @return reqWsGeneratePNR
     */
    public function setExtraCoverAddOns($ExtraCoverAddOns)
    {
      $this->ExtraCoverAddOns = $ExtraCoverAddOns;
      return $this;
    }

    /**
     * @return AdultNamesArray
     */
    public function getAdultNames()
    {
      return $this->AdultNames;
    }

    /**
     * @param AdultNamesArray $AdultNames
     * @return reqWsGeneratePNR
     */
    public function setAdultNames($AdultNames)
    {
      $this->AdultNames = $AdultNames;
      return $this;
    }

    /**
     * @return ChildNamesArray
     */
    public function getChildNames()
    {
      return $this->ChildNames;
    }

    /**
     * @param ChildNamesArray $ChildNames
     * @return reqWsGeneratePNR
     */
    public function setChildNames($ChildNames)
    {
      $this->ChildNames = $ChildNames;
      return $this;
    }

    /**
     * @return InfantNamesArray
     */
    public function getInfantNames()
    {
      return $this->InfantNames;
    }

    /**
     * @param InfantNamesArray $InfantNames
     * @return reqWsGeneratePNR
     */
    public function setInfantNames($InfantNames)
    {
      $this->InfantNames = $InfantNames;
      return $this;
    }

    /**
     * @return InputReqArrayKey
     */
    public function getKeys()
    {
      return $this->Keys;
    }

    /**
     * @param InputReqArrayKey $Keys
     * @return reqWsGeneratePNR
     */
    public function setKeys($Keys)
    {
      $this->Keys = $Keys;
      return $this;
    }

}
