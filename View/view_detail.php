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
    <form action="../index.php" method="POST">
        <?php


        for ($i=0;$i<$reservation->getPlace();$i++){

            echo'<div class="form-group">';
            if ($nameErr!=[] && isset($nameErr[$i]) && $nameErr[$i] != "")
            {
                echo "<span class='error'> ".$nameErr[$i]."</span><br>";
            }
                echo'<label for="exampleInputName'.$i.'">Nom</label>';
                echo'<input type="name" class="form-control" id="exampleInputName'.$i.'" name="exampleInputName'.$i.'" placeholder="Nom"';
                if (!empty($reservation->getPassengers()[$i][0])){
                    echo 'value='.$reservation->getPassengers()[$i][0].'>';
                }
                else{
                    echo '>';
                }
                echo'</div>';
            echo'<div class="form-group">';
            if ($ageErr!=[] && isset($ageErr[$i]) && $ageErr[$i] != "")
            {
                echo "<span class='error'> ".$ageErr[$i]."</span><br>";
            }
                echo'<label for="exampleInputAge'.$i.'">Age</label>';
                echo'<input type="number" class="form-control" type="number" min="1" id="exampleInputAge'.$i.'" name="exampleInputAge'.$i.'" placeholder="Age" ';
                if (!empty($reservation->getPassengers()[$i][1])){
                    echo 'value='.$reservation->getPassengers()[$i][1].'>';
                }
                else{
                    echo '>';
                }
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