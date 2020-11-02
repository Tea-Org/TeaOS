<?php
include('../../../etc/json/bdd.php');
include('recreate.php');

    if(!empty($_POST['username']) AND !empty($_POST['password']) AND isset($_POST['perm'])) {
        $username = strtolower(htmlspecialchars($_POST['username']));
        $password = md5($_POST['password']);

        $reqmail = $bdd->prepare("SELECT * FROM users WHERE username = ?");
        $reqmail->execute(array($username));
        $mailexist = $reqmail->rowCount();
        if($mailexist == 0) {
            $unik = uniqid();

            $insertmbr = $bdd->prepare("INSERT INTO users(username, password, ip_reg, ip, navigateur, date_reg, date, json_reg, json, perm, screen, unik, reg_by_admin) VALUES(?, ?, 0, 0, 0, UNIX_TIMESTAMP(), 0, 0, 0, 0, ?, ?, 1)");
            $insertmbr->execute(array($username, $password, intval($_POST['perm']), $unik));

            mkdir("../../../home/".$unik);
            recreate($unik);
            $reqmail = $bdd->prepare("SELECT * FROM users WHERE username = ?");
            $reqmail->execute(array($username));
            $mailexiste = $reqmail->fetch();
            softwares($mailexiste['id'], $bdd);

            echo 'ok';
            header('Location: ../?page=user_list');
        } else {
            echo "This username is already taken.";
            header('Location: ../?page=register');
        }
    } else {
        echo "All fields must be completed.";
        header('Location: ../?page=register');
    }

?>