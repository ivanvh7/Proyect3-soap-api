Proyecto UT7 - Servicios y uso de APIs

Descripción

Este proyecto implementa servicios SOAP, consume un canal RSS y utiliza la API de AEMET para mostrar información meteorológica.

Estructura del Proyecto

Base de datos

fp.sql: Contiene la estructura de la base de datos y datos de prueba necesarios para el funcionamiento del proyecto. Debe importarse en MySQL antes de ejecutar los servicios.

Servicios SOAP

soap_services/server.php: Implementa los servicios SOAP definidos en el enunciado. Gestiona las solicitudes de información sobre módulos, departamentos y nomenclaturas.

soap_services/cliente.php: Cliente que consume los servicios SOAP y muestra la información obtenida en una interfaz sencilla.

soap_services/soap.css: Archivo de estilos para mejorar la presentación del cliente SOAP.

Consumo de RSS

rss_news/get_rss.php: Se encarga de obtener el feed RSS de EuropaPress, procesar la información y extraer los datos relevantes.

rss_news/noticias.php: Página web que muestra las noticias obtenidas en una tabla, con enlaces a las fuentes originales.

rss_news/noticias.css: Estilos CSS para la visualización de las noticias de forma ordenada y legible.

Consumo de la API de AEMET

aemet_api/config.php: Archivo de configuración donde se almacena la API Key de AEMET y otros parámetros de conexión.

aemet_api/datos.js: Script JavaScript que realiza las peticiones a la API de AEMET y maneja la respuesta para mostrarla en la web.

aemet_api/predicción_meteorologica.html: Página principal que muestra la información meteorológica mediante botones interactivos.

aemet_api/proxy.php: Archivo utilizado para evitar problemas de CORS al realizar peticiones a la API de AEMET.

aemet_api/aemet.css: Estilos CSS que mejoran la apariencia de la página de predicción meteorológica.

Instalación y Configuración

Base de datos:

Importar fp.sql en MySQL.

Configurar la conexión en los archivos PHP correspondientes.

Servicios SOAP:

Configurar y ejecutar server.php.

Consumir los servicios desde cliente.php.

RSS de EuropaPress:

Ejecutar noticias.php para visualizar las noticias obtenidas del RSS.

API de AEMET:

Obtener una API Key de AEMET.

Configurarla en config.php.

Acceder a predicción_meteorologica.html para visualizar los datos.