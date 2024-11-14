# Gestión de usuarios en Linux (grupos, permisos, perfiles)

* Utilizamos el comando: **useradd**
* Puedes utilizas `adduser` es un script de perl que puedes añadir más información del usuario en la creación pero no es un comando

#### Crear un usuario básico
``` bash
sudo useradd usuario1
```
#### Crear un usuario mediante el script adduser
```bash
sudo adduser ejemplo
```

#### Ver información de un usuario 
```bash
id usuario1
```

### Ver todas las opciones del comando useradd
```
useradd -help
```
### Descubrir si otros usuarios están conecctados a mi máquina
```bash
w
``` 

#### Crear un usuario y especificar su directorio home
 ``` bash
sudo useradd -m -d /home/usuario_personalizado usuario2
```
#### Ejercicio borrar el directorio de usuario_personalizado. Ya lo hemos visto en clase
```
sudo rm -rd usuario_personalizado
```

#### Cambiar el directorio home de un usuario
```bash
sudo userdmod -d /home/usuario2 usuario2
```
#### Crear un usuario y definir su shell de inicio
``` bash
sudo useradd -m -s /bin/bash usuario3
```
#### Crear un usuario con un grupo primario
``` bash
sudo useradd -m -g grupo1 usuario5
```
#### Crear un usuario y añadirlo a varios grupos secundarios
```bash
sudo useradd -m -G sudo,docker usuario6
```
useradd: el grupo «docker» no existe
**solución:**
```
sudo groupadd docker
sudo useradd -m -G sudo,docker usuario6
```
#### Modificar los grupos secundarios sin borrar los que tenemos
```
usermod -a -G Marketing usuario6
```
#### Crear un usuario con una fecha de expiración
``` bash
sudo useradd -m -e 2024-12-31 usuario7
```
#### Crear un usuario y asignar un comentario
``` bash
sudo useradd -m -c "comentario" usuario8
```
#### Crear un usuario con contraseña al instante
``` bash
sudo useradd -usuario8
sudo passwd usuario8
```
#### Crear un usuario y forzar cambio de contraseña en el primer inicio
``` bash
sudo passwd -e usuario8
```

#### crear un usuario con privilegios de root en linux
```bash
useradd -u 0 -o -g 0 usuarioroot
passwd usuarioroot
```
*Realiza un su de usuarioroot para que ver que es root*

#### Mostrar el último acceso de un usuario 
```bash
lastlog -u usuario
```
#### Mostrar información sobre las contraseñas de los usuarios
```bash
passwd -S -a
```
#### Explicación de cada campo en la salida
* Nombre del usuario: El primer campo muestra el nombre de usuario (por ejemplo, usuario1, usuario2).
* Estado de la contraseña: El segundo campo muestra el estado de la contraseña, y puede tener varios valores:
  * P: La contraseña está configurada y activa.
  * L: La cuenta está bloqueada (el usuario no puede iniciar sesión).
  * NP: No hay ninguna contraseña configurada para el usuario (puede ser una cuenta de servicio o de sistema).
  * LK: La cuenta está bloqueada (puede variar según la distribución de Linux).
 * Última modificación de la contraseña: El tercer campo muestra la última fecha en que se cambió la contraseña, en formato DD/MM/AAAA.
* Días mínimos: El cuarto campo indica el número mínimo de días que el usuario debe esperar antes de poder cambiar su contraseña de nuevo. Un valor de 0 significa que no hay restricción.
* Días máximos: El quinto campo muestra el número máximo de días que la contraseña puede ser usada antes de requerir un cambio. Un valor de 99999 significa que la contraseña no expirará.
* Días de advertencia: El sexto campo indica el número de días antes de que expire la contraseña que el sistema advertirá al usuario. Un valor de 7 significa que el usuario será advertido siete días antes de que su contraseña expire.
* Días de inactividad: El séptimo campo muestra el número de días de inactividad después de la expiración de la contraseña, antes de que la cuenta sea bloqueada. Un valor de -1 significa que este parámetro no está configurado.
* Información adicional: En algunos casos, hay información entre paréntesis, como (Account locked) o (Password set, SHA512 hashing), que da un resumen sobre el estado de la cuenta o el tipo de cifrado de la contraseña.

# /etc/passwd
Fichero con información de los usuarios

```bash
cat /etc/passwd
```

