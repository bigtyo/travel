<?php

class respTripDetailArraySecond
{

    /**
     * @var string $CityFrom
     */
    protected $CityFrom = null;

    /**
     * @var string $CityTo
     */
    protected $CityTo = null;

    /**
     * @var string $Category
     */
    protected $Category = null;

    /**
     * @var respFlightRouteArrayFirst $FlightRoute
     */
    protected $FlightRoute = null;

    /**
     * @param respFlightRouteArrayFirst $FlightRoute
     */
    public function __construct($FlightRoute)
    {
      $this->FlightRoute = $FlightRoute;
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
     * @return respTripDetailArraySecond
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
     * @return respTripDetailArraySecond
     */
    public function setCityTo($CityTo)
    {
      $this->CityTo = $CityTo;
      return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
      return $this->Category;
    }

    /**
     * @param string $Category
     * @return respTripDetailArraySecond
     */
    public function setCategory($Category)
    {
      $this->Category = $Category;
      return $this;
    }

    /**
     * @return respFlightRouteArrayFirst
     */
    public function getFlightRoute()
    {
      return $this->FlightRoute;
    }

    /**
     * @param respFlightRouteArrayFirst $FlightRoute
     * @return respTripDetailArraySecond
     */
    public function setFlightRoute($FlightRoute)
    {
      $this->FlightRoute = $FlightRoute;
      return $this;
    }

}
