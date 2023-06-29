<?php
namespace App;

class Database
{
    private $dbconn;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        // You will need to change these values to match your database
        // host, username, password, and database name
        $this->dbconn = mysqli_connect("localhost", "phpcrud", "password", "php_crud");
    }

    /**
     * Returns all contacts from the database
     */
    public function getContacts()
    {
        $sql = "SELECT * FROM contacts";
        $result = mysqli_query($this->dbconn, $sql);
        $contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $contacts;
    }

    /**
     * Adds a new contact to the database
     */
    public function addContact($name_first, $name_last, $email, $birthday)
    {
        $sql = "INSERT INTO contacts (name_first, name_last, email, birthday) VALUES ('$name_first', '$name_last', '$email', '$birthday')";
        mysqli_query($this->dbconn, $sql);
    }

    /**
     * Returns a single contact from the database
     */
    public function getContact($id)
    {
        $sql = "SELECT * FROM contacts WHERE id = $id";
        $result = mysqli_query($this->dbconn, $sql);
        $contact = mysqli_fetch_assoc($result);
        return $contact;
    }

    /**
     * Updates a contact in the database
     */
    public function updateContact($id, $name_first, $name_last, $email, $birthday)
    {
        $sql = "UPDATE contacts SET name_first = '$name_first', name_last = '$name_last', email = '$email', birthday = '$birthday' WHERE id = $id";
        mysqli_query($this->dbconn, $sql);
    }

    /**
     * Deletes a contact from the database
     */
    public function deleteContact($id)
    {
        $sql = "DELETE FROM contacts WHERE id = $id";
        mysqli_query($this->dbconn, $sql);
    }
}