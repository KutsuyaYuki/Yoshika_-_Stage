<script src="js/bootstrap-table.js"></script>
<script src="js/locales/bootstrap-table-en-US.js"></script>
<div class="table-responsive mCustomScrollbar" data-mcs-theme="dark">
    <table class="table table-striped table-bordered table-hover table-condensed"
           data-toggle="table"
           data-sort-name="id"
           data-sort-name="contactnaam"
           data-sort-name="geslacht"
           data-sort-name="postadres"
           data-sort-name="postcode"
           data-sort-name="plaats"
           data-sort-name="woonadres"
           data-sort-name="emailadres"
           data-sort-name="telefoonnummer"
           data-sort-name="mobielenummer"
           data-sort-name="geboortedatum"
           data-sort-name="begindatum"
           data-sort-name="einddatum"
           data-sort-name="bsn"
           data-sort-name="categorie"
           data-sort-name="functie">
        <thead>
        <tr>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="contactnaam" data-sortable="true">Contactnaam</th>
            <th data-field="geslacht" data-sortable="true">Geslacht</th>
            <th data-field="postadres" data-sortable="true">Postadres</th>
            <th data-field="postcode" data-sortable="true">Postcode</th>
            <th data-field="plaats" data-sortable="true">Plaats</th>
            <th data-field="woonadres" data-sortable="true">Woonadres</th>
            <th data-field="emailadres" data-sortable="true">Emailadres</th>
            <th data-field="telefoonnummer" data-sortable="true">Telefoonnummer</th>
            <th data-field="mobielenummer" data-sortable="true">Mobielenummer</th>
            <th data-field="geboortedatum" data-sortable="true">Geboortedatum</th>
            <th data-field="begindatum" data-sortable="true">Begindatum</th>
            <th data-field="einddatum" data-sortable="true">Einddatum</th>
            <th data-field="bsn" data-sortable="true">BSN</th>
            <th data-field="categorie" data-sortable="true">Categorie</th>
            <th data-field="functie" data-sortable="true">Functie</th>
        </tr>
        </thead>
        <tbody>

        <?php

        # We plaatsen alles in een 'try' zodat wanneer er iets fout gaat
        # niet het hele script crasht.
        try {
            # Hier halen we alle gegevens uit de tabel op d.m.v. een * te gebruiken.
            $sql = $db->query('
                SELECT *
                FROM bnaw
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
                echo "<td> " . $row['contactnaam'] . " </td>";
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
        </tbody>
    </table>
</div>