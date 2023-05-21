
 AOS.init();
 

// toggle Password function 
let showPasswordImg = document.querySelector(".showPassword");
showPasswordImg.addEventListener('click',showPassword);
function showPassword() {
    let PasswordInput = document.querySelector(".password");
    if(PasswordInput.type == 'password') {
        PasswordInput.type = 'text';
    }else {
        PasswordInput.type = 'password';
    }
}

