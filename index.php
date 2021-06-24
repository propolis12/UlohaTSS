<?php
session_start();

include_once("SQLQueries.php");


$queries = new SQLQueries();



?>

<html >
<head>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
</head>
<body >


<div class="container" id="mainContainer">
    <div class="row justify-content-center">
        <img  src="https://www.tssgroup.sk/buxus/images/zaujmavosti/2020/nove_logo_TSSGROUP/TSS_Group_logo_edit.png">
    </div>

    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-4 border rounded " id="aroundForm">

            <form action="/index.php" id="signInForm" method="post" class="pl-1">
                <h2>Sign in</h2>
                <div>
                    <label for="username">Username:</label><br>
                    <input type="text"  id="username" name="username" placeholder="Enter username"><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter password"><br><br>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>


</div>

</body>
</html>
 <?php
if (!empty($_POST['username']) && !empty($_POST['password']) ) {
    //($_POST['username'] . " " . $_POST['password']);
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {

        $user = $queries->getUser($username);
        if( sizeof($user) > 0 && $password === $user['password']) {
            unset($user['password']);
            //$_SESSION["username"] = $username;
            $roles = $queries->getRoles($user["id"]);
            $_SESSION['roles'] = $roles;
            //$_SESSION['user_id'] = $user["id"];
            $_SESSION['user'] = $user;
            //print_r($_SESSION['roles']);
            header("Location: /mainPage.php");
            exit();
        } else {
            echo "authentication failed";
        }
    } catch (Exception $e) {
        echo $e;
    }
}





?>

