<?php
session_start();

if (isset($_GET['page'])) {
    switch($_GET['page']) {
        case 'login':
            if (isset($_SESSION['id'])) {
                header('Location: ?page=desktop');
            } else {
                include('pages/login.html');
            }
        break;
        case 'desktop':
        default:
            if (isset($_SESSION['id'])) {
                include('pages/desktop.html');
            } else {
                header('Location: ?page=login');
            }
        break;
    }
} else {
    if (isset($_SESSION['id'])) {
        include('pages/desktop.html');
    } else {
        header('Location: ?page=login');
    }
}