<?php
session_start();
include('../../../etc/json/bdd.php');

    if(!empty($_POST['ip']) AND !empty($_POST['reason'])) {
        if(!empty($_POST['date'])) {
            $date = strtotime($_POST['date']);
        } else {
            $date = 2147483647;
        }
        $ip = strtolower(htmlspecialchars($_POST['ip']));
        $reason = htmlspecialchars($_POST['reason']);

        $reqmail = $bdd->prepare("SELECT * FROM banned_ip WHERE ip = ?");
        $reqmail->execute(array($ip));
        $mailexist = $reqmail->rowCount();
        if($mailexist == 0) {
            $insertmbr = $bdd->prepare("INSERT INTO banned_ip(ip, date, date_finish, reason, operator_id) VALUES(?, UNIX_TIMESTAMP(), ?, ?, ?)");
            $insertmbr->execute(array($ip, $date, $reason, intval($_SESSION["id"])));

            echo 'ok';
            header('Location: ../?page=ban_hammer');
        } else {
            echo "This IP is already banned.";
            header('Location: ../?page=ban_hammer');
        }
    } else {
        echo "All fields must be completed.";
        header('Location: ../?page=ban_hammer');
    }

?>