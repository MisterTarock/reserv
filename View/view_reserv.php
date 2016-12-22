<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->

<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <!--Our CSS-->
    <link rel="stylesheet" type="text/css" href="CSS\style.css">


    <title>Réservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-5">

            <h1>Bogota Airlines</h1>
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

    <!--To apply CSS by use of the id "reserv" ang define the size and the color of our form -->
    <div id="reserv" class="col-md-12">

        <div class="row">
            <div class="col-md-4">
                <table class="table" style="text-align:center">
                    <caption><b>Tarifs</b></caption>

                    <tr>
                        <th style="text-align:center">Âge</th> <th style="text-align:center">Prix</th>
                    </tr>

                    <tbody>
                    <tr>
                        <td>< 25 ans:</td> <td>10 €</td>
                    </tr>
                    <tr>
                        <td>> 25 ans:</td> <td>20 €</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form action="index.php" method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption><b>Réservation</b></caption>

                    <tr>
                        <td style="text-align:center"><b>Destination:</b></td>
                        <?php
                            //The maxlength parameter protect us against anyone who want
                            // to past a complete book in input in place of the destination
                            echo '<td><input class="form-control" type="text" maxlength="40" 
                                             name="destination" placeholder="Destination" ';
                            if (!empty($reservation->getDestination()))
                            {
                                echo 'value='.$reservation->getDestination().'>';
                            }
                            else
                            {
                                echo '>';
                            }
                            echo '</td>';

                            if ($reservation->getDestErr() != "")
                            {
                                echo "<span class='error'> ".$reservation->getDestErr()."</span><br>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td style="text-align:center"><b>Nombre de places:</b></td>
                        <?php
                            /*the type number makes the case with the arrow to move the number,
                             the min value assure us to not receive any negative number
                             the max value assure us to stay in the right span*/
                            echo '<td><input class="form-control" type="number" min="1" max="10" 
                                             name="places" placeholder="Nombre de places" ';
                            if (!empty($reservation->getPlace()))
                            {
                                echo 'value='.$reservation->getPlace().'>';
                            }
                            else
                            {
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

                        <td>
                            <input type="checkbox" name="assurance" value="true"
                                <?php
                                    if($reservation->AssuranceCheck()=='Yes')
                                    {
                                        echo 'checked';
                                    }
                                ?>
                            />
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="step" value="1">
                <div class="form-group">
                    <button class="btn btn-primary" name="submit" type="submit">
                        Etape suivante
                    <span class="glyphicon glyphicon-plane"></span>
                    </button>
                </div>
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