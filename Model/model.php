

<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */


//This will contain the data in object


class Reservation
{
    //to init the different variable
    private $_destination;
    private $_place;
    private $_oldplace;
    private $_assurance;
    private $_passengers=array();
    private $_error=false;
    private $_nameErr=array();
    private $_ageErr=array();
    private $_destErr="";
    private $_placesErr="";
    private $_reservID;
    private $_step;



    //We have to set all the variable from this class at once

    //To set the value and define them
    //We have to set each value at the time
    //and every variable is retrievable with the getters
    public function setReservID($reservID)
    {
        $this->_reservID=$reservID;
    }
    public function getReservID()
    {
        return $this->_reservID;
    }
    public function setStep($step)
    {
        $this->_step=$step;
    }
    public function getStep()
    {
        return $this->_step;
    }
    public function setDestination($destination)
    {
        $this->_destination = $destination;
    }
    public function getDestination()
    {
        return $this->_destination;
    }
    public function setPlace($place)
    {
        $this->_place = $place;
    }
    public function getPlace()
    {
        return $this->_place;
    }
    public function setOldPlace($place)
    {
        $this->_oldplace = $place;
    }
    public function getOldPlace(){
        return $this->_oldplace;
    }
    public function setAssurance($assurance)
    {
        $this->_assurance = $assurance;
    }
    public function assuranceCheck()
    {
        return $this->_assurance;
    }
    public function getPassengers()
    {
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
    public function getNameErr()
    {
        return $this->_nameErr;
    }
    public function setAgeErr($ageErr)
    {
        $this->_ageErr = $ageErr;
    }
    public function getAgeErr()
    {
        return $this->_ageErr;
    }
    public function setError($error)
    {
        $this->_error = $error;
    }
    public function getError()
    {
        return $this->_error;
    }
    public function setPlacesErr($placesErr)
    {
        $this->_placesErr = $placesErr;
    }
    public function getPlacesErr()
    {
        return $this->_placesErr;
    }
    public function setDestErr($destErr)
    {
        $this->_destErr = $destErr;
    }
    public function getDestErr()
    {
        return $this->_destErr;
    }

}


?>