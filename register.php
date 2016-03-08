<?php

$thisPage = "Register";

// First we execute our common code to connection to the database and start the session
require("logic/common.php");

global $db;

// This if statement checks to determine whether the registration form has been submitted
// If it has, then the registration code is run, otherwise the form is displayed
if (!empty($_POST)) {
// Ensure that the user has entered a non-empty username
    if (empty($_POST['user'])) {
// Note that die() is generally a terrible way of handling user errors
// like this.  It is much better to display the error with the form
// and allow the user to correct their mistake.  However, that is an
// exercise for you to implement yourself.
        die("Please enter a username.");
    }

// Ensure that the user has entered a non-empty password
    if (empty($_POST['password'])) {
        die("Please enter a password.");
    }

// Make sure the user entered a valid E-Mail address
// filter_var is a useful PHP function for validating form input, see:
// http://us.php.net/manual/en/function.filter-var.php
// http://us.php.net/manual/en/filter.filters.php
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid E-Mail Address");
    }


// We will use this SQL query to see whether the username entered by the
// user is already in use.  A SELECT query is used to retrieve data from the database.
// :username is a special token, we will substitute a real value in its place when
// we execute the query.
    $query_check_user = "
SELECT 1
FROM users
WHERE user = :user
";

// This contains the definitions for any special tokens that we place in
// our SQL query.  In this case, we are defining a value for the token
// :username.  It is possible to insert $_POST['username'] directly into
// your $query string; however doing so is very insecure and opens your
// code up to SQL injection exploits.  Using tokens prevents this.
// For more information on SQL injections, see Wikipedia:
// http://en.wikipedia.org/wiki/SQL_Injection
    $query_check_user_params = array(
        ':user' => $_POST['user']
    );

    try {
// These two statements run the query against your database table.
        $stmt = $db->prepare($query_check_user);
        $result = $stmt->execute($query_check_user_params);
    } catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

// The fetch() method returns an array representing the "next" row from
// the selected results, or false if there are no more rows to fetch.
    $row = $stmt->fetch();

// If a row was returned, then we know a matching username was found in
// the database already and we should not allow the user to continue.
    if ($row) {
        die("This username is already in use");
    }

// Now we perform the same type of check for the email address, in order
// to ensure that it is unique.
    $query_check_email = "
SELECT 1
FROM contact
WHERE email = :email
";

    $query_check_email_params = array(
        ':email' => $_POST['email']
    );

    try {
        $stmt = $db->prepare($query_check_email);
        $result = $stmt->execute($query_check_email_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }

    $row = $stmt->fetch();

    if ($row) {
        die("This email address is already registered");
    }

// An INSERT query is used to add new rows to a database table.
// Again, we are using special tokens (technically called parameters) to
// protect against SQL injection attacks.
    $query_users = "
INSERT INTO users (
user,
password,
salt,
auth
) VALUES (
:user,
:password,
:salt,
:auth
)
";

// A salt is randomly generated here to protect again brute force attacks
// and rainbow table attacks.  The following statement generates a hex
// representation of an 8 byte salt.  Representing this in hex provides
// no additional security, but makes it easier for humans to read.
// For more information:
// http://en.wikipedia.org/wiki/Salt_%28cryptography%29
// http://en.wikipedia.org/wiki/Brute-force_attack
// http://en.wikipedia.org/wiki/Rainbow_table
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

// This hashes the password with the salt so that it can be stored securely
// in your database.  The output of this next statement is a 64 byte hex
// string representing the 32 byte sha256 hash of the password.  The original
// password cannot be recovered from the hash.  For more information:
// http://en.wikipedia.org/wiki/Cryptographic_hash_function
    $password = hash('sha256', $_POST['password'] . $salt);

// Next we hash the hash value 65536 more times.  The purpose of this is to
// protect against brute force attacks.  Now an attacker must compute the hash 65537
// times for each guess they make against a password, whereas if the password
// were hashed only once the attacker would have been able to make 65537 different
// guesses in the same amount of time instead of only one.
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }

// Here we prepare our tokens for insertion into the SQL query.  We do not
// store the original password; only the hashed version of it.  We do store
// the salt (in its plaintext form; this is not a security risk).
    $query_users_params = array(
        ':user' => $_POST['user'],
        ':password' => $password,
        ':salt' => $salt,
        ':auth' => $_POST['category']
    );

    try {
// Execute the query to create the user
        $stmt = $db->prepare($query_users);
        $result = $stmt->execute($query_users_params);
        $last_id = $db->lastInsertId();
    } catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    /* Contact */
    $query_contact = "
INSERT INTO contact (
id,
woonplaats,
woonadres,
postadres,
postcode,
email,
telefoonnummer,
mobielenummer
) VALUES (
:id,
:woonplaats,
:woonadres,
:postadres,
:postcode,
:email,
:telefoonnummer,
:mobielenummer
)
";

    $query_contact_params = array(
        ':id' => $last_id,
        ':woonplaats' => $_POST['woonplaats'],
        ':woonadres' => $_POST['woonadres'],
        ':postadres' => $_POST['postadres'],
        ':postcode' => $_POST['postcode'],
        ':email' => $_POST['email'],
        ':telefoonnummer' => $_POST['telefoonnummer'],
        ':mobielenummer' => $_POST['mobielenummer']

    );

    try {
// Execute the query to create the user
        $stmt = $db->prepare($query_contact);
        $result = $stmt->execute($query_contact_params);
    } catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    /* End Contact */

    /* Category */
    $query_category = "
