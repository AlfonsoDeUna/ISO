# Comando `find`

## comandos básicos (lista para dar en clase)

**`find`**  
   Busca en el directorio donde te encuentras actualmente.

**`find /dir`**  
   Busca dentro de un directorio específico (`/dir`).

**`find /dir -name "nombre"`**  
   Busca archivos o directorios con un nombre exacto.

**`find /dir -name "*.log"`**  
   Busca todos los archivos con extensión `.log`.  
   - Sensible a mayúsculas y minúsculas.

 **`find /dir -iname "*.Log"`**  
   Busca archivos con extensión `.log`, ignorando mayúsculas y minúsculas.

**`find / -maxdepth 2 -name "*.php"`**  
   Busca archivos con extensión `.php` dentro de un nivel de profundidad máximo de 2.

**`find / -not -name "*.log"`**  
   Busca todos los archivos excepto los que tienen la extensión `.log`.

 **`find / -name "*.c" -o -name "*.txt"`**  
   Busca archivos con extensión `.c` o `.txt` (operador OR).

 **`find / -type d`**  
   Busca solo directorios.

 **`find / -type f`**  
   Busca solo archivos.

**`find / -type f -perm 0664 -o -perm 0777`**  
   Busca archivos con permisos específicos: `0664` o `0777`.

   ## Ejemplos de Blueteam

   
El comando `find` es una herramienta poderosa en Linux que puede ser utilizada por equipos de seguridad (Blue Team) para realizar diversas tareas relacionadas con la seguridad, auditorías y respuesta a incidentes. Aquí tienes algunos ejemplos prácticos:


### **Buscar archivos con permisos específicos**  
Identificar archivos con permisos inseguros, como aquellos que son accesibles para todos (777).  
```bash
find / -type f -perm 0777
```

### **Detectar archivos con propietarios específicos**  
Buscar archivos creados o modificados por un usuario o grupo específico. Esto puede ayudar a detectar actividades inusuales.  
```bash
find /home -user usuario_sospechoso
find /home -group grupo_sospechoso
```

### **Localizar archivos modificados recientemente**  
Identificar archivos modificados en las últimas 24 horas, útil para investigar incidentes de seguridad.  
```bash
find /var/log -type f -mtime -1
```

### **Buscar archivos ocultos**  
Listar todos los archivos ocultos en un directorio específico, incluyendo aquellos que podrían ser sospechosos.  
```bash
find / -type f -name ".*"
```

### **Encontrar archivos de gran tamaño**  
Detectar archivos que ocupan mucho espacio, lo cual podría indicar almacenamiento de datos no autorizados.  
```bash
find / -type f -size +500M
```

### **Buscar archivos con extensiones específicas**  
Identificar archivos potencialmente maliciosos, como scripts con extensiones `.sh`, `.py`, o ejecutables.  
```bash
find / -type f -name "*.sh"
```

### **Auditar archivos sin acceso reciente**  
Buscar archivos que no han sido accedidos en un tiempo prolongado, útil para auditorías de limpieza y seguridad.  
```bash
find /var/log -type f -atime +30
```

### **Detectar archivos con nombres sospechosos**  
Identificar archivos con nombres que pueden estar relacionados con malware o actividad no deseada.  
```bash
find / -type f -name "*backdoor*" -o -name "*.tmp"
```

### **Buscar archivos ejecutables en ubicaciones no habituales**  
Identificar archivos ejecutables en directorios donde no deberían estar.  
```bash
find /home -type f -executable
```

### **Integración con otras herramientas**  
Ejecutar comandos sobre los archivos encontrados para análisis más profundo, como calcular su hash.  
```bash
find / -type f -name "*.log" -exec sha256sum {} \;
```

### **Buscar archivos con fechas de creación específicas**  
Detectar archivos creados en una fecha o rango de fechas determinado para investigar cambios recientes.  
```bash
find / -type f -newermt "2024-01-01" ! -newermt "2024-01-02"
```

### *Identificar archivos de configuración modificados recientemente**  
Útil para detectar cambios sospechosos en configuraciones críticas del sistema.  
```bash
find /etc -type f -mtime -7
```

