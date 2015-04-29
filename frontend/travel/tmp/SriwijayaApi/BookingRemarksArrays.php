<?php

class BookingRemarksArrays
{

    /**
     * @var string $CommentText
     */
    protected $CommentText = null;

    /**
     * @var string $CreatedBy
     */
    protected $CreatedBy = null;

    /**
     * @var string $CreatedDate
     */
    protected $CreatedDate = null;

    /**
     * @var string $IpAddress
     */
    protected $IpAddress = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCommentText()
    {
      return $this->CommentText;
    }

    /**
     * @param string $CommentText
     * @return BookingRemarksArrays
     */
    public function setCommentText($CommentText)
    {
      $this->CommentText = $CommentText;
      return $this;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
      return $this->CreatedBy;
    }

    /**
     * @param string $CreatedBy
     * @return BookingRemarksArrays
     */
    public function setCreatedBy($CreatedBy)
    {
      $this->CreatedBy = $CreatedBy;
      return $this;
    }

    /**
     * @return string
     */
    public function getCreatedDate()
    {
      return $this->CreatedDate;
    }

    /**
     * @param string $CreatedDate
     * @return BookingRemarksArrays
     */
    public function setCreatedDate($CreatedDate)
    {
      $this->CreatedDate = $CreatedDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
      return $this->IpAddress;
    }

    /**
     * @param string $IpAddress
     * @return BookingRemarksArrays
     */
    public function setIpAddress($IpAddress)
    {
      $this->IpAddress = $IpAddress;
      return $this;
    }

}
