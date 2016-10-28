<?php
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 28-10-16
 * Time: 09:37
 */
session_start();
if (isset($_POST['sumbit'])) {



    $_session['destination']=$_POST['destination'];
    $_session['places']=$_POST['places'];
    $_session['insurance']=$_POST['insurance'];
    include 'view_valid.php';
}
else{
    include"view_reserv.php";
}
?>