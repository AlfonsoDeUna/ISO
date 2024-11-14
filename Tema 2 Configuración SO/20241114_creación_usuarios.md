# Creación de usuarios

1. Crear un usuario básico
``` bash
sudo useradd usuario1
```
2. Crear un usuario y especificar su directorio home
 ``` bash
sudo useradd -m -d /home/usuario_personalizado usuario2
```  
3. Crear un usuario y definir su shell de inicio
``` bash
sudo useradd -m -s /bin/bash usuario3
```
7. Crear un usuario con un grupo predeterminado
``` bash
sudo useradd -m -g grupo1 usuario5
```
9. Crear un usuario y añadirlo a varios grupos
```bash
sudo useradd -m -G sudo,docker usuario6
```
10. Crear un usuario con una fecha de expiración
``` bash
sudo useradd -m -e 2024-12-31 usuario7
```
12. Crear un usuario y asignar un comentario
``` bash
sudo useradd -m -c "comentario" usuario8
```
13. Crear un usuario con contraseña al instante
``` bash
sudo useradd -usuario8
sudo passwd usuario8

```
15. Crear un usuario y forzar cambio de contraseña en el primer inicio
``` bash
sudo passwd -e usuario8
```

18. Crear un usuario con un grupo secundario y un grupo principal personalizado
``` bash
sudo useradd -m -g developers -G sudo usuario12
```
