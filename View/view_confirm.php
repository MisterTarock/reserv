<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS\style.css">
    <title>Confirmation</title> <!-- to name the page//-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <h1>Bogota Airlines</h1> <!--to make a big headline//-->
            <h2><b>Confirmation des billets</b></h2>
            <text>
                Votre demande à bien été traitée, merci de payer celle-ci au plus vite sur notre compte.
                <br>La somme attendue est de
            </text>

            <span class="error">
            <?php
            $totalprice=0;
            for ($i=1;$i<=$reservation->getPlace();$i++){
                if($reservation->getPassengers()[$i-1][1]<25){
                    $totalprice=$totalprice+10;

                }

                if ($reservation->getPassengers()[$i-1][1]>25){
                    $totalprice=$totalprice+20;
                }


            }
            if($reservation->assuranceCheck()=='Yes'){
                $totalprice=$totalprice+5;
            }
            echo $totalprice;
            $totalprice=0;

            ?>
            </span>
            <text>
                € sur le compte <span class="positiv">123-123456-12</span>
            </text>
        </div>
    </div>

    <div class="row">
        <br>
    </div>

    <div class="row">
        <div class="col-md-12">
        <form action="index.php" method="POST">
            <input type="hidden" name="step" value="4">
            <button class="btn btn-primary" name="return" type="submit">
                <span class="glyphicon glyphicon-step-backward"></span>
                Retour à la page précedente
            </button>
            <button class="btn btn-warning" name="cancel" type="submit">
                Retour à la page d'acceuil
                <span class="glyphicon glyphicon-fast-forward"></span>
            </button>
        </form>
        </div>
    </div>




<!--Je sais pas pourquoi c'est là et j'ai le sentiments que ca fait bien planté ^^ -->
<script>function redirect()
            {
                <?php $reservation = new Reservation;
                $_SESSION["reserv"] = $reservation; ?>
                window.location.assign("index.php");
            }
</script>

</div>
</body>
</html>