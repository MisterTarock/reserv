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
    <title>Détails</title> <!-- to name the page//-->

</head>

<body>

<h1>Bogota Airlines</h1> <!--to make a big headline//-->
<h2><b>Détail des Réservations</b></h2>

Afin de pouvoir vous fournir un vol le plus agréable possible, nous désirons connaître
quelques informations sur vous.
<br>
<br>

<div id="reserv">
    <form action="index.php" method="POST">
        <?php
        for ($i=0;$i<$reservation->getPlace();$i++){

            echo'<div class="form-group">';
                echo'<label for="exampleInputName'.$i.'">Nom</label>';
                echo'<input type="name" class="form-control" id="exampleInputName'.$i.'" name="exampleInputName[]" placeholder="Nom+Prénom">';
                echo'</div>';
            echo'<div class="form-group">';
                echo'<label for="exampleInputAge'.$i.'">Age</label>';
            echo'<input type="age" class="form-control" id="exampleInputAge'.$i.'" name="exampleInputAge[]" placeholder="Age">';
            echo'</div>';}




        ?>

        <input type="hidden" name="step" value="2">
        <input class="btn btn-primary" name="return" type="submit" value="Retour à la page précedente">
        <input class="btn btn-primary" name="submit"type="submit" value="Etape suivante">
        <br>
        <input class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">

    </form>

</div>











</body>
</html>