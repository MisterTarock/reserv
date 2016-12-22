<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */



session_start();
include_once("../Model/model.php");

//each controller calls the model that are needed

/*This will be the logic file were the data will be calculated*/

$passengers=array();
$db = new mysqli('localhost', 'root', '', 'mysqli') or die('Could not select database');
if ($db->connect_errno) {
    echo 'Echec lors de la connexion à MySQLi : ('.$db->connect_errno.') '.$db->connect_error;
}
$request="SELECT * FROM mysqli.reservations";
$query=$db->query($request);
include("../View/view_checkDB.php");
$db->close();

$db = new mysqli('localhost', 'root', '', 'mysqli') or die('Could not select database');
if ($db->connect_errno) {
    echo 'Echec lors de la connexion à MySQLi : ('.$db->connect_errno.') '.$db->connect_error;
}
$request="SELECT * FROM mysqli.reservations";

$query=$db->query($request);

if(isset($_GET['id'])){$id=$_GET['id'];}
if(isset($_GET['page'])){
    $page=$_GET['page'];
    if ($page=='edit' && isset($_GET['id'])){
        $sql="SELECT * FROM mysqli.reservations
    WHERE ID=".$id;
        $qEdit=$db->query($sql);
        $reservation = new Reservation;
        $_SESSION["reserv"] = $reservation;
        $row=$qEdit->fetch_array(MYSQLI_ASSOC);
        $reservation->setAssurance($row['Assurance']);
        $reservation->setDestination($row['Destination']);
        $SQL="SELECT * FROM mysqli.passengers
        WHERE Reservation=".$id;
        $qEditBis=$db->query($SQL);
        $i=0;
        while($line = $qEditBis->fetch_array()) {
            array_push($passengers, array($line['Name']));
            array_push($passengers[$i], $line['Age']);
            $i+=1;
        }
        $reservation->setPlace($i);
        $reservation->SetPersonne($passengers);
        $reservation->setReservID($id);

        header('location:../index.php');
        $_SESSION['reserv']=serialize($reservation);
    }
    if ($page=='del'){
        $sql="SELECT * FROM mysqli.reservations
    WHERE ID=".$id;
        $qEdit=$db->query($sql);
        $reservation = new Reservation;
        $_SESSION["reserv"] = $reservation;
        $SQL="DELETE FROM mysqli.passengers
        WHERE Reservation=".$id;
        $qEditBis=$db->query($SQL);
        $SQL="DELETE FROM mysqli.reservations
        WHERE ID=".$id;
        $qEditBis=$db->query($SQL);
        session_destroy();

        if($i=0){
            header("Refresh:0");
            $i=1;
        }

        header("controller.php");
        $i=0;

    }
}

?>



