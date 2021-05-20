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
	
	


	// Firebase Config

	// document.write(
	// 	unescape("%3Cscript src='https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js' type='text/javascript'%3E%3C/script%3E")
	//   );

	//   document.write(
	// 	unescape("%3Cscript src='https://www.gstatic.com/firebasejs/8.6.1/firebase-auth.js' type='text/javascript'%3E%3C/script%3E")
	//   );
	// var jQueryScript = document.createElement('script');  
	// jQueryScript.setAttribute('src','https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js');
	// document.head.appendChild(jQueryScript);

	// var jQueryScript2 = document.createElement('script2');  
	// jQueryScript2.setAttribute('src',"https://www.gstatic.com/firebasejs/8.6.1/firebase-auth.js");
	// document.head.appendChild(jQueryScript2);

	

	var firebaseConfig = {
		apiKey: "AIzaSyB-DT37LYFUuA9Bu1TJUC8SnqWAO5CRfh4",
		authDomain: "covid-helpline-def6f.firebaseapp.com",
		projectId: "covid-helpline-def6f",
		storageBucket: "covid-helpline-def6f.appspot.com",
		messagingSenderId: "557972633646",
		appId: "1:557972633646:web:d63bd8048692f21b5ac7bf",
		measurementId: "G-4JLVJ89R8N"
	  };
	  // Initialize Firebase
	  firebase.initializeApp(firebaseConfig);

	 
	firebase.auth().languageCode = 'it';

	  

function visibleCaptcha() {
	console.log("HELLLLO");
	window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('captcha', {
		'size': 'invisible',
		'callback': (response) => {
		  // reCAPTCHA solved, allow signInWithPhoneNumber.
		phoneSignIn();
		console.log(response);
		alert("Recaptcha Verified");
		}
	  });

	  console.log(window.recaptchaVerifier);
	}



  function phoneSignIn() {
	  alert("GGIIGIG");
    function getPhoneNumberFromUserInput() {
       const mobile_no = document.getElementById('mobile-no').value;
       return mobile_no;
    }
  
    // [START auth_phone_signin]
    const phoneNumber = getPhoneNumberFromUserInput();
    const appVerifier = null;
    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
        .then((confirmationResult) => {


			alert("Bhej diya")
          // SMS sent. Prompt user to type the code from the message, then sign the
          // user in with confirmationResult.confirm(code).
          window.confirmationResult = confirmationResult;

		  console.log(confirmationResult);
          // ...
        }).catch((error) => {
			console.log(error);
          // Error; SMS not sent
          // ...
        });
    // [END auth_phone_signin]
  }