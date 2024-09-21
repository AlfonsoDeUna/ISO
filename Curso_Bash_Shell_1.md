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

### 4. Introducción al comando `ps`
El comando `ps` muestra información sobre los procesos activos en el sistema.

Para ver los procesos asociados a tu sesión:

```bash
ps
```

Para ver una lista completa de procesos:

```bash
ps aux
```

### 5. Creando un menú simple en Bash
Vamos a crear un script que muestra un menú interactivo al usuario.

#### Paso 1: Crear el script
Crea un archivo llamado `menu.sh`:

```bash
nano menu.sh
```

#### Paso 2: Escribir el script
Escribe el siguiente código en `menu.sh`:

```bash
#!/bin/bash

echo "========================="
echo "       Menú Principal    "
echo "========================="
echo "1. Mostrar fecha y hora"
echo "2. Listar archivos en el directorio actual"
echo "3. Ver procesos activos"
echo "4. Salir"

echo -n "Elige una opción: "
read opcion

case $opcion in
    1)
        echo "La fecha y hora actual es: $(date)"
        ;;
    2)
        echo "Archivos en el directorio actual:"
        ls
        ;;
    3)
        echo "Procesos activos:"
        ps aux
        ;;
    4)
        echo "Saliendo..."
        ;;
    *)
        echo "Opción no válida. Por favor, elige una opción del 1 al 4."
        ;;
esac
```

#### Paso 3: Hacer el script ejecutable
Guarda el archivo y luego hazlo ejecutable:

```bash
chmod +x menu.sh
```

#### Paso 4: Ejecutar el script
Ejecuta el script en la terminal:

```bash
./menu.sh
```

Interactúa con el menú seleccionando diferentes opciones.

### Ejercicios

1. **Crear y editar un archivo**:
   - Crea un archivo llamado `tareas.txt`.
   - Abre el archivo con `nano` y escribe una lista de tareas pendientes.
   - Guarda y cierra el archivo.
   - Muestra el contenido del archivo usando `cat`.

2. **Modificar el menú**:
   - Añade una nueva opción al menú que permita al usuario ver el contenido de `tareas.txt`.
   - *Tip*: Agrega una opción 5 y ajusta el `case` para manejarla.

3. **Explorar el comando `ps`**:
   - Ejecuta `ps aux` y redirige la salida a un archivo llamado `procesos.txt`:

   ```bash
   ps aux > procesos.txt
   ```

   - Abre `procesos.txt` con `nano` y observa los procesos listados.

4. **Personalizar el saludo**:
   - Al inicio del script `menu.sh`, solicita al usuario que ingrese su nombre y almacénalo en una variable.
   - Modifica el menú para que incluya un saludo personalizado usando esa variable.

### Resumen
En este capítulo, hemos introducido los conceptos básicos de Bash Shell, incluyendo cómo crear y manipular archivos, usar el comando `echo`, trabajar con variables y utilizar el comando `ps` para ver procesos activos. También hemos creado un menú simple que interactúa con el usuario y realiza diferentes acciones según la opción seleccionada.
