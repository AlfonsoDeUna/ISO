# Ejercicios para copiar mover y borrar en linux

## Tutorial para realizar los ejercicios

* https://github.com/AlfonsoDeUna/ISO/blob/main/guia_comandos_copiar_mover_borrar.md

---

### Script de inicio
El siguiente script te crea una estructura de directorios y ficheros para poder realizar la práctica

```bash
[#!/bin/bash

# Crear el directorio principal
mkdir -p /home/usuario/EJERCICIO

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

### Ejercicios con cp:

* Copia un archivo: Utiliza cp para copiar el archivo documento.txt en el mismo directorio con el nombre copia_documento.txt.
* (comprueba que existe el fichero sino te lo creas con el comando touch documento.txt)

* Copia interactiva: Copia archivo1.txt a archivo2.txt pero que te pregunte si quieres sobrescribir archivo2.txt si ya existe.

* Copia múltiple: Copia los archivos imagen1.jpg y imagen2.jpg al directorio fotos/.

* Copia recursiva: Copia todo el contenido del directorio proyectos/ al directorio backup/.

* Copia y actualiza: Usa la opción -u para copiar solo los archivos de source/ a destino/ si son más nuevos o no existen.

* Copia y muestra información: Copia archivo3.txt a backup/ mostrando mensajes de estado.

* Copia con preservación de atributos: Copia el archivo config.txt a respaldo/ manteniendo propietarios y permisos originales.

* Copia de archivos y directorios: Copia el archivo archivo1.txt y el directorio directorio1/ al directorio respaldo/.

* Copia selectiva: Usa un comodín para copiar todos los archivos .txt de documentos/ al directorio textos/.

* Copia recursiva y actualización: Copia recursivamente todo el contenido de mis_proyectos/ a proyectos_backup/, pero solo si hay actualizaciones.


### Ejercicios con mv:

* Mover un archivo: Mueve notas.txt al directorio documentos/.

* Renombrar un archivo: Renombra el archivo presentacion.ppt a proyecto_final.ppt.

* Mover varios archivos: Mueve archivo1.txt y archivo2.txt al directorio archivos/.

* Mover con confirmación: Usa la opción -i para que te pida confirmación antes de sobrescribir archivo_existente.txt.

* Mover directorios: Mueve el directorio proyectos/ al directorio finalizados/.

* Mover y mostrar información: Usa la opción -v para mover el archivo datos.csv al directorio datos/ y mostrar mensajes informativos.

* Mover si hay actualización: Mueve el archivo informe.txt al directorio backup/ solo si es más nuevo o no existe en backup/.

* Mover directorio con renombrado: Mueve y renombra el directorio imagenes/ a fotos_backup/.


### Ejercicios con rm:

* Eliminar un archivo: Elimina el archivo viejo.txt de forma silenciosa.

* Eliminar un directorio recursivamente: Elimina el directorio temporal/ y todo su contenido.
