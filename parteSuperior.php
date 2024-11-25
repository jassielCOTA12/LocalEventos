<?php
echo '
    <div id="contenedor-busqueda">
        <div class="barraBusqueda">
            <input type="text" placeholder="Buscar..." id="inputBusqueda">
            <button type="submit" id="buscar">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        
        <a href="##" id="calendario">
            <label for="date-picker">
                <span><i class="fas fa-calendar-days"></i></span>¿Cuándo?
            </label>
            <input type="date" id="date-picker" name="fecha">
        </a>
        
        
        <div class="divBtn-filtro">
            <button type="button" id="filtro" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="fa-solid fa-sliders"></i>
            </button>
        </div>


    </div>
    <div id="contenedorSeleccion">
        <a href="inicioFiltros.php" class="secciones">Populares<span><i class="fa-solid fa-star"></i></span></a>
        <a href="inicioFiltros.php" class="secciones">Albercas <span><i class="fa-solid fa-water-ladder"></i></span></a>
        <a href="inicioFiltros.php" class="secciones">Infantiles <span><i class="fa-solid fa-gopuram"></i></span></a>
        <a href="inicioFiltros.php" class="secciones">Formales <span><i class="fa-solid fa-user-tie"></i></span></a>
    </div>
'
?>