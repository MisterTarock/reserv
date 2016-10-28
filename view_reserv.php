<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->

<!--
   _____         .__         ____   ____.__
  /     \ _____  |__| ____   \   \ /   /|__| ______  _  __
 /  \ /  \\__  \ |  |/    \   \   Y   / |  |/ __ \ \/ \/ /
/    Y    \/ __ \|  |   |  \   \     /  |  \  ___/\     /
\____|__  (____  /__|___|  /    \___/   |__|\___  >\/\_/
 \/     \/        \/                     \/


<!--This will be the view file-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS\style.css">
    <title>Réservation</title> <!-- to name the page//-->
</head>

<body>

<h1>Bogota Airlines</h1> <!--to make a big headline//-->
<br>
<h2><b>Reservation</b></h2>

Bienvenue sur <b>AIR Columbia</b>!! Votre billet vous coutera une fortune et vous serez mal assis!
<br>Mais nous ferons tout pour que vous passiez un agréable trajet!
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
            <td>vous payerez seulement 1/2 marcassin-mout!</td>
        </tr>

        <tr>
            <td>> 25 ans:</td>
            <td>vous payerez 2 chameaux</td>
        </tr>
    </tbody>
</table>

<br>
<br>

<form action="demo_form.asp">


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
            <td><input type="checkbox" ></td>
        </tr>
    </table>

    <input name="submit" class="btn btn-primary" type="submit" value="Etape suivante">
    <br>
    <input class="btn btn-danger" type="submit" value="Annuler la réservation">

</form>




<?php


?>


</body>
</html>