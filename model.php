

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
    public function addPerson($personne,$i){
        ${"person$i"}=new Personne($personne);
        $this->_passengers[]=${"variable$i"};
    }
    public function getPassengers(){
        return $this->_passengers;
    }
    public function setPersonne($person)
    {

        $this->_passengers = $person;
    }
}


?>