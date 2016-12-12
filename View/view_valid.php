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
    <title>Validation</title> <!-- to name the page//-->

</head>

<body>

<h1>Bogota Airlines</h1> <!--to make a big headline//-->
<h2><b>Validation des Réservations</b></h2>

Nous vous prions de bien reconsulter vos données afin d'être sûr qu'elle soient exacte.
<br>
<br>

<div id="reserv">
    <form action="index.php" method="POST">

        <div class="form-group">
            <label for="exampleInputName1">Récapitulatif</label>
            <p> Destination:<?php echo $reservation->getDestination(); ?> </p>
            <p> Nombre de places <?php echo $reservation->getPlace(); ?> </p>


            <?php
            $people=$reservation->getPassengers();
            for ($i=1;$i<=$reservation->getPlace();$i++){
                echo "<label >Nom</label>";
                echo "<p >".$reservation->getPassengers()[$i-1][0]."</p>";
                echo "<label >Age</label>";
                echo "<p >".$reservation->getPassengers()[$i-1][1]."</p>";
            }

            if ($reservation->assuranceCheck()=='Yes') {
                echo 'Avec assurance annulation.<br><br>';
            } else {
                echo 'Sans assurance annulation.<br><br>';
            }
            ?>
        </div>





        <input type="hidden" name="step" value="3">
        <input class="btn btn-primary" name="return" type="submit" value="Retour à la page précedente">
        <input class="btn btn-primary" name="submit" type="submit" value="Confirmer">
        <br>
        <input class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">

    </form>

</div>



<?php


?>


</body>
</html>