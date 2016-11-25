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
$passengers= array(); // to set the array to stock the info of the passengers

$error=false;  //To make the navigation between the pages

$placesErr="";
$destErr="";
$nameErr=[];
$ageErr=[];


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
                $reservation=new Reservation();
                $SESSION['reserv']=$reservation;
                include('view_reserv.php');
                $step=NULL;

                break;
            }
            else{

                if (empty($_POST["destination"])) {
                    $destErr = "Destination requise";
                    $error=true;
                } else {
                    $reservation->setDestination($_POST['destination']);
                    $destErr="";
                }
                if (empty($_POST["places"])) {
                    $placesErr = "Entrer un nombre de places";
                    $error=true;}

                //to insure us that the number will be between the span of the numbers attended
                //already taken by the min and max value of the type number
                else if ($_POST["places"]<1 || $_POST["places"]>10) {
                    $placesErr = "Entrer un nombre de places valide (entre 1 et 10)";
                    $error=true;
                } else {
                    $reservation->setPlace($_POST['places']);
                    $placesErr="";
                }



                $reservation->setPlace($_POST['places']);
                if (isset($_POST["assurance"])){

                    $reservation->setAssurance(true);
                }

                $_SESSION['reserv']=serialize($reservation);
                if($error==true){
                    include('view_reserv.php');
                    break;
                }
                else{
                    include('view_detail.php');
                    break;
                }



            }
            break;


        case 2:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                $reservation=new Reservation();
                $SESSION['reserv']=$reservation;
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

                for($i=0;$i<$reservation->getPlace();$i++){
                    $error=false;
                    if(empty($_POST["exampleInputName".$i])){
                        array_push($nameErr,"Nom Requis");
                        $error=true;
                    }
                    else{
                        array_push($passengers, array($_POST["exampleInputName".$i]));
                        array_push($nameErr,"");
                    }
                    if (empty($_POST["exampleInputAge".$i])){
                        array_push($ageErr,"Age requis");
                        $error=true;
                    }
                    else if (isset($passengers[$i])){
                        array_push($passengers[$i],$_POST["exampleInputAge".$i]);
                        array_push($ageErr,"");
                    }

                    $reservation->setPersonne($passengers);

                }
                $_SESSION['reserv']=serialize($reservation);
                if ($error==true){

                    include("view_detail.php");
                    break;
                }
                else {
                    include('view_valid.php');
                    break;
                }

            }

            break;
        case 3:
            $reservation=unserialize($_SESSION['reserv']);
            if (isset($_POST['cancel']) && $_POST['cancel']=="Annuler la réservation")
            {
                session_destroy();
                $reservation=new Reservation();
                $SESSION['reserv']=$reservation;
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
            $_SESSION['reserv']=serialize($reservation);
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
