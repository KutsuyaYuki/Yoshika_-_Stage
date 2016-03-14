<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- The left part. !-->
            <?php
            // At the top of the page we check to see whether the user is logged in or not
            if (empty($_SESSION['user'])) { ?>
                <a class="navbar-brand" href="index.php">JS</a>
            <?php } else {
                if (htmlentities($_SESSION['user']['auth']) == "Eigenaar") {
                    echo "<a class=\"navbar-brand\" href=\"index.php\">JS - Eigenaar</a>";
                }
                if (htmlentities($_SESSION['user']['auth']) == 'Administratie') {
                    echo "<a class=\"navbar-brand\" href=\"index.php\">JS - Administratie</a>";
                }
                if (htmlentities($_SESSION['user']['auth']) == 'Gebruiker') {
                    echo "<a class=\"navbar-brand\" href=\"index.php\">JS - Gebruiker</a>";
                }
                if (htmlentities($_SESSION['user']['auth']) == 'Debug') {
                    echo "<a class=\"navbar-brand\" href=\"index.php\">JS - Debug</a>";
                }
            }
            ?>
        </div>

        <!-- The menu/right part. !-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- The SESSION is empty, this means that the user isnt logged in. !-->
            <?php if (empty($_SESSION['user'])) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li<?php if ($thisPage == "Login") echo " class=\"active\""; ?>><a href="login.php">Login</a></li>
                </ul>
            <?php } ?>
            <!-- The SESSIONS isn't empty, so this means that the user is logged in. !-->
            <?php if (!empty($_SESSION['user'])) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li<?php if ($thisPage == "Home") echo " class=\"active\""; ?>><a href="private.php">Home</a></li>
                    <li<?php if ($thisPage == "Register") echo " class=\"active\""; ?>><a href="register.php">Register</a></li>
                    <li<?php if ($thisPage == "Logout") echo " class=\"active\""; ?>><a href="logout.php">Logout</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>