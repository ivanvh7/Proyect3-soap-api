document.getElementById("btnIsobaras").addEventListener("click", obtenerMapaIsobaras);
document.getElementById("btnCanarias").addEventListener("click", obtenerPrediccionCanarias);
document.getElementById("btnGranCanaria").addEventListener("click", obtenerPrediccionGranCanaria);


const BASE_URL = "proxy.php?url=";
  // Ahora usamos el proxy

const targetDiv = document.getElementById("contenido");

function limpiarResultados() {
    targetDiv.innerHTML = "";
}

function obtenerMapaIsobaras() {
    limpiarResultados();
    fetch(`${BASE_URL}mapasygraficos/analisis`)
        .then(response => response.json())
        .then(data => {
            console.log("📌 Respuesta de AEMET (Mapa de Isobaras):", data);
            if (data.datos) {
                fetch(data.datos)
                    .then(response => response.blob())
                    .then(blob => {
                        let url = URL.createObjectURL(blob);
                        targetDiv.innerHTML = `<img id="mapaIsobaras" src="${url}" alt="Mapa de Isobaras">`;
                    });
            } else {
                targetDiv.innerHTML = "<p>⚠️ Error: No se encontraron datos en la respuesta.</p>";
            }
        })
        .catch(error => console.error("❌ Error en la petición:", error));
}

function obtenerPrediccionCanarias() {
    limpiarResultados();
    fetch(`${BASE_URL}prediccion/ccaa/hoy/05`)
        .then(response => response.json())
        .then(data => {
            console.log("📌 Respuesta de AEMET (Canarias):", data);
            if (data.datos) {
                fetch(data.datos)
                    .then(response => response.json())
                    .then(prediccion => {
                        console.log("📌 Datos reales de Canarias:", prediccion);
                        mostrarPrediccion(prediccion);
                    });
            } else {
                targetDiv.innerHTML = "<p>⚠️ No se encontraron datos para Canarias.</p>";
            }
        })
        .catch(error => console.error("❌ Error en la petición:", error));
}

function obtenerPrediccionGranCanaria() {
    limpiarResultados();
    fetch(`${BASE_URL}prediccion/provincia/manana/35`)
        .then(response => response.json())
        .then(data => {
            console.log("📌 Respuesta de AEMET (Gran Canaria):", data);
            if (data.datos) {
                fetch(data.datos)
                    .then(response => response.json())
                    .then(prediccion => {
                        console.log("📌 Datos reales de Gran Canaria:", prediccion);
                        mostrarPrediccion(prediccion);
                    });
            } else {
                targetDiv.innerHTML = "<p>⚠️ No se encontraron datos para Gran Canaria.</p>";
            }
        })
        .catch(error => console.error("❌ Error en la petición:", error));
}

function mostrarPrediccion(datos) {
    if (!datos || datos.length === 0) {
        targetDiv.innerHTML = "<p>⚠️ No hay datos disponibles para esta predicción.</p>";
        return;
    }

    let html = "<h2>Predicción del tiempo</h2><ul>";
    datos.forEach(prediccion => {
        html += `<li><strong>Fecha:</strong> ${prediccion.fecha} 
                 - <strong>Estado:</strong> ${prediccion.estadoCielo}
                 - <strong>Temp. Min:</strong> ${prediccion.temperatura.minima}°C 
                 - <strong>Temp. Max:</strong> ${prediccion.temperatura.maxima}°C</li>`;
    });
    html += "</ul>";
    targetDiv.innerHTML = html;
}
