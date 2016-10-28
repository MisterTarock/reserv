<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */

/**
_________                __                 __   __
\_   ___ \  ____   _____/  |________  ____ |  | |  |   ___________
/    \  \/ /  _ \ /    \   __\_  __ \/  _ \|  | |  | _/ __ \_  __ \
\     \___(  <_> )   |  \  |  |  | \(  <_> )  |_|  |_\  ___/|  | \/
 \______  /\____/|___|  /__|  |__|   \____/|____/____/\___  >__|
        \/            \/                                  \/

**/
//This will be the logic file were the data will be calculated

session_start();  //We have to make a session to stock the value between the different view
/**
if (!isset($_SESSION["res"]))   //If the session didn't exist we will create one
{
    $reservation     = new Reservation;
    $_SESSION["res"] = $reservation;
}

else   //If the session already exist, we retake it
{
    $reservation = $_SESSION["res"];
}
**/

// To init the value and set the error below
$destinationErr = "";
$placeErr       = "";
$nameErr        = array();
$ageErr         = array();
$person         = array();
$error          = false;
$refresh        = "";


/** gets the step from current form
 *  the step help us to know where we are in the recording process of a reservation
 **/
$step = isset($_POST['step']) ? $_POST['step'] : NULL;
if ($step && $_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($step) {
        /** Validation of the form, error handling and
         *  redirection to the correct view according to that
         **/

        case 1:
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation'){
                include('view_reserv.php');
                $step=NULL;
                break;

            }
            include('view_detail.php');
            break;


    }
} else {
    switch ($step) {
        case 1:
            include("view_detail.php");
            break;
        default:

            include('view_reserv.php');



    }
}
// Function to validate input to prevent XSS injections.
//This way we protect our program from any SQL and javascript script to preserve our database from any hacking
/**
function input_validation($data)
{
    //to protect against javascript and block the interpreter to read the text as text only and not as command
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($data);  //to protect against SQL
    return $data;
}




if (isset($_POST['sumbit'])) {


    $_session['destination']=$_POST['destination'];
    $_session['places']=$_POST['places'];
    $_session['insurance']=$_POST['insurance'];
    include 'view_detail.php';
}
else{
    include"view_reserv.php";
}**/
?>
