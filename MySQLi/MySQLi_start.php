<?php
// Connexion et sélection de la base
$mysqli = new mysqli("localhost", "username", "password","dbname") or
die("Could not select database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
" . $mysqli->connect_error;
}
// Exécuter des requêtes SQL
....
// Afficher les résultats
....
// Libération des résultats
$result->close();
// Fermeture de la