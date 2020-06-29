<?php

function recreate($e) {
    if (!file_exists("../../home/".$e."/Documents/")) {
        mkdir("../../home/".$e."/Documents");
    }
    if (!file_exists("../../home/".$e."/Videos/")) {
        mkdir("../../home/".$e."/Videos");
    }
    if (!file_exists("../../home/".$e."/Music/")) {
        mkdir("../../home/".$e."/Music");
    }
    if (!file_exists("../../home/".$e."/Pictures/")) {
        mkdir("../../home/".$e."/Pictures");
    }
}