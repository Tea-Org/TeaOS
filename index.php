<?php
include('pages/SEO.html');
include('include/json/bdd.php');
session_start();

$insertmbr3 = $bdd->prepare('INSERT INTO visits(ip, motor, SCRIPT_NAME, timestamp, date) VALUES(?, ?, ?, UNIX_TIMESTAMP(), ?)');
$insertmbr3->execute(array($_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_SERVER["SCRIPT_NAME"], date('d-m-Y')));

$isbanned = $bdd->prepare("SELECT * FROM banned_ip WHERE ip = ?");
$isbanned->execute(array($_SERVER['REMOTE_ADDR']));
$banned = $isbanned->rowCount();

if ($banned == 0) {
    if (isset($_GET['page'])) {
        
        $reqsoftware = $bdd->prepare("SELECT * FROM users_softwares WHERE user_id = ?");
        $reqsoftware->execute(array($_SESSION['id']));
        $software_count = $reqsoftware->rowCount();
        $software = $reqsoftware->fetchAll();

        $reqsoftware = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $reqsoftware->execute(array($_SESSION['id']));
        $userinfo = $reqsoftware->fetch();

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
    } elseif (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'disconnect':
                default:
                include('actions/disconnect.php');          
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