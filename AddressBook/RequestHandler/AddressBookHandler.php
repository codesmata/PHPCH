<?php namespace AddressBook\RequestHandler;

use Slim\Slim;
use AddressBook\Business\AddressBook;

class AddressBookHandler
{
    private $app;
    private $params;
    private $request;
    private $addressBook;

    public function __construct(Slim $app, $params = null){
        $this->app = $app; //Inject Slim Application
        $this->params = $params; //other Parameters
        $this->request = $app->request();
        $this->addressBook = new AddressBook();
    }

    public function createContact()
    {
        $name = $this->request->post('name');
        $email = $this->request->post('email');

        $errors = false;

        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = true;
            $errorMessage = "Invalid Email Address";
        }

        if ($errors) {
            $this->app->flash('error', $errorMessage);
            $this->app->redirect('/add');
        }

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $this->addressBook->createContact([
            'name' => $name,
            'email' => $email,
        ]);

        $this->app->redirect('/list');
    }

    /**
     * This function gets the address book for this user.
     */
    public function listContacts()
    {
        $addressBook = $this->addressBook->getContacts();
        $this->app->render("address_book.php", array("book" => $addressBook));
    }
}
