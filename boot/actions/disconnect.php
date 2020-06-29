<?php
if(isset($_SESSION['id'])) {
    $_SESSION = array();
    session_destroy();
}
header('Location: ?');