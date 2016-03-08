<?php

include '../common.php';

try {
    # Hier halen we alle gegevens uit de tabel op d.m.v. een * te gebruiken.
    $sql = $db->query('
                SELECT *
                FROM naw
                INNER JOIN contact ON naw.contact_id = contact.id
                INNER JOIN category ON naw.category_id = category.id;');

    # Meer informatie: http://php.net/manual/en/pdostatement.fetch.php
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);

    $json=json_encode($results);

    $fp = fopen('data.json', 'w');
    fwrite($fp, json_encode($results));
    fclose($fp);

    # Verdwijder de database connectie.
    $db = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}