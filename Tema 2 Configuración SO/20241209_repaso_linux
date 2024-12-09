# Repaso parte de LINUX

### **Nivel 1: Comandos Básicos**

1. **Creación de Usuarios y Grupos**
   - Crea dos usuarios: `usuario1` y `usuario2`.
   - Crea dos grupos: `grupo1` y `grupo2`.
   - Añade `usuario1` a `grupo1` y `usuario2` a `grupo2`.
   - Verifica la pertenencia de los usuarios a los grupos utilizando el comando `groups`.

2. **Gestión de Permisos de Archivos**
   - Crea un archivo llamado `confidencial.txt` en el directorio `/home/usuario1`.
   - Modifica los permisos del archivo para que solo `usuario1` tenga permisos de lectura y escritura, mientras que otros usuarios no tengan acceso.
   - Confirma los permisos aplicados utilizando `ls -l`.

3. **Permisos de Directorios**
   - Crea un directorio llamado `proyecto` en `/home/usuario2`.
   - Configura los permisos para que todos los miembros de `grupo2` puedan leer, escribir y ejecutar en ese directorio, pero los demás usuarios no tengan acceso.
   - Verifica los permisos con `ls -ld`.

### **Nivel 2: Introducción a Shell Scripting**

1. **Script de Creación de Usuarios**
   - Escribe un script llamado `crear_usuario.sh` que reciba como argumento un nombre de usuario y realice las siguientes acciones:
     - Cree el usuario.
     - Cree un directorio personal en `/home` con el nombre del usuario.
     - Establezca los permisos adecuados para el directorio personal.
   - Ejecuta el script para crear un nuevo usuario y verifica que se hayan realizado las acciones correctamente.

2. **Script de Asignación de Grupos**
   - Desarrolla un script llamado `asignar_grupo.sh` que tome un nombre de usuario y un nombre de grupo como argumentos, y añada al usuario al grupo especificado.
   - Asegúrate de que el script verifique si el usuario y el grupo existen antes de intentar la asignación.

3. **Script de Backup de Archivos**
   - Crea un script llamado `backup.sh` que copie todos los archivos de un directorio especificado a un directorio de respaldo, preservando los permisos y la estructura de directorios.
   - El script debe aceptar dos argumentos: el directorio de origen y el directorio de destino.

### **Nivel 3: Automatización Avanzada con Shell Scripting**

1. **Script de Auditoría de Permisos**
   - Escribe un script llamado `auditar_permisos.sh` que recorra un directorio dado y genere un informe detallado de los permisos de todos los archivos y subdirectorios, indicando el propietario, el grupo y los permisos en formato legible.

2. **Script de Gestión de Proyectos**
   - Desarrolla un script llamado `gestionar_proyecto.sh` que automatice la creación de un entorno de proyecto:
     - Cree un directorio principal con el nombre del proyecto.
     - Dentro del directorio, cree subdirectorios como `src`, `bin` y `docs`.
     - Cree un grupo con el nombre del proyecto y asigne los permisos adecuados para que los miembros del grupo tengan acceso completo al directorio del proyecto.

3. **Script de Monitoreo de Usuarios Activos**
   - Crea un script llamado `monitorear_usuarios.sh` que se ejecute cada cierto intervalo de tiempo y registre en un archivo los usuarios que están conectados al sistema en ese momento, incluyendo la hora de inicio de sesión y desde dónde se conectaron.
