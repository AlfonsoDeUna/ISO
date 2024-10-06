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
- **Guardar los cambios de fecha en la BIOS:**
  ```bash
  clock -w
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
