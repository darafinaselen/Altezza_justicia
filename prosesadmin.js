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
    window.location.href = "admin.html";
});