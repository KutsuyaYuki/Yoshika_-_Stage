<?php

$thisPage = "Home";
// First we execute our common code to connection to the database and start the session
require("logic/common.php");

// At the top of the page we check to see whether the user is logged in or not
if (!empty($_SESSION['user'])) {
    // If they are not, we redirect them to the login page.
    header("Location: private.php");

    // Remember that this die statement is absolutely critical.  Without it,
    // people can view your members-only content without logging in.
    die("Redirecting to private.php");
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
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
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="login.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="text" name="user" class="form-control" id="inputUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <div class="col-sm-2">
                            <div class="checkbox">
                                <input type="checkbox" id="remember"/><label for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    !-->
                    <div class="form-group">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-submit">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="cleared"></div>
</div>
<!-- Footer !-->
<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <p class="text-center">Copyright stuff ~</p>
    </div>
</nav>

</body>
</html>
