<?php
class Contact
{
    private $id;
    private $location;
    private $open;
    private $close;
    private $email;
    private $phone;

    public function __construct($array)
    {
        foreach ($array as $contact => $value) {
            $this->$contact = $value;
        }
    }

    // Getter and Setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    public function getOpen()
    {
        return $this->open;
    }

    public function setOpen($open)
    {
        $this->open = $open;

        return $this;
    }

    public function getClose()
    {
        return $this->close;
    }

    public function setClose($close)
    {
        $this->close = $close;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}
