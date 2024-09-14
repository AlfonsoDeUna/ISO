# Tutorial sobre el comando `ps` en Linux

El comando `ps` (Process Status) en Linux se utiliza para mostrar una lista de los procesos que están ejecutándose en el sistema. Es una herramienta muy útil para conocer el estado de los procesos, su identificación, uso de CPU, memoria, y otros detalles.

## 1. Introducción al comando `ps`

El comando `ps` sin opciones muestra los procesos asociados con la terminal actual. Es decir, solo se mostrarán los procesos que están corriendo en la misma sesión.

### Ejemplo básico:

```bash
ps
```

Esto mostrará una tabla con las siguientes columnas:

- **PID**: Process ID, el identificador único del proceso.
- **TTY**: El terminal asociado al proceso.
- **TIME**: El tiempo de CPU consumido.
- **CMD**: El comando que lanzó el proceso.

### Ejemplo:

```bash
  PID TTY          TIME CMD
 2345 pts/0    00:00:00 bash
 2467 pts/0    00:00:00 ps
```

## 2. Mostrar todos los procesos del sistema

Para ver todos los procesos que se ejecutan en el sistema, puedes usar la opción `-e`.

```bash
ps -e
```

Este comando mostrará todos los procesos en ejecución, sin importar la terminal. Es muy útil para obtener una visión general del sistema.

### Ejemplo:

```bash
  PID TTY          TIME CMD
    1 ?        00:00:02 systemd
    2 ?        00:00:00 kthreadd
    3 ?        00:00:00 rcu_gp
  ...
```
### Columnas importantes:

1. **PID (Process ID)**:
   - El **ID de proceso** es un número único que el sistema operativo asigna a cada proceso en ejecución. Cada cosa que se ejecute en el ordenador tiene un número que lo identifica, se como nuestro nombre

2. **TTY (Terminal Type)**:
   - Muestra el tipo de terminal (TTY) desde el cual el proceso fue iniciado. Es el programa donde hemos lanzado los programas, qterminal

3. **TIME**:
   - Es el tiempo de CPU que el proceso ha consumido desde que comenzó a ejecutarse. Se muestra en el formato `minutos:segundos`.
   - En el ejemplo, el proceso `systemd` ha usado `00:00:02` de tiempo de CPU, mientras que `ps` ha usado `00:00:01`.

4. **CMD (Command)**:
   - Es el nombre del comando o proceso que está en ejecución.
   - Por ejemplo, en la salida se ven procesos como `systemd`, `bash`, y `dbus-daemon`, que son nombres de comandos ejecutándose.



## Ejecuta ps -A ¿Qué diferencias ves con respecto ps -e?


## 3. Mostrar más detalles de los procesos

Puedes obtener más detalles de los procesos utilizando la opción `-f` para un formato más completo. 

```bash
ps -ef
```

Esto mostrará detalles adicionales como el UID (usuario que inició el proceso), PPID (ID del proceso padre), y más.

### Ejemplo:

```bash
UID        PID  PPID  C STIME TTY          TIME CMD
root         1     0  0 09:30 ?        00:00:02 /sbin/init
root         2     0  0 09:30 ?        00:00:00 [kthreadd]
```

## 4. Filtrar procesos por nombre

Puedes buscar un proceso específico utilizando la opción `-C` seguido del nombre del comando.

```bash
ps -C bash
```

Este comando solo mostrará los procesos que corresponden al comando `bash`.

### Ejemplo:

```bash
  PID TTY          TIME CMD
 2345 pts/0    00:00:00 bash
```

## 5. Mostrar procesos en tiempo real

El comando `top` es una alternativa para ver procesos en tiempo real, pero también puedes usar `ps` en combinación con `watch` para una vista actualizable cada pocos segundos.

```bash
watch ps -e
```

## 6. Matar un proceso con `ps` y `kill`

Una vez que encuentras un proceso que deseas detener, puedes usar el comando `kill` seguido del PID del proceso.

1. Encuentra el proceso usando `ps -e` o cualquier otra opción.
2. Usa el comando `kill` seguido del PID.

```bash
kill 2345
```

## Ejercicios propuestos:

### Ejercicio 1: Procesos básicos
1. Usa el comando `ps` para listar los procesos asociados con tu sesión de terminal.
2. Explica qué significan las columnas que aparecen en la salida.
   
### Ejercicio 2: Listar todos los procesos
1. Usa el comando `ps -e` para listar todos los procesos en ejecución.
2. Busca el proceso `bash` utilizando `ps -C bash` y anota su PID.
   
### Ejercicio 3: Detallar procesos
1. Usa el comando `ps -ef` para mostrar todos los procesos en un formato detallado.
2. Explica qué significan las columnas UID, PID, PPID y CMD.

### Ejercicio 4: Monitorizar en tiempo real
1. Usa el comando `watch ps -e` para monitorizar los procesos en tiempo real.
2. Observa cómo cambia la lista de procesos y qué procesos desaparecen o aparecen.

### Ejercicio 5: Matar un proceso
1. Ejecuta un proceso simple en segundo plano, por ejemplo, un ping a una dirección:

```bash
ping 8.8.8.8
```
2. Usa `ps -e` para encontrar el PID del proceso `ping`.
3. Detén el proceso usando `kill` seguido del PID.

