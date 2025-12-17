# LABORATORIO LVM Nivel básico.

Supongamos que tienes una máquina virtual con los siguientes discos disponibles:
* **Disco del sistema:** `/dev/sda` (¡No tocar!)
* **Disco 2:** `/dev/sdb` (10GB - Vacío)
* **Disco 3:** `/dev/sdc` (10GB - Vacío)

##  Ejercicio 1: Creación Básica
**Objetivo:** Combinar los dos discos nuevos en un solo grupo y crear un volumen pequeño.

**Instrucciones:**
1.  Inicializa los discos `/dev/sdb` y `/dev/sdc` como Volúmenes Físicos (PV).
2.  Crea un Grupo de Volúmenes (VG) llamado `vg_laboratorio` que agrupe ambos discos.
3.  Crea un Volumen Lógico (LV) llamado `lv_uno` de **1GB** de tamaño.
4.  Formatea el volumen con el sistema de archivos **EXT4**.
5.  Crea el directorio `/mnt/datos` y monta el volumen allí.

## Ejercicio 2: Ocupación Total (100% FREE)
Objetivo: Utilizar todo el espacio sobrante del grupo para un segundo volumen.

**Instrucciones:**

* Crea un segundo volumen lógico llamado lv_resto.
* Asígnale todo el espacio libre restante del grupo vg_laboratorio (sin calcular los GB a mano).
* Formatea este volumen con el sistema de archivos EXT4
* Móntalo en /mnt/archivo.

``` bash
# 1. Crear LV usando el 100% del espacio libre
# El flag clave es -l (ele minúscula) y +100%FREE
sudo lvcreate -n lv_resto -l +100%FREE vg_laboratorio

# 2. Formatear en XFS
sudo mkfs.ext4 /dev/mapper/vg_laboratorio-lv_resto

# 3. Montar
sudo mkdir -p /mnt/archivo
sudo mount /dev/mapper/vg_laboratorio-lv_resto /mnt/archivo

# Verificación
lsblk
# Deberías ver que sdb y sdc están totalmente asignados.
```

## 3.Simular un escenario real donde te quedas sin espacio en el primer volumen y necesitas redimensionarlo.

* Desmonta y elimina el volumen lv_resto (el del Ejercicio 2) para liberar espacio en el grupo.
* Extiende el volumen lv_uno añadiéndole 500MB extra.
* Redimensiona el sistema de archivos (EXT4) para que el sistema operativo reconozca el nuevo espacio disponible.

```bash
# 1. Liberar espacio (Borrar lv_resto)
sudo umount /mnt/archivo
sudo lvremove /dev/vg_laboratorio/lv_resto

# 2. Extender el Volumen Lógico (+500MB)
sudo lvextend -L +500M /dev/vg_laboratorio/lv_uno

# 3. Redimensionar el sistema de archivos (EXT4 usa resize2fs)
sudo resize2fs /dev/vg_laboratorio/lv_uno

# Verificación
df -h /mnt/datos
# Ahora debería marcar aprox 1.5GB
 ```

# Reto LVM: El Servidor de Base de Datos

Eres el administrador de sistemas de una empresa. Te han entregado un servidor para montar una base de datos crítica. Tienes requerimientos específicos de almacenamiento y particionado que debes cumplir estrictamente.

### Inventario de Hardware
* **Disco del Sistema:** `/dev/sda` (Intocable)
* **Disco Nuevo 1:** `/dev/sdb` (10 GB)
* **Disco Nuevo 2:** `/dev/sdc` (5 GB)
* **Disco Nuevo 3:** `/dev/sdd` (5 GB)


## Misión 1: Despliegue Inicial
El equipo de bases de datos necesita que prepares el almacenamiento usando el disco de 10GB (`sdb`).

**Requisitos:**
1.  [ ] Crear un Grupo de Volúmenes llamado **`vg_datos`** usando únicamente `/dev/sdb`.
2.  [ ] Crear un Volumen Lógico para los datos:
    * Nombre: `lv_db`
    * Tamaño: **6 GB**
    * Formato: **EXT4**
    * Punto de montaje: `/var/lib/mysql_custom`
3.  [ ] Crear un Volumen Lógico para los logs:
    * Nombre: `lv_logs`
    * Tamaño: **3 GB**
    * Formato: **EXT4**
    * Punto de montaje: `/var/log/mysql_custom`
4.  [ ] Asegurar que ambos montajes sean **persistentes** tras un reinicio (configurar `fstab`).


## Misión 2: Emergencia de Espacio
El servidor ha entrado en producción y los logs han crecido más rápido de lo esperado. Necesitas ampliar el espacio urgentemente usando el disco de 5GB (`sdc`).

**Requisitos:**
1.  [ ] Agregar el disco `/dev/sdc` al grupo de volúmenes **`vg_datos`**.
2.  [ ] Ampliar el volumen `lv_logs` agregándole **2 GB** adicionales (Tamaño final: 5 GB).
3.  [ ] Redimensionar el sistema de archivos para que el SO reconozca el nuevo espacio sin desmontar la unidad.


