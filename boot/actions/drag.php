<?php
if (isset($_POST['id'])) {

    $reqsoftware = $bdd->prepare("SELECT * FROM users_softwares WHERE id = ?");
    $reqsoftware->execute(array($_POST['id']));
    $software = $reqsoftware->fetch();
    
    if (isset($_SESSION['id'])) {
        if ($software['user_id'] == $_SESSION['id']) {
            if (isset($_POST['top']) AND (isset($_POST['left']))) {
                $requser = $bdd->prepare("UPDATE users_softwares SET toppos = ?, leftpos = ? WHERE id = ?");
                $requser->execute(array($_POST['top'], $_POST['left'], $_POST['id']));
            }
        }
    }
}
?>