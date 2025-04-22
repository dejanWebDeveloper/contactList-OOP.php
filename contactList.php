<?php
/*
TASK:
Contact
    name
    email
    *display contact data
    *search with keyword
CompanyContact
    All like Contact
    + adress
PersonContact
    All like Contact
    + phone number
ContactList
    contacts - array
    *addContact
    *displayContact
    *searchContact
 */
/**
 * Contact is parent class
 */
class Contact
{
    protected $name;
    protected $email;
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function __construct($name, $email)
    {
        $this->setName($name);
        $this->setEmail($email);
    }
    /**
     * Methode for displaying informations about contact
     * @return void
     */
    public function displayContact()
    {
        echo "Name: " . $this->getName() . "<br>";
        echo "Email: " . $this->getEmail() . "<br>";
    }
    /**
     * Methode for searching avaliable contact with keyword
     * @param mixed $keyword
     * @return void
     */
    public function searchWithKeyword($keyword)
    {
        //searching avaliable name
        if (stripos($this->getName(), $keyword) !== false) {
            echo "Keyword exist in contact name!<br>";
            echo $this->getName(). "<br>";
            echo "<hr>";
        }//searching avaliable email
        if (stripos($this->getEmail(), $keyword) !== false) {
            echo "Keyword exist in contact email!<br>";
            echo $this->getEmail() . " (Contact name: ". $this->getName(). ")<br>";
            echo "<hr>";
        } 
        
    }
}
/**
 * Contact informations about companies
 */
class CompanyContact extends Contact
{
    protected $address;
    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function __construct($name, $email, $address)
    {
        parent::__construct($name, $email);
        $this->setAddress($address);
    }
    /**
     * Parent methode displayContact / override 
     * @return void
     */
    public function displayContact()
    {
        echo "COMPANY CONTACT INFORMATION<br>";
        parent::displayContact();
        echo "Address: " . $this->getAddress() . "<br>";
        echo "<hr>";
    }
    /**
     * Parent methode searchWithKeyword / override
     * @param mixed $keyword
     * @return void
     */
    public function searchWithKeyword($keyword)
    {
        
        parent::searchWithKeyword($keyword);
        if (stripos($this->getAddress(), $keyword) !== false) {
            echo "Keyword exist in contact address!<br>";
            echo $this->getAddress() . " (Contact name: ". $this->getName(). ")<br>";
            echo "<hr>";
        }
    }
}
/**
 * Contact informations about some person
 */
class PersonContact extends Contact
{
    protected $phoneNumber;
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    /**
     * Built-in methode for construct objects
     * @param string $name
     * @param string $email
     * @param mixed $phoneNumber
     */
    public function __construct($name, $email, $phoneNumber)
    {
        parent::__construct($name, $email);
        $this->setPhoneNumber($phoneNumber);
    }
    /**
     * Parent methode displayContact / override
     * @return void
     */
    public function displayContact()
    {
        echo "PERSON CONTACT INFORMATION<br>";
        parent::displayContact();
        echo "Phone: " . $this->getPhoneNumber() . "<br>";
        echo "<hr>";
    }
    /**
     * Parent methode searchWithKeyword / override
     * @param mixed $keyword
     * @return void
     */
    public function searchWithKeyword($keyword)
    {
        parent::searchWithKeyword($keyword);
        if (stripos($this->getPhoneNumber(), $keyword) !== false) {
            echo "Keyword exist in contact phone number!<br>";
            echo $this->getPhoneNumber() . " (Contact name: ". $this->getName(). ")<br>";
            echo "<hr>";
        }
    }
}
/**
 * Class which include all contact informations and save its in array
 */
class ContactList extends Contact
{
    /**
     * define empty array
     * @var
     */
    protected $contacts = [];
    /**
     * getter/setter methodes 
     * @return 
     */
    public function getContacts()
    {
        return $this->contacts;
    }
    /**
     * add contact one per one
     * @param Contact $contact
     * @return static
     */
    public function addContact(Contact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }
    /**
     * add array of contact
     * @param mixed $contacts
     * @return void
     */
    public function setContacts($contacts)
    {
        $this->contacts = [];
        foreach ($contacts as $contact) {
            $this->addContact($contact);
        }
    }
    public function __construct(){
        $this->contacts = [];
    }
    /**
     * Parent methode searchWithKeyword / override
     * @param mixed $keyword
     * @return void
     */
    public function searchWithKeyword($keyword){
        foreach ($this->getContacts() as $contact) {
            $contact->searchWithKeyword($keyword);
        }
    }
    /**
     * Parent methode displayContact / override
     * @return void
     */
    public function displayContact()
    {
        foreach ($this->getContacts() as $contact) {
            $contact->displayContact();
        }
    }
}
$companyContact01 = new CompanyContact("Developer", "dev@gmail.com", "Web Design 3");
$companyContact02 = new CompanyContact("Science", "science@gmail.com", "Program 3");
$companyContact03 = new CompanyContact("Routines", "routines@gmail.com", "Developer 3");
$personContact01 = new PersonContact("Jovan Jovic", "jovan@gmail.com", "066586936");
$personContact02 = new PersonContact("Oliver Nedeljkovic", "oliver@gmail.com", "066554888");
$personContact03 = new PersonContact("Mitar Miric", "mitar@gmail.com", "066155445");

$contactList = new ContactList();
$contactList->addContact($companyContact01)
    ->addContact($companyContact02)
    ->addContact($companyContact03)
    ->addContact($personContact01)
    ->addContact($personContact02)
    ->addContact($personContact03);

////////////// testing ///////////////

$contactList->searchWithKeyword("jov");
$contactList->displayContact();