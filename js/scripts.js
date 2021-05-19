const form = {
    mobile: document.getElementById('mobile-no'),
    submit: document.getElementById('btn-send'),
    messages: document.getElementById('form-message')
};

form.submit.addEventListener('click', () => {
    const request = new XMLHttpRequest();

    request.onload = () => {
        let responseObject = null;

        let responseMsg = request.responseText;
        console.log(responseMsg);
        try {
            responseObject = JSON.parse(request.responseText);
        } catch (e) {
            console.error("Could not parse JSON!");
        }

        if (responseObject) {
            handleResponse(responseObject);
        }
    };

    const requestData = `mobile=${form.mobile.value}`;    

    request.open('post', 'php/check-no.php');
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(requestData);
});

function handleResponse (responseObject) {
    console.log(responseObject);
}