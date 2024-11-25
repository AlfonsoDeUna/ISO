### **Paso 3: Uso del Comando Docker**

El uso de Docker consiste en pasarle una cadena de opciones y comandos seguidos de argumentos. La sintaxis toma esta forma:

```bash
docker [opción] [comando] [argumentos]
```

Para ver todos los subcomandos disponibles, escribe:

```bash
docker
```

Como referencia, aquí tienes una lista de los subcomandos más comunes en Docker 20.10.14:

```plaintext
  attach      Conectar la entrada/salida/error estándar local a un contenedor en ejecución
  build       Crear una imagen a partir de un Dockerfile
  commit      Crear una nueva imagen con cambios de un contenedor
  cp          Copiar archivos/carpetas entre un contenedor y el sistema de archivos local
  create      Crear un nuevo contenedor
  diff        Inspeccionar cambios en el sistema de archivos de un contenedor
  events      Obtener eventos en tiempo real del servidor
  exec        Ejecutar un comando en un contenedor en ejecución
  export      Exportar el sistema de archivos de un contenedor como un archivo tar
  history     Mostrar el historial de una imagen
  images      Listar imágenes
  import      Importar el contenido de un archivo tar para crear una imagen
  info        Mostrar información general del sistema Docker
  inspect     Retornar información detallada sobre objetos Docker
  kill        Detener uno o más contenedores en ejecución
  load        Cargar una imagen desde un archivo tar o STDIN
  login       Iniciar sesión en un registro Docker
  logout      Cerrar sesión en un registro Docker
  logs        Obtener los registros de un contenedor
  pause       Pausar todos los procesos dentro de uno o más contenedores
  ps          Listar contenedores
  pull        Descargar una imagen o repositorio desde un registro
  push        Subir una imagen o repositorio a un registro
  restart     Reiniciar uno o más contenedores
  rm          Eliminar uno o más contenedores
  rmi         Eliminar una o más imágenes
  run         Ejecutar un comando en un nuevo contenedor
  save        Guardar una o más imágenes en un archivo tar
  search      Buscar imágenes en Docker Hub
  start       Iniciar uno o más contenedores detenidos
  stats       Mostrar el uso de recursos en tiempo real de contenedores
  stop        Detener uno o más contenedores en ejecución
  tag         Crear un alias de una imagen
  top         Mostrar procesos en ejecución en un contenedor
  unpause     Reanudar procesos en contenedores pausados
  version     Mostrar la versión de Docker
```

Para más información sobre cada comando, usa la opción `--help`. Por ejemplo:

```bash
docker run --help
```

---

### **Paso 4: Trabajando con Imágenes Docker**

Las imágenes Docker son la base para crear contenedores. La mayoría de las imágenes se descargan desde **Docker Hub**, un repositorio público.

#### Verificar la instalación de Docker:

```bash
docker run hello-world
```

Si la instalación es correcta, se descargará la imagen `hello-world` y se ejecutará, mostrando un mensaje de prueba.

#### Buscar imágenes en Docker Hub:

```bash
docker search ubuntu
```

Esto mostrará una lista de imágenes relacionadas con "ubuntu". Por ejemplo:

```plaintext
NAME                  DESCRIPTION                                     STARS     OFFICIAL
ubuntu                Ubuntu es un sistema operativo basado en...    14048     [OK]
```

#### Descargar una imagen:

```bash
docker pull ubuntu
```

#### Ver imágenes descargadas:

```bash
docker images
```

---

### **Paso 5: Ejecutar un Contenedor Docker**

Los contenedores son instancias de imágenes que puedes ejecutar y modificar. Por ejemplo, para iniciar un contenedor interactivo basado en Ubuntu:

```bash
docker run -it ubuntu
```

Esto te dará acceso a un terminal dentro del contenedor como usuario root. 

#### Actualizar paquetes y añadir software dentro del contenedor:

```bash
apt update
apt install nodejs
node -v
```

Para salir del contenedor:

```bash
exit
```

---

### **Paso 6: Gestión de Contenedores**

#### Listar contenedores:

- Activos: 
  ```bash
  docker ps
  ```
- Activos e inactivos:
  ```bash
  docker ps -a
  ```

#### Iniciar o detener un contenedor:

```bash
docker start <container_id>
docker stop <container_id>
```

#### Eliminar un contenedor:

```bash
docker rm <container_id>
```

---

### **Paso 7: Guardar Cambios en una Imagen Docker**

Si realizas cambios en un contenedor, puedes guardarlos como una nueva imagen:

```bash
docker commit -m "Descripción de los cambios" -a "Tu Nombre" <container_id> usuario/nueva_imagen
```

Por ejemplo:

```bash
docker commit -m "Instalé Node.js" -a "TuNombre" d9b100f2f636 usuario/ubuntu-nodejs
```

Para ver la nueva imagen:

```bash
docker images
```

---

### **Paso 8: Subir Imágenes a un Registro Docker**

#### Inicia sesión en Docker Hub:

```bash
docker login -u tu_usuario
```

#### Etiqueta la imagen (si es necesario):

```bash
docker tag usuario/ubuntu-nodejs tu_usuario/ubuntu-nodejs
```

#### Sube la imagen:

```bash
docker push tu_usuario/ubuntu-nodejs
```
