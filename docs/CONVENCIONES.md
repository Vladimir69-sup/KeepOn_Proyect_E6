# 📁 Convenciones del Proyecto Keep ON 

Este documento es nuestra guía obligatoria para trabajar en equipo de forma armoniosa, mantener el código limpio, evitar conflictos en Git y asegurar que todos nos sintamos respetados y apoyados. 👍

---

## Nuestro Equipo: Expectativas y Acuerdos 🤝

Para trabajar en un ambiente sano y eficiente, respondimos a este cuestionario y nos comprometemos a respetar las respuestas de cada uno:

### ❌ Lo que NO soportamos del trabajar en equipo:
* **Aby:** Que no se escuchen las ideas de todo el equipo y que no haya buena comunicacion. 
* **Evelin:** Que no haya organizacion y tambien que no me respeten o me hagan a un lado solo por no saber o que me fallen algunas cosas. 
* **Karla:** Que no respeten mi trabajo. 
* **Ruben:** Que hagan cosas sin comunicarlo, y que me hablen mientras trabajo. 
* **Vladimir:** La falta de tolerancia y respeto entre miembros del equipo. 

### 💡 Lo que necesitamos para poder contribuir:
* **Aby:** Paciencia y comunicacion. 
* **Evelin:** Mucho apoyo y comprension. 
* **Karla:** Mucha comunicacion y apoyo. 
* **Ruben:** Respeto mutuo y participacion de todo el equipo. 
* **Vladimir:** Un sano ambiente de colaboracion y una comunicacion eficiente. 

### ✨ Las ventajas de trabajar en equipo:
* **Aby:** El trabajo se puede distribuir mas facilmente, si alguno tiene dudas otro lo puede apoyar, hay mas ideas y es rapido trabajar. 
* **Evelin:** El trabajo puede ser mas facil y rapido, tambien podemos aprender cosas nuevas. 
* **Karla:** La carga de trabajo es mas ligera y hay apoyo. 
* **Ruben:** Se trabaja mas rapido y se puede tener una retroalimentacion de todo el equipo para solucionar los diferentes problemas. 
* **Vladimir:** La variedad, originalidad y calidad de las ideas o perspectivas de trabajo para la elaboracion de soluciones para problematicas. 

---

## 🗺️ Mapa del Proyecto: ¿Qué va en cada carpeta? 

Para mantener el orden y que nadie se pierda, respetaremos estrictamente el propósito de cada directorio. Así es como se distribuye el proyecto:

| Carpeta / Archivo | 📝 ¿Qué contiene? | 👤 ¿Quién lo usa / Modifica? |
| :--- | :--- | :--- |
| **`database/`** | El archivo `schema.sql`. Estructura de las tablas y datos iniciales de MariaDB. 🗄️ | **Todo el equipo** al montar el proyecto localmente. 👍 |
| **`docs/`** | Planteamiento del proyecto, documentación, requerimientos o diagramas. 📄 | **Todo el equipo** para consultar o actualizar reglas. 👍 |
| **`dynamics/`** | La lógica de PHP. Aquí también va el archivo `conexion.php` para conectarse a la base de datos. 🔌 | **Todos** al  momento de realizar sus avances. 👍 |
| **`statics/css/`** | Hojas de estilo `.css`. Aquí pondremos tanto los estilos globales como los específicos de cada página. 🎨 | **Todo el equipo**. *Nota: Si creas un CSS para tu página, ponle un nombre claro (ej: `inicioSesion.css`).* 👍 |
| **`statics/fonts/`** | Fuentes tipográficas descargadas que usemos para los textos del sitio. 🔤 | Se agregan al inicio si el diseño lo requiere. 👍 |
| **`statics/media/`** | Subcarpetas `audio/` e `img/`. Aquí van todas las imágenes, iconos, logos y audios del proyecto. 🖼️🎵 | **Todo el equipo** para subir los recursos que necesiten sus páginas. 👍 |
| **`templates/`** | Partes HTML/PHP que se repiten en todo el sitio: `header.php`, `footer.php`, etc... 🧩 | Lo modifica quien se encargue de generarlo, una vez generado no se mueve a menos de que haya un consenso para cambiarlo. 👍 |
**`uploads/`**  | **Exclusivamente para las fotos y archivos que suban los usuarios.** 📤 | **Nadie la toca a mano.** PHP se encarga de guardar los archivos aquí mediante código. 👍 |
| **Raíz del proyecto** `(./)` | Aquí unicamente va `index.php` que es nuestra página de aterrizaje del proyecto, así como el README.md y los directorios del proyecto. 🏠 | Nadie mueve cosas aquí. 👍 |

