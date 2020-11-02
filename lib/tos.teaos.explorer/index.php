<?php
session_start();
include('../../etc/json/bdd.php');

$reqsoftware = $bdd->prepare("SELECT * FROM browser_visits WHERE user_id = ? LIMIT 4");
$reqsoftware->execute(array($_SESSION['id']));
$software = $reqsoftware->fetchAll();
$softwarecount = $reqsoftware->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    
</body>
</html>