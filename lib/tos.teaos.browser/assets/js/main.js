window.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementsByTagName('input');
    const button = document.getElementsByTagName('button');
    const iframe = document.getElementsByTagName('iframe');

    button[0].addEventListener("click", () => {
        if (search[0].value.substring(0,4) != 'http') {
            iframe[0].src = 'http://'+search[0].value;
        } else {
            iframe[0].src = search[0].value;
        }
    });
});

//https://api.faviconkit.com/google.com/1024