const containerr = document.getElementById('containerr');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    containerr.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    containerr.classList.remove("active");
});