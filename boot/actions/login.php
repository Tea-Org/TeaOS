<?php
include('../../etc/json/bdd.php');
    session_start();
    if(isset($_POST['login'])){
        if(!empty($_POST['username']) AND !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = md5($_POST['password']);

            $requser = $bdd->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $requser->execute(array($username, $password));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];

                $jsonfileinsert = file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']);

                if ($userinfo['reg_by_admin'] == 1) {
                    $requser = $bdd->prepare("UPDATE users SET ip_reg = ?, reg_by_admin = 0, json_reg = ? WHERE id = ?");
                    $requser->execute(array($_SERVER['REMOTE_ADDR'], $jsonfileinsert, $userinfo['id']));
                }

                $requser = $bdd->prepare("UPDATE users SET ip = ?, date = UNIX_TIMESTAMP(), json = ? WHERE id = ?");
                $requser->execute(array($_SERVER['REMOTE_ADDR'], $jsonfileinsert, $userinfo['id']));

                echo "ok|" . $userinfo['username'];
            } else {
                echo "You are not registered in our databases. Please register.";
            }
        } else {
            echo "All fields must be completed.";
        }
    } else { 
        echo "Error";
        header ("Location: /");
    }
