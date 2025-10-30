# 🚀 CERROE Global Export - Inicio Rápido

## ⚡ Instalación en 3 Pasos

### 1️⃣ Descarga y Extrae
- Descarga `cerroe-website.zip`
- Extrae todos los archivos en tu servidor o carpeta local

### 2️⃣ Configura el Email
Edita `assets/php/contact.php` en la línea 19:
```php
$to = "tu-email@cerroeglobal.com";  // ← Cambia esto
```

### 3️⃣ Prueba Local
```bash
cd cerroe-website
php -S localhost:8000
```
Abre: http://localhost:8000

---

## 📁 Archivos Importantes

| Archivo | Descripción |
|---------|-------------|
| `index.html` | Página principal |
| `assets/css/style.css` | Todos los estilos |
| `assets/js/script.js` | Funcionalidad JS |
| `assets/php/contact.php` | Formulario de contacto |
| `assets/images/` | Logos de CERROE |

---

## 🎨 Personalización Rápida

### Cambiar Colores
Edita `assets/css/style.css` líneas 15-21:
```css
:root {
    --primary-brown: #432323;    /* Títulos */
    --primary-teal: #2F5755;     /* Menú, botones */
    --secondary-teal: #5A9690;   /* Hover, acentos */
    --light-blue: #86B0BD;       /* Secundarios */
    --background-gray: #E0D9D9;  /* Fondos */
}
```

### Cambiar Textos
Edita `index.html` y busca las secciones:
- Hero: línea 75+
- Nosotros: línea 140+
- Valores: línea 200+
- Servicios: línea 290+
- Contacto: línea 450+

---

## 🌐 Subir a Internet

### Con cPanel:
1. Accede a tu cPanel
2. Administrador de archivos → `public_html`
3. Sube todos los archivos
4. Configura el email en `contact.php`
5. ¡Listo!

### Con FTP (FileZilla):
1. Conecta a tu servidor
2. Sube la carpeta `cerroe-website`
3. Permisos: 755 para PHP
4. Prueba el sitio

---

## ✅ Checklist de Verificación

- [ ] Logos se muestran correctamente
- [ ] Menú funciona en móvil
- [ ] Animaciones se ven bien
- [ ] Formulario envía emails
- [ ] Todos los enlaces funcionan
- [ ] Sitio responsive en móvil
- [ ] Email configurado correctamente
- [ ] HTTPS activado

---

## 🆘 Problemas Comunes

### "El formulario no envía"
→ Verifica que PHP mail() esté habilitado en tu servidor
→ Revisa el email en `contact.php`

### "No veo los logos"
→ Verifica que las imágenes estén en `assets/images/`
→ Revisa permisos de lectura (644)

### "Animaciones no funcionan"
→ Verifica que AOS esté cargando (consola del navegador)
→ Limpia caché del navegador

---

## 📞 Información de Contacto en el Sitio

Actualiza en `index.html` (línea 460+):
```html
<p>República Dominicana</p>  <!-- Dirección -->
<p>info@cerroeglobal.com</p> <!-- Email -->
<p>+1 (809) 000-0000</p>      <!-- Teléfono -->
```

---

## 🎯 URLs Importantes del Proyecto

- **Sitio:** https://www.cerroeglobal.com
- **Soporte:** soporte@cerroeglobal.com
- **Manual de Marca:** (Incluido en documentación)

---

## 💡 Mejoras Futuras Sugeridas

- [ ] Integrar Google Analytics
- [ ] Agregar chat en vivo
- [ ] Implementar blog/noticias
- [ ] Añadir galería de productos
- [ ] Versión en inglés
- [ ] Sistema de CRM
- [ ] Portal de clientes

---

**¿Necesitas ayuda?** 
Contacta al equipo de desarrollo

**CERROE Global Export**
*Exportamos Confianza, Creamos Oportunidades*