INSERT INTO category (
id,
categorie,
functie
) VALUES (
:id,
:categorie,
:functie
)
";

    $query_category_params = array(
        ':id' => $last_id,
        ':categorie' => $_POST['category'],
        ':functie' => $_POST['functie']
    );

    try {
// Execute the query to create the user
        $stmt = $db->prepare($query_category);
        $result = $stmt->execute($query_category_params);
    } catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    /* End Category */

    /* NAW */
    $query_naw = "
INSERT INTO naw (
id,
contact_id,
category_id,
gebruiker_id,
voorletters,
roepnaam,
tussenvoegsel,
achternaam,
geslacht,
bsn,
begindatum,
einddatum,
notitie
) VALUES (
:id,
:contact_id,
:category_id,
:gebruiker_id,
:voorletters,
:roepnaam,
:tussenvoegsel,
:achternaam,
:geslacht,
:bsn,
:begindatum,
:einddatum,
:notitie
)
";

    $query_naw_params = array(
        ':id' => $last_id,
        ':contact_id' => $last_id,
        ':category_id' => $last_id,
        ':gebruiker_id' => $last_id,
        ':voorletters' => $_POST['voorletters'],
        ':roepnaam' => $_POST['roepnaam'],
        ':tussenvoegsel' => $_POST['tussenvoegsel'],
        ':achternaam' => $_POST['achternaam'],
        ':geslacht' => $_POST['geslacht'],
        ':bsn' => $_POST['bsn'],
        ':begindatum' => $_POST['begindatum'],
        ':einddatum' => $_POST['einddatum'],
        ':notitie' => $_POST['notitie']
    );

    try {
// Execute the query to create the user
        $stmt = $db->prepare($query_naw);
        $result = $stmt->execute($query_naw_params);
    } catch (PDOException $ex) {
// Note: On a production website, you should not output $ex->getMessage().
// It may provide an attacker with helpful information about your code.
        die("Failed to run query: " . $ex->getMessage());
    }

    /* End NAW */

// This redirects the user back to the login page after they register
    header("Location: login.php");

// Calling die or exit after performing a redirect using the header function
// is critical.  The rest of your PHP script will continue to execute and
// will be sent to the user if you do not die or exit.
    die("Redirecting to login.php");
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
    <?php include "logic/classes/menu_top.inc"; ?>
</div>
<div class="wrapper">
    <!-- Content !-->
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="register.php" method="post">

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="text" name="user" class="form-control" id="inputUsername"
                                   placeholder="Username">
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                   placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="voorletters" name="voorletters" class="form-control" id="inputVoorletters"
                                   placeholder="Voorletters">
                            <input type="roepnaam" name="roepnaam" class="form-control" id="inputroepnaam"
                                   placeholder="Roepnaam">
                            <input type="tussenvoegsel" name="tussenvoegsel" class="form-control"
                                   id="inputTussenvoegsel"
                                   placeholder="Tussenvoegsel">
                            <input type="achternaam" name="achternaam" class="form-control" id="inputAchternaam"
                                   placeholder="Achternaam">
                            <input type="geslacht" name="geslacht" class="form-control" id="inputGeslacht"
                                   placeholder="Geslacht">
                            <input type="text" name="geboortedatum" class="form-control" id="inputGeboortedatum"
                                   placeholder="Geboortedatum">
                            <script type="text/javascript">
                                $('#inputGeboortedatum').datepicker({
                                    format: "dd-mm-yyyy",
                                    language: "nl",
                                    todayBtn: true,
                                    calendarWeeks: true
                                });
                            </script>
                            <input type="bsn" name="bsn" class="form-control" id="inputBSN"
                                   placeholder="BSN">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                            <input type="woonplaats" name="woonplaats" class="form-control" id="inputWoonplaats"
                                   placeholder="Woonplaats">
                            <input type="woonadres" name="woonadres" class="form-control" id="inputWoonadres"
                                   placeholder="Woonadres">
                            <input type="postadres" name="postadres" class="form-control" id="inputPostadres"
                                   placeholder="Postadres">
                            <input type="postcode" name="postcode" class="form-control" id="inputPostcode"
                                   placeholder="Postcode">
                            <input type="telefoonnummer" name="telefoonnummer" class="form-control"
                                   id="inputTelefoonnummer"
                                   placeholder="Telefoonnummer">
                            <input type="mobielenummer" name="mobielenummer" class="form-control"
                                   id="inputMobielenummer"
                                   placeholder="Mobielenummer">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="text" name="begindatum" class="form-control" id="inputBegindatum"
                                   placeholder="Begindatum">
                            <script type="text/javascript">
                                $('#inputBegindatum').datepicker({
                                    format: "dd-mm-yyyy",
                                    language: "nl",
                                    todayBtn: true,
                                    calendarWeeks: true
                                });
                            </script>
                            <input type="text" name="einddatum" class="form-control" id="inputEinddatum"
                                   placeholder="Eindatum">
                            <script type="text/javascript">
                                $('#inputEinddatum').datepicker({
                                    format: "dd-mm-yyyy",
                                    language: "nl",
                                    todayBtn: true,
                                    calendarWeeks: true
                                });
                            </script>
                            <input type="notitie" name="notitie" class="form-control" id="inputNotitie"
                                   placeholder="Notitie">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <select name="category" id="inputCategory" class="form-control">
                                <option value="Eigenaar">Eigenaar</option>
                                <option value="Administratie">Administratie</option>
                                <option value="Werknemer">Werknemer</option>
                            </select>
                            <select name="functie" id="inputFunctie" class="form-control">
                                <option value="ICT">ICT</option>
                                <option value="Stuff">Stuff</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-submit">Register</button>
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
<footer class="footer"></footer>

</body>
</html>