---

## 🚩 Reglas de Sintaxis
* **Idiomas y Caracteres:** Todo el codigo se escribe en español, pero **NO se permiten acentos, ni la letra "ñ", ni espacios en nombres de archivos o variables** (Ej: usar `año` o `contraseña` está prohibido ❌, se debe usar `anio` o `contrasenia` y `password` o `clave` respectivamente 👍).
* **Uso de Emojis:** Es **OBLIGATORIO** el uso de emojis en este documento y en los comentarios clave del codigo. 👍

### 🔤 Estilos de Escritura (Banderas de Nomenclatura)
* `kebab-case` (separado-por-guiones) 🥙 : Exclusivo para **clases e id's CSS**.
* `camelCase` (primeraMinusculaYLuegoMayuscula) 🐪: Para **variables PHP** y tablas de la base de datos.
* `PascalCase` (TodasLasPalabrasInicianConMayuscula) 🏔️: Se usa para **todo lo demas** (Nombres de archivos y funciones).

---

## 💻 Convenciones de Codigo

### 🎨 Frontend (HTML & CSS)
* **Clases e IDs (CSS):** Deben usar `kebab-case`. 👍
  * *Ejemplo:* `<div id="contenedor-principal" class="tarjeta-perfil">` 

### 🐘 Backend (PHP Nativo)
* **Variables:** Deben usar `camelCase`. 👍
  * *Ejemplo:* `$idUsuario`, `$nombreCliente`, `$correoElectronico`. 
* **Funciones:** Al entrar en "todo lo demas", usan `PascalCase`. 
  * *Ejemplo:* `function InsertarUsuario()`, `function ObtenerDatos()`. 
* **Conexion:** Todos deben incluir el archivo compartido `dynamics/conexion.php` al inicio de sus archivos individuales si requieren usar la base de datos. 

### 🗄️ Base de Datos (MariaDB)
* **Tablas:** Singular y en `camelCase`. 👍
  * *Ejemplo:* `usuario`, `grupo`, `infoAlumno`. 
* **Llaves Primarias:** Formato `id_nombretabla` en minusculas (por consistencia con SQL). 👍
  * *Ejemplo:* `id_usuario`, `id_grupo`.
* **Comandos SQL:** Escribir las palabras reservadas siempre en MAYUSCULAS. 👍
  * *Ejemplo:* `SELECT * FROM Usuario WHERE id_usuario = 1;`

---

## 🌿 Manejo de Git (Flujo de Trabajo)

Cada integrante es dueño de su pagina individual (ej: `index.php`, `inicioSesionAlumno.php`), pero coordinaremos el repositorio asi:

* **main**: Solo versiones finales, estables y listas para entregar. 🏆
* **develop**: Rama de integracion. Aqui unimos el trabajo de todos antes de pasarlo a main. 🤝
* **feature/[nombre]**: Para trabajar en tu pagina (Ej: `feature/pagina-aterrizaje`, `feature/inicio-sesion-alumno`). 🆕
* **fix/[nombre]**: Para arreglar errores y/o refactorizar. 🛠️
* **docs/[nombre]**: Para cambios o archivos de documentacion (Ej: `docs/convenciones`). 📄
* **db/[nombre]**: Para cambios en los scripts SQL (Ej: `db/schema-inicial`). 🗄️

### 💬 Mensajes de Commit (Aquí no se usan emojis)
* `feat:` 🆕 Para agregar paginas o funciones nuevas.
* `fix:` 🛠️ Para corregir errores en el codigo.
* `docs:` 📝 Para documentacion.
* `style:` 🎨 Para cambios exclusivos de diseño CSS.
* `chore:` ⚙️ Para agregar configuraciones del proyecto.

*Ejemplo de commit:* `feat: Agrega archivo 'index.php' para la página de aterrizaje.`

---

## 🚨 Reglas de Convivencia y Calidad
1. **No subir codigo que no funcione:** Antes de hacer `push`, asegurate de que tu pagina PHP cargue de forma local y no rompa el diseño general. 👍
2. **Comunicacion ante todo:** Si vas a modificar algo en la carpeta `Templates/` (como el navbar o el footer) o en `Statics/css/`, **DEBES avisar al grupo primero** para no arruinar el diseño de tus compañeros. 👍
3. **Apoyo mutuo:** Si te trabas con una consulta SQL o un estilo CSS, pide ayuda en el grupo. ¡Aqui nadie se queda atras por no saber! 🫂👍
4. **Documentación del código**: Es necesario documentar todo el código, aunque sean cosas simples, pero describir en un comentario qué estamos haciendo y por qué. 📝
