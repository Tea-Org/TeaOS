<?php
include('../../include/json/bdd.php');

    if(!empty($_POST['username']) AND !empty($_POST['password']) AND isset($_POST['perm'])) {
        $username = strtolower(htmlspecialchars($_POST['username']));
        $password = md5($_POST['password']);

        $reqmail = $bdd->prepare("SELECT * FROM users WHERE username = ?");
        $reqmail->execute(array($username));
        $mailexist = $reqmail->rowCount();
        if($mailexist == 0) {
            $insertmbr = $bdd->prepare("INSERT INTO users(username, password, date_reg, perm, unik, reg_by_admin) VALUES(?, ?, UNIX_TIMESTAMP(), ?, ?, 1)");
            $insertmbr->execute(array($username, $password, intval($_POST['perm']), uniqid()));

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