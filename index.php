<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */
include_once("model.php");

/*This will be the logic file were the data will be calculated*/

session_start();  //We have to make a session to stock the value between the different view
if (!isset($SESSION['reserv'])){
    $reservation=new Reservation();
    $SESSION['reserv']=$reservation;

}
else   //If the session already exist, we retake it
{
    $reservation = $_SESSION["reserv"];
}


// To init the value and set the error below


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
                include('view_reserv.php');
                $step=NULL;

                break;
            }
            else{

                $reservation->setDestination($_POST['destination']);
                $reservation->setPlace($_POST['places']);
                if (isset($_POST["assurance"])){
                    echo "BITE";
                    $reservation->setAssurance(true);
                }

                $_SESSION['reserv']=serialize($reservation);

                include('view_detail.php');
                break;

            }
            break;


        case 2:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                $step=NULL;
                include('view_reserv.php');


                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente"){
                include('view_reserv.php');
                $step=1;

                break;

            }
            else{
                $nom=$_POST["exampleInputName"];
                $age=$_POST["exampleInputAge"];
                foreach($nom as $i=> $nom){

                    $reservation->addPerson(new Personne($nom,$age[$i]));

                }
                echo count($reservation->getPassengers());

                $_SESSION['reserv']=serialize($reservation);
                include('view_valid.php');

            }

            break;
        case 3:
            if (isset($_POST['cancel']) && $_POST['cancel']=="Annuler la réservation")
            {
                session_destroy();
                $_assurance=NULL;
                include('view_reserv.php');
                $step=NULL;

                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente"){
                include('view_detail.php');
                $step=2;

                break;

            }
            include('view_confirm.php');
            break;


    }
}

else
    {
        switch ($step)
        {

            default:
                include('view_reserv.php');

        }
    }
