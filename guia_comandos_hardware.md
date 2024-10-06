# Comandos de Información del Sistema

## 1. Arquitectura y Kernel del Sistema
### Descripción:
Comandos para obtener información sobre la arquitectura y el kernel del sistema operativo.

- **Mostrar la arquitectura de la máquina:**
  ```bash
  arch
  uname -m
  ```
- **Mostrar la versión del kernel usado:**
  ```bash
  uname -r
  ```
- **Mostrar la información completa del sistema:**
  ```bash
  uname -a
  ```

## 2. Distribución del Sistema Operativo
### Descripción:
Comandos para conocer detalles sobre la distribución del sistema operativo.

- **Mostrar la información completa de la distribución:**
  ```bash
  lsb_release -a
  ```
- **Mostrar el nombre de la distribución:**
  ```bash
  cat /etc/issue
  ```

## 3. Hardware y Componentes del Sistema
### Descripción:
Comandos para obtener información sobre los componentes físicos (hardware) del sistema.

- **Mostrar los componentes del hardware del sistema:**
  ```bash
  dmidecode -q
  ```
- **Mostrar las características de un disco duro:**
  ```bash
  hdparm -i /dev/hda
  ```
- **Realizar prueba de lectura en un disco duro:**
  ```bash
  hdparm -tT /dev/sda
  ```
- **Mostrar información sobre la CPU:**
  ```bash
  cat /proc/cpuinfo
  lscpu
  ```
- **Mostrar el número de procesadores:**
  ```bash
  grep -c ^processor /proc/cpuinfo
  ```
- **Mostrar los dispositivos PCI:**
  ```bash
  lspci -tv
  ```
- **Mostrar los dispositivos USB:**
  ```bash
  lsusb -tv
  ```
- **Listar el hardware completo del sistema:**
  ```bash
  lshw
  discover
  ```

## 4. Memoria y Procesos del Sistema
### Descripción:
Comandos para verificar el estado de la memoria, procesos y swap del sistema.

- **Verificar el uso de memoria:**
  ```bash
  cat /proc/meminfo
  ```
- **Mostrar ficheros swap:**
  ```bash
  cat /proc/swaps
  ```
- **Mostrar las interrupciones del sistema:**
  ```bash
  cat /proc/interrupts
  ```

## 5. Sistema de Archivos y Dispositivos de Red
### Descripción:
Comandos para obtener información sobre el sistema de archivos y las interfaces de red.

- **Mostrar adaptadores de red y estadísticas:**
  ```bash
  cat /proc/net/dev
  ```
- **Mostrar el sistema de archivos montado:**
  ```bash
  cat /proc/mounts
  ```

## 6. Fecha y Hora del Sistema
### Descripción:
Comandos para gestionar y visualizar la fecha y hora del sistema.

- **Mostrar la fecha del sistema:**
  ```bash
  date
  ```
- **Colocar (ajustar) fecha y hora:**
  ```bash
  date 041217002011.00
  ```

## 7. Almanaques y Calendarios
### Descripción:
Comandos para obtener y visualizar almanaques y calendarios.

- **Mostrar el almanaque de 2011:**
  ```bash
  cal 2011
  ```
- **Mostrar el almanaque para el mes de julio de 2011:**
  ```bash
  cal 07 2011
  ```

## 8. Dispositivos de Bloque
### Descripción:
Comando para obtener información sobre dispositivos de bloque como discos rígidos.

- **Mostrar información sobre dispositivos de bloque (nombre, etiqueta, UUID, tipo de partición):**
  ```bash
  blkid
  ```
---
# Comandos de Gestión de Directorios y Ficheros básico

## 1. Navegación entre Directorios
### Descripción:
Comandos para moverse entre directorios.

- **Ir al directorio personal:**
  ```bash
  cd
  ```
- **Cambiar al directorio "/home":**
  ```bash
  cd /home
  ```
- **Retroceder un nivel:**
  ```bash
  cd ..
  ```
- **Retroceder 2 niveles:**
  ```bash
  cd ../..
  ```
- **Ir al directorio del usuario "user1":**
  ```bash
  cd ~user1
  ```
