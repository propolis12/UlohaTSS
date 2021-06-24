<?php
//session_start();

include_once("SQLQueries.php");

?>
<html>
<head>
    <link rel="stylesheet" href="css/mainPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="mainNav">
    <a class="navbar-brand" href="mainPage.php">TSS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav mr-auto">
                    <?php
                    foreach ($_SESSION['roles'] as $role) {
                        if ($role['name'] === 'administrator') {
                            echo '<li class="nav-item active">
                        <a class="nav-link" href="#">Admin panel <span class="sr-only">(current)</span></a>
                    </li>';

                        }
                        //echo $role['name'];
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Chemists.php">Chemists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Mathematicians.php">Mathematicians</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Scientists.php">Scientists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="XMLload.php">XML</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_account.php">User Acount</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
          </div>


        <?php
        foreach ($_SESSION['roles'] as $role) {
            if ($role['name'] === 'moderator') {
                echo '<ul class="">
                        <li class="bg-primary">You are moderator</li>
                       </ul>';
            }
        }
        ?>

</nav>