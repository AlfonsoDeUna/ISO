# Ejercicios Bash shell

1. Crea un script que liste los directorios actuales y muestre los procesos
```bash

```

2. Crea un script que muestre un menú y que el usuario seleccione la opción y muestres la opcion que seleccionó el usuario
ejemplo para saber si el usuario pulsó la opción 1 if [ "$opcion" -eq 1 ]; then
* **ejemplo de menu:**
  1 listar directorio
  2 copiar ficheros
  3 mover ficheros

```bash

```

3. Crear un script que pida al usuario su nombre y luego muestre un saludo.
  Ejemplo del saludo "hola, <tu nombre>, bienvenido a ASIR"

```bash

```

4. Crear un script que verifique si un archivo existe en el directorio actual.
Pregunta al usuario el nombre dle fichero y crea una variable llamada archivo con la respuesta del usuario
tienes que utilizar el if [ -e "$archivo" ]; then

```bash

```

5. Crear un script que reciba dos argumentos y copie un archivo de un directorio a otro.
comprueba que llegan dos argumentos if [ $# -ne 2 ]; then
utiliza el comando cp para copiar

```bash

```

6. Crear un script que renombre un archivo, tomando el nombre original y el nuevo nombre como entradas del usuario.

```bash

```

7. Crear un script que compare dos archivos y muestre si son idénticos o no.
Que el usuario ponga el nombre de dos archivos
PAra comparar dos archivos usaremos el comando cmp del siguiente modo: if cmp -s "$1" "$2"; 

```bash

```

