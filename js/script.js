let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    profile.classList.remove('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
    profile.classList.remove('active');
}

function loader(){
    document.querySelector('.loader').style.display = 'none';
 }
 
 function fadeOut(){
    setInterval(loader, 2000);
 }
 
 window.onload = fadeOut;

document.querySelectorAll('input[type="number"]').forEach(input => {
    input.oninput = () => {
        if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
    }
});