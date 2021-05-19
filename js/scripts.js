// const form = {
//     mobile: document.getElementById('mobile-no'),
//     submit: document.getElementById('btn-send'),
//     messages: document.getElementById('form-message')
// };

// form.submit.addEventListener('click', () => {
//     const request = new XMLHttpRequest();

//     request.onload = () => {
//         let responseObject = null;

//         let responseMsg = request.responseText;
//         console.log(responseMsg);
//         try {
//             responseObject = JSON.parse(request.responseText);
//         } catch (e) {
//             console.error("Could not parse JSON!");
//         }

//         if (responseObject) {
//             handleResponse(responseObject);
//         }
//     };

//     const requestData = `mobile=${form.mobile.value}`;    

//     request.open('post', 'php/check-no.php');
//     request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     request.send(requestData);
// });

// function handleResponse (responseObject) {
//     console.log(responseObject);
// }

function setLanguageCode() {
    // [START auth_set_language_code]
    firebase.auth().languageCode = 'it';
    // To apply the default browser preference instead of explicitly setting it.
    // firebase.auth().useDeviceLanguage();
    // [END auth_set_language_code]
  }
  
  function recaptchaVerifierInvisible() {
    function onSignInSubmit() {
      // TODO(you): Implement
    }
  
    // [START auth_phone_recaptcha_verifier_invisible]
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('btn-send', {
      'size': 'invisible',
      'callback': (response) => {
        // reCAPTCHA solved, allow signInWithPhoneNumber.
        onSignInSubmit();
      }
    });
    // [END auth_phone_recaptcha_verifier_invisible]
  }

  function phoneSignIn() {
    function getPhoneNumberFromUserInput() {
       const mobile_no = document.getElementById('mobile-no').value;
       document.getElementById('mobile-no').value;
    }
  
    // [START auth_phone_signin]
    const phoneNumber = getPhoneNumberFromUserInput();
    const appVerifier = window.recaptchaVerifier;
    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
        .then((confirmationResult) => {
          // SMS sent. Prompt user to type the code from the message, then sign the
          // user in with confirmationResult.confirm(code).
          window.confirmationResult = confirmationResult;
          // ...
        }).catch((error) => {
          // Error; SMS not sent
          // ...
        });
    // [END auth_phone_signin]
  }