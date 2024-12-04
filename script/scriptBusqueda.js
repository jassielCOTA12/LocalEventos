document.addEventListener("DOMContentLoaded", function () {
    const inputBusqueda = document.getElementById("inputBusqueda");
    const parteInferiorGrid = document.getElementById("parteInferiorGrid-gen");
    function normalizarTexto(texto) {
        return texto
            .normalize("NFD") // Descomponer caracteres con acentos
            .replace(/[\u0300-\u036f]/g, "") // Eliminar los acentos
            .toLowerCase(); // Convertir a minúsculas
    }

    // Función para filtrar locales
    function filtrarLocales() {
        const textoBusqueda = normalizarTexto(inputBusqueda.value);
        const locales = parteInferiorGrid.getElementsByTagName("a"); 

        for (let i = 0; i < locales.length; i++) {
            const nombreLocal = normalizarTexto(locales[i].querySelector("h3").textContent);

            if (nombreLocal.includes(textoBusqueda)) {
                locales[i].style.display = "block"; // Mostrar el local
            } else {
                locales[i].style.display = "none"; // Ocultar el local
            }
        }
    }

    inputBusqueda.addEventListener("input", filtrarLocales);

    document.getElementById("buscar").addEventListener("click", filtrarLocales); /***** */
});


