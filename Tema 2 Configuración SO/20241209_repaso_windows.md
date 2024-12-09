# Repaso de la parte de Windows

### **Nivel 1: Comandos Básicos**

1. **Gestión de Archivos y Carpetas**
   - Crea una carpeta llamada `Proyecto` en `C:\`.
   - Dentro de `Proyecto`, crea un archivo llamado `README.txt` y escribe "Bienvenido al proyecto".
   - Añade una línea extra al archivo `README.txt` que diga "Creado con PowerShell".

2. **Crear Múltiples Carpetas**
   - En la carpeta `Proyecto`, crea cinco subcarpetas nombradas `Módulo1`, `Módulo2`, ..., `Módulo5`.

3. **Eliminar Archivos y Carpetas**
   - Elimina la carpeta `Módulo5` y verifica que se ha eliminado correctamente.


### **Nivel 2: Gestión de Usuarios y Grupos**

1. **Crear Usuarios**
   - Crea un usuario llamado `usuario1` con contraseña `Password123!` y descripción "Usuario de ejemplo".
   - Lista todos los usuarios creados en el sistema.

2. **Modificar Usuarios**
   - Cambia la descripción de `usuario1` a "Usuario modificado para PowerShell".
   - Bloquea la cuenta de `usuario1`.

3. **Asignar Grupos**
   - Crea un grupo llamado `EquipoDesarrollo`.
   - Añade `usuario1` al grupo `EquipoDesarrollo`.
   - Verifica que `usuario1` pertenece al grupo.

4. **Eliminar Usuarios y Grupos**
   - Elimina el usuario `usuario1`.
   - Elimina el grupo `EquipoDesarrollo`.


### **Nivel 3: Automatización con Scripting**

1. **Script de Creación de Carpetas y Archivos**
   - Escribe un script que:
     - Cree una carpeta base `C:\Ejercicios`.
     - Dentro de esta, cree tres subcarpetas (`Ejercicio1`, `Ejercicio2`, `Ejercicio3`).
     - En cada subcarpeta, cree un archivo `info.txt` con el texto "Este es el Ejercicio X", donde X sea el número del ejercicio.

2. **Script de Creación de Usuarios**
   - Escribe un script que:
     - Cree tres usuarios (`estudiante1`, `estudiante2`, `estudiante3`) con la misma contraseña predeterminada.
     - Añada `estudiante1` al grupo `Administradores`, `estudiante2` al grupo `Usuarios`, y `estudiante3` al grupo `Remote Desktop Users`.

3. **Script de Auditoría de Usuarios y Grupos**
   - Escribe un script que:
     - Liste todos los usuarios del sistema.
     - Para cada usuario, liste los grupos a los que pertenece.
     - Guarde esta información en un archivo `usuarios_grupos.txt` en `C:\Auditoría`.

4. **Script de Backup de Archivos**
   - Crea un script que:
     - Copie todos los archivos de `C:\Ejercicios` a una carpeta llamada `Backup` en el escritorio.
     - Verifique que todos los archivos fueron copiados correctamente y registre los resultados en `backup_log.txt`.
