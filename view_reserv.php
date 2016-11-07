<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->


<!--This will be the view file-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS\style.css">
    <title>Réservation</title> <!-- to name the page//-->
</head>

<body>


<h1>Bogota Airlines<!--to make a big headline//--></h1>
    <!--<img src="bogota_flag.png" alt="bogota_flag" usemap="#flagmap" style="float:top; width:70%;height:70%;">-->
    <map name="flagmap">
        <area shape="bird" coords="135,90,165,130" alt="bird" href="https://fr.wikipedia.org/wiki/Bogota">
        <!--the coordinates are set like this x1,y1,x2,y2. The x1,y1 are the position of the left-top corner af the image
        and the x2,y2 are for the right-bottom corner-->
    </map>

<br>
<h2><b>Reservation</b></h2>

Bienvenue sur <b>AIR Columbia</b>!!
<br>Nous ferons tout pour que vous passiez un agréable trajet!
<br>
<br>

<!--To set the prices-->
<table>
    <caption><b>Tarifs</b></caption>  <!--To make the title for the table-->
    <thead>
        <tr>
            <th>Âge</th>
            <th>Prix</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>< 25 ans:</td>
            <td>10euros</td>
        </tr>

        <tr>
            <td>> 25 ans:</td>
            <td>20euros</td>
        </tr>
    </tbody>
</table>

<br>
<br>

<form action="index.php" method="POST">


    <table>
        <caption><b>Réservation</b></caption>
        <tr>
            <td>Destination:</td>
            <td><input class="form-control" type="text" name="destination" placeholder="Destination"></td>
        </tr>
        <tr>
            <td>Nombre de places:</td>
            <td><input class="form-control" type="text" name="places" placeholder="Nombre de places"></td>
        </tr>
        <tr>
            <td>Assurance annulation</td>

            <td><input type="checkbox" name="assurance" value="true" /></td>
        </tr>
    </table>



    <input type="hidden" name="step" value="1">
    <input class="btn btn-primary" name="submit" type="submit" value="Etape suivante">

    <br>
    <input class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">


</form>




<?php


?>


</body>
</html>