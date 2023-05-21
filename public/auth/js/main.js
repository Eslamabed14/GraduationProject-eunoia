//Toggle fixed navbar
let navbar = document.getElementsByTagName('nav');
//show and hide scroll top button
let btn = document.getElementsByClassName('scroll-top')[0];

window.onscroll = () =>{
    if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
        navbar[0].classList.add('position-fixed')
        btn.classList.add('show')
    } else {
        navbar[0].classList.remove('position-fixed')
        btn.classList.remove('show')
    }
}

let scrolltop = () =>{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

