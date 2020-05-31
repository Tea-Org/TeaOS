<?php
if ($bdd = new PDO('mysql:host=localhost;dbname=teaos', 'root', '')) {
    session_start();
    if(isset($_POST['login'])){
        if(!empty($_POST['username']) AND !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $passwordword = md5($_POST['password']);

            $requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND pass = ?");
            $requser->execute(array($username, $password));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['username'] = $userinfo['username'];
                $_SESSION['password'] = $userinfo['password'];

                $jsonfileinsert = file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']);
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
} else {
    echo "Ouchh";
}