- **Regresar al directorio anterior:**
  ```bash
  cd -
  ```
- **Mostrar el camino del directorio actual:**
  ```bash
  pwd
  ```

## 2. Listado de Directorios
### Descripción:
Comandos para listar el contenido de los directorios y mostrar detalles adicionales.

- **Listar el contenido de un directorio:**
  ```bash
  ls
  ```
- **Listar el contenido de un directorio distinguiendo los directorios con una barra:**
  ```bash
  ls -F
  ```
- **Listar el contenido de un directorio con detalles adicionales:**
  ```bash
  ls -l
  ```
- **Listar el contenido de un directorio mostrando los tamaños en formato humanizado:**
  ```bash
  ls -lh
  ```
- **Listar el contenido de un directorio incluyendo los archivos ocultos:**
  ```bash
  ls -a
  ```
- **Listar ficheros y carpetas que contienen números:**
  ```bash
  ls *[0-9]
  ```
- **Listar recursivamente el contenido de un directorio y subdirectorios, incluyendo ocultos, separados por páginas:**
  ```bash
  ls -laR | less
  ```

## 3. Visualización en Árbol
### Descripción:
Comandos para mostrar los ficheros y carpetas en forma de árbol.

- **Mostrar los archivos y carpetas en forma de árbol desde la raíz (opción 1):**
  ```bash
  tree
  ```
- **Mostrar los archivos y carpetas en forma de árbol desde la raíz (opción 2):**
  ```bash
  lstree
  ```

## 4. Creación de Directorios
### Descripción:
Comandos para crear directorios simples o estructuras más complejas.

- **Crear un directorio llamado 'dir1':**
  ```bash
  mkdir dir1
  ```
- **Crear dos directorios a la vez en la ubicación actual:**
  ```bash
  mkdir dir1 dir2
  ```
- **Crear una estructura de directorios (si no existe) en "/tmp/dir1/dir2":**
  ```bash
  mkdir -p /tmp/dir1/dir2
  ```

## 5. Eliminación de Archivos y Directorios
### Descripción:
Comandos para eliminar ficheros y directorios.

- **Eliminar un archivo llamado 'file1':**
  ```bash
  rm file1
  ```
- **Eliminar un archivo 'file1' en modo forzado:**
  ```bash
  rm -f file1
  ```
- **Eliminar un directorio llamado 'dir1':**
  ```bash
  rmdir dir1
  ```
- **Eliminar recursivamente y en modo forzado el directorio 'dir1':**
  ```bash
  rm -rf dir1
  ```




---
### Obtener un informe del disco

```bash
echo "Informe del sistema generado el: $(date)" > sistema_informe.txt
echo "Arquitectura y Kernel:" >> sistema_informe.txt
uname -a >> sistema_informe.txt
echo "Distribución del Sistema:" >> sistema_informe.txt
lsb_release -a >> sistema_informe.txt
echo "Información de la CPU:" >> sistema_informe.txt
lscpu >> sistema_informe.txt
echo "Uso de Memoria:" >> sistema_informe.txt
cat /proc/meminfo >> sistema_informe.txt
# si quiere añadir algún comando más puedes intentarlo
 ```

### Obtener un fichero auditoría de la máquina
```
echo "Memoria disponible:" > diagnostico.txt
cat /proc/meminfo >> diagnostico.txt
echo "Prueba de velocidad de disco:" >> diagnostico.txt
hdparm -tT /dev/sda >> diagnostico.txt
echo "Número de procesadores:" >> diagnostico.txt
grep -c ^processor /proc/cpuinfo >> diagnostico.txt
```
### Ejercicio con tu compañero de al lado crea una tabla como esta donde compares aspectos del hardware

| Característica      | Máquina 1           | Máquina 2           |
|---------------------|---------------------|---------------------|
| Kernel              | 5.10.0              | 5.4.0               |
| Procesadores        | 4                   | 2                   |
| Disco (vel. lectura)| 150 MB/s            | 120 MB/s            |

### Generar cada 5 segundos un informe de la memoria

```
watch -n 5 "date; echo 'Uso de Memoria:'; cat /proc/meminfo; echo 'Interrupciones:'; cat /proc/interrupts"
```
