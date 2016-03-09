<?php

$thisPage = "Edit";

$selected_id = "";

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
        $stmt_contact->bindParam(':id', $selected_id, PDO::PARAM_STR);
        $stmt_contact->execute($sql_contact);
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
        $stmt_category->bindParam(':id', $selected_id, PDO::PARAM_STR);
        $stmt_category->execute($sql_category);
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
        $stmt_naw->bindParam(':id', $selected_id, PDO::PARAM_STR);
        $stmt_naw->execute($sql_naw);
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
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/locales/bootstrap-datepicker.nl.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <title>Yuki's Site ~</title>
</head>
<body>

<!-- Content -->
<div class="header">
    <?php include "logic/classes/menu_top.inc";

    $selected_id = $_GET['id'];

    $sql = $db->query('
                SELECT *
                FROM naw
                INNER JOIN contact ON naw.contact_id = contact.id
                INNER JOIN category ON naw.category_id = category.id
                WHERE naw.id = '.$selected_id.';');

    while ($row = $sql->fetch()) {
        $id = $row['id'];
        $voorletters = $row['voorletters'];
        $tussenvoegsel = $row['tussenvoegsel'];
        $achternaam = $row['achternaam'];
        $roepnaam = $row['roepnaam'];
        $geslacht = $row['geslacht'];
        $postadres = $row['postadres'];
        $postcode = $row['postcode'];
        $woonplaats = $row['woonplaats'];
        $woonadres = $row['woonadres'];
        $email = $row['email'];
        $telefoonnummer = $row['telefoonnummer'];
        $mobielenummer = $row['mobielenummer'];
        $geboortedatum = $row['geboortedatum'];
        $begindatum = $row['begindatum'];
        $einddatum = $row['einddatum'];
        $bsn = $row['bsn'];
        $notitie = $row['notitie'];
        $categorie = $row['categorie'];
        $functie = $row['functie'];
    }
    ?>
</div>
<div class="wrapper">
    <!-- Content !-->
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="edit_process.php" method="post">

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="id" name="id" class="form-control hidden" id="inputid"
                                   placeholder="id" value="<?php echo $id; ?>">
                            <input type="voorletters" name="voorletters" class="form-control" id="inputVoorletters"
                                   placeholder="Voorletters" value="<?php echo $voorletters; ?>">
                            <input type="roepnaam" name="roepnaam" class="form-control" id="inputroepnaam"
                                   placeholder="Roepnaam" value="<?php echo $roepnaam; ?>">
                            <input type="tussenvoegsel" name="tussenvoegsel" class="form-control"
                                   id="inputTussenvoegsel"
                                   placeholder="Tussenvoegsel" value="<?php echo $tussenvoegsel; ?>">
                            <input type="achternaam" name="achternaam" class="form-control" id="inputAchternaam"
                                   placeholder="Achternaam" value="<?php echo $achternaam; ?>">
                            <input type="geslacht" name="geslacht" class="form-control" id="inputGeslacht"
                                   placeholder="Geslacht" value="<?php echo $geslacht; ?>">
                            <input type="text" name="geboortedatum" class="form-control" id="inputGeboortedatum"
                                   placeholder="Geboortedatum" value="<?php echo $geboortedatum; ?>">
                            <script type="text/javascript">
                                $('#inputGeboortedatum').datepicker({
                                    format: "dd-mm-yyyy",
                                    language: "nl",
                                    todayBtn: true,
                                    calendarWeeks: true
                                });
                            </script>
                            <input type="bsn" name="bsn" class="form-control" id="inputBSN"
                                   placeholder="BSN" value="<?php echo $bsn; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $email; ?>">
                            <input type="woonplaats" name="woonplaats" class="form-control" id="inputWoonplaats"
                                   placeholder="Woonplaats" value="<?php echo $woonplaats; ?>">
                            <input type="woonadres" name="woonadres" class="form-control" id="inputWoonadres"
                                   placeholder="Woonadres" value="<?php echo $woonadres; ?>">
                            <input type="postadres" name="postadres" class="form-control" id="inputPostadres"
                                   placeholder="Postadres" value="<?php echo $postadres; ?>">
                            <input type="postcode" name="postcode" class="form-control" id="inputPostcode"
                                   placeholder="Postcode" value="<?php echo $postcode; ?>">
                            <input type="telefoonnummer" name="telefoonnummer" class="form-control"
                                   id="inputTelefoonnummer"
                                   placeholder="Telefoonnummer" value="<?php echo $telefoonnummer; ?>">
                            <input type="mobielenummer" name="mobielenummer" class="form-control"
                                   id="inputMobielenummer"
                                   placeholder="Mobielenummer" value="<?php echo $mobielenummer; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="text" name="begindatum" class="form-control" id="inputBegindatum"
                                   placeholder="Begindatum" value="<?php echo $begindatum; ?>">
                            <script type="text/javascript">
                                $('#inputBegindatum').datepicker({
                                    format: "dd-mm-yyyy",
                                    language: "nl",
                                    todayBtn: true,
                                    calendarWeeks: true
                                });
                            </script>
                            <input type="text" name="einddatum" class="form-control" id="inputEinddatum"
                                   placeholder="Eindatum" value="<?php echo $einddatum; ?>">
                            <script type="text/javascript">
                                $('#inputEinddatum').datepicker({
                                    format: "dd-mm-yyyy",
                                    language: "nl",
                                    todayBtn: true,
                                    calendarWeeks: true
                                });
                            </script>
                            <input type="notitie" name="notitie" class="form-control" id="inputNotitie"
                                   placeholder="Notitie" value="<?php echo $notitie; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <select name="categorie" id="inputCategory" class="form-control" value="<?php echo $category; ?>">
                                <option value="Eigenaar">Eigenaar</option>
                                <option value="Administratie">Administratie</option>
                                <option value="Werknemer">Werknemer</option>
                            </select>
                            <select name="functie" id="inputFunctie" class="form-control" value="<?php echo $functie; ?>">
                                <option value="ICT">ICT</option>
                                <option value="Stuff">Stuff</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-submit">Save</button>
                        </div>
                    </div>
            </div>
        </div>

        </form>
    </div>
</div>
</div>
<div class="cleared"></div>
</div>
<!-- Footer !-->
<?php include('logic/classes/bottom.inc'); ?>
<!-- END: Footer !-->

</body>
</html>
