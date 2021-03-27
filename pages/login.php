<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="etc/css/login.css">

</head>

<body>
<div class="loading">
    <img src="etc/img/logo_coloured_v2.png" alt="" id="slidecaption">
</div>


<div class="container h-100 w-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="col-12">
                <p class="hour"></p>
            </div>
            <div class="col-12">
                <div class="form">
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <button>Log In</button>
                    <!--<button>Sign In</button>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <img src="etc/img/logo.svg">
    <p>TeaOS <?php echo(file_get_contents('version')) ?></p>
</div>

<script src="etc/js/date.js"></script>
<script src="etc/js/login.js"></script>
<script>
    window.addEventListener('load', function () {
        var div = document.getElementsByClassName('loading')[0];
        div.style = "animation: fade .5s linear;"
        setTimeout(() => {
            div.style.display = "none"
        }, 500);
    })
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</body>

</html>