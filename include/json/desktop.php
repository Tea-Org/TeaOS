<?php

header('Content-type: application/json');

$json = array(
    "settings"=>array(
        "height"=>90,
        "width"=>70
    ),
    "chrome"=>array(
        "name"=>"bonjour",
        "image"=>"bonjour.png"
    )
);

echo json_encode($json);