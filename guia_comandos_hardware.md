# Comandos Básicos y de Información del Sistema

Estos comandos son útiles para realizar auditorías o ver si nuestra máquina está infectada.
Además conocer detalles del hardware y el sistema del equipo es algo muy necesario como administradores del sistema

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

## 8. Dispositivos de Bloque
### Descripción:
Comando para obtener información sobre dispositivos de bloque como discos rígidos.

- **Mostrar información sobre dispositivos de bloque (nombre, etiqueta, UUID, tipo de partición):**
  ```bash
  blkid
  ```
---

Para no perder la información debería utilizar >> que añade la información al final del fichero

```
ls > listado.txt
tree >> listado txt
cat listado.txt
```

#### echo
Sirve para lanzar textos por consola
```
echo "hola"
```
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

```
echo "Memoria disponible:" > diagnostico.txt
cat /proc/meminfo >> diagnostico.txt
echo "Prueba de velocidad de disco:" >> diagnostico.txt
hdparm -tT /dev/sda >> diagnostico.txt
echo "Número de procesadores:" >> diagnostico.txt
grep -c core /proc/cpuinfo >> diagnostico.txt
```

### Generar cada 5 segundos un informe de la memoria

```
watch -n 5 "date; echo 'Uso de Memoria:'; cat /proc/meminfo; echo 'Interrupciones:'; cat /proc/interrupts"
```
