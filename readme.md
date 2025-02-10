# 🌐 Proyecto SOAP y APIs

## 📜 Descripción
Este proyecto integra diversas tecnologías para consumir y ofrecer servicios web. Se incluyen:
- 🛠️ **Servicios SOAP** para comunicación entre cliente y servidor.
- ☁️ **API de AEMET** para obtener predicciones meteorológicas.
- 📰 **Lector de noticias RSS** para mostrar noticias en tiempo real.

## ✨ Características
✅ **Implementación de un servidor y cliente SOAP.**  
✅ **Consumo de la API de AEMET con un sistema proxy.**  
✅ **Sistema para mostrar noticias a través de un feed RSS.**  
✅ **Estilos personalizados con CSS.**  

## 🛠️ Requisitos
- 🌍 **Servidor web** con soporte para PHP (Apache, Nginx, etc.).  
- 🐘 **PHP 7.4 o superior con soporte para SOAP.**  
- 🔗 **Conexión a internet para el consumo de APIs.**  

## 🚀 Instalación
1️⃣ **Clona este repositorio** en tu máquina local:  
   ```sh
   git clone https://github.com/ivanvh7/Proyect3-soap-api.git
   ```
2️⃣ **Navega al directorio del proyecto**:  
   ```sh
   cd Proyect3-soap-api
   ```
3️⃣ **Configura el acceso a la API de AEMET** en `aemet_api/config.php`.  
4️⃣ **Asegúrate de que PHP tenga habilitada la extensión SOAP.**  
5️⃣ **Ejecuta el servidor local con PHP**:  
   ```sh
   php -S localhost:8000
   ```

## 🌍 Uso del Proyecto
### 🛠️ Servicio SOAP
1️⃣ Accede a `soap_services/server.php` para activar el servidor.  
2️⃣ Usa `soap_services/cliente.php` para realizar peticiones.  

### 🌤️ API de AEMET
1️⃣ Abre `aemet_api/predicción_meteorologica.html` en el navegador para ver las predicciones.  

### 📰 Noticias RSS
1️⃣ Accede a `rss_news/noticias.php` para visualizar las noticias actualizadas.  

## ⚖️ Licencia
Este proyecto está bajo la **licencia MIT**.
