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
<?php
$totalprice=0;
for ($i=1;$i<=$reservation->getPlace();$i++){
    if($reservation->getPassengers()[$i-1][1]<25){
        $totalprice=$totalprice+10;

    }
    else{
        $totalprice=$totalprice+20;
    }

}

echo "La somme attendue est de ".$totalprice."€ sur le compte 123-123456-12 ";
$totalprice=0;
?>
<br>
<br>
<form action="../index.php" method="POST">

    <input class="btn btn-warning" name="cancel" type="submit" value="Retour à la page d'acceuil">

</form>


<?php


?>


</body>
</html>