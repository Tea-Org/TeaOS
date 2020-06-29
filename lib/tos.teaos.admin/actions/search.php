<?php

include('../../etc/json/bdd.php');

if (isset($_POST['search'])) {
    if (isset($_POST['username'])) {

        $reqabcde = $bdd->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%', ?, '%')");
        $reqabcde->execute(array($_POST['username']));
        $userinfoe = $reqabcde->fetchAll();
        $usercounte = $reqabcde->rowCount();

        for ($i = 0; $i < $usercounte; $i++) {
            echo '
                <div class="search">
                    <p>'.$userinfoe[$i]['username'].'</p>
                </div>
            ';
        }        
    }
}
