

<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */


//This will contain the data in object


class Reservation
{

    private $_destination; //to init the different variable
    private $_place;
    private $_assurance;
    private $_passengers=array();
    private $_error=false;
    private $_nameErr;
    private $_ageErr;
    private $_destErr="";
    private $_placesErr="";



    //To make the construct
    //We have to set all the variable from this class at once

    //To set the value and define them
    //We have to set each value at the time
    public function setDestination($destination)
    {
        $this->_destination = $destination;
    }
    public function getDestination(){
        return $this->_destination;
    }
    public function setPlace($place)
    {
        $this->_place = $place;
    }
    public function getPlace(){
        return $this->_place;
    }
    public function setAssurance($assurance)
    {
        $this->_assurance = $assurance;
    }
    public function assuranceCheck(){
        return $this->_assurance;
    }
    public function getPassengers(){
        return $this->_passengers;
    }
    public function setPersonne($person)
    {
        $this->_passengers = $person;
    }
    public function setNameErr($nameErr)
    {
        $this->_nameErr = $nameErr;
    }
    public function getNameErr(){
        return $this->_nameErr;
    }
    public function setAgeErr($ageErr)
    {
        $this->_ageErr = $ageErr;
    }
    public function getAgeErr(){
        return $this->_ageErr;
    }
    public function setError($error)
    {
        $this->_error = $error;
    }
    public function getError(){
        return $this->_error;
    }
    public function setPlacesErr($placesErr)
    {
        $this->_placesErr = $placesErr;
    }
    public function getPlacesErr(){
        return $this->_placesErr;
    }
    public function setDestErr($destErr)
    {
        $this->_destErr = $destErr;
    }
    public function getDestErr(){
        return $this->_destErr;
    }

}


?>