
# Gestión de usuarios en Linux (grupos, permisos, perfiles)

## Comandos de `chmod` y `chown` con ejemplos

## Cambiar permisos con `chmod`

#### 1. Otorgar permisos de lectura, escritura y ejecución al propietario del archivo
```bash
chmod u+rwx archivo.txt
```
Este comando añade permisos de lectura, escritura y ejecución (`rwx`) al propietario del archivo `archivo.txt`.

#### 2. Quitar permisos de escritura para el grupo y otros usuarios
```bash
chmod go-w archivo.txt
```
Este comando elimina los permisos de escritura (`-w`) para el grupo y otros usuarios en el archivo `archivo.txt`.

### 3. Establecer permisos específicos con valores numéricos
```bash
chmod 754 archivo.txt
```
Este comando establece permisos específicos en formato numérico:
- `7` (propietario): lectura, escritura y ejecución (`rwx`)
- `5` (grupo): lectura y ejecución (`r-x`)
- `4` (otros): solo lectura (`r--`)

## Cambiar propietario y grupo con `chown`

### 4. Cambiar el propietario del archivo
```bash
chown usuario archivo.txt
```
Este comando cambia el propietario del archivo `archivo.txt` a `usuario`.

### 5. Cambiar el grupo del archivo
```bash
chown :grupo archivo.txt
```
Este comando cambia el grupo asociado al archivo `archivo.txt` a `grupo`.

### 6. Cambiar el propietario y grupo del archivo simultáneamente
```bash
chown usuario:grupo archivo.txt
```
Este comando cambia tanto el propietario como el grupo del archivo `archivo.txt` a `usuario` y `grupo`, respectivamente.

## Cambiar permisos de directorios y archivos recursivamente

### 7. Cambiar permisos de todos los archivos y directorios de forma recursiva
```bash
chmod -R 755 /ruta/directorio
```
Este comando aplica los permisos `755` a todos los archivos y directorios dentro de `/ruta/directorio` de manera recursiva:
- `7` (propietario): lectura, escritura y ejecución (`rwx`)
- `5` (grupo y otros): lectura y ejecución (`r-x`)

### 8. Cambiar propietario y grupo de todos los archivos y directorios recursivamente
```bash
chown -R usuario:grupo /ruta/directorio
```
Este comando cambia el propietario y el grupo de todos los archivos y directorios en `/ruta/directorio` de forma recursiva a `usuario` y `grupo`.

## Cambiar permisos de solo archivos o solo directorios

### 9. Cambiar permisos de solo archivos dentro de un directorio
```bash
find /ruta/directorio -type f -exec chmod 644 {} \;
```
Este comando cambia los permisos de solo archivos (`-type f`) dentro de `/ruta/directorio` a `644`:
- `6` (propietario): lectura y escritura (`rw-`)
- `4` (grupo y otros): solo lectura (`r--`)

### 10. Cambiar permisos de solo directorios dentro de un directorio
```bash
find /ruta/directorio -type d -exec chmod 755 {} \;
```
Este comando cambia los permisos de solo directorios (`-type d`) dentro de `/ruta/directorio` a `755`:
- `7` (propietario): lectura, escritura y ejecución (`rwx`)
- `5` (grupo y otros): lectura y ejecución (`r-x`)
