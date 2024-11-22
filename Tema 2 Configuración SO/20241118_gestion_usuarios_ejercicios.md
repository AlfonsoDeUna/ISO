### Ejercicio: Creación y Gestión de Directorios, Archivos, Usuarios y Permisos

* La máquina tiene que tener tu nombre por lo tanto crea un usuario con tu nombre si no lo tienes
añádelo al grupo de sudo para que tenga administrador y que tenga una carpeta home con su nombre.

### ENTREGA:
* Crea un documento 
* cada apartado tiene que tener un pantallazo con el resultado de lo que se te pide.
* Añade los comandos que has utilizado en el documento.
* Además para mostrar los permisos tienes que realizar un pantallazo con el comando `ls -l` donde los muestre.


1. **Crea una estructura de directorios y archivos**: (si creas un script para este punto te pondré puntos extra)
   - En tu directorio principal, crea una carpeta llamada `proyecto`.
   - Dentro de `proyecto`, crea las siguientes subcarpetas y archivos:
     - `documentos/`: carpeta que contendrá archivos de texto.
     - `scripts/`: carpeta para guardar scripts ejecutables.
     - `confidencial/`: carpeta que almacenará información sensible.
   - Dentro de cada carpeta, crea los siguientes archivos:
     - `documentos/`: `informe.txt`, `notas.txt`.
     - `scripts/`: `limpieza.sh`, `backup.sh`.
     - `confidencial/`: `informacion_secreta.txt`.
    
       **ATENCIÓN: /home/tuusuario corresponde con tu directorio de home y tuusuario sería el nombre del usuario de la práctica**

       ```bash
         mkdir home/tu_usuario/proyecto
         mkdir home/tu_suario/proyecto/documentos
         mkdir home/tu_usuario/proyecto/scripts
         mkdir home/tu_usuario/proyecto/confidencial

         touch home/tu_usuario/proyecto/documentos/informe.txt
         touch home/tu_usuario/proyecto/documentos/notas.txt
         touch home/tu_usuario/proyecto/scripts/limpieza.sh
         touch home/tu_usuario/proyecto/scripts/backup.sh
         touch home/tu_usuario/proyecto/confidencial/informacion_secreta.txt
       ```
       

2. **Crear usuarios y grupos**:
   - Crea tres usuarios: `ana`, `beto` y `carla`.
   - Crea dos grupos: `equipo` y `seguridad`.
   - Añade a `ana` y `beto` al grupo `equipo` y a `carla` al grupo `seguridad`.
   ```bash
      sudo useradd -m ana
      sudo useradd -m beto
      sudo useradd -m carla
      sudo groupadd equipo
      sudo groupadd seguridad

      sudo usermod -aG equipo ana
      sudo usermod -aG equipo beto
      sudo usermod -aG seguridad carla
   ```

3. **Asignación de permisos en archivos y directorios**:
   - Otorga permisos de lectura y escritura solo para `ana` y `beto` en `documentos/`.
     - Configura estos permisos usando `chmod` y `chown`.
   - En `scripts/`, otorga permisos de lectura, escritura y ejecución para `ana` y `carla`, y solo de lectura para `beto`.
   - En `confidencial/`, otorga permisos solo al grupo `seguridad` para que solo sus miembros puedan leer `informacion_secreta.txt`.
     - Configura `chmod` para que `beto` y otros usuarios no tengan acceso a `informacion_secreta.txt`.
   ```bash
      sudo chown -R ana:beto home/tu_usuario/proyecto/documentos
      chmod -R 660 home/tu_usuario/proyecto/documentos

      sudo chown -R ana:carla home/tu_usuario/proyecto/scripts
      sudo chmod 770 home/tu_usuario/proyecto/scripts/limpieza.sh
      sudo chmod 770 home/tu_usuario/proyecto/scripts/backup.sh
      sudo chmod 744 home/tu_usuario/proyecto/scripts/* # Solo lectura para beto

      sudo chown -R carla:seguridad home/tu_usuario/proyecto/confidencial
      sudo chmod 640 home/tu_usuario/proyecto/confidencial/informacion_secreta.txt
   ```

4. **Ejercicio con permisos específicos**:
   - Cambia los permisos de `informe.txt` en `documentos/` para que:
     - `ana` tenga todos los permisos (lectura, escritura y ejecución).
     - `beto` tenga solo permisos de lectura y escritura.
     - Otros usuarios no tengan acceso.
     - Usa permisos numéricos con `chmod` para configurarlo.
     - 
     ```bash
        sudo chown -R ana:beto home/tu_usuario/proyecto/documentos
        chmod 750 hom/tuusuario/proyecto/documentos/informe.txt
     ```

5. **Ejercicio con permisos recursivos**:
   - En `proyecto`, aplica permisos recursivos usando `chmod -R` para que:
     - El propietario (puedes elegir `ana` como propietario de todos los archivos y directorios) tenga todos los permisos.
     - El grupo `equipo` tenga permisos de lectura y ejecución.
     - Otros usuarios no tengan ningún permiso.

    ```bash
       sudo chmod -R 750 home/tu_usuario/proyecto
    ```
       

6. **Ejercicio de permisos específicos de archivos y directorios**:
   - Configura los permisos en `scripts/` para que solo los archivos `.sh` sean ejecutables, usando el comando `find`.
   - Configura `find` para que todos los archivos en `documentos/` tengan permisos `644` y todos los directorios tengan permisos `755`.
   ```bash
      find home/tuusuario/proyecto/scripts/ -type f -name "*.sh" -exec chmod +x {} \;

      find home/tuusuario/proyecto/documentos/ -type f -exec chmod 644 {} \;
      find home/tuusuario/proyecto/documentos/ -type d -exec chmod 755 {} \;
   ```

7. **Configuración de propietario y grupo recursivo**:
   - Cambia el propietario y el grupo de todo el contenido de `proyecto/` de forma recursiva, de manera que los archivos y carpetas sean propiedad de `ana` y el grupo asignado sea `equipo`.
     ```bash
        sudo chown -R ana:equipo home/tuusuario/proyecto
     ```

