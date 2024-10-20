# Ejercicios para copiar mover y borrar en linux

## Tutorial para realizar los ejercicios

* https://github.com/AlfonsoDeUna/ISO/blob/main/guia_comandos_copiar_mover_borrar.md

---

### Script de inicio
El siguiente script te crea una estructura de directorios y ficheros para poder realizar la práctica

```bash
[#!/bin/bash

# Crear el directorio principal
mkdir -p EJERCICIO

# Crear los directorios necesarios dentro del directorio principal
mkdir -p EJERCICIO/documentos
mkdir -p EJERCICIO/proyectos/proyecto1
mkdir -p EJERCICIO/proyectos/proyecto2
mkdir -p EJERCICIO/backup
mkdir -p EJERCICIO/fotos
mkdir -p EJERCICIO/temporal
mkdir -p EJERCICIO/mis_proyectos/directorio1
mkdir -p EJERCICIO/finalizados

# Crear los archivos dentro de los directorios especificados
touch EJERCICIO/documentos/archivo1.txt
touch EJERCICIO/documentos/archivo2.txt
touch EJERCICIO/documentos/imagen1.jpg
touch EJERCICIO/documentos/imagen2.jpg
touch EJERCICIO/documentos/notas.txt

touch EJERCICIO/proyectos/proyecto1/archivo1.txt
touch EJERCICIO/proyectos/proyecto1/archivo2.txt
touch EJERCICIO/proyectos/proyecto2/script.sh
touch EJERCICIO/proyectos/proyecto2/datos.csv

touch EJERCICIO/backup/archivo1.txt
touch EJERCICIO/backup/archivo2.txt
touch EJERCICIO/backup/informe.txt

touch EJERCICIO/fotos/imagen1.jpg

touch EJERCICIO/documento.txt

touch EJERCICIO/temporal/archivo_temporal.txt

touch EJERCICIO/mis_proyectos/archivo1.txt
touch EJERCICIO/mis_proyectos/archivo2.txt
touch EJERCICIO/mis_proyectos/directorio1/subarchivo1.txt
touch EJERCICIO/mis_proyectos/directorio1/subarchivo2.txt

# Mensaje de finalización
echo "Estructura de directorios y archivos dentro de /home/usuario/EJERCICIO creada exitosamente."](https://github.com/AlfonsoDeUna/ISO/blob/main/guia_comandos_copiar_mover_borrar.md)
```

para poder ejecutarlo hay que darle permiso de ejecución
```bash
chmod +x script.sh
```

para ejecutarlo hay que ejecutarlo con sudo (permisos de administración) y lanzar el script con ./

```bash
sudo ./script.sh
```

Revisa que ha creado la estructura

## Ejercicios de copiar con cp, mover mv y borrar rm

 **Cuidado con rm:** el comando rm -r * o rm -r / borra todo el disco duro con permisos de administración mucho ojo con lo que borras, te cargas la máquina virtual

Claro, aquí tienes la lista de ejercicios formateada en Markdown:

---

# Ejercicios con `cp`

1. **Copia un archivo:**

   Copia el archivo `documento.txt` en el mismo directorio con el nombre `copia_documento.txt`.

2. **Copia interactiva:**

   Copia `archivo1.txt` a `archivo2.txt` en el directorio `documentos/`, preguntando si quieres sobrescribir `archivo2.txt` si ya existe.

3. **Copia múltiple:**

   Copia los archivos `imagen1.jpg` y `imagen2.jpg` al directorio `fotos/`.

4. **Copia recursiva:**

   Copia todo el contenido del directorio `proyectos/` al directorio `backup/`.

5. **Copia y actualiza:**

   Usa la opción `-u` para copiar solo los archivos de `mis_proyectos/` a `backup/` si son más nuevos o no existen.

6. **Copia y muestra información:**

   Copia `archivo1.txt` de `mis_proyectos/` a `backup/` mostrando mensajes de estado.

7. **Copia con preservación de atributos:**

   Copia el archivo `notas.txt` a `backup/` manteniendo propietarios y permisos originales.

8. **Copia de archivos y directorios:**

   Copia el archivo `archivo1.txt` y el directorio `directorio1/` al directorio `backup/`.

9. **Copia selectiva:**

   Usa un comodín para copiar todos los archivos `.txt` de `documentos/` al directorio `backup/`.

10. **Copia recursiva y actualización:**

    Copia recursivamente todo el contenido de `mis_proyectos/` a `backup/`, pero solo si hay actualizaciones.

---

# Ejercicios con `mv`

1. **Mover un archivo:**

   Mueve `notas.txt` al directorio principal `EJERCICIO/`.

2. **Renombrar un archivo:**

   Renombra el archivo `documento.txt` a `proyecto_final.txt`.

3. **Mover varios archivos:**

   Mueve `archivo1.txt` y `archivo2.txt` de `documentos/` al directorio `backup/`.

4. **Mover con confirmación:**

   Usa la opción `-i` para que te pida confirmación antes de sobrescribir `archivo1.txt` en `backup/`.

5. **Mover directorios:**

   Mueve el directorio `proyectos/` al directorio `finalizados/`.

6. **Mover y mostrar información:**

   Usa la opción `-v` para mover el archivo `datos.csv` al directorio `backup/` y mostrar mensajes informativos.

7. **Mover si hay actualización:**

   Mueve el archivo `informe.txt` al directorio `backup/` solo si es más nuevo o no existe en `backup/`.

8. **Mover directorio con renombrado:**

   Mueve y renombra el directorio `fotos/` a `fotos_backup/`.

---

# Ejercicios con `rm`

1. **Eliminar un archivo:**

   Elimina el archivo `archivo_temporal.txt` de forma silenciosa.

2. **Eliminar un directorio recursivamente:**

   Elimina el directorio `temporal/` y todo su contenido.

---

¡Espero que estos enunciados en Markdown te sean de utilidad!
