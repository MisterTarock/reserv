

<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */


//This will contain the data in object


class Reservation
{
    private $_destination=NULL; //to init the different variable
    private $_place=NULL;
    private $_assurance=NULL;


    //To make the construct
    //We have to set all the variable from this class at once
    public function __construct($destination, $place, $assurance)
    {
        $this->_destination = $destination;  //To resend the value, it the same thing as a get
        $this->_place = $place;
        $this->_assurance = $assurance;
    }

    //To set the value and define them
    //We have to set each value at the time
    public function setDestination($destination)
    {
        $this->_destination = $destination;
    }
    public function setPlace($place)
    {
        $this->_place = $place;
    }
    public function setAssurance($assurance)
    {
        $this->_assurance = $assurance;
    }
}

class Personne
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

?>