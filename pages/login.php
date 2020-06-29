
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <link rel="stylesheet" href="etc/css/login.css">
</head>
<body>
    <div class="left">
        <div class="block">
            <p class="hour"></p>
            <p class="date"></p>
        </div>    
    </div>
    <div class="right">
        <div class="block center">
            <div class="input">
                <input type="text" placeholder="Username">
            </div>
            <div class="input">
                <input type="password" placeholder="Password">
            </div>
            <div class="button">
                <button>Login</button>
            </div>
        </div>
    </div>
    <div class="footer">
        <img src="etc/img/logo.png">
        <p>TeaOS <?php echo (file_get_contents('version')) ?></p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="etc/js/date.js"></script>
    <script src="etc/js/login.js"></script>
    <script src="etc/js/screen_verified.js"></script>

</body>
</html>