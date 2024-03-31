document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
  
    // Fonction pour ouvrir la sidebar
    function openSidebar() {
      navbar.classList.add('active');
    }
  
    // Fonction pour fermer la sidebar
    function closeSidebar() {
      navbar.classList.remove('active');
    }
  
    // Ajout de l'événement pour ouvrir la sidebar
    toggleSidebarBtn.addEventListener('click', function() {
      openSidebar();
    });
  
    // Ajout de l'événement pour fermer la sidebar
    closeSidebarBtn.addEventListener('click', function() {
      closeSidebar();
    });
  });
  