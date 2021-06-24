<?php
include_once("SQLQueries.php");
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

include 'navbar.php';
//include "user_account.php";
?>





</body>
</html>

<?php


