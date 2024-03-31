/*import"../css./style.css";
import navbar from "./composant./navbar.js";*/





//code pour une sidebar en javascript :
var toggleSidebarBtn = document.getElementById('toggleSidebar');
toggleSidebarBtn.addEventListener('click',function(){
    var navbar_menu = document.querySelector('#navbar_menu');
    navbar_menu.style.display = 'block';
});

//fermer la sidebar : 
var closeSidebarLink=document.getElementById('closeSidebar');
closeSidebarLink.addEventListener('click',function(){
    var navbar_menu = document.querySelector('#navbar_menu');
    navbar_menu.style.display = 'none';
});




//bouton flottant et modale sur la page profil 
