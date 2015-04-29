<?php

class respWsIssuing
{

    /**
     * @var string $Username
     */
    protected $Username = null;

    /**
     * @var string $BookingCode
     */
    protected $BookingCode = null;

    /**
     * @var YourItineraryDetailsArray $YourItineraryDetails
     */
    protected $YourItineraryDetails = null;

    /**
     * @var string $ErrorCode
     */
    protected $ErrorCode = null;

    /**
     * @var string $ErrorMessage
     */
    protected $ErrorMessage = null;

    /**
     * @param YourItineraryDetailsArray $YourItineraryDetails
     */
    public function __construct($YourItineraryDetails)
    {
      $this->YourItineraryDetails = $YourItineraryDetails;
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
     * @return respWsIssuing
     */
    public function setUsername($Username)
    {
      $this->Username = $Username;
      return $this;
    }

    /**
     * @return string
     */
    public function getBookingCode()
    {
      return $this->BookingCode;
    }

    /**
     * @param string $BookingCode
     * @return respWsIssuing
     */
    public function setBookingCode($BookingCode)
    {
      $this->BookingCode = $BookingCode;
      return $this;
    }

    /**
     * @return YourItineraryDetailsArray
     */
    public function getYourItineraryDetails()
    {
      return $this->YourItineraryDetails;
    }

    /**
     * @param YourItineraryDetailsArray $YourItineraryDetails
     * @return respWsIssuing
     */
    public function setYourItineraryDetails($YourItineraryDetails)
    {
      $this->YourItineraryDetails = $YourItineraryDetails;
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
     * @return respWsIssuing
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
     * @return respWsIssuing
     */
    public function setErrorMessage($ErrorMessage)
    {
      $this->ErrorMessage = $ErrorMessage;
      return $this;
    }

}
