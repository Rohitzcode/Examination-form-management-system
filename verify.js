import{initializeApp} from 'https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js';
import{RecaptchaVerifier,signInWithPhoneNumber,getAuth} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";

const firebaseConfig = {
    apiKey: "AIzaSyA1SD-hppRxupxwhQCNovJAqMibMtyQ3rE",
    authDomain: "bccl-fe2c5.firebaseapp.com",
    projectId: "bccl-fe2c5",
    storageBucket: "bccl-fe2c5.appspot.com",
    messagingSenderId: "775734163454",
    appId: "1:775734163454:web:c9b6705cf0ef5b926532af",
    measurementId: "G-LLBFH3M3MH"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const captcha = new RecaptchaVerifier(auth, "recaptcha-container");
captcha.render();
function render() {
    window.recaptchaVerifier = new app.auth.RecaptchaVerifier('recaptcha-container');
    RecaptchaVerifier.render();
}
const btnEl=document.querySelector('.btn');
function phoneAuth(){
    const number = document.getElementById('number').value;
    signInWithPhoneNumber(auth, number, captcha)
        .then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            document.getElementById('sender').style.display = 'none';
            document.getElementById('verifier').style.display = 'block';
        }).catch(function(error) {
            alert(error.message);
            console.error(error);
        });
}
btnEl.addEventListener('click',phoneAuth);

const butnEl=document.querySelector('.butn');
function codeverify(){
    const code = document.getElementById('otp').value;
    confirmationResult.confirm(code)
        .then(function() {
            document.getElementsByClassName('p-conf')[0].style.display = 'block';
            document.getElementsByClassName('n-conf')[0].style.display = 'none';
            document.getElementsByClassName('register')[0].style.display = 'block';
        }).catch(function(error) {
            document.getElementsByClassName('p-conf')[0].style.display = 'none';
            document.getElementsByClassName('n-conf')[0].style.display = 'block';
            document.getElementsByClassName('register')[0].style.display = 'none';
            alert(error.message);
            console.error(error);
        });
}
butnEl.addEventListener('click',codeverify);

const reg=document.querySelector('.regis');
function redirect(){
    const new_window=window.open();
    new_window.location.href = "registration.php";
}
reg.addEventListener('click',redirect);