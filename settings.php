<?php

$thisPage = "Settings";

    // First we execute our common code to connection to the database and start the session
    require("logic/common.php");

    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, we redirect them to the login page.
        header("Location: login.php");

        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to login.php");
    }

    // This if statement checks to determine whether the edit form has been submitted
    // If it has, then the account updating code is run, otherwise the form is displayed
    if(!empty($_POST))
    {
        // Make sure the user entered a valid E-Mail address
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("Invalid E-Mail Address");
        }

        // If the user is changing their E-Mail address, we need to make sure that
        // the new value does not conflict with a value that is already in the system.
        // If the user is not changing their E-Mail address this check is not needed.
        if($_POST['email'] != $_SESSION['user']['email'])
        {
            // Define our SQL query
            $query = "
                SELECT
                    1
                FROM contact
                WHERE
                    email = :email
            ";

            // Define our query parameter values
            $query_params = array(
                ':email' => $_POST['email']
            );

            try
            {
                // Execute the query
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            catch(PDOException $ex)
            {
                // Note: On a production website, you should not output $ex->getMessage().
                // It may provide an attacker with helpful information about your code.
                die("Failed to run query: " . $ex->getMessage());
            }

            // Retrieve results (if any)
            $row = $stmt->fetch();
            if($row)
            {
                die("This E-Mail address is already in use");
            }
        }

        // If the user entered a new password, we need to hash it and generate a fresh salt
        // for good measure.
        if(!empty($_POST['password']))
        {
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
            $password = hash('sha256', $_POST['password'] . $salt);
            for($round = 0; $round < 65536; $round++)
            {
                $password = hash('sha256', $password . $salt);
            }
        }
        else
        {
            // If the user did not enter a new password we will not update their old one.
            $password = null;
            $salt = null;
        }

        // Initial query parameter values
        $query_params = array(
            ':email' => $_POST['email'],
            ':user_id' => $_SESSION['user']['id'],
        );

        // If the user is changing their password, then we need parameter values
        // for the new password hash and salt too.
        if($password !== null)
        {
            $query_params[':password'] = $password;
            $query_params[':salt'] = $salt;
        }

        // Note how this is only first half of the necessary update query.  We will dynamically
        // construct the rest of it depending on whether or not the user is changing
        // their password.
        $query = "
            UPDATE administratie_gebruikers
            SET
                email = :email
        ";

        // If the user is changing their password, then we extend the SQL query
        // to include the password and salt columns and parameter tokens too.
        if($password !== null)
        {
            $query .= "
                , password = :password
                , salt = :salt
            ";
        }

        // Finally we finish the update query by specifying that we only wish
        // to update the one record with for the current user.
        $query .= "
            WHERE
                id = :user_id
        ";

        try
        {
            // Execute the query
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run query: " . $ex->getMessage());
        }

        // Now that the user's E-Mail address has changed, the data stored in the $_SESSION
        // array is stale; we need to update it so that it is accurate.
        $_SESSION['user']['email'] = $_POST['email'];

        // This redirects the user back to the members-only page after they register
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
    <?php include "logic/classes/menu_top.inc"; ?>
</div>
<div class="wrapper">
    <!-- Content !-->
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Settings - UNDER CONSTRUCTION</h3>
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
                            <button type="submit" class="btn btn-submit" disabled="disabled">Update</button>
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
