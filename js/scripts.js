function otp_gen () {
    // document.getElementById('verify_otp').submit();
    document.getElementById('mobile-no').placeholder = "OTP";
    document.getElementById('btn-send').value = "Verify!";
    document.getElementById('btn-send').innerHTML = "Enter OTP";
    document.getElementById('msgOTP').innerHTML = "OTP has been send to your number";
// document.forms["verify-otp"]["mobile-no"].placeholder = "OTP"
};

const form = {
    mobile: document.getElementById('mobile-no'),
    submit: document.getElementById('btn-send'),
    messages: document.getElementById('form-message')
};

form.submit.addEventListener('click', () => {
    const request = new XMLHttpRequest();

    request.onload = () => {
        console.log(request.responseText);
    };

    const requestData = `mobile=${form.mobile.value}`;
    console.log(requestData);

    request.open('post', 'php/check-no.php');
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(requestData);
});