# Capítulo 1: Introducción a Bash Shell - Primeros Pasos

### Objetivos del capítulo:
- Entender qué es Bash Shell y su utilidad.
- Aprender a crear y manipular archivos desde la terminal.
- Conocer el comando `echo` y cómo utilizar variables.
- Introducir el comando `ps` para ver procesos activos.
- Crear un menú simple en Bash.

## 1. ¿Qué es Bash Shell?
La Bash Shell es un intérprete de comandos que permite interactuar con el sistema operativo a través de comandos escritos. Es una herramienta poderosa para automatizar tareas y gestionar el sistema de manera eficiente. Aprender a usar Bash te permitirá realizar tareas de administración y programación de scripts para simplificar procesos.

## 2. Creación y manipulación de archivos

#### Crear un archivo
Para crear un archivo vacío, puedes usar el comando `touch`:

```bash
touch mi_archivo.txt
```

Esto creará un archivo llamado `mi_archivo.txt` en tu directorio actual.

#### Editar un archivo
Puedes editar el archivo usando un editor de texto como `nano`:

```bash
nano mi_archivo.txt
```

Escribe algún texto dentro del archivo, luego guarda y cierra (presiona `Ctrl + O` para guardar y `Ctrl + X` para salir).

#### Ver el contenido de un archivo
Para mostrar el contenido de un archivo en la terminal:

```bash
cat mi_archivo.txt
```

## 3. Usando echo y variables

#### El comando `echo`
El comando `echo` se utiliza para mostrar texto en la terminal:

```bash
echo "Hola, mundo!"
```

**Salida:**

```bash
Hola, mundo!
```

#### Variables en Bash
Puedes asignar valores a variables y luego utilizarlas:

```bash
mensaje="Este es un mensaje almacenado en una variable"
echo $mensaje
```

**Salida:**

```bash
Este es un mensaje almacenado en una variable
```

#### Recoger información del usuario
Puedes solicitar al usuario que introduzca información utilizando `read`:

```bash
echo "¿Cómo te llamas?"
read nombre
echo "Hola, $nombre!"
```


#### Paso 4: Ejecutar el script
Ejecuta el script en la terminal:

primero tienes que darle permisos de ejecución

```bash
chmod +x script.sh
```

Para ejecutar el script tienes lanzarlo con ./ junto con el nombre del script

```bash
./menu.sh
```





