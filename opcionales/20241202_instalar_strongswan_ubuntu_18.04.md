# Configuración de un Servidor VPN IKEv2 con StrongSwan en Ubuntu 18.04

## Introducción
Una red privada virtual (VPN) permite cifrar de forma segura el tráfico que viaja a través de redes no confiables, como cafeterías, conferencias o aeropuertos. 

IKEv2 (Intercambio de Claves de Internet v2) es un protocolo que permite el túnel directo IPSec entre servidor y cliente. En este tutorial configuraremos un servidor VPN IKEv2 con StrongSwan en un servidor Ubuntu 18.04.

---

## Prerrequisitos
- Servidor Ubuntu 18.04 con un usuario no root con privilegios sudo y un firewall configurado.

---

## Paso 1 — Instalación de StrongSwan
1. Actualiza la caché de paquetes:
    ```bash
    sudo apt update
    ```
2. Instala StrongSwan y el componente PKI:
    ```bash
    sudo apt install strongswan strongswan-pki
    ```

---

## Paso 2 — Creación de una Autoridad de Certificación (CA)
1. Crea los directorios para los certificados y claves:
    ```bash
    mkdir -p ~/pki/{cacerts,certs,private}
    chmod 700 ~/pki
    ```
2. Genera una clave raíz para la CA:
    ```bash
    ipsec pki --gen --type rsa --size 4096 --outform pem > ~/pki/private/ca-key.pem
    ```
3. Crea un certificado raíz de la CA:
    ```bash
    ipsec pki --self --ca --lifetime 3650 --in ~/pki/private/ca-key.pem \
        --type rsa --dn "CN=VPN root CA" --outform pem > ~/pki/cacerts/ca-cert.pem
    ```

---

## Paso 3 — Generación de un Certificado para el Servidor VPN
1. Genera una clave privada para el servidor:
    ```bash
    ipsec pki --gen --type rsa --size 4096 --outform pem > ~/pki/private/server-key.pem
    ```
2. Crea y firma el certificado del servidor:
    ```bash
    ipsec pki --pub --in ~/pki/private/server-key.pem --type rsa \
        | ipsec pki --issue --lifetime 1825 \
            --cacert ~/pki/cacerts/ca-cert.pem \
            --cakey ~/pki/private/ca-key.pem \
            --dn "CN=server_domain_or_IP" --san "server_domain_or_IP" \
            --flag serverAuth --flag ikeIntermediate --outform pem \
        >  ~/pki/certs/server-cert.pem
    ```
3. Mueve los archivos generados al directorio de configuración:
    ```bash
    sudo cp -r ~/pki/* /etc/ipsec.d/
    ```

---

## Paso 4 — Configuración de StrongSwan
1. Respaldar el archivo de configuración por defecto:
    ```bash
    sudo mv /etc/ipsec.conf{,.original}
    ```
2. Crear un nuevo archivo de configuración:
    ```bash
    sudo nano /etc/ipsec.conf
    ```
3. Configura el archivo `/etc/ipsec.conf` con el siguiente contenido:
    ```plaintext
    config setup
        charondebug="ike 1, knl 1, cfg 0"
        uniqueids=no

    conn ikev2-vpn
        auto=add
        compress=no
        type=tunnel
        keyexchange=ikev2
        fragmentation=yes
        forceencaps=yes
        dpdaction=clear
        dpddelay=300s
        rekey=no
        left=%any
        leftid=@server_domain_or_IP
        leftcert=server-cert.pem
        leftsendcert=always
        leftsubnet=0.0.0.0/0
        right=%any
        rightid=%any
        rightauth=eap-mschapv2
        rightsourceip=10.10.10.0/24
        rightdns=8.8.8.8,8.8.4.4
        rightsendcert=never
        eap_identity=%identity
    ```
4. Guarda y cierra el archivo.

---

## Paso 5 — Configuración de Credenciales de Usuario
1. Configura credenciales para que los usuarios puedan conectarse al servidor VPN. Puedes usar métodos como `eap-mschapv2` configurado previamente en el archivo.

---

## Paso 6 — Prueba y Depuración
1. Reinicia StrongSwan:
    ```bash
    sudo systemctl restart strongswan
    ```
2. Verifica el estado del servicio:
    ```bash
    sudo systemctl status strongswan
    ```
3. Conecta los clientes y verifica que puedan establecer un túnel seguro.

---

Puedes conectarte desde diferentes dispositivos como Windows, macOS, Ubuntu, iOS y Android.
