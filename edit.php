<?php

$thisPage = "Edit";

// First we execute our common code to connection to the database and start the session
require("logic/common.php");

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
                WHERE naw.id = ' . $selected_id . ';');

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
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"
                                   value="<?php echo $email; ?>">
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
                            <select name="categorie" id="inputCategory" class="form-control">
                                <?php
                                if ($categorie == "Eigenaar") {
                                    echo '<option value="Eigenaar" selected>Eigenaar</option>';
                                    echo '<option value="Administratie">Administratie</option>';
                                    echo '<option value="Gebruiker">Gebruiker</option>';
                                } else if ($categorie == "Administratie"){
                                    echo '<option value="Eigenaar">Eigenaar</option>';
                                    echo '<option value="Administratie" selected>Administratie</option>';
                                    echo '<option value="Gebruiker">Gebruiker</option>';
                                } else if ($categorie == "Gebruiker"){
                                    echo '<option value="Eigenaar">Eigenaar</option>';
                                    echo '<option value="Administratie">Administratie</option>';
                                    echo '<option value="Gebruiker" selected>Gebruiker</option>';
                                }
                                ?>
                            </select>
                            <select name="functie" id="inputFunctie" class="form-control">
                                <?php
                                if ($functie == "ICT") {
                                    echo '<option value="ICT" selected>ICT</option>';
                                }
                                ?>
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
