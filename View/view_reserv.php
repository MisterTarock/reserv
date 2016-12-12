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
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <h1>Bogota Airlines</h1><!--to make a big headline//-->
            <br>
            <h2><b>Reservation</b></h2>
            <text>
                Bienvenue sur <b>Bogota Airlines</b>!!
                <br><br>Nous ferons tout pour que vous passiez un agréable trajet
                au sein d'une des avions de notre compagnie!
            </text>
        </div>
        <div class="col-md-7">
            <img src="bogota.png" class="img-responsive" alt="flag" style="float:right">
        </div>
    </div>

    <br>
    <br>
<div class="row">
    <div class="col-md-4">
        <table class="table" style="text-align:center">
            <caption><b>Tarifs</b></caption>  <!--To make the title for the table-->

            <tr>
                <th style="text-align:center">Âge</th>
                <th style="text-align:center">Prix</th>
            </tr>


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
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="index.php" method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>

        <table class="table">
            <caption><b>Réservation</b></caption>

            <tr>
                <td style="text-align:center"><b>Destination:</b></td>


                <?php
                echo '<td><input class="form-control" type="text" name="destination" placeholder="Destination" ';
                if (!empty($reservation->getDestination())){
                    echo 'value='.$reservation->getDestination().'>';
                }
                else{
                    echo '>';
                }
                echo '</td>';
                echo '<br>';
                if ($reservation->getDestErr() != "")
                {
                    echo "<span class='error'> ".$reservation->getDestErr()."</span><br>";
                }
                ?>
            </tr>
            <tr>
                <td style="text-align:center"><b>Nombre de places:</b></td>
                <!--the type number makes the case with the arrow to move the number,
                 the min value assure us to not recieve any begative number
                 the max value assure us to stay in the right span-->


                <?php
                echo '<td><input class="form-control" type="number" min="1" max="10" name="places" placeholder="Nombre de places" ';
                if (!empty($reservation->getPlace())){
                    echo 'value='.$reservation->getPlace().'>';
                }
                else{
                    echo '>';
                }
                echo '</td>';

                if ($reservation->getPlacesErr() != "")
                {
                    echo "<span class='error'> ".$reservation->getPlacesErr()."</span><br>";
                }
                ?>

            </tr>
            <tr>
                <td style="text-align:center"><b>Assurance annulation (5 €):</b></td>

                <td><input type="checkbox" name="assurance" value="true" /></td>
            </tr>
        </table>


    </div>

</div>






    <input type="hidden" name="step" value="1">

    <div class="form-group">
        <input class="btn btn-primary"  name="submit" type="submit" value="Etape suivante">
        <span class="glyphicon glyphicon-plane"></span>
    </div>

    <br>
    <input class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">


</form>




</div>


</body>
</html>