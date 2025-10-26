# Configuración de red con netplan

## IR AL DIRECTORIO DE CONFIGURACIÓN DE Netplan
``` bash
cd /etc/netplan
```
## ESTE PASO SOLO NECESARIO SI ÚNICAMENTE TIENES EL FICHERO 01-network-manager-all.yaml
### COPIAR EL FICHERO  01-network-manager-all.yaml con el nombre 02-network-manager-all.yaml
```bash
sudo cp  01-network-manager-all.yaml  02-network-manager-all.yaml
```
 
## EDITAR EL FICHERO 
```bash
sudo nano 02-network-manager-all.yaml
```

### La configuración con la que viene es para la configuración por DHCP
```
network:
  version: 2
  renderer: networkd
  ethernets:
    enp0s3:
      dhcp4: true
```

## VAMOS A CONFIGURAR CON IP ESTÁTICA 

Para empezar nos tienen que dar los datos de conexión

```
máquina virtual 1: 192.168.4.25/24
Gateway 192.168.4.1
DNS 8.8.8.8 8.8.4.4
```

### EN ESTA PÁGINA NOS AYUDA A GENERAR LA PLANTILLA AÑADIENDO LOS DATOS
https://netplancfg.com/

### LA CONFIGURACIÓN FINAL DE NETPLAN PARA UNA IP FIJA CON LOS DATOS DE CONEXIÓN QUE NOS HAN DADO SERÍA:

ESTE TEXTO TIENES QUE PEGARLO DENTRO DEL EDITOR NANO EN EL FICHEOR ABIERTO 02-network-manager-all.yaml
```
network:
  version: 2
  renderer: networkd
  ethernets:
    enp0s3:
      dhcp4: false
      addresses: [192.168.4.25/24]
      gateway4: 192.168.1.1
      nameservers:
        addresses: [8.8.8.8, 8.8.4.4]
```

## PROBAR QUE FUNCIONA LA CONFIGURACIÓN
```bash
sudo netplan try
```
si todo ha ido bien y no hay errores podemos perfectamente ejecutar lo siguiente para que aplique los cambios a la interfaz de rez

## APLICAR LOS CAMBIOS DE LA CONFIGURACIÓN DE RED
```bash
sudo netplan apply
```

## EJERCICIO: EN LA MÁQUINA CLONADA REALIZA LA CONFIGURACIÓN DE RED MEDIANTE NETPLAN

### DATOS DE CONEXIÓN
```
máquina virtual 2 (clonada): 192.168.4.26/24
Gateway 192.168.4.1
DNS 8.8.8.8 8.8.4.4
```

## UNA VEZ CONFIGURADO REALIZA UN PING ENTRE LAS MÁQUINAS
