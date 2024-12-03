<?php
echo '
    <div id="contenedor-busqueda">
        <div class="barraBusqueda">
            <input type="text" placeholder="Buscar..." id="inputBusqueda">
            <button type="submit" id="buscar">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        
        <button type="button" id="calendario" data-bs-toggle="modal" data-bs-target="#calendarioModal">
            <label for="date-picker">
                <span><i class="fas fa-calendar-days"></i></span> ¿Cuándo?
            </label>
        </button>
        
        
        <div class="divBtn-filtro">
            <button type="button" id="filtro" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="fa-solid fa-sliders"></i>
            </button>
        </div>


    </div>
    <div id="contenedorSeleccion">
        <a href="inicio.php?id=1" class="secciones">Populares<span><i class="fa-solid fa-star"></i></span></a>
        <a href="inicio.php?id=2" class="secciones">Albercas <span><i class="fa-solid fa-water-ladder"></i></span></a>
        <a href="inicio.php?id=3" class="secciones">Infantiles <span><i class="fa-solid fa-gopuram"></i></span></a>
        <a href="inicio.php?id=4" class="secciones">Formales <span><i class="fa-solid fa-user-tie"></i></span></a>
    </div>

    <div class="modal fade" id="calendarioModal" tabindex="-1" aria-labelledby="calendarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="calendarioModalLabel">Selecciona una fecha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" class="form-control">
                </div>
                <div class="modal-footer d-flex gap-2" style="flex-direction:row; justify-content:center;">
                    <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary w-25"  data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
'
?>