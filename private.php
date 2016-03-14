<?php

$thisPage = "Home";
// First we execute our common code to connection to the database and start the session
require("logic/common.php");

// At the top of the page we check to see whether the user is logged in or not
if (empty($_SESSION['user'])) {
    // If they are not, we redirect them to the login page.
    header("Location: login.php");

    // Remember that this die statement is absolutely critical.  Without it,
    // people can view your members-only content without logging in.
    die("Redirecting to login.php");
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!DOCTYPE html>
<html>
<head>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script src="js/locales/bootstrap-table-nl-NL.js"></script>
    <script src="js/bootstrap-table-editable.js"></script>
    <script src="js/bootstrap-editable.js"></script>
    <script src="js/bootstrap-table-mobile.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/bootstrap-editable.css" rel="stylesheet" type="text/css" media="screen"/>
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
                <h3 class="panel-title">Private page</h3>
            </div>
            <div class="panel-body">
                <p><?php
                    /*$statement = $db->prepare("select * from users where user = :user");
                    $statement->execute(array(':user' => htmlentities($_SESSION['user']['user'])));
                    $row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
                    echo $row['auth'];*/
                    if (htmlentities($_SESSION['user']['auth']) == "Gebruiker") {
                        include("logic/classes/table_timesheet.php");
                    } elseif (htmlentities($_SESSION['user']['auth']) == "Administratie") {
                        include("logic/classes/table_naw.php");
                    } elseif (htmlentities($_SESSION['user']['auth']) == "Eigenaar") {
                        include("logic/classes/table_naw.php");
                    } elseif (htmlentities($_SESSION['user']['auth']) == 3) {
                    }
                    ?></p>
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
