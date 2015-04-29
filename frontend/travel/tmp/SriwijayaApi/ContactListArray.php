<?php

class ContactListArray
{

    /**
     * @var ContactListArrays[] $ContactListArray
     */
    protected $ContactListArray = null;

    /**
     * @param ContactListArrays[] $ContactListArray
     */
    public function __construct(array $ContactListArray)
    {
      $this->ContactListArray = $ContactListArray;
    }

    /**
     * @return ContactListArrays[]
     */
    public function getContactListArray()
    {
      return $this->ContactListArray;
    }

    /**
     * @param ContactListArrays[] $ContactListArray
     * @return ContactListArray
     */
    public function setContactListArray(array $ContactListArray)
    {
      $this->ContactListArray = $ContactListArray;
      return $this;
    }

}
