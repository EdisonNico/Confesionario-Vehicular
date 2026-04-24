<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./CSS/_Style.css">
    <link rel="stylesheet" href="./CSS/menu.css">
    <script src="./Javascript/menu.js"></script>
    <title>ACCELERATE AND EXCEED </title>
</head>

<body>
    <header>
        <!--Video de fondo-->
        <video autoplay muted loop>
            <source src="./Imagenes/fondo2.mp4" type="video/mp4">
        </video>

        <!--Barra de navegación-->
        <nav class="navbar">
            <div class="barrita">
                <a href="#" id="toggleMenu">
                    <i class="fa-solid fa-bars" style="color: #e8e8e8;"></i>
                </a>
            </div>

            <div class="logo"><a href="_Principal.php">AE</a></div>

            <ul class="nav-derecha">
                <li><a href="SobreN.html">Sobre Nosotros</a></li>
                <li><a href="Ubicanos.html">Ubícanos</a></li>
                <li><a href="Contactanos.html">Contacto</a></li>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><a href="#">👤 <?php echo htmlspecialchars($_SESSION['usuario']); ?></a></li>
                <?php else: ?>
                    <li><a href="Login.html">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Menú lateral -->
        <nav class="menu-lateral">
            <ul>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><a href="#">👤 <?php echo htmlspecialchars($_SESSION['usuario']); ?></a></li>
                    <li><a href="../controller/logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="Login.html">Iniciar Sesión</a></li>
                <?php endif; ?>
                <li><a href="SobreN.html">Sobre Nosotros</a></li>
                <li><a href="Galeria.html">Galería</a></li>
                <li><a href="Coleccion.html">Colección</a></li>
                <li><a href="Eventos.html">Eventos</a></li>
                <li><a href="Ubicanos.html">Ubícanos</a></li>
                <li><a href="Contactanos.html">Contáctanos</a></li>
            </ul>
        </nav>

        <!--Frase de inicio-->
        <div class="frase">
            <h1>The world is yours</h1>
            <p>Dios nunca pondrá un sueño en tu mente que no tengas la capacidad de lograr.</p>
        </div>
    </header>

    <!--Contenido principal-->
    <main>
        <div class="noticia">
            <div class="texto-superior">
                <h1>El Audi R8 regresa al mercado</h1>
                <p>Después de una pausa, Audi relanza el R8, renovado
                    y listo para dominar nuevamente las pistas y calles.
                    Con mejoras en potencia y diseño, este ícono vuelve para
                    sorprender a los fanáticos del rendimiento y el lujo.</p>
            </div>
            <img src="./Imagenes/audir8.jpg" alt="Ejemplo">
        </div>
<div class="botones">
    <a href="Galeria.html" class="boton-link">
        <div class="contenedor-imagen">
            <img src="./Imagenes/boton1.png" alt="Icono1">
            <div class="titulo-overlay">GALERÍA</div>
        </div>
    </a>

    <a href="Coleccion.html" class="boton-link">
        <div class="contenedor-imagen">
            <img src="./Imagenes/boton2.png" alt="Icono2">
            <div class="titulo-overlay">COLECCIÓN</div>
        </div>
    </a>

    <a href="Eventos.html" class="boton-link">
        <div class="contenedor-imagen">
            <img src="./Imagenes/boton3.png" alt="Icono3">
            <div class="titulo-overlay">EVENTOS</div>
        </div>
    </a>
</div>
    </main>

    <div class="banner">
        <p>Donde el diseño vanguardista y el lujo absoluto se encuentran en cada kilómetro recorrido.</p>
    </div>

    <!--Pie de página-->
    <footer>
        <div class="terminos">
            <h1>Información legal</h1>
            <ul>
                <li><a href="">Aviso legal</a></li>
                <li><a href="">Política de privacidad</a></li>
                <li><a href="">Política de cookies</a></li>
                <li><a href="">Términos y condiciones</a></li>
                <li><a href="">Configuración de privacidad</a></li>
            </ul>
        </div>
        <div class="Service">
            <h1>Servicios</h1>
            <ul>
                <li><a href="">Mantenimiento</a></li>
                <li><a href="">Asistencia en circuito</a></li>
                <li><a href="">Transporte</a></li>
            </ul>
        </div>
        <div class="contact">
            <h1>Contacto</h1>
            <ul>
                <li><a href="">📞 (01) 123-4567</a></li>
                <li><a href="">✉️ contacto@autoelite.com</a></li>
                <li><a href="Ubicanos.html">📍 ubicaciones</a></li>
                <li><a href="">🕐 Lun - Sáb: 9:00 am - 6:00 pm</a></li>
            </ul>
        </div>
        <div class="redes">
            <h1>Síguenos</h1>
            <ul>
                <li><a href="https://www.instagram.com/edison.durand"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://x.com/EdisonTucno"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/share/1h6i1kfMjK"><i class="fa-brands fa-square-facebook"></i></a></li>
                <li><a href="https://www.tiktok.com/@edisondurand"><i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href="https://www.youtube.com/@F1RSTMOTORS"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
