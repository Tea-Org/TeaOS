<div class="console">
    <div class="header">
        <div class="app">
            <img src="assets/img/logo.png" alt="">
            <p>Console</p>
        </div>
        <div class="bar"></div>
    </div>
    <div class="body" id="console_body">
        <?php
        $file = file_get_contents('../include/console/console.txt');
        echo $file;
        ?>
    </div>
</div>
<link rel="stylesheet" href="assets/css/console/main.css">
