# Guía de Migración de Sistema Linux a LVM (Logical Volume Manager)Esta guía documenta paso a paso el proceso para transformar un servidor con particiones físicas estándar (o mal particionado) a una estructura flexible LVM, permitiendo separar `/home`, `/var`, `/tmp`, y `/` (root) sin reinstalar el sistema operativo.


## Prerrequisitos* Acceso **root** o usuario con privilegios `sudo`.
* Discos duros adicionales o espacio libre para crear los nuevos volúmenes (en el ejemplo se usan `/dev/sdb`, `/dev/sdc`, `/dev/sdd`, `/dev/sde`).
* Herramientas necesarias: `lvm2`, `xfsprogs`, `rsync`.



## 1. Identificación de DiscosVerificar los discos conectados al sistema para identificar cuáles se usarán en el nuevo esquema LVM.

```bash
sudo lsblk

```

* **Explicación:** Lista los dispositivos de bloque. Buscamos los discos que no son del sistema actual (ej. `sdb`, `sdc`...).

## 2. Inicialización de Volúmenes Físicos (PV)Prepara los discos físicos para ser usados por LVM.

```bash
sudo pvcreate /dev/sdb /dev/sdc /dev/sdd /dev/sde

```

* **Explicación:** Marca los discos seleccionados como "Physical Volumes".
* **Verificación:** `sudo pvs`.

## 3. Configuración del Grupo de Volúmenes (VG)Crea una única entidad de almacenamiento sumando la capacidad de los discos físicos.

```bash
# Crear el grupo (llamado 'bgx') con el primer disco
sudo vgcreate bgx /dev/sdb

# Extender el grupo con el resto de los discos
sudo vgextend bgx /dev/sdc /dev/sdd /dev/sde

```

* **Explicación:** Se recomienda usar un solo *Volume Group* para facilitar la gestión del espacio libre.
* **Verificación:** `sudo vgs` o `sudo vgdisplay`.

## 4. Creación de Volúmenes Lógicos (LV)Crea las particiones virtuales para cada punto de montaje.

```bash
# Ejemplo: Crear volúmenes para tmp, opt, var, home y root
sudo lvcreate -n tmp -L 1G bgx
sudo lvcreate -n opt -L 2G bgx
sudo lvcreate -n var -L 2G bgx
sudo lvcreate -n home -L 2G bgx
sudo lvcreate -n root -L 5G bgx

```

* **Opciones:** `-n` (nombre), `-L` (tamaño), `bgx` (nombre del grupo).
* **Nota:** Ajusta los tamaños (`5G`, `1G`) según tus necesidades reales.

## 5. Formateo de Volúmenes (Filesystem XFS)Instala soporte para XFS y formatea los nuevos volúmenes.

```bash
# Instalar herramientas (Debian/Ubuntu)
sudo apt install xfsprogs

# Formatear cada volumen lógico
sudo mkfs.xfs /dev/mapper/bgx-root
sudo mkfs.xfs /dev/mapper/bgx-opt
sudo mkfs.xfs /dev/mapper/bgx-tmp
sudo mkfs.xfs /dev/mapper/bgx-var
sudo mkfs.xfs /dev/mapper/bgx-home

sudo mkfs.ext4 /dev/vg-test/myvol1

```

* **Explicación:** Se utiliza XFS por su eficiencia en servidores de alto rendimiento.

## 6. Migración de Datos (Ejemplo con `/tmp`)El proceso para mover datos de una carpeta del sistema actual al nuevo LVM. *Repetir para var, home, opt.*

```bash
# 1. Crear punto de montaje temporal
mkdir /mnt/nuevo_tmp

# 2. Montar el nuevo volumen
sudo mount /dev/mapper/bgx-tmp /mnt/nuevo_tmp

# 3. Copiar datos manteniendo atributos
sudo rsync -avh /tmp/ /mnt/nuevo_tmp/

# 4. Desmontar volumen nuevo
sudo umount /dev/mapper/bgx-tmp

# 5. Limpiar directorio original (Cuidado: esto borra datos del disco viejo)
sudo rm -rf /tmp/*

# 6. Montar el volumen LVM en su ubicación final
sudo mount /dev/mapper/bgx-tmp /tmp

```

## 7. Persistencia (fstab)Configurar el arranque automático de los nuevos volúmenes.

1. **Obtener UUID:**
```bash
sudo blkid | grep tmp

```


2. **Editar fstab:**
```bash
sudo nano /etc/fstab

```


3. **Agregar línea (ejemplo):**
```text
UUID=1234-abcd-5678-efgh  /tmp  xfs  defaults  0  2

```



## 8. Extensión de Volúmenes (Upsizing)Cómo agregar espacio a un volumen en caliente.

```bash
# 1. Extender el volumen lógico (sumar 1GB)
sudo lvextend -L +1G /dev/mapper/bgx-tmp

# 2. Redimensionar el sistema de archivos (XFS)
sudo xfs_growfs /dev/mapper/bgx-tmp

```

* **Nota:** Si usaras EXT4, el comando sería `resize2fs`.

## 9. Migración del Sistema Raíz (ROOT)Mover el sistema operativo completo.

```bash
# 1. Preparar directorio y montaje
sudo mkdir /mnt/nuevo_root
sudo mount /dev/mapper/bgx-root /mnt/nuevo_root

# 2. Sincronización completa (Excluyendo lo ya movido)
# NOTA: Excluir 'tmp' si ya se movió, y siempre excluir 'mnt', 'proc', 'sys'.
sudo rsync -axvH --exclude=tmp --exclude=mnt / /mnt/nuevo_root

```

* **Flags Rsync:** `-a` (archive), `-x` (no cruzar filesystems), `-v` (verbose), `-H` (hard links).

## 10. Reinstalación del Bootloader (GRUB)Hacer que el sistema arranque desde el nuevo LVM.

```bash
# 1. Montar directorios de sistema en el nuevo entorno
sudo mount --bind /dev /mnt/nuevo_root/dev
sudo mount --bind /sys /mnt/nuevo_root/sys
sudo mount --bind /proc /mnt/nuevo_root/proc

# 2. Entrar en el nuevo entorno (Chroot)
sudo chroot /mnt/nuevo_root

# 3. Actualizar Grub
update-grub

# 4. Salir
exit

```

### Solución de Problemas (Arranque Fallido)Si `update-grub` no detecta el cambio automáticamente:

1. Editar `/boot/grub/grub.cfg`.
2. Buscar el UUID del disco viejo.
3. Reemplazar todas las ocurrencias con el UUID del nuevo volumen `bgx-root`.

##11. Reciclaje del Disco ViejoUna vez el sistema arranca desde LVM, reutilizar el disco antiguo.

```bash
# Convertir partición antigua a PV y agregarla al grupo
sudo pvcreate /dev/sda1
sudo vgextend bgx /dev/sda1

```



# Anexo: Revertir Cambios (Limpieza)Comandos para eliminar toda la estructura creada (¡Peligro de pérdida de datos!).

```bash
# 1. Desmontar todo
sudo umount /ruta/de/montaje

# 2. Eliminar Volúmenes Lógicos
sudo lvremove /dev/bgx/nombre_volumen
# O para borrar todo el grupo: sudo lvremove bgx

# 3. Eliminar Grupo de Volúmenes
sudo vgremove bgx

# 4. Limpiar discos físicos
sudo pvremove /dev/sdb /dev/sdc /dev/sdd /dev/sde

```
