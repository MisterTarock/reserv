<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->

<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
    <form action="controller_DB.php" method="POST">

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
                echo '<input type="hidden" name="id" value="<?php echo $row['.$flightID.'];?>">';
                echo '<button class="btn btn-warning" name="edit" type="submit" value="Editer" >Editer</button></td>';
                echo '<td><button class="btn btn-warning" name="delete" type="submit" value="Supprimer" >Supprimer</button></td></tr>';

            }


            ?>
        </table>



    </form>
</div>





</div>
<script>
    function edit($i){

        <?php $reservation = new Reservation;
        $_SESSION["reserv"] = $reservation;
        $sql="SELECT * FROM 'reservations'
WHERE ID=".$i;
        ?>
    }

</script>
</body>
</html>

