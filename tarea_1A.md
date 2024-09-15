# Tutorial sobre el comando `ps` en Linux

El comando `ps` (Process Status) en Linux se utiliza para mostrar una lista de los procesos que están ejecutándose en el sistema. Es una herramienta muy útil para conocer el estado de los procesos, su identificación, uso de CPU, memoria, y otros detalles.

Los procesos son unas estructuras que crean los sistemas operativos para que se pueda ejecutar cosas en un ordenador de manera optimizada. Para que se pueda ejecutar cualquier tarea, se necesita que el procesador pueda ejecutar en un momento dado. Es decir, que no esté ocupado con otra tarea, memoria para guardar los pasos que están programados en la propia tarea y los datos que necesite para completar la tarea. 

A veces es necesario que para obtener información el ordenador tenga que preguntar a otros dispositivos como un disco duro, un teclado o mostrar cierta información en pantalla, estas acciones se denominan operaciones de Entrada/Salida E/S. 

De modo que un sistema operativo es un elemento intermedio entre el hardware y nosotros que optimiza el uso de la máquina. Necesita controlar los procesos (tareas que ejecuta la máquina), la memoria (donde guarda datos e instrucciones a ejecutar asociadas a los procesos) y la E/S (recursos externos). Un sistema operativo está construido mediante subsistemas o funciones para facilitar su implementación de otro modo es una tarea muy difícil. Por tanto los sistemas operativos suelen ser construidos de forma jerárquica, antiguamente eran un solo programa donde estaba todo programado, se denominaban monolíticos. (de una sola pieza).

Todo sistema operativo tiene su Subsistema de procesos, Subsistema de memoria, subsistema de E/S y ficheros. Básicamente esto es lo que controla un sistema operativo. Estos subsistemas forman parte de lo más interno del sistema operativo que se denomina Kernel.

En esta práctica vamos a ver cómo gestiona el sistema operativo los procesos mediante ps. Puede ser muy útil si la máquina no va bien, o para detectar problemas derivados de malware o software que se está ejecutando en segundo plano.

### Haz un esquema conceptual de este resumen.

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
### Ejercicio: Ejecuta ps -ef ¿Qué diferencias ves con respecto ps -e? Responde y pon un pantallazo de ambas salidas
### ¿Qué diferencia hay entre ps -aux y ps -ef? Muestra las columnas que muestran información. ¿Qué información muestra? tienes que detectar uso de cpu de memoria, 
memoria virtual, estado, tiempo de uso y comando que lanzó el proceso. Avísame para que te pueda explicar detalles de esta parte.

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
Lanza el navegador firefox para poder filtrar el o los procesos que se han lanzado en el programa. Hay procesos que lanzan otros procesos. Este se denomina
multiprogramación y siempre se puede reconocer el proceso padre que lanzó los procesos hijos buscando el PPID que es identificador del proceso padre.

```bash
ps -aux | grep firefox
ps -ef | grep firefox
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

### Ejemplo 3: ejecutar un editor de texto

```bash
nano
```

Mientras el programa `nano` (o cualquier otro programa interactivo como `top`) esté en ejecución, abre otro terminal y ejecuta:

```bash
ps -e | grep nano
```

el proceso está asociado a un **TTY** (por ejemplo, tty1), lo que indica que está siendo controlado directamente por el terminal de usuario.

---

## 4. ESTADOS DE UN PROCESO.
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

### Ejercicio: A partir del ps -aux visualiza varios estados y explica la columna STAT y sus combinaciones, ¿Puedes ver algún estado en pausa o ejecutando? ¿Algún proceso de alta prioridad? ¿Puedes ver los procesos padres? Obtén toda la información que puedas comentando los ejemplos que ves en tu propia máquina.
---

###7. Detectar Malware en tu equipo o servidor.

Hay que busca los procesos que más CPU están consumiendo por si detectamos algo raro

```bash
ps -aux -sort=%cpu | head -n 10
```

#### Ejercicios: 
* Obtener aquellos procesos que más % de memoria utilizan
* Obtener los 3 procesos que más % memoria utilizan
* Obtener los 3 procesos que más memoria física utilizan en kB
* Obtener el número de procesos que se están ejecutando
* Con pipe | utilizando el comando wc -l	
* Obtener el proceso con pid 1 Opción –p


---
## 5. Desafío final
ejecutar varios programas de fondo con tiempos diferentes y que intenten identificar sus procesos por el **PID**, observando qué procesos consumen más tiempo de CPU en la columna **TIME**.

### Ejemplo de programa:

Abre una terminal y lanza el siguiente 

```bash
for i in {1..10}; do echo "Running iteration $i"; sleep 10; done &
```

Esto ejecutará un bucle que se repite 10 veces, durmiendo 1 segundo en cada iteración.  
Pueden seguir su progreso con:

```bash
ps -e | grep bash
```


