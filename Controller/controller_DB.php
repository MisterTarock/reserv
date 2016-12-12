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