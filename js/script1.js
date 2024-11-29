let userBox = document.querySelector('.header .header-2 .flex .user-box');

document.querySelector('#user-btn').onclick = () => {
    userBox.classList.toggle('active');
    navBar.classList.remove('active');
}

let navBar = document.querySelector('.header .header-2 .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
    navBar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navBar.classList.remove('active');

    if(window.scrollY > 60){
        document.querySelector('.header .header-2').classList.add('active');
    }else{
        document.querySelector('.header .header-2').classList.remove('active');
    }
}