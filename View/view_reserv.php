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
<!--
    <img src="bogota_flag.png" alt="flag" usemap="#flagmap" style="float:right; width:400px;height:400px;">
    <map name="flagmap">
        <area shape="bird" coords="135,90,165,130" alt="bird" href="https://fr.wikipedia.org/wiki/Bogota">
        <!--the coordinates are set like this x1,y1,x2,y2. The x1,y1 are the position of the left-top corner af the image
        and the x2,y2 are for the right-bottom corner-->
    </map>


<br>
<h2><b>Reservation</b></h2>
<text>
    Bienvenue sur <b>AIR Columbia</b>!!
    <br>Nous ferons tout pour que vous passiez un agréable trajet!
</text>

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
            <td>10 €</td>
        </tr>

        <tr>
            <td>> 25 ans:</td>
            <td>20 €</td>
        </tr>
    </tbody>
</table>

<br>
<br>

<form action="../index.php" method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>


    <table>
        <caption><b>Réservation</b></caption>

        <tr>
            <td>Destination:</td>
            <td><input class="form-control" type="text" name="destination" placeholder="Destination"></td>
            <?php
            if ($destErr != "")
            {
                echo "<span class='error'> ".$destErr."</span><br>";
            }
            ?>
        </tr>
        <tr>
            <td>Nombre de places:</td>
            <!--the type number makes the case with the arrow to move the number,
             the min value assure us to not recieve any begative number
             the max value assure us to stay in the right span-->

            <td><input class="form-control" type="number" min="1" max="10" name="places" placeholder="Nombre de places"></td>
            <?php

            if ($placesErr != "")
            {
                echo "<span class='error'> ".$placesErr."</span><br>";
            }
            ?>

        </tr>
        <tr>
            <td>Assurance annulation (5 €):</td>

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