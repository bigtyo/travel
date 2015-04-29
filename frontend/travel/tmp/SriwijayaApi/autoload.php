<?php


 function autoload_a80d5e18649d829bda78450f7c862711($class)
{
    $classes = array(
        'Webservice' => __DIR__ .'/Webservice.php',
        'reqWsSearchFlight' => __DIR__ .'/reqWsSearchFlight.php',
        'respWsSearchFlight' => __DIR__ .'/respWsSearchFlight.php',
        'respTripDetailArrayFirst' => __DIR__ .'/respTripDetailArrayFirst.php',
        'respTripDetailArraySecond' => __DIR__ .'/respTripDetailArraySecond.php',
        'respFlightRouteArrayFirst' => __DIR__ .'/respFlightRouteArrayFirst.php',
        'respFlightRouteArraySecond' => __DIR__ .'/respFlightRouteArraySecond.php',
        'respSegmentsArray' => __DIR__ .'/respSegmentsArray.php',
        'respSegmentsArraySecond' => __DIR__ .'/respSegmentsArraySecond.php',
        'respLegsArray' => __DIR__ .'/respLegsArray.php',
        'respLegsArraySecond' => __DIR__ .'/respLegsArraySecond.php',
        'respClassAvailableArray' => __DIR__ .'/respClassAvailableArray.php',
        'respClassAvailableArraySecond' => __DIR__ .'/respClassAvailableArraySecond.php',
        'PriceDetailArray' => __DIR__ .'/PriceDetailArray.php',
        'PriceDetailArrays' => __DIR__ .'/PriceDetailArrays.php',
        'FareComponentArray' => __DIR__ .'/FareComponentArray.php',
        'FareComponentArrays' => __DIR__ .'/FareComponentArrays.php',
        'reqWsGeneratePNR' => __DIR__ .'/reqWsGeneratePNR.php',
        'InputReqArrayKey' => __DIR__ .'/InputReqArrayKey.php',
        'InputReqArrayKeys' => __DIR__ .'/InputReqArrayKeys.php',
        'ChildNamesArray' => __DIR__ .'/ChildNamesArray.php',
        'AdultNamesArray' => __DIR__ .'/AdultNamesArray.php',
        'InputReqNameArray' => __DIR__ .'/InputReqNameArray.php',
        'InfantNamesArray' => __DIR__ .'/InfantNamesArray.php',
        'InputReqArrayInf' => __DIR__ .'/InputReqArrayInf.php',
        'respWsGeneratePNR' => __DIR__ .'/respWsGeneratePNR.php',
        'YourItineraryDetailsArray' => __DIR__ .'/YourItineraryDetailsArray.php',
        'AdditionalInformationArray' => __DIR__ .'/AdditionalInformationArray.php',
        'AdditionalInformationArrays' => __DIR__ .'/AdditionalInformationArrays.php',
        'BookingRemarksArray' => __DIR__ .'/BookingRemarksArray.php',
        'BookingRemarksArrays' => __DIR__ .'/BookingRemarksArrays.php',
        'AgentDetailsArray' => __DIR__ .'/AgentDetailsArray.php',
        'ContactListArray' => __DIR__ .'/ContactListArray.php',
        'ContactListArrays' => __DIR__ .'/ContactListArrays.php',
        'PaymentDetailsArray' => __DIR__ .'/PaymentDetailsArray.php',
        'ItineraryDetailsArray' => __DIR__ .'/ItineraryDetailsArray.php',
        'JourneyArray' => __DIR__ .'/JourneyArray.php',
        'JourneyArrays' => __DIR__ .'/JourneyArrays.php',
        'SegmentArray' => __DIR__ .'/SegmentArray.php',
        'SegmentArrays' => __DIR__ .'/SegmentArrays.php',
        'ReservationDetailsArray' => __DIR__ .'/ReservationDetailsArray.php',
        'PassengerDetailsArray' => __DIR__ .'/PassengerDetailsArray.php',
        'PassengerDetailsArrays' => __DIR__ .'/PassengerDetailsArrays.php',
        'reqWsIssuing' => __DIR__ .'/reqWsIssuing.php',
        'respWsIssuing' => __DIR__ .'/respWsIssuing.php',
        'reqWsRetrievePNR' => __DIR__ .'/reqWsRetrievePNR.php',
        'respWsRetrievePNR' => __DIR__ .'/respWsRetrievePNR.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_a80d5e18649d829bda78450f7c862711');

// Do nothing. The rest is just leftovers from the code generation.
{
}
