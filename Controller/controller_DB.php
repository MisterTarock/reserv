<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */




include_once("../Model/model.php");

//each controller calls the model that are needed

/*This will be the logic file were the data will be calculated*/


$db = new mysqli('localhost', 'root', '', 'mysqli') or die('Could not select database');
if ($db->connect_errno) {
    echo 'Echec lors de la connexion à MySQLi : ('.$db->connect_errno.') '.$db->connect_error;
}
$request="SELECT * FROM mysqli.reservations";
$query=$db->query($request);
include("../View/view_checkDB.php");
if ($_POST['edit']&&$_POST['delete']){
    if ($_POST['edit']=="Editer"){
        $id=$_POST['id'];
        $sql="SELECT * FROM mysqli.reservations
WHERE ID=".$id;
        $qEdit=$db->query($sql);
        $reservation = new Reservation;
        $_SESSION["reserv"] = $reservation;
        $row=$qEdit->fetch_array();
        $reservation->setAssurance($row['Assurance']);
        $reservation->setDestination($row['Destination']);
        $SQL="SELECT * FROM mysqli.passengers
WHERE Reservation=".$id;
        $qEditBis=$db->query($SQL);
        while($line = $query->fetch_array()) {
            array_push($passengers, array($Line['Name']));
            array_push($passengers[$i], $line['Age']);
            $reservation->SetPersonne($passengers);
        }


    }
}



