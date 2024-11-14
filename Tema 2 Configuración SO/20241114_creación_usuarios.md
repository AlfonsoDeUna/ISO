# Creación de usuarios

* Utilizamos el comando: **useradd**
* Puedes utilizas `adduser` es un script de perl que puedes añadir más información del usuario en la creación pero no es un comando

## /etc/passwd
Fichero con información de los usuarios

#### Visualiza el fichero

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


#### Crear un usuario básico
``` bash
sudo useradd usuario1
```

### Crear un usuario mediante el script adduser
```bash
sudo adduser ejemplo
```

#### Crear un usuario y especificar su directorio home
 ``` bash
sudo useradd -m -d /home/usuario_personalizado usuario2
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

#### Crear un usuario con un grupo secundario y un grupo principal personalizado
``` bash
sudo useradd -m -g developers -G sudo usuario12
```

#### crear un usuario con privilegios de root en linux
```bash
useradd -u 0 -o -g 0 usuarioroot
```

## BORRRAR USUARIOS


Borrar usuario1 y su directorio home
```bash

sudo userdel -r usuario1
```
