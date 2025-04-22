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
