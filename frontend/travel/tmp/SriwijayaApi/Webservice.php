<?php

class Webservice extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'reqWsSearchFlight' => '\\reqWsSearchFlight',
  'respWsSearchFlight' => '\\respWsSearchFlight',
  'respTripDetailArrayFirst' => '\\respTripDetailArrayFirst',
  'respTripDetailArraySecond' => '\\respTripDetailArraySecond',
  'respFlightRouteArrayFirst' => '\\respFlightRouteArrayFirst',
  'respFlightRouteArraySecond' => '\\respFlightRouteArraySecond',
  'respSegmentsArray' => '\\respSegmentsArray',
  'respSegmentsArraySecond' => '\\respSegmentsArraySecond',
  'respLegsArray' => '\\respLegsArray',
  'respLegsArraySecond' => '\\respLegsArraySecond',
  'respClassAvailableArray' => '\\respClassAvailableArray',
  'respClassAvailableArraySecond' => '\\respClassAvailableArraySecond',
  'PriceDetailArray' => '\\PriceDetailArray',
  'PriceDetailArrays' => '\\PriceDetailArrays',
  'FareComponentArray' => '\\FareComponentArray',
  'FareComponentArrays' => '\\FareComponentArrays',
  'reqWsGeneratePNR' => '\\reqWsGeneratePNR',
  'InputReqArrayKey' => '\\InputReqArrayKey',
  'InputReqArrayKeys' => '\\InputReqArrayKeys',
  'ChildNamesArray' => '\\ChildNamesArray',
  'AdultNamesArray' => '\\AdultNamesArray',
  'InputReqNameArray' => '\\InputReqNameArray',
  'InfantNamesArray' => '\\InfantNamesArray',
  'InputReqArrayInf' => '\\InputReqArrayInf',
  'respWsGeneratePNR' => '\\respWsGeneratePNR',
  'YourItineraryDetailsArray' => '\\YourItineraryDetailsArray',
  'AdditionalInformationArray' => '\\AdditionalInformationArray',
  'AdditionalInformationArrays' => '\\AdditionalInformationArrays',
  'BookingRemarksArray' => '\\BookingRemarksArray',
  'BookingRemarksArrays' => '\\BookingRemarksArrays',
  'AgentDetailsArray' => '\\AgentDetailsArray',
  'ContactListArray' => '\\ContactListArray',
  'ContactListArrays' => '\\ContactListArrays',
  'PaymentDetailsArray' => '\\PaymentDetailsArray',
  'ItineraryDetailsArray' => '\\ItineraryDetailsArray',
  'JourneyArray' => '\\JourneyArray',
  'JourneyArrays' => '\\JourneyArrays',
  'SegmentArray' => '\\SegmentArray',
  'SegmentArrays' => '\\SegmentArrays',
  'ReservationDetailsArray' => '\\ReservationDetailsArray',
  'PassengerDetailsArray' => '\\PassengerDetailsArray',
  'PassengerDetailsArrays' => '\\PassengerDetailsArrays',
  'reqWsIssuing' => '\\reqWsIssuing',
  'respWsIssuing' => '\\respWsIssuing',
  'reqWsRetrievePNR' => '\\reqWsRetrievePNR',
  'respWsRetrievePNR' => '\\respWsRetrievePNR',
);
    
    protected function callCurl($url, $data, $action)
    {
        $handle   = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);

        // If you need to handle headers like cookies, session id, etc. you will have
        // to set them here manually
        $headers = array("Content-Type: text/xml", 'SOAPAction: "' . $action . '"');	
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        curl_setopt($handle, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($handle, CURLOPT_HEADER, true);

        if (ENVIRONMENT == 'development') {
            curl_setopt($handle, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            curl_setopt($handle, CURLOPT_PROXY, "localhost:1080"); // 1080 is your -D parameter
        }

        $response = curl_exec($handle);
                curl_close($handle);

        list($headers, $content) = explode("\r\n\r\n", $response, 2);

        // If you need headers for something, it's not too bad to
        // keep them in e.g. $this->headers and then use them as needed

        return $content;
    }

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = 'https://wsx.sriwijayaair.co.id:11443/wsdl.eticketv110/index.php')
    {
        
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
              $options['classmap'][$key] = $value;
            }


        }
        
        
        $options = array_merge(array (
            'features' => 1
            //'stream_context' => $context,
            //'proxy_host' => '127.0.0.1',
            //'proxy_port' => 1080
            
        ), $options);
        parent::__construct($wsdl, $options);
    }
    
    public function __doRequest($request, $location, $action, $version, $one_way = 0) {
        $this->callCurl($location, $request, $action);
    }

    /**
     * SJ Webservice
     *
     * @param reqWsSearchFlight $param
     * @return respWsSearchFlight
     */
    public function WsSearchFlight(reqWsSearchFlight $param)
    {
      return $this->__soapCall('WsSearchFlight', array($param));
    }

    /**
     * SJ Webservice
     *
     * @param reqWsGeneratePNR $param
     * @return respWsGeneratePNR
     */
    public function WsGeneratePNR(reqWsGeneratePNR $param)
    {
      return $this->__soapCall('WsGeneratePNR', array($param));
    }

    /**
     * SJ Webservice
     *
     * @param reqWsIssuing $param
     * @return respWsIssuing
     */
    public function WsIssuing(reqWsIssuing $param)
    {
      return $this->__soapCall('WsIssuing', array($param));
    }

    /**
     * SJ Webservice
     *
     * @param reqWsRetrievePNR $param
     * @return respWsRetrievePNR
     */
    public function WsRetrievePNR(reqWsRetrievePNR $param)
    {
      return $this->__soapCall('WsRetrievePNR', array($param));
    }

}
