
#  Guía Práctica: Migración de Root a LVM 

Esta guía documenta el procedimiento técnico para transformar un servidor con particionado estándar a LVM, moviendo la raíz (`/`) y solucionando manualmente el arranque del GRUB.

##  Escenario Inicial
* **Problema:** Servidor con todo el sistema operativo aglutinado en una sola partición física (ej. `/dev/sda1`).
* **Recursos:** Discos adicionales vacíos (ej. `sdb`, `sdc`, `sdd`, `sde`).
* **Objetivo:** Migrar el sistema a LVM (XFS) y reciclar el disco antiguo.



## Paso 1: Preparación de la Estructura LVM

Primero, convertimos los discos "random" en una entidad lógica unificada.



```bash
# 1. Identificar discos (Verificar que sdb, sdc, etc. están libres)
# pantallazo del comando

# 2. Crear Physical Volumes (PV)
# pantallazo del comando

# 3. Crear Volume Group (VG) llamado 'bgx'
# pantallazo del comando

# 4. Extender el VG con el resto de discos
# pantallazo del comando

# 5. Crear Logical Volumes (LV) para ROOT
sudo lvcreate -n root -L 20G bgx  # Ajustar tamaño según necesidad

```

##  Paso 2: Formateo en XFS

El tutorial utiliza XFS por rendimiento.

```bash
# Instalar soporte XFS (si no está)
sudo apt install xfsprogs  # Debian/Ubuntu

# Formatear volúmenes
sudo mkfs.xfs /dev/mapper/bgx-root

```

##  Migración del Sistema (Rsync)

Vamos a copiar el sistema raíz actual al nuevo volumen lógico.

```bash
# 1. Crear punto de montaje temporal
sudo mkdir /mnt/nuevo_root

# 2. Montar el LV de root
sudo mount /dev/mapper/bgx-root /mnt/nuevo_root

#3. recargar archivos de configuración del sistema, evita warnings
systemctl daemon-reload

# 3. Copiar el sistema (Excluyendo temporales y montajes para evitar bucles)
# Flags: -a (archive), -x (one file system), -v (verbose), -H (hard links)
sudo rsync -axvH --exclude=mnt / /mnt/nuevo_root

```

## Paso 4: Preparación del Entorno (Chroot)

Para configurar el arranque, debemos "entrar" en el nuevo sistema.

```bash
# 1. Montar las carpetas virtuales del sistema actual en el nuevo
sudo mount --bind /dev /mnt/nuevo_root/dev
sudo mount --bind /sys /mnt/nuevo_root/sys
sudo mount --bind /proc /mnt/nuevo_root/proc

# 2. Cambiar la raíz (Chroot)
sudo chroot /mnt/nuevo_root

umount /mnt/nuevo_root/dev /mnt/nuevo_root/sys /mnt/nuevo_root/proc

```

## Paso 5: Actualización de Fstab

El sistema debe saber dónde montar la raíz al arrancar.

1. Obtén el UUID del nuevo root: `blkid | grep bgx-root`
2. Edita el archivo: `nano /etc/fstab`
3. Comenta la línea del root antiguo.
4. Agrega la nueva línea:
```text
UUID=xxxx-xxxx-xxxx-xxxx   /   xfs   defaults   0   1

```

##  Paso 6: El Arreglo "Drástico" del GRUB (Método Manual)


2. **MÉTODO MÁS SEGURO: editar `grub.cfg` manualmente:**
* Necesitas dos datos:
* **UUID Viejo:** El ID de la partición física original (`/dev/sda1`).
* **UUID Nuevo:** El ID del volumen lógico (`/dev/mapper/bgx-root`).


* Edita el archivo de configuración generado:
```bash
nano /boot/grub/grub.cfg

```


* **Procedimiento de reemplazo:**
1. Dentro de nano, usa `Ctrl + W` (Buscar) y pega el **UUID Viejo**.
2. Reemplázalo manualmente por el **UUID Nuevo** del volumen LVM.
3. Repite esto para **todas** las instancias donde aparezca el UUID viejo asociado al arranque del kernel (linux) y initrd.
4. Guarda (`Ctrl + O`) y Sal (`Ctrl + X`).


4. **Reiniciar:**
```bash
sudo reboot

```


## Paso 7: Reciclaje del Disco Antiguo (opcional)

Una vez el sistema arranca correctamente desde el LVM (`df -h` muestra `/` en `bgx-root`), el disco físico original (`sda1`) ya no se necesita para el SO.

```bash
# 1. Inicializar la partición antigua como PV
sudo pvcreate /dev/sda1

# 2. Agregarla al Grupo de Volúmenes para ganar espacio
sudo vgextend bgx /dev/sda1

# 3. Verificar el nuevo espacio total
sudo vgs

```

En este punto el servidor ha sido normalizado y migrado completamente a LVM.



