# Tutorial sobre el comando `ps` en Linux

El comando `ps` (Process Status) en Linux se utiliza para mostrar una lista de los procesos que están ejecutándose en el sistema. Es una herramienta muy útil para conocer el estado de los procesos, su identificación, uso de CPU, memoria, y otros detalles.

## 1. Introducción al comando `ps`

El comando `ps` sin opciones muestra los procesos asociados con la terminal actual. Es decir, solo se mostrarán los procesos que están corriendo en la misma sesión.

### Ejemplo básico:
#### [Captura un pantallazo de lo siguiente]
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

### Ejercicio: Ejecuta ps -aux ¿Qué diferencias ves con respecto ps -e? Responde y pon un pantallazo de ambas salidas

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

---
#### Otra forma de obtener más información de un proceso concreto
Lanza el navegador firefox para poder filtrar el o los procesos que se han lanzado en el programa.
```bash
ps -aux | grep firefox
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

## 7.  Lanzar un programa en segundo plano

#### Ejemplo 1: usando `sleep`
```bash
sleep 60 &
```
#### [Captura un pantallazo de lo siguiente]
#### Ejecuta ps -e  varias veces y observa como la columna TIME muestra el tiempo. 

## Ejercicios propuestos:

### Ejercicio 1: Procesos básicos
1. Usa el comando `ps` para listar los procesos asociados con tu sesión de terminal muestra un pantallazo.
2. Explica qué significan las columnas que aparecen en la salida.
   
### Ejercicio 2: Listar todos los procesos
1. Usa el comando `ps -e` para listar todos los procesos en ejecución.
   
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
4. Detén el proceso usando `kill` seguido del PID.

### EJERCICIOS MÁS AVANZADOS

# Actividad paso a paso

## 1. Lanzar un programa en segundo plano
Lanza un programa sencillo que se ejecute durante unos segundos para observar cómo aparece en la lista de procesos.  

### Ejemplo 1: usando `sleep`

```bash
sleep 60 &
```
Esto ejecuta el comando `sleep` (que hace que el sistema espere 60 segundos) en segundo plano.  
Luego, piden a los alumnos que ejecuten:

```bash
ps -e | grep sleep
```


### Ejemplo 2: usando `yes`

```bash
yes > /dev/null &
```

El comando `yes` genera una salida infinita de 'y', pero redirigida a `/dev/null`, lo que impide que se muestre en la terminal.  
Los alumnos pueden buscar este proceso con:

```bash
ps -e | grep yes
```
Para hacerlo más dinámico, puedes hacer que usen:

```bash
watch -n 1 'ps -e | grep yes'
```

---
## Responde a las siguientes preguntas
¿Qué diferencia existe en la columna tiempo entre el ejemplo 1 y el ejemplo 2? ¿Por qué el Time en el primer ejemplo no pasa el tiempo y sí en el segundo?
Pon un ejemplo de un proceso que hayamos ejecutado y un servicio que hayamos ejectuado. Acuardate que los procesos eran los actores y los servicios el personal que está ayudando a la obra de teatro pero no se ve. ¿Cómo lo relacionaes con lo que hemos visto?

---

### Ejemplo: ejecutar un editor de texto

```bash
nano
```

Mientras el programa `nano` (o cualquier otro programa interactivo como `top`) esté en ejecución, abre otro terminal y ejecuta:

```bash
ps -e | grep nano
```

el proceso está asociado a un **TTY** (por ejemplo, tty1), lo que indica que está siendo controlado directamente por el terminal de usuario.

---
## 6. ESTADOS DE UN PROCESO.
Los procesos tiene vida, es decir, pueden estar ejecutándose o en espera de algún recurso para ejectuarse, pueden morir, o bien pueden estar en un estado perdido,
que denomina zombie.

### Ejercicio: busca una imagen de los estados de los procesos, verás un diagrama con los estados y sus interacciones. Explica esas interacciones de qué estado a qué estado van.

Para visualizar el estado de un proceso esta la columna STAT
```bash
ps aux
```
Estados principales (primer carácter)
* R:  Ejecutando
* S:  Esperando
* D: Esperando E/S
* Z:  Zombie. No responde
* T:  Stopped o pausa

Estados adicionales (caracteres adicionales)
* <: Alta prioridad 
* N: Baja prioridad 
* s: Es un proceso padre
* l: Es un hilo.
* +: Primer plano

### Ejercicio: A partir del ps -aux visualiza varios estados y explica la columna STAT y sus combinaciones, ¿Puedes ver algún estado en pausa o ejecutando? ¿Algún proceso
de alta prioridad? ¿Puedes ver los procesos padres? Obtén toda la información que puedas comentando los ejemplos que ves en tu propia máquina.
---
## 7. Desafío final
ejecutar varios programas de fondo con tiempos diferentes y que intenten identificar sus procesos por el **PID**, observando qué procesos consumen más tiempo de CPU en la columna **TIME**.

### Ejemplo de programa:

```bash
for i in {1..10}; do echo "Running iteration $i"; sleep 1; done &
```

Esto ejecutará un bucle que se repite 10 veces, durmiendo 1 segundo en cada iteración.  
Pueden seguir su progreso con:

```bash
ps -e | grep bash
```


