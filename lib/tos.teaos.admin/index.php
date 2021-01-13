<?php
session_start();

if (isset($_SESSION['id'])) {
    include('../../etc/json/bdd.php');

    $reqabcd = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $reqabcd->execute(array($_SESSION['id']));
    $userinfo = $reqabcd->fetch();

    if ($userinfo['perm'] == 1) {
        include('pages/bars.php');
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'index':
                default:
                    include('pages/index.php');
                    break;
                case 'register':
                    include('pages/register.php');
                    break;
                case 'user_list':
                    include('pages/user_list.php');
                    break;
                case 'ban_hammer':
                    include('pages/ban_hammer.php');
                    break;
                case 'ban_list':
                    include('pages/ban_list.php');
                    break;
            }
        } else {
            include('pages/index.php');
        }
        include('pages/footer.php');
    } else {
        echo 'You\'re not allowed to display this page';
    }
} else {
    header('Location: ../');
}
