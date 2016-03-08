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
            <?php
            require("logic/common.php");

            // At the top of the page we check to see whether the user is logged in or not
            if (!empty($_SESSION['user'])) {
                if (htmlentities($_SESSION['user']['auth']) == "Eigenaar") { ?>
                    <a class="navbar-brand" href="index.php">JS - Eigenaar</a>
                <?php } else if (htmlentities($_SESSION['user']['auth']) == 'Administratie') { ?>
                    <?php echo $_SESSION['user']['auth']; ?>
                    <a class="navbar-brand" href="index.php">JS - Administratie</a>
                <?php } else if (htmlentities($_SESSION['user']['auth']) == 'Gebruiker') { ?>
                    <a class="navbar-brand" href="index.php">JS - Gebruiker</a>
                <?php } else if (htmlentities($_SESSION['user']['auth']) == 'Debug') { ?>
                    <a class="navbar-brand" href="index.php">JS - Debug</a>
                <?php }
            } else { ?>
                <a class="navbar-brand" href="index.php">JS</a>
            <?php }
            ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (empty($_SESSION['user'])) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <!-- This PHP script makes sure the "active" button looks pressed !-->
                    <li<?php if ($thisPage == "Login") echo " class=\"active\""; ?>><a href="login.php">Login</a></li>
                    <li<?php if ($thisPage == "Register") echo " class=\"active\""; ?>><a
                            href="register.php">Register</a>
                    </li>
                </ul>
            <?php } ?>
            <?php if (!empty($_SESSION['user'])) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <!-- This PHP script makes sure the "active" button looks pressed !-->
                    <li<?php if ($thisPage == "Home") echo " class=\"active\""; ?>><a href="private.php">Home</a></li>
                    <li<?php if ($thisPage == "Settings") echo " class=\"active\""; ?>><a
                            href="settings.php">Settings</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pagina's<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">NAW Lijst</a></li>
                    </ul>
                    </li>

                    <li<?php if ($thisPage == "Logout") echo " class=\"active\""; ?>><a href="logout.php">Logout</a>
                    </li>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>