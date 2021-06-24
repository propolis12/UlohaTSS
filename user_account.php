<?php

session_start();

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

include_once("SQLQueries.php");
$queries = new SQLQueries();

if(isset($_POST['Submit'])) {
    $queries->updateUserInfo();
    header("Location: /mainPage.php");
    exit();
    //echo "sadadfafafaf";
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/mainPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'navbar.php' ?>

<div class="row justify-content-center">
    <div class="col-4 ">
        <form method="post">
            <div class="form-group">
                <label for="inputUsername">Phone number</label>
                <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Enter username" value="<?php echo ($_SESSION['user'])['username']  ?>">
                <label for="inputPhoneNumber">Phone number</label>
                <input type="text" class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" placeholder="Enter phone number" value="<?php echo ($_SESSION['user'])['phone_number']  ?>">
                <label for="inputLandline">Landline</label>
                <input type="text" class="form-control" id="inputLandline" name="inputLandline" placeholder="Enter landline"  value="<?php echo ($_SESSION['user'])['landline']  ?>" >
                <label for="inputBranch">Branch</label>
                <select name="branches" id="inputBranch" type="text" class="form-control" >


                    <?php
                    $branches = $queries->getBranches();
                    foreach ($branches as $branch) { ?>
                        /* value is current branch of user */
                        <option value="<?php echo $branch["name"]; ?>" <?php if (!empty($queries->getBranch(($_SESSION['user'])['id'])['name']) && $queries->getBranch(($_SESSION['user'])['id'])['name'] === $branch["name"])
                        {
                            echo ' selected="selected" ';
                        } ?>><?php echo $branch["name"]; ?></option>;
                    <?php } ?>
                </select>
                <label for="inputPosition">Work Position</label>
                <select id="positions" name="positions" id="inputPosition" type="text" class="form-control" >
                    <?php
                    $positions = $queries->getPositions();
                    foreach ($positions as $position) { ?>
                        /* value is current position of user */
                        <option value="<?php echo $position["name"];
                        ?>" <?php if ( !empty($queries->getPosition(($_SESSION['user'])['id'])['name']) && $queries->getPosition(($_SESSION['user'])['id'])['name'] === $position["name"])
                        {
                            echo ' selected="selected" ';
                        }?>> <?php echo $position["name"] /*<?php echo $queries->getPosition(($_SESSION['user'])['id'])['name'];*/ ?></option>;
                    <?php } ?>
                </select>
            </div>
            <!--<div class="form-group">
                <label for="inputPassword"></label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>-->
            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html>

