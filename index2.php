<?php
require("logic/common.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editable</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-table.css">
    <link rel="stylesheet"
          href="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script src="js/bootstrap-table-editable.js"></script>
    <script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
</head>
<body>
<div class="container">
    <h1>Editable</h1>
    <table id="table"
           data-toggle="table"
           data-pagination="true"
           data-show-export="true">
        <thead>
        <tr>
            <th data-field="id" data-sortable="true" data-editable="true">ID</th>
            <th data-field="voorletters" data-sortable="true" data-editable="true">Voorletters</th>
            <th data-field="tussenvoegsel" data-sortable="true" data-editable="true">Tussenvoegsel</th>
            <th data-field="achternaam" data-sortable="true" data-editable="true">Achternaam</th>
            <th data-field="roepnaam" data-sortable="true" data-editable="true">Roepnaam</th>
            <th data-field="geslacht" data-sortable="true" data-editable="true">Geslacht</th>
            <th data-field="postadres" data-sortable="true" data-editable="true">Postadres</th>
            <th data-field="postcode" data-sortable="true" data-editable="true">Postcode</th>
            <th data-field="plaats" data-sortable="true" data-editable="true">Plaats</th>
            <th data-field="woonadres" data-sortable="true" data-editable="true">Woonadres</th>
            <th data-field="emailadres" data-sortable="true" data-editable="true">Emailadres</th>
            <th data-field="telefoonnummer" data-sortable="true" data-editable="true">Telefoonnummer</th>
            <th data-field="mobielenummer" data-sortable="true" data-editable="true">Mobielenummer</th>
            <th data-field="geboortedatum" data-sortable="true" data-editable="true">Geboortedatum</th>
            <th data-field="begindatum" data-sortable="true" data-editable="true">Begindatum</th>
            <th data-field="einddatum" data-sortable="true" data-editable="true">Einddatum</th>
            <th data-field="bsn" data-sortable="true" data-editable="true">BSN</th>
            <th data-field="categorie" data-sortable="true" data-editable="true">Categorie</th>
            <th data-field="functie" data-sortable="true" data-editable="true">Functie</th>
        </tr>
        </thead>

        <?php

        # We plaatsen alles in een 'try' zodat wanneer er iets fout gaat
        # niet het hele script crasht.
        try {
            # Hier halen we alle gegevens uit de tabel op d.m.v. een * te gebruiken.
            $sql = $db->query('
                SELECT *
                FROM naw
                INNER JOIN contact ON naw.contact_id = contact.id
                INNER JOIN category ON naw.category_id = category.id;');

            # Meer informatie: http://php.net/manual/en/pdostatement.fetch.php
            $sql->setFetchMode(PDO::FETCH_ASSOC);

            # Alle resultaten uit de tabel doorlopen en weergeven.
            # Met $row[''] kan er data uit een kolom uit de tabel worden geladen.
            # Bijvoorbeeld $row['voorletters'] haalt de data uit de kolom voorletters.
            #
            # De while loop zorgt ervoor dat alle data word doorgelopen en geladen.
            # Dus alle rijen in de kolom worden doorgelopen en ingevoerd in the tabel
            while ($row = $sql->fetch()) {
                echo "<tr align='center'>";
                echo "<td> " . $row['id'] . " </td>";
                echo "<td> " . $row['voorletters'] . " </td>";
                echo "<td> " . $row['tussenvoegsel'] . " </td>";
                echo "<td> " . $row['achternaam'] . " </td>";
                echo "<td> " . $row['roepnaam'] . " </td>";
                echo "<td> " . $row['geslacht'] . " </td>";
                echo "<td> " . $row['postadres'] . " </td>";
                echo "<td> " . $row['postcode'] . " </td>";
                echo "<td> " . $row['woonplaats'] . " </td>";
                echo "<td> " . $row['woonadres'] . " </td>";
                echo "<td> " . $row['email'] . " </td>";
                echo "<td> " . $row['telefoonnummer'] . " </td>";
                echo "<td> " . $row['mobielenummer'] . " </td>";
                echo "<td> " . $row['geboortedatum'] . " </td>";
                echo "<td> " . $row['begindatum'] . " </td>";
                echo "<td> " . $row['einddatum'] . " </td>";
                echo "<td> " . $row['bsn'] . " </td>";
                echo "<td> " . $row['category'] . " </td>";
                echo "<td> " . $row['function'] . " </td>";
                echo "</tr>";
            }

            # Verdwijder de database connectie.
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
    </table>
</div>
</body>
</html>