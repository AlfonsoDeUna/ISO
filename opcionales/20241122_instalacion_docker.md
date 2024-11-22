# instalación de docker comunity edition en Ubuntu

Aunque Ubuntu trae en sus repositorios una versión de Docker docker.io nosotros vamos a instalar la última versión 
docker.ce. Siempre es mejor estar trabajando con la última versión porque Ubuntu no suele actualizar y estar al día
de los cambios de docker por estabilidad de sus versiones. 

Los 7 pasos son:


#### 1. Instala los paquetes necesarios para añadir los repositorios oficiales de docker
En este paso con apt-get install instalamos aplicaciones que vamos a necesitar para la instalación de docker

```bash
sudo apt-get install -y curl apt-transport-https ca-certificates software-properties-common
```
* curl es una herramienta para la transferencia de datos desde y hacia un servidor mediante http y https es lo más parecido a un navegador de texto
* apt-transport-https es una aplicación de apt que permite transferir datos en el protocolo https. Sin este paquete si un repositorio hay que llamarlo por https no podría hacerlo la herramienta apt de linux (ubuntu)
* ca-certificates es lo que permite a los ordenadores trabajar con certificados cuando nos conectamos a una conexión https nos descargamos un certificado para fiarnos de la dirección
* software-properties-common son scripts y herramientas para trabajar con los repositorios de linux y poder agregarlo, los repositorios son como una base de datos como una especide marketplace. este paquete ayuda a que podamos añadirlos al sistema
* 

#### 2. Agrega la clave GPG de Docker
```bash
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```
* curl hace una llamada a esa dirección que descarga unas claves del servidor de docker esas claves las añadimos a nuestro programa apt para que se fie de docker
  * -f: Falla silenciosamente si el servidor devuelve un error HTTP.
  * -s: Ejecuta el comando en modo "silencioso", para no mostrar el progreso de la descarga.
  * -S: Si ocurre un error, mostrará detalles.
  * -L: Sigue redirecciones en caso de que la URL original redireccione a otra URL.

#### 3. Agrega el repositorio oficial de Docker
```bash
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
```
Este es el repositorio de docker oficial para descargarnos el aplicativo
* add-apt-repository lo agrega a una lista de direcciones donde busca los programas cuando los instsalamos con apt-install
* Lo agrega aquí en este fichero /etc/apt/sources.list.d/ que es donde están los repositoriso externos a ubuntu y el fichero /etc/apt/sources.list donde están los repositorios oficiales de ubuntu

#### 4. Actualiza la información de los repositorios
```bash
sudo apt update
```

#### 5. Verifica el repositorio y las versiones de Docker disponibles
```bash
apt-cache policy docker-ce
```
* apt-cache muestra información de los repositorios del sistema en concreto este comando es un comando para verificar sobre docker-ce
* nos muestra si está instalado: Installed: si pone (none) es que no está sino nos mostraría la versión que está instalada
* La versión que te instalas la candidate:
* Lista todas las direcciones donde podría instalarse el programa o paquete el número del final que aparece (suele ser 500) es la prioridad
  
#### 6. Instala Docker Community Edition
```bash
sudo apt install -y docker-ce
```
#### 7. Comprueba el estado de Docker para confirmar que está funcionando correctamente
```bash
sudo systemctl status docker
```
Systemctl es un comando muy importante que lo utilizaremos mucho porque maneja los servicios del sistema, podemos iniciar, parar, reiniciar, ver el estado como en este caso. Del servicio de Docker


