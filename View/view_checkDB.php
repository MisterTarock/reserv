<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="..\CSS\bootstrap.min.css"> <!-- attention modif chemin -->
    <link rel="stylesheet" type="text/css" href="..\CSS\style.css">
    <title>CheckDB</title> <!-- to name the page//-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <h1>Bogota Airlines</h1> <!--to make a big headline//-->
            <h2><b>Vérification de la DataBase</b></h2>
            <text>
                Voici un listing des différentes réservations faites auprès de notre compagnie:
            </text>
        </div>
    </div>

<div id="reserv">
    <form action="index.php" method="POST">

        <table class="table">
            <tr>
                <th style="text-align:center">Destination</th> <th style="text-align:center">Nom</th> <th style="text-align:center">Assurance</th>
                <th style="text-align:center">Modifier</th> <th style="text-align:center">Supprimer</th>
            </tr>
            <?php

            while($row = $query->fetch_array()){
                 echo "<tr><td>" . $row['Destination'] . "</td>";
                 $flightID=$row['ID'];
                 $sql="SELECT * FROM mysqli.passengers
                  WHERE Reservation=$flightID";
                $querybis=$db->query($sql);
                echo "<td>";
                while($passRow = $querybis->fetch_array()){
                    echo $passRow['Name'] . " - " . $passRow['Age'] . " ans <br>" ;
                }
                echo "</td><td>" . $row['Assurance'] ."</td><td>";
                echo "<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>Editer</a></td><td>Supprimer</td></tr>";

            }
            ?>
        </table>

        <input type="hidden" name="step" value="2">
        <input class="btn btn-primary" name="return" type="submit" value="Retour à la page précedente">
        <input class="btn btn-primary" name="submit"type="submit" value="Etape suivante">
        <br>
        <input class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">

    </form>
</div>





</div>

</body>
</html>

