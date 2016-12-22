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

    <link rel="stylesheet" type="text/css" href="CSS\style.css">
    <title>Détails</title> <!-- to name the page//-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <!--to make a big headline//-->
            <h1>Bogota Airlines</h1>
            <h2><b>Détail des Réservations</b></h2>
            <text>
                Afin de pouvoir vous fournir un vol le plus agréable possible, nous désirons connaître
                quelques informations sur vous.
            </text>
            <br>
            <br>
        </div>
    </div>

    <div id="detail">
    <form action="index.php" method="POST">
        <div class="row">
            <div class="col-md-12">
                <?php
                $reservation=unserialize($_SESSION['reserv']);

                for ($i=0;$i<$reservation->getPlace();$i++){

                    echo'<div class="form-group">';
                    if ($reservation->getNameErr()!=[] && isset($reservation->getNameErr()[$i]) && $reservation->getNameErr()[$i] != "")
                    {
                        echo "<span class='error'> ".$reservation->getNameErr()[$i]."</span><br>";
                    }
                    echo'<label for="exampleInputName'.$i.'">Nom</label>';
                    echo'<input type="name" class="form-control" maxlength="30" id="exampleInputName'.$i.'" name="exampleInputName'.$i.'" placeholder="Nom"';
                    if (!empty($reservation->getPassengers()[$i][0])){
                        echo 'value='.$reservation->getPassengers()[$i][0].'>';
                    }
                    else{
                        echo '>';
                    }
                    echo'</div>';
                    echo'<div class="form-group">';
                    if ($reservation->getAgeErr()!=[] && isset($reservation->getAgeErr()[$i]) && $reservation->getAgeErr()[$i] != "")
                    {
                        echo "<span class='error'> ".$reservation->getAgeErr()[$i]."</span><br>";
                    }
                    echo'<label for="exampleInputAge'.$i.'">Age</label>';
                    echo'<input type="number" class="form-control" maxlength="30" min="1" max="125" id="exampleInputAge'.$i.'" name="exampleInputAge'.$i.'" placeholder="Age" ';
                    if (!empty($reservation->getPassengers()[$i][1])){
                        echo 'value='.$reservation->getPassengers()[$i][1].'>';
                    }
                    else{
                        echo '>';
                    }
                    echo'</div>';}
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="step" value="2">

                <button class="btn btn-primary" name="return" type="submit" value="Retour à la page précedente">
                    <span class="glyphicon glyphicon-step-backward"></span>
                    Retour à la page précedente
                </button>
                <button class="btn btn-primary" name="submit" type="submit">
                    Etape suivante
                    <span class="glyphicon glyphicon-plane"></span>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">
                        Annuler la réservation
                        <span class="glyphicon glyphicon-alert"></span>
                    </button>
                </div>
            </div>
        </div>

    </form>
    </div>

</div>
</body>
</html>