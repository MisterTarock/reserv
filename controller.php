<?php
/**
 * Created by PhpStorm.
 * Autor: Victor Puissant Baeyens, 12098
 * Autor: Paolo De Keyzer, 13201
 */

//This will be the logic file were the data will be calculated

if (isset($_POST['sumbit'])) {



    $_session['destination']=$_POST['destination'];
    $_session['places']=$_POST['places'];
    $_session['insurance']=$_POST['insurance'];
    include 'view_detail.php';
}
else{
    include"view_reserv.php";
}
?>