### **Detectar archivos con permisos de SUID o SGID**  
Identificar archivos que tienen permisos SUID o SGID, los cuales podrían ser explotados por atacantes.  
```bash
find / -perm /4000
find / -perm /2000
```
teoria de SUID Y SGID
https://itsfoss.com/es/linux-suid-guid-sticky-bit/

### **Buscar archivos en directorios temporales**  
Examinar directorios temporales en busca de scripts o archivos que podrían haberse utilizado para actividades maliciosas.  
```bash
find /tmp -type f
```

### **Buscar archivos que contienen texto específico**  
Detectar archivos que contengan información sensible o palabras clave relacionadas con datos confidenciales.  
```bash
find / -type f -exec grep -l "contraseña" {} \;
```

### *Identificar archivos con extensiones no deseadas en directorios web**  
Buscar archivos peligrosos como `.php`, `.sh` o `.js` en directorios accesibles por el servidor web.  
```bash
find /var/www -type f \( -name "*.php" -o -name "*.sh" \)
```

### **Localizar archivos con nombres largos o extraños**  
Buscar archivos cuyo nombre excede un límite específico, ya que esto puede ser un indicador de intento de evasión.  
```bash
find / -type f -name "$(printf "%*s" 255 | tr ' ' '?')"
```

### **Buscar archivos con enlaces duros sospechosos**  
Identificar archivos que tienen más de un enlace físico, ya que esto podría ser usado para ocultar malware.  
```bash
find / -type f -links +1
```
teoria enlaces duros y blandos: 
https://www.freecodecamp.org/espanol/news/tutorial-de-symlink-en-linux-como-crear-y-eliminar-un-enlace-simbolico/#:~:text=Los%20enlaces%20blandos%20son%20similares,un%20sistema%20de%20archivos%20diferente.


###  **Examinar archivos ejecutables en directorios de usuario**  
Auditar scripts o binarios ejecutables que los usuarios podrían haber colocado en sus propios directorios.  
```bash
find /home -type f -perm /111
```

###  **Listar todos los archivos encriptados**  
Detectar posibles archivos encriptados que podrían estar almacenando datos robados.  
```bash
find / -type f -exec file {} \; | grep "encrypted"
```

## PRÁCTICA:

A partir de los ejercicios vistos en clase crea con el comando find de manera libre para cubrir los siguientes puntos:

1. **Identificación de permisos inseguros y auditoría de usuarios**  
Una de las primeras medidas en un análisis de seguridad consiste en detectar archivos con permisos inseguros (como 777) que puedan ser explotados. Además, es crucial buscar archivos creados o modificados por usuarios o grupos sospechosos para identificar actividades inusuales en el sistema.

2. **Monitoreo de cambios recientes y detección de actividad sospechosa**  
Es fundamental localizar archivos modificados en las últimas 24 o 48 horas para investigar incidentes recientes, así como listar archivos ocultos en directorios sensibles, como `/var` o `/tmp`, que podrían contener elementos maliciosos.

3. **Análisis de almacenamiento y auditoría de limpieza**  
Detectar archivos de gran tamaño permite identificar posibles casos de almacenamiento indebido, mientras que buscar archivos que no han sido accedidos en meses ayuda a optimizar el sistema y eliminar datos innecesarios.

4. **Evaluación de configuraciones y detección de posibles amenazas**  
El análisis de archivos ejecutables en ubicaciones no habituales, como `/tmp` o `/home`, permite detectar posibles amenazas. También es útil calcular el hash de archivos críticos, como los de configuración en `/etc`, para verificar su integridad y detectar cambios sospechosos.

5. **Investigación de incidentes web y auditorías en sistemas accesibles**  
En sistemas con servidores web, es crucial buscar archivos con extensiones peligrosas como `.php` o `.sh` en directorios públicos, así como localizar nombres de archivos asociados a malware, como 'exploit' o 'backdoor', para evitar compromisos en la seguridad del sitio.

6. **Auditoría avanzada y detección de intentos de evasión**  
Buscar archivos con permisos SUID o SGID ayuda a identificar configuraciones que podrían ser explotadas. Además, localizar archivos con nombres excesivamente largos o múltiples enlaces físicos permite detectar intentos de evasión o de ocultar malware.


