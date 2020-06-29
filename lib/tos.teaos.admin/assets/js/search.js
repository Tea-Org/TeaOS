var input = document.getElementsByClassName('form-control')[0];
var div = document.getElementsByClassName('response')[0];

input.onchange = function() {
    var formData = new FormData();
    formData.set("search", "TRUE");
    formData.set("username", input.value);
    
    
    var request = new XMLHttpRequest();
    request.open('POST', 'actions/search.php', true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if (request.readyState === 4) {
            div.innerHTML = request.responseText
        }
    };
}
input.onfocusout = function() {
    div.style.display = "none"
}
input.onfocus = function() {
    div.style.display = "block"
}