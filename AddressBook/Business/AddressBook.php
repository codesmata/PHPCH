<?php namespace AddressBook\Business;

use AddressBook\Data\Model\Contact as Book;

class AddressBook
{

    private $addressBook;

    public function __construct()
    {
        $this->addressBook = new Book();
    }

    /**************************************************
     * | Address BOok APIs
     ***************************************************/

    /**
     * This function creates a contact and returns its id.
     * @param array $details
     * @return string
     */
    public function createContact(array $details)
    {
        $name = $details['name'];
        $email = $details['email'];
        return $this->addressBook->getOriginalPersistenceObject()->customQuery("Insert into contact values(null, '$name', '$email')");
    }

    /**
     * This function returns all contacts
     * @param $contactId
     * @return array
     */
    public function getContacts()
    {

        return $this->addressBook->getOriginalPersistenceObject()->getResult(
            $this->addressBook->getOriginalPersistenceObject()->customQuery("select * from contact")
        );
    }

}
