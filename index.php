<?php
session_start();

try {
    include('etc/json/bdd.php');


    $isbanned = $bdd->prepare("SELECT * FROM banned_ip WHERE ip = ?");
    $isbanned->execute(array($_SERVER['REMOTE_ADDR']));
    $banned = $isbanned->rowCount();

    if ($banned == 0) {
        if (isset($_GET['page'])) {
            $insertmbr3 = $bdd->prepare('INSERT INTO visits(ip, motor, SCRIPT_NAME, timestamp, date) VALUES(?, ?, ?, UNIX_TIMESTAMP(), ?)');
            $insertmbr3->execute(array($_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_SERVER["SCRIPT_NAME"], date('d-m-Y')));

            switch($_GET['page']) {
                case 'login':
                    if (isset($_SESSION['id'])) {
                        include('pages/SEO.php');

                        include('pages/desktop.php');
                    } else {
                        include('pages/SEO.php');

                        include('pages/login.php');
                    }
                break;
                case 'desktop':
                default:
                    if (isset($_SESSION['id'])) {
                        include('pages/SEO.php');

                        include('pages/desktop.php');
                    } else {
                        include('pages/SEO.php');

                        include('pages/login.php');
                    }
                break;
            }
        } elseif (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'disconnect':
                    default:
                    include('boot/actions/disconnect.php');          
                break;
                case 'drag':
                    include('boot/actions/drag.php');          
                break; 
            }
        } else {
            $insertmbr3 = $bdd->prepare('INSERT INTO visits(ip, motor, SCRIPT_NAME, timestamp, date) VALUES(?, ?, ?, UNIX_TIMESTAMP(), ?)');
            $insertmbr3->execute(array($_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_SERVER["SCRIPT_NAME"], date('d-m-Y')));

            if (isset($_SESSION['id'])) {
                include('pages/SEO.php');

                include('pages/desktop.php');
            } else {
                include('pages/SEO.php');

                include('pages/login.php');
            }
        }
    } else {
        $insertmbr3 = $bdd->prepare('INSERT INTO visits(ip, motor, SCRIPT_NAME, timestamp, date) VALUES(?, ?, ?, UNIX_TIMESTAMP(), ?)');
        $insertmbr3->execute(array($_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_SERVER["SCRIPT_NAME"], date('d-m-Y')));

        $banned_info = $isbanned->fetch();
        include('pages/SEO.php');

        include('pages/banned.php');
    }
} catch (Exception $e) {
    include('pages/SEO.php');
    
    include('pages/bdd.php');
}