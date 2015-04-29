<?php

class YourItineraryDetailsArray
{

    /**
     * @var ReservationDetailsArray $ReservationDetails
     */
    protected $ReservationDetails = null;

    /**
     * @var PassengerDetailsArray $PassengerDetails
     */
    protected $PassengerDetails = null;

    /**
     * @var ItineraryDetailsArray $ItineraryDetails
     */
    protected $ItineraryDetails = null;

    /**
     * @var PaymentDetailsArray $PaymentDetails
     */
    protected $PaymentDetails = null;

    /**
     * @var ContactListArray $ContactList
     */
    protected $ContactList = null;

    /**
     * @var AgentDetailsArray $AgentDetails
     */
    protected $AgentDetails = null;

    /**
     * @var BookingRemarksArray $BookingRemarks
     */
    protected $BookingRemarks = null;

    /**
     * @var AdditionalInformationArray $AdditionalInformation
     */
    protected $AdditionalInformation = null;

    /**
     * @param ReservationDetailsArray $ReservationDetails
     * @param PassengerDetailsArray $PassengerDetails
     * @param ItineraryDetailsArray $ItineraryDetails
     * @param PaymentDetailsArray $PaymentDetails
     * @param ContactListArray $ContactList
     * @param AgentDetailsArray $AgentDetails
     * @param BookingRemarksArray $BookingRemarks
     * @param AdditionalInformationArray $AdditionalInformation
     */
    public function __construct($ReservationDetails, $PassengerDetails, $ItineraryDetails, $PaymentDetails, $ContactList, $AgentDetails, $BookingRemarks, $AdditionalInformation)
    {
      $this->ReservationDetails = $ReservationDetails;
      $this->PassengerDetails = $PassengerDetails;
      $this->ItineraryDetails = $ItineraryDetails;
      $this->PaymentDetails = $PaymentDetails;
      $this->ContactList = $ContactList;
      $this->AgentDetails = $AgentDetails;
      $this->BookingRemarks = $BookingRemarks;
      $this->AdditionalInformation = $AdditionalInformation;
    }

    /**
     * @return ReservationDetailsArray
     */
    public function getReservationDetails()
    {
      return $this->ReservationDetails;
    }

    /**
     * @param ReservationDetailsArray $ReservationDetails
     * @return YourItineraryDetailsArray
     */
    public function setReservationDetails($ReservationDetails)
    {
      $this->ReservationDetails = $ReservationDetails;
      return $this;
    }

    /**
     * @return PassengerDetailsArray
     */
    public function getPassengerDetails()
    {
      return $this->PassengerDetails;
    }

    /**
     * @param PassengerDetailsArray $PassengerDetails
     * @return YourItineraryDetailsArray
     */
    public function setPassengerDetails($PassengerDetails)
    {
      $this->PassengerDetails = $PassengerDetails;
      return $this;
    }

    /**
     * @return ItineraryDetailsArray
     */
    public function getItineraryDetails()
    {
      return $this->ItineraryDetails;
    }

    /**
     * @param ItineraryDetailsArray $ItineraryDetails
     * @return YourItineraryDetailsArray
     */
    public function setItineraryDetails($ItineraryDetails)
    {
      $this->ItineraryDetails = $ItineraryDetails;
      return $this;
    }

    /**
     * @return PaymentDetailsArray
     */
    public function getPaymentDetails()
    {
      return $this->PaymentDetails;
    }

    /**
     * @param PaymentDetailsArray $PaymentDetails
     * @return YourItineraryDetailsArray
     */
    public function setPaymentDetails($PaymentDetails)
    {
      $this->PaymentDetails = $PaymentDetails;
      return $this;
    }

    /**
     * @return ContactListArray
     */
    public function getContactList()
    {
      return $this->ContactList;
    }

    /**
     * @param ContactListArray $ContactList
     * @return YourItineraryDetailsArray
     */
    public function setContactList($ContactList)
    {
      $this->ContactList = $ContactList;
      return $this;
    }

    /**
     * @return AgentDetailsArray
     */
    public function getAgentDetails()
    {
      return $this->AgentDetails;
    }

    /**
     * @param AgentDetailsArray $AgentDetails
     * @return YourItineraryDetailsArray
     */
    public function setAgentDetails($AgentDetails)
    {
      $this->AgentDetails = $AgentDetails;
      return $this;
    }

    /**
     * @return BookingRemarksArray
     */
    public function getBookingRemarks()
    {
      return $this->BookingRemarks;
    }

    /**
     * @param BookingRemarksArray $BookingRemarks
     * @return YourItineraryDetailsArray
     */
    public function setBookingRemarks($BookingRemarks)
    {
      $this->BookingRemarks = $BookingRemarks;
      return $this;
    }

    /**
     * @return AdditionalInformationArray
     */
    public function getAdditionalInformation()
    {
      return $this->AdditionalInformation;
    }

    /**
     * @param AdditionalInformationArray $AdditionalInformation
     * @return YourItineraryDetailsArray
     */
    public function setAdditionalInformation($AdditionalInformation)
    {
      $this->AdditionalInformation = $AdditionalInformation;
      return $this;
    }

}
