
# Guía de Administración de LVM (Logical Volume Manager) en Linux

Esta guía detalla el proceso de configuración, gestión, redimensionamiento y eliminación de volúmenes utilizando LVM en Ubuntu Server. LVM permite una gestión de disco flexible, permitiendo redimensionar volúmenes en caliente y agrupar múltiples discos físicos en un único espacio de almacenamiento.

## 1. Conceptos Clave

Antes de comenzar, es fundamental entender la jerarquía de LVM:

* **PV (Physical Volume / Volumen Físico):** Es el "ladrillo" base. Puede ser un disco duro físico o una partición (ej. `/dev/sdb`).
* **VG (Volume Group / Grupo de Volúmenes):** Es el contenedor principal. Agrupa uno o varios PVs en un único espacio de almacenamiento compartido.
* **LV (Logical Volume / Volumen Lógico):** Es equivalente a una partición tradicional. Es donde reside el sistema de archivos y lo que ve el usuario. Se crea tomando espacio del VG.



## 2. Implementación Paso a Paso

### Paso 1: Inventario y Creación de Volúmenes Físicos (PV)
Identifica los discos disponibles en tu servidor (puedes usar `lsblk` o `fdisk -l`). En este ejemplo usaremos `/dev/sdb`, `/dev/sdc`, `/dev/sdd` y `/dev/sde`.

Inicializamos los discos para ser usados por LVM:

```bash
sudo pvcreate /dev/sdb
sudo pvcreate /dev/sdc
sudo pvcreate /dev/sdd
sudo pvcreate /dev/sde

```

### Paso 2: Creación del Grupo de Volúmenes (VG)Creamos el contenedor principal llamado `vg-test`. Inicialmente, lo crearemos usando solo el primer disco (`/dev/sdb`).

```bash
sudo vgcreate vg-test /dev/sdb

```

### Paso 3: Creación del Volumen Lógico (LV)Creamos un volumen lógico llamado `myvol1` dentro del grupo `vg-test`. Le asignaremos 5 GB de tamaño.

```bash
sudo lvcreate -n myvol1 -L 5g vg-test

```

* `-n`: Nombre del volumen.
* `-L`: Tamaño.

### Paso 4: Formateo y MontajeEl volumen lógico se comporta como una partición virgen. Debemos formatearla y montarla.

1. **Formatear (sistema de archivos ext4):**
```bash
sudo mkfs.ext4 /dev/vg-test/myvol1

```


2. **Crear punto de montaje y montar:**
```bash
sudo mkdir -p /mnt/lvm/myvol1
sudo mount /dev/vg-test/myvol1 /mnt/lvm/myvol1

```


3. **Verificar:**
```bash
df -h

```

## 3. Gestión Avanzada: Redimensionamiento (Scaling)Si te quedas sin espacio en el volumen lógico (`myvol1`), puedes expandirlo en caliente sin reiniciar el servidor.

### A. Extender el Volumen Lógico (Capa LVM)Este comando asigna el **100% del espacio libre restante** en el grupo de volúmenes al volumen lógico:

```bash
sudo lvextend -l +100%FREE /dev/vg-test/myvol1

```

### B. Redimensionar el Sistema de Archivos (Capa Filesystem)Aunque el volumen lógico ha crecido, el sistema de archivos (ext4) aún no lo sabe. Debemos expandirlo para ocupar el nuevo espacio disponible.

```bash
sudo resize2fs /dev/mapper/vg--test-myvol1

```

> **Nota sobre la sintaxis:** Observa el uso de **doble guion** (`vg--test`) en la ruta `/dev/mapper/`. Esto es necesario porque el nombre del grupo original (`vg-test`) ya contenía un guion. El sistema duplica ese guion para escaparlo y diferenciarlo del separador entre grupo y volumen.

### C. Añadir más discos al Grupo (VG)Si el grupo `vg-test` se llena por completo, puedes añadirle más discos físicos para obtener más espacio libre:

```bash
sudo vgextend vg-test /dev/sdc
sudo vgextend vg-test /dev/sdd
sudo vgextend vg-test /dev/sde

```

Una vez extendido el grupo, puedes volver a ejecutar los pasos **A** y **B** para asignar ese nuevo espacio a tus volúmenes lógicos.


## 4. Eliminación y Limpieza **ADVERTENCIA:** Los siguientes comandos destruirán todos los datos en los volúmenes especificados.

El proceso de eliminación se realiza en orden inverso a la creación.

### 1. Desmontar el sistema de archivos```bash
sudo umount /mnt/lvm/myvol1

### 2. Eliminar el Volumen Lógico (LV)```bash

```
sudo lvremove /dev/vg-test/myvol1

```

### 3. Eliminar el Grupo de Volúmenes (VG)

```bash
sudo vgremove vg-test
```

### 4. Eliminar las etiquetas de Volúmenes Físicos (PV)Esto devuelve los discos a su estado "normal" (sin formato LVM).
```bash
sudo pvremove /dev/sdb /dev/sdc /dev/sdd /dev/sde
```

### Verificación FinalEjecuta los siguientes comandos para asegurarte de que no queda nada configurado:

```bash
sudo pvs
sudo vgs
sudo lvs

```
