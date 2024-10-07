# Comandos Básicos y de Información del Sistema

Estos comandos son útiles para realizar auditorías o ver si nuestra máquina está infectada.
Además conocer detalles del hardware y el sistema del equipo. Es muy necesario como administradores del sistema.

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
  sudo dmidecode -q
  ```
- **Mostrar las características de un disco duro:**
  ```bash
  sudo hdparm -i /dev/sda
  ```
- **Realizar prueba de lectura en un disco duro:**
  ```bash
  sudo hdparm -tT /dev/sda
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

## 5. Sistema de Archivos y Dispositivos de Red
### Descripción:
Comandos para obtener información sobre el sistema de archivos y las interfaces de red.

- **Mostrar adaptadores de red y estadísticas:**
  ```bash
  cat /proc/net/dev
  sudo tcpdump
  ```


## 6. Fecha y Hora del Sistema
### Descripción:
Comandos para gestionar y visualizar la fecha y hora del sistema.

- **Mostrar la fecha del sistema:**
  ```bash
  date
  ```
  **Mostrar la fecha en modo calendario**

  ```bash
  cal

  cal 2024

  cal 07 2024
  ```

## Redirecciones 

Las redirecciones en la terminal permiten enviar la salida de un comando a un archivo, en lugar de mostrarla directamente en la consola o el terminal. Existen dos tipos principales de redirecciones:

a. Redirección de salida >
Envía la salida de un comando a un archivo, sobrescribiendo su contenido si ya existe.

```
ls > listado.txt
```
Este comando lista el contenido del directorio actual (con ls) para ver los ficheros y redirige el resultado a un archivo llamado listado.txt. Si el archivo ya existía, su contenido será reemplazado por el nuevo listado.

b. Redirección de salida con apéndice >>
Envía la salida de un comando a un archivo, pero en lugar de sobrescribir el archivo, añade el nuevo contenido al final de este.
```
tree >> listado.txt
```
El comando tree muestra una estructura en forma de árbol del directorio actual. Este comando añade ese resultado al final del archivo listado.txt, sin borrar lo que ya estaba allí previamente.

Para visualizar lo que hemos escrito en el fichero listado.txt podemos utilizar el comando cat.
```
cat listado.txt
```

#### echo
Sirve para lanzar textos por consola
```
echo "hola"
```
Este comando muestra el texto "hola" en la consola. La función principal de echo es simplemente lanzar o imprimir cualquier texto que se escriba.

---
### Obtener un informe del disco

copia y pega el siguiente bloque de comandos que guardan toda la información en un fichero.
Una vez ejecutado y visualizar el fichero con la información puedes escribir en el terminal

cat sistema_informe.txt

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

copia el bloque de comandos y pégalo en la terminal de Linux.
Una vez lanzado en el terminal para visualizar el diagnóstico, podemos visualizar el fichero con el siguiente comando

cat diagnostico.txt

```bash
echo "INFORME DE LA MEMORIA DEL ORDENADOR:" > diagnostico.txt
cat /proc/meminfo >> diagnostico.txt
echo "INFORME DEL MICROPROCESADOR:" >> diagnostico.txt
cat /proc/cpuinfo >> diagnostico.txt
```

### Generar cada segundo un informe de la memoria

```bash
watch -n 1 "date; echo 'Uso de Memoria:'; cat /proc/meminfo"
```

### Conocer los usuarios conectados al sistema y estadísticas


```bash
w
```

### Mostrar todos los discos duros y sus particiones

```bash
fdisk -l
```

