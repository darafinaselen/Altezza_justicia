const wrapperLogin= document.querySelector('.wrapperLogin');
const loginLink = document.querySelector('.login-link');
const RegisterLink = document.querySelector('.register-link');
const clossButton = document.querySelector('.icon-close');

RegisterLink.addEventListener('click', ()=>{
    wrapperLogin.classList.add('active');
});

loginLink.addEventListener('click', ()=>{
    wrapperLogin.classList.remove('active');
});

clossButton.addEventListener('click', () => {
    window.location.href = "index.html";
});

const phoneNumberInput = document.querySelector('input[name="phone"]');
phoneNumberInput.addEventListener('focus', () => {
    if (phoneNumberInput.value.trim() === "") {
        phoneNumberInput.value = "+62";
    }
});