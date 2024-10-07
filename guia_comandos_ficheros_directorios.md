# Comandos de Gestión de Directorios y Ficheros básico

## 1. Navegación entre Directorios
### Descripción:
Comandos para moverse entre directorios.

- **Ir al directorio personal:**
  ```bash
  cd
  ```
- **Cambiar al directorio "/home":**
  ```bash
  cd /home
  ```
- **Retroceder un nivel:**
  ```bash
  cd ..
  ```
- **Retroceder 2 niveles:**
  ```bash
  cd ../..
  ```
- **Ir al directorio del usuario "user1":**
  ```bash
  cd ~user1
  ```
- **Regresar al directorio anterior:**
  ```bash
  cd -
  ```
- **Mostrar el camino del directorio actual:**
  ```bash
  pwd
  ```

## 2. Listado de Directorios
### Descripción:
Comandos para listar el contenido de los directorios y mostrar detalles adicionales.

- **Listar el contenido de un directorio:**
  ```bash
  ls
  ```
- **Listar el contenido de un directorio distinguiendo los directorios con una barra:**
  ```bash
  ls -F
  ```
- **Listar el contenido de un directorio con detalles adicionales:**
  ```bash
  ls -l
  ```
- **Listar el contenido de un directorio mostrando los tamaños en formato humanizado:**
  ```bash
  ls -lh
  ```
- **Listar el contenido de un directorio incluyendo los archivos ocultos:**
  ```bash
  ls -a
  ```
- **Listar ficheros y carpetas que contienen números:**
  ```bash
  ls *[0-9]
  ```
- **Listar recursivamente el contenido de un directorio y subdirectorios, incluyendo ocultos, separados por páginas:**
  ```bash
  ls -laR | less
  ```
  - ** Listar todos los ficheros del ordenador en rollo matrix
  ```bash
  ls / -laR
  ```

## 3. Visualización en Árbol
### Descripción:
Comandos para mostrar los ficheros y carpetas en forma de árbol.

- **Mostrar los archivos y carpetas en forma de árbol desde la raíz (opción 1):**
  ```bash
  tree
  ```
- **Mostrar los archivos y carpetas en forma de árbol desde la raíz (opción 2):**
  ```bash
  lstree
  ```

## 4. Creación de Directorios
### Descripción:
Comandos para crear directorios simples o estructuras más complejas.

- **Crear un directorio llamado 'dir1':**
  ```bash
  mkdir dir1
  ```
- **Crear dos directorios a la vez en la ubicación actual:**
  ```bash
  mkdir dir1 dir2
  ```
- **Crear una estructura de directorios (si no existe) en "/tmp/dir1/dir2":**
  ```bash
  mkdir -p /tmp/dir1/dir2
  ```

## 5. Eliminación de Archivos y Directorios
### Descripción:
Comandos para eliminar ficheros y directorios.

- **Eliminar un archivo llamado 'file1':**
  ```bash
  rm file1
  ```
- **Eliminar un archivo 'file1' en modo forzado:**
  ```bash
  rm -f file1
  ```
- **Eliminar un directorio llamado 'dir1':**
  ```bash
  rmdir dir1
  ```
- **Eliminar recursivamente y en modo forzado el directorio 'dir1':**
  ```bash
  rm -rf dir1
  ```

## redirecciones

Me redirije la información en vez de pantalla a un fichero
>
comando > fichero

```bash
ls > listado.txt
```
si yo vuelvo a redirigir la información de nuevo al ficheor listado.txt usando un > pierdo la información

```bash
tree > listado.txt
```
Para visualizar  el resultado puedes 
```bash
cat listado.txt
```
