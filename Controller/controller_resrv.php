<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */

//database opening with error management used in the whole script
$db = new mysqli('localhost', 'root', '', 'mysqli') or die('Could not select database');

if ($db->connect_errno)
{
    echo 'Echec lors de la connexion à MySQLi : ('.$db->connect_errno.') '.$db->connect_error;
}

include('Model/model.php');


/*This will be the logic file were the data will be calculated*/

//check if there is an existing Session. If so, the programs loads it. If not,  it creates a new one
if(!isset($_SESSION['reserv']))
{
    $reservation=new Reservation();
    $_SESSION['reserv']=serialize($reservation);
}
else
{
    $reservation=unserialize($_SESSION['reserv']);
}

$nameErr=array();
$ageErr=array();
$passengers=array();


/*Since we stay always on the same controller, we use a step system in order to navigate trough the pages*/
$step = isset($_POST['step']) ? $_POST['step'] : NULL;
if ($step && $_SERVER["REQUEST_METHOD"] == "POST")
{
    switch ($step)
    {
        /** Validation of the form, error handling and
         *  redirection to the correct view according to that
         **/


        case 1:
            //checks if the checkbox is checked
            if (isset($_SESSION['assurance']))
            {
                $reservation->setAsssurance(true);
            }
            //In case we click on the "Annuler la réservation" button , it destroys the session
            // and goes back to homepage
            if (isset($_POST['cancel']) && $_POST['cancel']=='Annuler la réservation')
            {
                session_destroy();
                include('View/view_reserv.php');
                $step=NULL;

                break;
            }

            else
            {
                //various errors management (checks if destination/#of places is empty) and fills the Session if no
                // error is thrown


                if (empty($_POST["destination"]))
                {
                    // in case of an error , it displays the type above the input
                    $reservation->setDestErr("Destination requise");
                    //this error is checked at the end of the step
                    $reservation->setError(true);
                }
                else
                {
                    //To protect us against XSS injection we set an "htmlspecialchars"
                    // to render the html and javascript as plain text in our input
                    $reservation->setDestination(htmlspecialchars($_POST['destination']) );
                    $reservation->setDestErr("");
                }

                //same error management than the destination
                if (empty($_POST["places"]))
                {
                    $reservation->setPlacesErr("Entrer un nombre de places");
                    $reservation->setError(true);}
                //to insure us that the number will be between the span of the numbers attended
                //already taken by the min and max value of the type number
                else if (htmlspecialchars($_POST["places"]<1 || $_POST["places"]>10))
                {
                    //we added a maximum of 10 bookable places at once
                    $reservation->setPlacesErr("Entrer un nombre de places valide (entre 1 et 10)");
                    $reservation->setError(true);
                }
                else
                {
                    $reservation->setPlace(htmlspecialchars($_POST['places']));
                    $reservation->setPlacesErr("");
                }


                //stores the number of places
                $reservation->setPlace(htmlspecialchars($_POST['places']));
                if (isset($_POST["assurance"])){

                    //stores if there is an insurance or not
                    $reservation->setAssurance('Yes');
                }
                else
                {
                    $reservation->setAssurance('No');
                }


                //here we check if there has been any error. If so, we reload the page with the errors displayed
                // (see view).
                if($reservation->getError()==true)
                {
                    $_SESSION['reserv']=serialize($reservation);
                    include('index.php');
                    break;
                }
                else
                {
                    // if there were no error, we put the registered values in the database
                    $dest=$reservation->getDestination();
                    $insu=$reservation->AssuranceCheck();
                    //if it's the 'edit reservation' case, we update the database fields
                    if ($reservation->getReservID()!=NULL)
                    {
                        //We use "mysql_real_escape_string" to conserve the symbol as plain text
                        // and protect our SQL dataBase
                        $sql = "UPDATE mysqli.reservations SET Destination='" .
                                $db->real_escape_string($dest) . "',Assurance='" .
                                $db->real_escape_string($insu) . "'WHERE ID=".$reservation->getReservID();

                    }

                    //if it's a new reservation, we create a new entry in the DB
                    else
                    {

                        $sql = "INSERT INTO mysqli.reservations (Destination, Assurance) VALUES ('" .
                                $db->real_escape_string($dest) . "','" .
                                $db->real_escape_string($insu) . "') ";
                        //To display the error
                        //die($sql);
                    }
                    if ($db->query($sql) == true)
                    {
                        //stores the ID of the reservation (useful later)
                        $id_insert = $db->insert_id;
                        if ($reservation->getReservID()==NULL)
                        {
                            $reservation->setReservID($id_insert);
                        }
                    }
                    else
                    {
                        echo 'Error inserting record: '.$db->error;
                    }
                    $_SESSION['reserv']=serialize($reservation);
                    //redirection to the next view
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
                $reservation=new Reservation();
                $SESSION['reserv']=$reservation;

                include('View/view_reserv.php');
                $step=NULL;

                break;
            }
            //In case the "retour à la page précédente" is pressed
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente")
            {
                include('View/view_reserv.php');
                $step=1;

                break;

            }
            else
            {
                $reservation->setError(false);
                $id_travel = $reservation->getReservID();

                //we have to check if there is already a session with persons included (edit case) and if there is,
                //We have to check if the number of places has chaged

                if ($reservation->getReservID()!=NULL
                    && $reservation->getPlace()!=$reservation->getOldPlace())
                {
                    //if the number of places have changed we have to delete all the people for the reservation in order
                    //to insert the new ones
                    $sql = "DELETE FROM mysqli.passengers WHERE Reservation=".
                            $db->real_escape_string($id_travel);

                    $qEditBis=$db->query($sql);}
                //for every input we do the next things:
                for ($i = 0; $i < $reservation->getPlace(); $i++)
                {
                    //check if there is no name and throw an error in that case
                    if (empty($_POST["exampleInputName" . $i]))
                    {
                        array_push($nameErr,"Nom requis");
                        array_push($passengers, array(''));

                        $reservation->setError(true);
                    }
                    else
                    {
                        //if there is a name, we add it on an array with the following structure:
                        // passengers[person[name,Age]]
                        array_push($passengers, array(htmlspecialchars($_POST["exampleInputName" . $i])));
                        array_push($nameErr,"");

                    }
                    if (empty($_POST["exampleInputAge" . $i]))
                    //same goes for the age
                    {
                        array_push($ageErr,"Age requis");
                        $reservation->setError(true);
                    }
                    else
                    {

                        array_push($passengers[$i], $_POST["exampleInputAge" . $i]);
                        array_push($ageErr,"");
                    }
                    if ($reservation->getError()==false)
                    {
                        $dude=$passengers[$i][0];
                        $dudesAge=$passengers[$i][1];


                        //checks if the number of places changed in case of edition

                        if ($reservation->getReservID()!=NULL
                            && $reservation->getPlace()!=$reservation->getOldPlace())
                        {
                            //We use "mysql_real_escape_string" to conserve the symbol as plain text
                            // and protect our SQL dataBase
                            $voyager = "INSERT INTO mysqli.passengers( Name, Age, Reservation) VALUES('" .
                                        $db->real_escape_string($dude) . "','" .
                                        $db->real_escape_string($dudesAge) . "','" .
                                        $db->real_escape_string($id_travel) . "')";
                                        //To display the error
                                        //die($sql);
                        }
                        if($reservation->getPassengers()!=NULL
                            && intval($reservation->getPlace())==$reservation->getOldPlace())
                        {
                            //if it's an edition but the number of places hasn't changed
                            $voyager = "UPDATE mysqli.passengers SET Name='$dude', Age='$dudesAge' WHERE Reservation=".
                                        $db->real_escape_string($id_travel);


                        }
                        else
                        {

                            //if it's a new reservation

                            $voyager = "INSERT INTO mysqli.passengers( Name, Age, Reservation) VALUES('" .
                                        $db->real_escape_string($dude) . "','" .
                                        $db->real_escape_string($dudesAge) . "','" .
                                        $db->real_escape_string($id_travel) . "')";

                        }
                    }


                    if ($db->query($voyager) == true)
                    {
                        //echo 'Record updated successfully';
                        $id_insert = $db->insert_id;
                    }
                    else
                    {
                        echo 'Error inserting record: '.$db->error;
                    }

                }
                //in the end the arrays of passengers and errors are stored in the Session

                $reservation->setPersonne($passengers);
                $reservation->setNameErr($nameErr);
                $reservation->setAgeErr($ageErr);

                if($reservation->getError()==false)
                {
                    $_SESSION['reserv']=serialize($reservation);
                    include('View/view_valid.php');
                    break;
                }
                else
                {
                    $_SESSION['reserv']=serialize($reservation);
                    include('View/view_detail.php');
                    break;
                }

            }
        case 3:
            $reservation=unserialize($_SESSION['reserv']);

            if (isset($_POST['cancel']) && $_POST['cancel']=="Annuler la réservation")
            {
                session_destroy();
                $reservation=new Reservation();
                $SESSION['reserv']=$reservation;
                $_assurance=NULL;
                include('View/view_reserv.php');
                $step=NULL;

                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente")
            {
                include('View/view_detail.php');
                $step=2;

                break;
            }
            $_SESSION['reserv']=serialize($reservation);
            include('View/view_confirm.php');
            break;

        case 4:

            if (isset($_POST['cancel']) && $_POST['cancel']=="Retour à la page d'accueil")
            {
                session_destroy();
                $reservation=new Reservation();
                $SESSION['reserv']=$reservation;
                $_SESSION['reserv']=serialize($reservation);
                $_assurance=NULL;
                include('View/view_reserv.php');
                $step=NULL;

                break;
            }
            else if (isset($_POST['return']) && $_POST['return']=="Retour à la page précedente")
            {
                $_SESSION['reserv']=serialize($reservation);
                include('View/view_valid.php');
                $step=3;

                break;
            }
            $_SESSION['reserv']=serialize($reservation);

            break;
    }
}

else {
        switch ($step)
        {
            default:
                include('View/view_reserv.php');
        }
    }
