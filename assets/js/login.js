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
                alert(request.responseText);
            }
        }
    });
});
