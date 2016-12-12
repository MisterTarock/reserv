<!--
Created by PhpStorm.
Autor: Victor Puissant Baeyens, 12098
Autor: Paolo De Keyzer, 13201
-->


<!--This will be the view file-->


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="..\CSS\bootstrap.min.css"> <!-- attention modif chemin -->
    <link rel="stylesheet" type="text/css" href="..\CSS\style.css">
    <title>CheckDB</title> <!-- to name the page//-->

</head>

<body>

<h1>Bogota Airlines</h1> <!--to make a big headline//-->
<h2><b>Vérification de la DataBase</b></h2>
<text>
    Voici un listing des différentes réservations faites auprès de notre compagnie:
</text>

<br>
<br>

<div id="reserv">
    <form action="index.php" method="POST">

        <table class="table">
        <caption><b>Tarifs</b></caption>  <!--To make the title for the table-->
            <thead>
            <tr>
                <th>Âge</th>
                <th>Prix</th>
            </tr>
            </thead>

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

        <input type="hidden" name="step" value="2">
        <input class="btn btn-primary" name="return" type="submit" value="Retour à la page précedente">
        <input class="btn btn-primary" name="submit"type="submit" value="Etape suivante">
        <br>
        <input class="btn btn-danger" name="cancel" type="submit" value="Annuler la réservation">

    </form>

</div>











</body>
</html>

