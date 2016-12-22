<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */




include_once("../Model/model.php");
session_start();
//each controller calls the model that are needed

/*This will be the logic file were the data will be calculated*/
$passengers=array();
//opening the database used in the whole controller
$db = new mysqli('localhost', 'root', '', 'mysqli') or die('Could not select database');
if ($db->connect_errno) {
    echo 'Echec lors de la connexion à MySQLi : ('.$db->connect_errno.') '.$db->connect_error;
}
//establishes a list of the available bookings from the database and sends it to the view
$request="SELECT * FROM mysqli.reservations";
$query=$db->query($request);
include("../View/view_checkDB.php");

//in case the user clicked on edit or delete, we retrieve the id of the reservation and the operation name from the URL
if(isset($_GET['id'])){$id=$_GET['id'];}
if(isset($_GET['page']))
{
    $page=$_GET['page'];

    if ($page=='edit' && isset($_GET['id'])){
        //in case of edition
        $sql="SELECT * FROM mysqli.reservations
              WHERE ID=".$id;
        $qEdit=$db->query($sql);
        $reservation = new Reservation;
        $_SESSION["reserv"] = $reservation;
        //we fetch every data from the database and we store it in the session
        $row=$qEdit->fetch_array(MYSQLI_ASSOC);
        $reservation->setAssurance($row['Assurance']);
        $reservation->setDestination($row['Destination']);
        $SQL="SELECT * FROM mysqli.passengers
              WHERE Reservation=".$id;
        $qEditBis=$db->query($SQL);
        $i=0;
        //fetch the passengers from the passengers database
        while($line = $qEditBis->fetch_array()) {
            array_push($passengers, array($line['Name']));
            array_push($passengers[$i], $line['Age']);
            $i+=1;
        }
        $reservation->setOldPlace($i);
        $reservation->setPlace($i);
        $reservation->SetPersonne($passengers);
        $reservation->setReservID($id);
        $_SESSION['reserv']=serialize($reservation);
        //redirecton to the main controller with the session filled
        header('location:../index.php');

    }
    //in case of deletion
    if ($page=='del')
    {
        $SQL="DELETE FROM mysqli.passengers
              WHERE Reservation=".$id;
        $qEditBis=$db->query($SQL);
        $SQL="DELETE FROM mysqli.reservations
              WHERE ID=".$id;
        $qEditBis=$db->query($SQL);
        session_destroy();

        header("location:controller_DB.php");
    }
}



