# GUÍA PARA MODIFICAR LA IP DEL SERVIDOR PROXMOX

## 1\. Editar el archivo de configuración de red

Este archivo define la dirección IP estática, la máscara de red y la puerta de enlace de tu servidor.

1.  Abre el archivo `/etc/network/interfaces` con un editor de texto, como `nano`:

    ```bash
    nano /etc/network/interfaces
    ```

2.  Busca la sección correspondiente a tu interfaz de red principal (comúnmente `vmbr0`).

3.  Modifica las líneas `address` (tu nueva IP) y `netmask` (tu nueva máscara de red). Si también cambia, actualiza la línea `gateway` (puerta de enlace).

    **Ejemplo (antes):**

    ```
    auto vmbr0
    iface vmbr0 inet static
            address 192.168.1.3/24
            gateway 192.168.1.1
            bridge-ports eno1
            bridge-stp off
            bridge-fd 0
    ```

    **Ejemplo (después):**

    ```
    auto vmbr0
    iface vmbr0 inet static
            address 192.168.2.3/22  <-- Nueva IP y/o máscara
            gateway 192.168.2.1  <-- Nueva puerta de enlace (si aplica)
            bridge-ports eno1
            bridge-stp off
            bridge-fd 0
    ```

4.  Guarda los cambios y cierra el editor (en `nano`, es `Ctrl + O` para guardar y `Ctrl + X` para salir).


## 2\. Editar el archivo hosts

Este archivo mapea nombres de host a direcciones IP. Es crucial actualizarlo para que los servicios internos de Proxmox funcionen correctamente.

1.  Abre el archivo `/etc/hosts` con un editor:

    ```bash
    nano /etc/hosts
    ```

2.  Busca la línea que tiene tu antigua dirección IP y el nombre de tu servidor (hostname).

3.  Reemplaza la **antigua IP** por la **nueva IP**.

    **Ejemplo (antes):**

    ```
    127.0.0.1       localhost
    192.168.1.3     pveserver.tu.dominio pveserver
    ```

    **Ejemplo (después):**

    ```
    127.0.0.1       localhost
    192.168.2.3     pveserver.tu.dominio pveserver  <-- IP actualizada
    ```

4.  Guarda los cambios y cierra el editor.



## 3\. Aplicar los cambios

Para que los nuevos ajustes de red tengan efecto, la forma más sencilla y segura es reiniciar el servidor:

```bash
reboot
```

Después del reinicio, deberías poder acceder a la interfaz web de Proxmox usando la **nueva dirección IP**.

**Nota adicional:** Si también cambiaste de subred, es posible que necesites actualizar la configuración de DNS en la pestaña `Sistema > DNS` de la interfaz gráfica de Proxmox o editando el archivo `/etc/resolv.conf` después de reiniciar.
