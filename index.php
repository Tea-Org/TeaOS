<?php
include('include/json/bdd.php');
session_start();

$insertmbr3 = $bdd->prepare('INSERT INTO visits(ip, motor, SCRIPT_NAME, timestamp, date) VALUES(?, ?, ?, UNIX_TIMESTAMP(), ?)');
$insertmbr3->execute(array($_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_SERVER["SCRIPT_NAME"], date('d-m-Y')));

$isbanned = $bdd->prepare("SELECT * FROM banned_ip WHERE ip = ?");
$isbanned->execute(array($_SERVER['REMOTE_ADDR']));
$banned = $isbanned->rowCount();

if ($banned == 0) {
    if (isset($_GET['page'])) {
        switch($_GET['page']) {
            case 'login':
                if (isset($_SESSION['id'])) {
                    header('Location: ?page=desktop');
                } else {
                    include('pages/login.php');
                }
            break;
            case 'desktop':
            default:
                if (isset($_SESSION['id'])) {
                    include('pages/desktop.php');
                } else {
                    header('Location: ?page=login');
                }
            break;
        }
    } else {
        if (isset($_SESSION['id'])) {
            include('pages/desktop.php');
        } else {
            header('Location: ?page=login');
        }
    }
} else {
    $banned_info = $isbanned->fetch();
    include('pages/banned.php');
}