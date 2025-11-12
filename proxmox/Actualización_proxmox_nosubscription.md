# Práctica: Configuración de Repositorios `no-subscription` en Proxmox

Esta práctica se centra en la modificación de los archivos de configuración para poder recibir actualizaciones del repositorio público de Proxmox (sin suscripción) y deshabilitar el repositorio de pago (*enterprise*).

### **Objetivo**

Configurar el sistema Proxmox VE para utilizar los repositorios de actualizaciones **gratuitos** y deshabilitar los repositorios *enterprise* en los archivos principales de *apt*.

### **Requisitos**

  * Acceso al Shell (SSH o Consola web) del nodo Proxmox VE.
  * Conocimiento básico del editor de texto `nano` o `vi`.

### **Instrucciones Paso a Paso**

#### **1. Deshabilitar el Repositorio *Enterprise* de PVE (Proxmox Virtual Environment)**

El repositorio *enterprise* es el de suscripción y debe ser desactivado.

  * Abre el archivo de configuración del repositorio Proxmox VE *enterprise*:

    ```bash
    nano /etc/apt/sources.list.d/pve-enterprise.list
    ```

  * Comenta la línea que encuentres (generalmente es la única) añadiendo un `#` al inicio.

    **Debe quedar así:**

    ```
    # deb https://enterprise.proxmox.com/debian/pve bookworm pve-enterprise
    ```

  * Guarda el archivo y ciérralo. (En `nano`: `Ctrl+O`, `Enter`, `Ctrl+X`).

#### **2. Añadir el Repositorio `no-subscription` de PVE**

Ahora agregaremos la línea del repositorio público al archivo principal de *apt*.

  * Abre el archivo principal de fuentes de *apt*:

    ```bash
    nano /etc/apt/sources.list
    ```

  * Busca la sección donde están definidos los repositorios y **añade la siguiente línea al final del archivo** (o donde se indique la sección de Proxmox):

    ```
    deb http://download.proxmox.com/debian/pve bookworm pve-no-subscription
    ```

  * Guarda el archivo y ciérralo.

#### **3. Modificar el Repositorio de Ceph (si aplica)**

Si estás utilizando **Ceph** y no tienes suscripción, debes modificar su archivo de repositorio de manera similar.

  * Abre el archivo de configuración de Ceph:

    ```bash
    nano /etc/apt/sources.list.d/ceph.list
    ```

  * **Comenta la línea *enterprise* y añade la línea *no-subscription***. El resultado final debe ser similar a:

    ```
    # deb https://enterprise.proxmox.com/debian/ceph/ceph-quincy bookworm enterprise
    deb http://download.proxmox.com/debian/ceph/ceph-quincy bookworm no-subscription
    ```

  * Guarda el archivo y ciérralo.

#### **4. Actualizar la Lista de Paquetes**

Una vez cambiados los archivos, debes refrescar la lista de paquetes disponibles.

  * Ejecuta el comando:

    ```bash
    apt update
    ```

  * **Verificación:** Si la configuración fue exitosa, no deberías ver errores de conexión a las URLs `enterprise.proxmox.com`.

#### **5. Realizar una Actualización Completa del Sistema**

Finalmente, actualiza los paquetes del sistema.

  * Ejecuta el comando:

    ```bash
    apt dist-upgrade
    ```
