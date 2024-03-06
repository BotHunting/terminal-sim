// Function to make an AJAX request
function makeAjaxRequest(url, method, data, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                callback(null, response);
            } else {
                callback(new Error('AJAX request failed'), null);
            }
        }
    };
    xhr.send(JSON.stringify(data));
}
