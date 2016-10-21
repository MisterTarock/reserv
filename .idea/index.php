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
    <link rel="stylesheet" type="text/css" href="CSS\style.css">
<title>Bogota Airlines</title> <!-- to name the page//-->
<h1>Bogota Airlines</h1> <!--to make a big headline//-->
</head>

<body>

Bienvenue sur <b>AIR Columbia</b>!! Votre billet vous coutera une fortune et vous serez mal assis!
<br>Mais nous ferons tout pour que vous passiez un agréable trajet!
<br>
<br>

<!--To set the prices-->
<table>
    <caption><b>Tarifs</b></caption>
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
            <td><input type="text" name="destination"></td>
        </tr>
        <tr>
            <td>Nombre de places:</td>
            <td><input type="text" name="places"></td>
        </tr>
        <tr>
            <td>Assurance annulation</td>
            <td><input type="checkbox" ></td>
        </tr>


    </table>
    <input type="submit" value="Etape suivante">
    <input type="submit" value="Annuler la réservation">
    <button onClick="">Solution</button>
</form>




<?php


?>


</body>
</html>