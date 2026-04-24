  document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggleMenu');
    
    const menuLateral = document.querySelector('.menu-lateral');
    const navDerecha = document.querySelector('.nav-derecha');

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault();
      menuLateral.classList.toggle('active');
      navDerecha.classList.toggle('ocultar-nav');
    });

    // Cerrar menú cuando el mouse sale del área
    menuLateral.addEventListener('mouseleave', () => {
      menuLateral.classList.remove('active');
      navDerecha.classList.remove('ocultar-nav');
    });
  });