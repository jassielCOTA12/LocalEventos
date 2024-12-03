<?php
    // Mostrar las estrellas completas
    for ($i = 0; $i < $estrellasCompletas; $i++) {
        echo "<i class='fa-solid fa-star star-filled' style='color: #FFD43B; '></i>";  
    }

    if ($mediaEstrella) {
        echo "<i class='fa-solid fa-star-half-alt star-filled' style='color: #FFD43B;'></i>";  
    }

    // Mostrar las estrellas vacías
    for ($i = 0; $i < $estrellasVacias; $i++) {
        echo "<i class='fa-regular fa-star star-empty'></i>";  // Estrella vacía
    }
?>