| Atributo         | Definición                                                                                                                                                                                                                                                                               |
|------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Nombre**       | Especifica el nombre de inicio de sesión del usuario. Hay una serie de restricciones en la denominación de usuarios. Consulte el mandato mkuser para obtener más información.                                                                     |
| **Contraseña**   | Contiene un `*` (asterisco) que indica una contraseña no válida o un `!` (signo de exclamación) que indica que la contraseña está en el archivo `/etc/security/passwd`. En condiciones normales, el campo contiene un `!`. Si el campo tiene un `*` y se necesita una contraseña para la autenticación de usuario, el usuario no puede iniciar la sesión. |
| **UserID**       | Especifica el ID numérico exclusivo del usuario. Este ID se utiliza para el control de acceso discrecional. El valor es un entero decimal exclusivo.                                                                                              |
| **PrincipleGroup** | Especifica el ID de grupo principal del usuario. Debe ser el ID numérico de un grupo en la base de datos de usuario o un grupo definido por un servicio de información de red. El valor es un entero decimal exclusivo.                         |
| **gecos**        | Especifica información general sobre el usuario que no necesita el sistema, como una oficina o un número de teléfono. El valor es una serie de caracteres. El campo Gecos no puede contener dos puntos.                                           |
| **HomeDirectory** | Especifica el nombre completo de la vía de acceso del directorio de inicio del usuario. Si el usuario no tiene un directorio de inicio definido, se utiliza el directorio de inicio del usuario invitado. El valor es una serie de caracteres.  |
| **Shell**        | Especifica el programa inicial o shell que se ejecuta después de que un usuario invoque el mandato inicio de sesión o el mandato `su`. Si un usuario no tiene un shell definido, se utiliza `/usr/bin/sh`, el shell del sistema. El valor es una serie de caracteres que puede contener argumentos para pasar al programa inicial. |

### Ejemplos para visualizar información de los usuarios a través del fichero passwd
#### Visualizar el nombre de los usuarios
```bash
cat /etc/passwd | cut -d: -f1
```
#### Buscar un usuario en el fichero passwd
```bash
cat /etc/passwd | grep usuario1
```

#### Ver todos los usuarios que comienzan por usu
```bash
sudo grep ^usu /etc/passwd 
```

## BORRRAR USUARIOS

Borrar usuario1 y su directorio home
```bash
sudo userdel -r usuario1
```

# REPASO A GRUPOS (VISTO EN CLASE)

* Los grupos contienen usuarios
* Grupo real: es su grupo primario que consta en /etc/passwd. Es el grupo al que pertenece un usuario cuando inicia sesión.
* Grupo efectivo: mediante el comando newgrp se puede cambiar el grupo primario al que pertenece el usuario, y la configuración es efectiva hasta que cierre la seción o vuelva a cambiar de grupo efectivo.

## /etc/group

Contiene la información de los grupos

#### Ver el contenido de fichero group
```bash
cat /etc/group
```

### Contenido del fichero /etc/group
* passwd	Password que permite a un usuario cambiar de grupo. Si está vacío no requiere contraseña, y una x significa que se gestiona mediante el archivo /etc/gshadow.
* GID	Group ID. Identificador único (numérico) para el grupo.
* Miembros	Lista separada por comas con los nombres de usuario que pertenecen a ese grupo.

### COMANDOS
* groupadd – añade un nuevo grupo
* groupdel – borra un grupo
* groupmod – Modifica la información de /etc/groups

### Modificar el grupo primario a un usuario
```bash
usermod -g grupo1 usuario1
```
### Reemplazar el grupo secundario a un usuario. Cuidado que reemplaza sus grupos secundarios!!
```bash
usermod -G RRHH usuario2
```
# Añadir un grupo secundario al usuario de este modo mantiene sus grupos antiguos
```bash
usermod -a -G Marketing usuario2
```
# Ejercicios de Clase

## Ejercicio  1: Configuración de un Usuario Completo
crear un nuevo usuario llamado asir en el sistema para un proyecto específico. Este usuario necesita lo siguiente:

* Un directorio home personalizado en /home/asir1.
* La shell /bin/bash como shell de inicio.
* Un grupo primario propio y dos grupos secundarios, sudo y proxmox. (Si el grupo proxmox no existe, créalo).
* Un comentario que indique: "Usuario del proyecto asir".
* Una contraseña asignada inmediatamente después de crear el usuario.
* Configuración para forzar el cambio de contraseña en su primer inicio de sesión.
* Una fecha de expiración para el usuario, fijada en 2024-12-31.
Instrucciones: Ejecuta los comandos necesarios en el orden correcto para cumplir con cada uno de los requisitos y captura los resultados de cada paso en un documento.

## Ejercicio 2: Auditoría y Modificación de Usuarios Existentes
Realiza una auditoría de los usuarios en el sistema y luego realiza algunas configuraciones específicas:

* Verifica qué usuarios están actualmente conectados con el comando w.
* Entra en el sistema con los usuarios asir y usuario6 (si no los tienes créalos con la contraseña 1859 realiza varios logins y cierra sesión)
* Usa lastlog para ver la última vez que se conectaron los usuarios usuario_nuevo y usuario6.
* Cambia el directorio home de asir a /home/asir_iso.
* Agrega a usuario6 en el grupo Marketing sin eliminar los grupos secundarios actuales.
* Modifica el perfil de usuario6 para que expiren su contraseña y su acceso el 2024-12-31.
* 
