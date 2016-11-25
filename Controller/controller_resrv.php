<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */

include_once("Model/model.php");

 //each controller calls the model that are needed

/*This will be the logic file were the data will be calculated*/


if (!isset($SESSION['reserv'])){
    $reservation=new Reservation();
    $SESSION['reserv']=$reservation;

}
else   //If the session already exist, we retake it
{
    $reservation = $_SESSION["reserv"];
}


$passengers=array();



/** gets the step from current form
 *  the step help us to know where we are in the recording process of a reservation
 **/
$step = isset($_POST['step']) ? $_POST['step'] : NULL;
if ($step && $_SERVER["REQUEST_METHOD"] == "POST")
{
    switch ($step)
    {
        /** Validation of the form, error handling and
         *  redirection to the correct view according to that
         **/

        case 1:
            if (isset($_SESSION['assurance'])){
                $reservation->setAsssurance(true);
            }
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                include('View/view_reserv.php');
                $step=NULL;

                break;
            }
            else{

                if (empty($_POST["destination"])) {
                    $reservation->setDestErr("Destination requise");
                    $reservation->setError(true);
                } else {
                    $reservation->setDestination($_POST['destination']);
                    $reservation->setDestErr("");
                }
                if (empty($_POST["places"])) {
                    $reservation->setPlacesErr("Entrer un nombre de places");
                    $reservation->setError(true);}
                //to insure us that the number will be between the span of the numbers attended
                //already taken by the min and max value of the type number
                else if ($_POST["places"]<1 || $_POST["places"]>10) {
                    $reservation->setPlacesErr("Entrer un nombre de places valide (entre 1 et 10)");
                    $reservation->setError(true);
                } else {
                    $reservation->setPlace($_POST['places']);
                    $reservation->setPlacesErr("");
                }



                $reservation->setPlace($_POST['places']);
                if (isset($_POST["assurance"])){

                    $reservation->setAssurance(true);
                }

                $_SESSION['reserv']=serialize($reservation);
                if($reservation->getError()==true){
                    include('View/view_reserv.php');
                    break;
                }
                else{
                    include('View/view_detail.php');
                    break;
                }



            }
            break;


        case 2:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                $step=NULL;
                include('View/view_reserv.php');


                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente"){
                include('View/view_reserv.php');
                $step=1;

                break;

            }
            else{

                for($i=0;$i<$reservation->getPlace();$i++){
                    array_push($passengers, array($_POST["exampleInputName".$i]));
                    array_push($passengers[$i],$_POST["exampleInputAge".$i]);
                    $reservation->setPersonne($passengers);

                }

                /*
              if (empty($_POST["name"])) {
                  $nameErr = "Nom requis";
                  $error=true;
              }
              else {
                  $reservation->setName($_POST['name']);
                  $nameErr="";
              if (empty($_POST["age"])) {
                  $ageErr = "Age requis";
                  $error=true;
              }
              else {
                  $reservation->setAge($_POST['age']);
                  $ageErr="";
              */


                $_SESSION['reserv']=serialize($reservation);
                include('View/view_valid.php');
                break;

            }

            break;
        case 3:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=="Annuler la réservation")
            {
                session_destroy();
                $_assurance=NULL;
                include('View/view_reserv.php');
                $step=NULL;

                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente"){
                include('View/view_detail.php');
                $step=2;

                break;

            }
            $_SESSION['reserv']=serialize($reservation);
            include('View/view_confirm.php');
            break;


    }
}

else
    {
        switch ($step)
        {

            default:
                include('View/view_reserv.php');

        }
    }
