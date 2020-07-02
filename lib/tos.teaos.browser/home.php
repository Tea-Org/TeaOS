<?php
session_start();
include('../../etc/json/bdd.php');

$reqsoftware = $bdd->prepare("SELECT * FROM browser_visits WHERE user_id = ? LIMIT 4");
$reqsoftware->execute(array($_SESSION['id']));
$software = $reqsoftware->fetchAll();
$softwarecount = $reqsoftware->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
    <div class="body">
        <?php 
            for ($i = 0; $i < $softwarecount; $i++) {

                $reqsoftwared = $bdd->prepare("SELECT * FROM browser_websites WHERE id = ?");
                $reqsoftwared->execute(array($software[$i]['website_id']));
                $softwared = $reqsoftwared->fetch();
        ?>
        <a href="<?php echo $softwared['url']; ?>">
            <div class="item">
                <div class="square"><img src="https://api.faviconkit.com/<?php echo $softwared['url']; ?>/1024" alt=""></div>
                <p><?php echo $softwared['url']; ?></p>
            </div>
        </a>
        <?php 
            } 
        ?>
    </div>

    <iframe style="display: none" src="home.php"></iframe>

    
</body>
</html>