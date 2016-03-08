<?php

// First we execute our common code to connection to the database and start the session
require("logic/common.php");

global $db;

// This if statement checks to determine whether the registration form has been submitted
// If it has, then the registration code is run, otherwise the form is displayed
if (!empty($_POST)) {


    /* Contact */

    try {
        $sql_contact = "UPDATE contact SET
            woonplaats = :woonplaats,
            woonadres = :woonadres,
            postadres = :postadres,
            postcode = :postcode,
            email = :email,
            telefoonnummer = :telefoonnummer,
            mobielenummer = :mobielenummer
            WHERE id = :id";
        $stmt_contact = $db->prepare($sql_contact);
        $stmt_contact->bindParam(':woonplaats', $_POST['woonplaats'], PDO::PARAM_STR);
        $stmt_contact->bindParam(':woonadres', $_POST['woonadres'], PDO::PARAM_STR);
        $stmt_contact->bindParam(':postadres', $_POST['postadres'], PDO::PARAM_STR);
        $stmt_contact->bindParam(':postcode', $_POST['postcode'], PDO::PARAM_STR);
        $stmt_contact->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt_contact->bindParam(':telefoonnummer', $_POST['telefoonnummer'], PDO::PARAM_STR);;
        $stmt_contact->bindParam(':mobielenummer', $_POST['mobielenummer'], PDO::PARAM_STR);
        $stmt_contact->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
        $stmt_contact->execute();
    }
    catch(PDOException $e) {
        echo $sql_contact . "<br>" . $e->getMessage();
    }

    /* End Contact */

    /* Category */

    try {
        $sql_category = "UPDATE category SET
            categorie = :categorie,
            functie = :functie
            WHERE id = :id";
        $stmt_category = $db->prepare($sql_category);
        $stmt_category->bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
        $stmt_category->bindParam(':functie', $_POST['functie'], PDO::PARAM_STR);
        $stmt_category->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
        $stmt_category->execute();
    }
    catch(PDOException $e) {
        echo $sql_category . "<br>" . $e->getMessage();
    }

    /* End Category */

    /* NAW */

    try {
        $sql_naw = "UPDATE naw SET
            voorletters = :voorletters,
            roepnaam = :roepnaam,
            tussenvoegsel = :tussenvoegsel,
            achternaam = :achternaam,
            geslacht = :geslacht,
            bsn = :bsn,
            begindatum = :begindatum,
            einddatum = :einddatum,
            notitie = :notitie,
            geboortedatum = :geboortedatum
            WHERE id = :id";
        $stmt_naw = $db->prepare($sql_naw);
        $stmt_naw->bindParam(':voorletters', $_POST['voorletters'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':roepnaam', $_POST['roepnaam'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':tussenvoegsel', $_POST['tussenvoegsel'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':achternaam', $_POST['achternaam'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':geslacht', $_POST['geslacht'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':bsn', $_POST['bsn'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':begindatum', $_POST['begindatum'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':einddatum', $_POST['einddatum'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':notitie', $_POST['notitie'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':geboortedatum', $_POST['geboortedatum'], PDO::PARAM_STR);
        $stmt_naw->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
        $stmt_naw->execute();
    }
    catch(PDOException $e) {
        echo $sql_naw . "<br>" . $e->getMessage();
    }

    /* End NAW */

// This redirects the user back to the login page after they register
    header("Location: private.php");

// Calling die or exit after performing a redirect using the header function
// is critical.  The rest of your PHP script will continue to execute and
// will be sent to the user if you do not die or exit.
    die("Redirecting to private.php");
}
else{
    echo("Failed");
}