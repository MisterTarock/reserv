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

Nous vous prions de bien reconsulter vos données afin d'être sûr qu'elle soient exacte et
que nous puissions bien vendre celles-ci!
<br>
<br>

<div id="reserv">
    <form>
        <div id="personne">
            <div class="form-group">
                <label for="exampleInputName1">Récapitulatif</label>
                <p> Destination:<?php echo $_session['destination'],':'; ?> </p>
                <p> Nombre de places <?php echo $_session['nbplace'],':'; ?> </p>

                <p> Nom <?php echo $_session['Nom1'],':'; ?> </p>
                <p> Age <?php echo $_session['Age1'],':'; ?> </p>
                <p> Nom <?php echo $_session['Nom2'],':'; ?> </p>
                <p> Age <?php echo $_session['Age2'],':'; ?> </p>

                <?php
                if (isset($_session['insurance'])) {
                    echo 'Avec assurance annulation.<br><br>';
                } else {
                    echo 'Sans assurance annulation.<br><br>';
                }
                ?>
            </div>

        </div>



        <input class="btn btn-primary" type="submit" value="Retour à la page précedente">
        <input class="btn btn-primary" type="submit" value="Etape suivante">
        <br>
        <input class="btn btn-danger" type="submit" value="Annuler la réservation">

    </form>

</div>



<?php


?>


</body>
</html>