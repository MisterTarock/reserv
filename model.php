

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
    private $_personne;
    private $_assurance;


    public function destination()
    {
        return $this->_destination;  //To resend the value, it the same thing as a get
    }
    public function place()
    {
        return $this->_place;
    }
    public function assurance()
    {
        return $this->_assurance;
    }
    public function personne()
    {
        return $this->_personne;
    }
    public function setDestination($destination)  //To set the value
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

    //public function setPersonne($tab)
    //{
        /*array_push($this->_personne, array($name, $age));*/
     //   $this->_personne = $tab;
    // }
}
?>