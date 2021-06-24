<?php
include_once("LDAP.php");
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

include 'navbar.php';
$ldap = new LDAP();
$ldap->ldapConn("mathematicians");


