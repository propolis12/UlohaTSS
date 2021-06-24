<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}
include 'navbar.php';

$url = 'https://old.tssgroup.sk/pricelisthandler.aspx?login=52713229&password=b219957d46535ae6afeaebb324afc451482b4768f64d161a3c8fb3040856b013b2d1eca95ccbc5dfb8c9dcdebf842de4ea205f8c7780579919214ae9bf0023c6&typxml=1';
$xmlString = simplexml_load_file($url);

print_r($xmlString);
//$xml = new SimpleXMLElement(file_get_contents($url));
//$arr = explode("",$xml);
//print_r($xml);
//
//print_r($xmlString);
//echo (string) $xml->language[0];
//$xml = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOCDATA);
/*$json = json_encode($xml);
$array = json_decode($json,TRUE);*/
//print_r($xml);
