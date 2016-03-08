<?php

// These variables define the connection information for your MySQL database
$username = "yukisxm163_stage";
$password = "200193";
$host = "10.3.1.174";
$dbname = "yukisxm163_stage";

# Een try loop maken zodat we de error kunnen zien.
try {
    # $dbh (Database Handle) kan nu door de hele site gebruikt worden,
    # zolang het word geinclude ( include('logic/db.php'); ).
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    # Alle errors worden hier opgevangen.
} catch (PDOException $e) {
    echo $e->getMessage();
}