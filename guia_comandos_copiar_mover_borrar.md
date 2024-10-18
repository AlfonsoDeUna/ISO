# Resumen: Uso de `cp -u *.html destination` y Comodines en el Shell

## Copiar Archivos Usando `cp -u`
El comando `cp -u *.html destination` copia todos los archivos con extensión `.html` al directorio `destination`. La opción `-u` indica que solo copiará archivos que no existen en el destino o aquellos más recientes que los ya presentes.

### Opciones Comunes de `cp`
- `-u` o `--update`: Copia archivos solo si son más nuevos o no existen en el destino.
- `-i` o `--interactive`: Pide confirmación antes de sobrescribir un archivo.
- `-r` o `--recursive`: Copia directorios recursivamente, incluyendo su contenido.
- `-v` o `--verbose`: Muestra mensajes detallados de la copia.

## Comodines en el Shell
Los comodines permiten seleccionar archivos basados en patrones específicos, facilitando el trabajo con múltiples archivos.

### Comodines Principales
- `*`: Selecciona cualquier archivo.
- `?`: Selecciona cualquier carácter individual.
- `[caracteres]`: Selecciona cualquier carácter que esté en el grupo especificado.
- `[!caracteres]`: Selecciona cualquier carácter que no esté en el grupo especificado.
- `[[:class:]]`: Selecciona cualquier carácter de una clase específica.

### Clases de Caracteres Comúnmente Usadas
- `[:alnum:]`: Cualquier carácter alfanumérico.
- `[:alpha:]`: Cualquier letra.
- `[:digit:]`: Cualquier número.
- `[:lower:]`: Letras minúsculas.
- `[:upper:]`: Letras mayúsculas.

## Ejemplos de Uso de Comodines
- `*.html`: Selecciona todos los archivos que terminan con `.html`.
- `g*`: Selecciona todos los archivos que comienzan con `g`.
- `Data???`: Selecciona archivos que comienzan con `Data` seguido de exactamente tres caracteres.

Los comodines no solo son útiles en la línea de comandos, sino que también están integrados en algunas interfaces gráficas de Linux, haciendo que la gestión de archivos sea más eficiente.

## Comando `mv` – Mover y Renombrar Archivos

El comando `mv` se usa tanto para mover como para renombrar archivos y directorios. Después de ejecutar `mv`, el archivo o directorio original no existirá.

### Opciones Comunes de `mv`
- `-i` o `--interactive`: Pregunta antes de sobrescribir archivos.
- `-u` o `--update`: Mueve archivos solo si son más nuevos o no existen en el destino.
- `-v` o `--verbose`: Muestra mensajes informativos cuando se realiza el movimiento.

### Ejemplos de Uso de `mv`
- `mv archivo1 archivo2`: Renombra `archivo1` a `archivo2`. Si `archivo2` existe, será sobrescrito.
- `mv archivo1 archivo2 directorio/`: Mueve `archivo1` y `archivo2` al `directorio`.

---

## Comando `rm` – Eliminar Archivos y Directorios

El comando `rm` se utiliza para eliminar archivos y directorios. El uso de este comando debe realizarse con precaución, ya que no hay una opción de recuperación por defecto.

### Opciones Comunes de `rm`
- `-i` o `--interactive`: Pide confirmación antes de eliminar cada archivo.
- `-r` o `--recursive`: Elimina directorios y su contenido de manera recursiva.
- `-f` o `--force`: Fuerza la eliminación sin pedir confirmación, ignorando errores.
- `-v` o `--verbose`: Muestra mensajes informativos mientras se eliminan los archivos.

### Ejemplos de Uso de `rm`
- `rm archivo1`: Elimina el archivo `archivo1`.
- `rm -i archivo1`: Igual que el anterior, pero pide confirmación antes de eliminar.
- `rm -r directorio/`: Elimina el `directorio` y todo su contenido de forma recursiva.
- `rm -rf directorio/`: Elimina de forma forzada el `directorio` y su contenido, sin confirmación.

---


