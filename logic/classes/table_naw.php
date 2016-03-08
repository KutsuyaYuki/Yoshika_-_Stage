<div class="table-responsive mCustomScrollbar" data-mcs-theme="dark">
    <table class="table table-striped table-bordered table-hover table-condensed"
           id="table_naw"
           data-toggle="table"
           data-pagination="true"
           data-show-export="true"
           data-mobile-responsive="true"
           data-search="true"
           data-sort-name="id voorletters tussenvoegsel achternaam roepnaam geslacht postadres postcode plaats woonadres
           emailadres telefoonnummer mobielenummer geboortedatum begindatum einddatum bsn categorie functie delete">
        <!-- ^^^ These values need to be the same in the table headers (<td>)^^^ !-->
        <thead>
        <tr>
            <!--data-field has to be the same value as in the database. For example: id = id in naw, function = function in category.!-->
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="voorletters" data-sortable="true">Voorletters</th>
            <th data-field="tussenvoegsel" data-sortable="true">Tussenvoegsel</th>
            <th data-field="achternaam" data-sortable="true">Achternaam</th>
            <th data-field="roepnaam" data-sortable="true">Roepnaam</th>
            <th data-field="geslacht" data-sortable="true">Geslacht</th>
            <th data-field="postadres" data-sortable="true">Postadres</th>
            <th data-field="postcode" data-sortable="true">Postcode</th>
            <th data-field="woonplaats" data-sortable="true">Plaats</th>
            <th data-field="woonadres" data-sortable="true">Woonadres</th>
            <th data-field="email" data-sortable="true">Email</th>
            <th data-field="telefoonnummer" data-sortable="true">Telefoonnummer</th>
            <th data-field="mobielenummer" data-sortable="true">Mobielenummer</th>
            <th data-field="geboortedatum" data-sortable="true">Geboortedatum</th>
            <th data-field="begindatum" data-sortable="true">Begindatum</th>
            <th data-field="einddatum" data-sortable="true">Einddatum</th>
            <th data-field="bsn" data-sortable="true">BSN</th>
            <th data-field="categorie" data-sortable="true">Categorie</th>
            <th data-field="functie" data-sortable="true">Functie</th>
            <th data-field="delete" data-sortable="true">Options</th>
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
                echo "<td> " . $row['categorie'] . " </td>";
                echo "<td> " . $row['functie'] . " </td>";
                echo "<td> <button type=\"button\" class=\"btn-xs btn btn-warning\"><a href=\"edit.php?id=" . $row['id'] . "\">Edit</a></button> <button type=\"button\" class=\"btn-xs btn btn-danger\">Remove</button> </td>";
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
    <button id="buttonID">Mew</button>
</div>