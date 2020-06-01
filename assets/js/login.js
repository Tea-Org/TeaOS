    window.requestAnimationFrame(animate);

        function animate(now) {
            frames++;
            if (new Date().getTime() - time >= 1000) {
                document.getElementById("fps").textContent = frames;
                frames = 0;
                time += 1000;
            }
            window.requestAnimationFrame(animate);
        }

            window.outerHeight = window.screen.height;
    

    function reload() {
        window.outerHeight = window.screen.height;

    if (window.innerWidth <= 1400 || window.innerHeight <= 650) {
        document.write('hey non!')
    } else {

        const button = document.getElementsByTagName('button')[0];

        window.addEventListener("DOMContentLoaded", () => {
            const input = document.getElementsByTagName('input');

            button.addEventListener("click", () => {
                var formData = new FormData();
                formData.set("login", "TRUE");
                formData.set("username", input[0].value);
                formData.set("password", input[1].value);

                var request = new XMLHttpRequest();
                request.open('POST', 'actions/login.php', true);
                request.send(formData);
                request.onreadystatechange = function()
                {
                    if (request.readyState === 4) {
                        const resp = request.responseText.split("|");
                        if (resp[0] == "ok") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Welcome',
                                text: 'Nice to see you again ' + resp[1] + ' !',
                                showConfirmButton: false,
                                timer: 1500
                            }).then ((result) => {window.location.reload(false)})
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'A problem appeared'
                            }).then ((result) => {input[1].value = ""})
                        }
                    }
                }
            });
        });
    }}
    window.onresize = reload;

    reload();