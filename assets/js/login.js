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
                        title: 'Success',
                        text: 'Nice to see you again ' + resp[1],
                        showConfirmButton: false,
                        timer: 1500
                    }).then ((result) => {window.location.reload(false)})
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: request.responseText
                    })
                }
            }
        }
    });
});
