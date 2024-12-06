// Datos de los localesUbicacion por ID
const localesUbicacion = {
    1: { nombre: "Salón Fiesta Bonita", lat: 25.75920728490945, lng: -100.39535897425083 },
    2: { nombre: "Jardín Los Pinos", lat: 22.921514672029186 , lng: -109.92875851342298 },
    3: { nombre: "Salón Las Estrellas", lat: 23.102677442989872, lng: -109.73162307767058 },
    4: { nombre: "Fiesta Kids", lat: 25.262538263892573, lng: -111.77847466818737 },
    5: { nombre: "Bodas Deluxe", lat: 24.04823852117999, lng: -109.99073071992677 },
    6: { nombre: "Salon Elegance", lat: 19.294087497580744,  lng: -99.22272339314829 },
    7: { nombre: "Parque Aventuras", lat: 21.113866580565794, lng: -86.88572705870237 },
    8: { nombre: "Centro Corporativo Élite", lat: 19.426069841207443,  lng:-99.19425867772352  },
    9: { nombre: "Salón Fiesta Feliz", lat: 24.15208387594059, lng: -110.305167143358 },
    10: { nombre: "Hacienda Los Encinos", lat: 22.17757611702416, lng:  -101.02450653353645 },
};
document

// Función para inicializar el mapa
function initMap(idLocal) {
    if (localesUbicacion[idLocal]) {
        const local = localesUbicacion[idLocal];

        // Inicializa el mapa centrado en el local
        const map = L.map('map', {
            center: [local.lat, local.lng],
            zoom: 14,
            scrollWheelZoom: false,  // Desactivar el zoom con la rueda del ratón
            touchZoom: false          // Desactivar el zoom táctil
        });

        // Capa de mapa base
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Agrega el marcador del local
        L.marker([local.lat, local.lng])
            .addTo(map)
            .bindPopup(`<b>${local.nombre}</b>`)
            .openPopup();
    } else {
        console.error("Local no encontrado para el ID:", idLocal);
    }
}

function initMapMovil(idLocal) {
    if (localesUbicacion[idLocal]) {
        const local = localesUbicacion[idLocal];
        const map = L.map('mapaMovil', {
            center: [local.lat, local.lng],
            zoom: 14,
            scrollWheelZoom: false,  // Desactivar el zoom con la rueda del ratón
            touchZoom: false          // Desactivar el zoom táctil
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([local.lat, local.lng])
            .addTo(map)
            .bindPopup(`<b>${local.nombre}</b>`)
            .openPopup();
    } else {
        console.error("Local no encontrado para el ID (móvil):", idLocal);
    }
}
