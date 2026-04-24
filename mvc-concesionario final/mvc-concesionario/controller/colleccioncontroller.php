<?php
require_once '../model/colleccionmodel.php';

$modelo = new cochesModelo();
$coches = $modelo->obtenerCoches();

foreach ($coches as $coche) {
    echo '<a href="cardescription.php?id=' . $coche['id'] . '" class="modelo">';
    echo '  <img src="./Imagenes/' . strtolower($coche['modelo']) . '.jpg" alt="">';
    echo '  <div class="detalles">';
    echo '      <div class="marca-model">';
    echo '          <p>' . $coche['marca'] . '</p>';
    echo '          <h3>' . $coche['modelo'] . '</h3>';
    echo '      </div>';
    echo '      <div class="carac">';
    echo '          <span><i class="fa-solid fa-car"></i> ' . $coche['tipo'] . '</span>';
    echo '          <span><i class="fa-solid fa-road"></i> ' . $coche['kilometraje'] . ' km</span>';
    echo '          <span><i class="fa-solid fa-calendar"></i> ' . $coche['anio'] . '</span>';
    echo '      </div>';
    echo '      <div class="precio">';
    echo '          <i class="fa-solid fa-euro-sign"></i> ' . number_format($coche['precio'], 0) . '</div>';
    echo '  </div>';
    echo '</a>';
}
?>