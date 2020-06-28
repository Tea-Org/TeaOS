<?php

function recreate($e) {
    if (!file_exists("../../usr/personnal/".$e."/Documents/")) {
        mkdir("../../usr/personnal/".$e."/Documents");
    }
    if (!file_exists("../../usr/personnal/".$e."/Videos/")) {
        mkdir("../../usr/personnal/".$e."/Videos");
    }
    if (!file_exists("../../usr/personnal/".$e."/Music/")) {
        mkdir("../../usr/personnal/".$e."/Music");
    }
    if (!file_exists("../../usr/personnal/".$e."/Pictures/")) {
        mkdir("../../usr/personnal/".$e."/Pictures");
    }
}