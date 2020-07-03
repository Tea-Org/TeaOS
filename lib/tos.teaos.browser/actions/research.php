<?php
session_start();
include('../../../etc/json/bdd.php');

$reqsoftware = $bdd->prepare("SELECT * FROM browser_websites WHERE url = ?");
$reqsoftware->execute(array($_POST['url']));
$softwarecount = $reqsoftware->rowCount();

if ($softwarecount == 0) {
    $insertmbr = $bdd->prepare("INSERT INTO browser_websites(title, url, date) VALUES(?, ?, UNIX_TIMESTAMP())");
    $insertmbr->execute(array($_POST['url'], $_POST['url']));
}

$reqsoftware = $bdd->prepare("SELECT * FROM browser_websites WHERE url = ?");
$reqsoftware->execute(array($_POST['url']));
$software = $reqsoftware->fetch();

echo $software['id'];
$insertmbr = $bdd->prepare("INSERT INTO browser_visits(website_id, user_id, date) VALUES(?, ?, UNIX_TIMESTAMP())");
$insertmbr->execute(array($software['id'], $_SESSION['id']));

?>