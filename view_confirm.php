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
    <title>Confirmation</title> <!-- to name the page//-->

</head>

<body>

<h1>Bogota Airlines</h1> <!--to make a big headline//-->
<h2><b>Confirmation des billets</b></h2>

Votre demande à bien été traitée, merci de payer celle-ci au plus vite sur notre compte.
<br>
La somme attendue est de........ sur le compte 123-123456-12  <!--mettre le prix calculer par le modele serait cool-->
<br>
<br>
<form action="index.php" method="POST">

    <input class="btn btn-warning" name="cancel" type="submit" value="Retour à la page d'acceuil">

</form>


<?php


?>


</body>
</html>