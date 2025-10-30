# CERROE Global Export - Website

Website profesional para CERROE Global Export, empresa dominicana de exportación de productos agrícolas.

## 🌟 Características

- ✨ Diseño moderno y profesional basado en la identidad de marca
- 📱 Completamente responsivo (móvil, tablet, escritorio)
- 🎨 Animaciones suaves y profesionales con AOS
- 🚀 Optimizado para rendimiento y SEO
- 📧 Formulario de contacto funcional con PHP
- 🎯 Logos oficiales integrados
- 💼 Secciones completas: Nosotros, Valores, Servicios, Proceso, Contacto

## 📁 Estructura del Proyecto

```
cerroe-website/
│
├── index.html                 # Página principal
│
├── assets/
│   ├── css/
│   │   └── style.css         # Estilos personalizados
│   │
│   ├── js/
│   │   └── script.js         # JavaScript e interactividad
│   │
│   ├── php/
│   │   └── contact.php       # Procesamiento del formulario
│   │
│   └── images/
│       ├── logo-circular.png     # Logo circular (isotipo)
│       └── logo-horizontal.png   # Logo horizontal completo
│
└── README.md                 # Este archivo
```

## 🚀 Instalación

### Opción 1: Servidor Local

1. **Con XAMPP/WAMP/MAMP:**
   - Copia la carpeta `cerroe-website` en el directorio `htdocs` (XAMPP) o `www` (WAMP)
   - Abre tu navegador y ve a: `http://localhost/cerroe-website/`

2. **Con PHP incorporado:**
   ```bash
   cd cerroe-website
   php -S localhost:8000
   ```
   Luego abre: `http://localhost:8000`

### Opción 2: Servidor en Producción

1. **Sube los archivos:**
   - Sube todos los archivos a tu servidor mediante FTP/SFTP
   - Asegúrate de mantener la estructura de carpetas

2. **Configura el formulario de contacto:**
   - Edita `assets/php/contact.php`
   - Cambia el email de destino en la línea 19:
     ```php
     $to = "tu-email@cerroeglobal.com";
     ```

3. **Permisos:**
   ```bash
   chmod 755 assets/php/contact.php
   ```

## ⚙️ Configuración

### Configurar Email del Formulario

Edita el archivo `assets/php/contact.php`:

```php
// Línea 19 - Email de destino
$to = "info@cerroeglobal.com";

// Línea 285 (opcional) - Configuración de base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "cerroe_db";
```

### Personalizar Colores

Los colores están definidos en `assets/css/style.css`:

```css
:root {
    --primary-brown: #432323;
    --primary-teal: #2F5755;
    --secondary-teal: #5A9690;
    --light-blue: #86B0BD;
    --background-gray: #E0D9D9;
}
```

## 🎨 Paleta de Colores Oficial

| Color | Hex | Uso |
|-------|-----|-----|
| Marrón Rojizo | #432323 | Títulos principales, footer |
| Verde Petróleo | #2F5755 | Menú, botones principales |
| Verde Agua | #5A9690 | Acentos, hover states |
| Azul Grisáceo | #86B0BD | Elementos secundarios |
| Gris Rosado | #E0D9D9 | Fondos, separadores |

## 📝 Tipografías

- **Primaria:** Montserrat (títulos y encabezados)
- **Secundaria:** Lato (texto del cuerpo)

## 🔧 Tecnologías Utilizadas

- **HTML5** - Estructura semántica
- **CSS3** - Estilos y animaciones
- **JavaScript** - Interactividad y efectos
- **PHP** - Procesamiento del formulario
- **AOS Library** - Animaciones al hacer scroll
- **Google Fonts** - Tipografías web

## 📱 Compatibilidad

- ✅ Chrome (últimas 2 versiones)
- ✅ Firefox (últimas 2 versiones)
- ✅ Safari (últimas 2 versiones)
- ✅ Edge (últimas 2 versiones)
- ✅ Dispositivos móviles iOS y Android

## 🛠️ Solución de Problemas

### El formulario no envía emails

1. Verifica que tu servidor tenga PHP mail() habilitado
2. Revisa la configuración SMTP de tu servidor
3. Considera usar PHPMailer para mayor compatibilidad:
   ```bash
   composer require phpmailer/phpmailer
   ```

### Las animaciones no funcionan

1. Verifica que la librería AOS esté cargando correctamente
2. Revisa la consola del navegador para errores JavaScript
3. Asegúrate de que los archivos JS estén en la ruta correcta

### Los logos no se muestran

1. Verifica que las imágenes estén en `assets/images/`
2. Comprueba los permisos de lectura de los archivos
3. Revisa las rutas en el código HTML

## 📊 SEO

El sitio incluye:
- Meta tags optimizados
- Títulos descriptivos
- Estructura semántica HTML5
- Imágenes con atributos alt
- URLs amigables
- Schema markup (agregar según necesidad)

## 🔒 Seguridad

Características de seguridad implementadas:
- Validación de formularios en cliente y servidor
- Sanitización de datos de entrada
- Protección contra XSS
- Headers de seguridad PHP
- Validación de email

## 📈 Optimización

- Imágenes optimizadas
- CSS y JS minificados (producción)
- Lazy loading de imágenes
- Caché de navegador
- Preload de fuentes críticas

## 🌐 Despliegue en Hosting

### cPanel

1. Accede a tu cPanel
2. Ve a "Administrador de archivos"
3. Sube los archivos a `public_html`
4. Configura el email en PHP

### Netlify (solo frontend)

```bash
# Si solo quieres el frontend sin PHP
netlify deploy --prod
```

**Nota:** Para el formulario necesitarás configurar Netlify Forms o usar un servicio externo.

## 🤝 Soporte

Para soporte técnico:
- Email: soporte@cerroeglobal.com
- Website: www.cerroeglobal.com

## 📄 Licencia

© 2025 CERROE Global Export. Todos los derechos reservados.

---

**Desarrollado con ❤️ para CERROE Global Export**

*Exportamos Confianza, Creamos Oportunidades*
