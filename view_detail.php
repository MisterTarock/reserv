/**
* Created by PhpStorm.
* Autor: Victor Puissant Baeyens, 12098
* Autor: Paolo De Keyzer, 13201
*/


<!--This will be the view file-->


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS\style.css">
    <title>Détails</title> <!-- to name the page//-->

</head>

<body>

<h1>Bogota Airlines</h1> <!--to make a big headline//-->
<h2><b>Détail des Réservations</b></h2>

Afin de pouvoir vous fournir un vol le plus agréable possible, nous désirons connaître
quelques informations sur vous afin que fassions plus ample connaissance.
<br>
<br>

<div id="reserv">
    <form>
        <div id="personne">
            <div class="form-group">
                <label for="exampleInputName1">Nom</label>
                <input type="name" class="form-control" id="exampleInputName1" placeholder="Nom+Prénom">
            </div>
            <div class="form-group">
                <label for="exampleInputAge1">Age</label>
                <input type="age" class="form-control" id="exampleInputAge1" placeholder="Age">
            </div>

        </div>

        <div id="personne">
            <div class="form-group">
                <label for="exampleInputName1">Nom</label>
                <input type="name" class="form-control" id="exampleInputName1" placeholder="Nom+Prénom">
            </div>
            <div class="form-group">
                <label for="exampleInputAge1">Age</label>
                <input type="age" class="form-control" id="exampleInputAge1" placeholder="Age">
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