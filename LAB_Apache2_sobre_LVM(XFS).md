# Práctica: Apache2 sobre LVM (XFS)
Instalar un servidor web Apache y migrar su directorio de publicación por defecto (/var/www/html) a un volumen lógico independiente formateado en EXT4.

1. Instalación y Verificación de Apache
Primero, aseguramos que el servicio web esté instalado y funcionando con la configuración por defecto.

# Actualizar repositorios e instalar Apache
sudo apt update && sudo apt install apache2 xfsprogs -y

# Verificar que el servicio está corriendo
sudo systemctl status apache2

# (Opcional) Comprobar que existe la carpeta por defecto
ls -l /var/www/html
2. Preparación del Disco LVM
Vamos a crear la estructura LVM desde cero en el disco nuevo (ej. /dev/sdb).

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
3. Formateo en EXT4
Formateamos el nuevo volumen con el sistema de archivos EXT4, tal como se solicitó.

# Formatear el volumen lógico con XFS
sudo mkfs.xfs /dev/mapper/vg_web-lv_html
4. Migración de Datos (El Cambio)
Ahora debemos mover el contenido existente de Apache al nuevo disco sin perder permisos.

# 1. Detener Apache para evitar conflictos
sudo systemctl stop apache2

# 2. Renombrar la carpeta actual (esto sirve como backup)
sudo mv /var/www/html /var/www/html_backup

# 3. Recrear la carpeta vacía (será el punto de montaje)
sudo mkdir /var/www/html

# 4. Montar temporalmente el nuevo volumen LVM
sudo mount /dev/mapper/vg_web-lv_html /var/www/html

# 5. Copiar los archivos del backup al nuevo disco
# -a: preserva permisos (dueño www-data, grupos, etc.)
sudo cp -a /var/www/html_backup/. /var/www/html/

# 6. Verificar que los archivos están ahí
ls -l /var/www/html
5. Persistencia (Configuración fstab)
Configuramos el sistema para que monte este volumen automáticamente al reiniciar.

# 1. Obtener el UUID del nuevo volumen
sudo blkid | grep lv_html
# Copia el valor que aparece entre comillas después de UUID=

# 2. Editar fstab
sudo nano /etc/fstab
Agrega la siguiente línea al final del archivo: (Reemplaza xxxx-xxxx por tu UUID real)

UUID=xxxx-xxxx-xxxx-xxxx  /var/www/html  ext4  defaults  0  2

Guardar (Ctrl+O) y Salir (Ctrl+X).

6. Verificación y Finalización
Probamos que todo esté correcto y reactivamos el servicio.

# 1. Desmontar para probar que el fstab funciona
sudo umount /var/www/html

# 2. Montar todo lo que está en fstab (si no da error, está perfecto)
sudo mount -a

# 3. Verificar que se montó correctamente
df -h | grep html

# 4. Iniciar Apache nuevamente
sudo systemctl start apache2
Limpieza (Opcional)
Si todo funciona y ves tu página web correctamente, puedes borrar la carpeta de respaldo antigua.

sudo rm -rf /var/www/html_backup
Puedes expandir el espacio en caliente si tu web crece usando lvextend y resize2fs.
