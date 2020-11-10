<?php
include('../../../etc/json/bdd.php');

function recreate($e) {
    if (!file_exists("../../../home/".$e."/Documents/")) {
        mkdir("../../../home/".$e."/Documents");
    }
    if (!file_exists("../../../home/".$e."/Videos/")) {
        mkdir("../../../home/".$e."/Videos");
    }
    if (!file_exists("../../../home/".$e."/Music/")) {
        mkdir("../../../home/".$e."/Music");
    }
    if (!file_exists("../../../home/".$e."/Pictures/")) {
        mkdir("../../../home/".$e."/Pictures");
    }
}
function softwares($e, $bdd) {
    $r = array('tos.teaos.console',' tos.teaos.browser', 'tos.teaos.admin', 'tos.teaos.store', 'tos.teaos.explorer');
    foreach ($r as &$value) {
        $insertmbr = $bdd->prepare("INSERT INTO users_softwares(code, user_id, date) VALUES(?, ?, UNIX_TIMESTAMP())");
        $insertmbr->execute(array($value, $e));
    }
}