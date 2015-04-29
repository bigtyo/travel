<?php

class respFlightRouteArrayFirst
{

    /**
     * @var respFlightRouteArraySecond[] $respFlightRouteArrayFirst
     */
    protected $respFlightRouteArrayFirst = null;

    /**
     * @param respFlightRouteArraySecond[] $respFlightRouteArrayFirst
     */
    public function __construct(array $respFlightRouteArrayFirst)
    {
      $this->respFlightRouteArrayFirst = $respFlightRouteArrayFirst;
    }

    /**
     * @return respFlightRouteArraySecond[]
     */
    public function getRespFlightRouteArrayFirst()
    {
      return $this->respFlightRouteArrayFirst;
    }

    /**
     * @param respFlightRouteArraySecond[] $respFlightRouteArrayFirst
     * @return respFlightRouteArrayFirst
     */
    public function setRespFlightRouteArrayFirst(array $respFlightRouteArrayFirst)
    {
      $this->respFlightRouteArrayFirst = $respFlightRouteArrayFirst;
      return $this;
    }

}
