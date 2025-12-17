
# Práctica: Apache2 sobre LVM (EXT4)

Instalar un servidor web Apache y migrar su directorio de publicación por defecto (`/var/www/html`) a un volumen lógico independiente formateado en EXT4.



## 1. Instalación y Verificación de Apache
Primero, aseguramos que el servicio web esté instalado y funcionando con la configuración por defecto.

```bash
# Actualizar repositorios e instalar Apache
sudo apt update && sudo apt install apache2 -y

# Verificar que el servicio está corriendo
sudo systemctl status apache2

# (Opcional) Comprobar que existe la carpeta por defecto
ls -l /var/www/html

```

## 2. Preparación del Disco LVM

Vamos a crear la estructura LVM desde cero en el disco nuevo (ej. `/dev/sdb`).

```bash
# 1. Identificar el disco (Asegúrate de cuál es el tuyo)
crea el comando  y copia un pantallazo

# 2. Inicializar el Volumen Físico (PV)
crea el comando  y copia un pantallazo

# 3. Crear el Grupo de Volúmenes (VG)
# Llamaremos al grupo 'vg_web'
crea el comando  y copia un pantallazo

# 4. Crear el Volumen Lógico (LV)
# Llamaremos al volumen 'lv_html' y le daremos 5GB (ajusta según necesites)
crea el comando  y copia un pantallazo

```

## 3. Formateo en EXT4

Formateamos el nuevo volumen con el sistema de archivos XFS

```bash
# Formatear el volumen lógico con XFS
sudo mkfs.xfs /dev/mapper/vg_web-lv_html

```

## 4. Migración de Datos (El Cambio)

Ahora debemos mover el contenido existente de Apache al nuevo disco sin perder permisos.
