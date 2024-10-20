# Bash Shell: Variables, Condicionales (if) y Argumentos Posicionales ($1, $2)

---

### **1. Introducción**

- **Repaso de Comandos Vistos:**
  - `ls`, `ps`, `cd`, `mkdir`, `cp`, `mv`, `rm`.

- **Objetivo de la Clase:**
  - Aprender sobre variables en Bash.
  - Utilizar condicionales `if` para tomar decisiones en scripts.
  - Introducir el uso de argumentos posicionales `$1`, `$2` en scripts.

- **Importancia:**
  - Automatizar tareas y permitir que los scripts acepten entradas dinámicas.

### **2. Variables en Bash**

- **Explicación:**
  - **¿Qué es una variable?**
    - Espacio en memoria para almacenar datos que pueden cambiar.
  - **Declaración y Asignación:**
    - Sin espacios: `variable=valor`.
  - **Uso de Variables:**
    - Llamar la variable con `$variable`.

- **Ejemplos:**

  - **Asignar y mostrar una variable:**

    ```bash
    nombre="Ana"
    echo "Hola, $nombre"
    ```

  - **Usar variables con comandos:**

    ```bash
    ruta="/home/usuario/documentos"
    cd $ruta
    ls
    ```

- **Ejercicio 1:**

  - **Instrucciones:**
    - Crea una variable llamada `mi_directorio` y asígnale la ruta de un directorio existente.
    - Usa `cd` para navegar a ese directorio y muestra su contenido con `ls`.

### **3. Lectura de Entrada del Usuario**

- **Explicación:**
  - Uso del comando `read` para obtener datos del usuario.

- **Ejemplos:**

  - **Pedir al usuario un nombre y saludarlo:**

    ```bash
    echo "Ingrese su nombre:"
    read nombre
    echo "Hola, $nombre"
    ```

- **Ejercicio 2:**

  - **Instrucciones:**
    - Escribe un script que solicite al usuario un nombre de archivo.
    - Usa `ls` para verificar si el archivo existe en el directorio actual.

### **4. Condicionales: Uso del 'if'**

- **Explicación:**
  - **Sintaxis básica:**

    ```bash
    if [ condición ]; then
      # acciones si la condición es verdadera
    fi
    ```

  - **Operadores comunes:**
    - **Archivos:**
      - `-e` : existe.
      - `-d` : es un directorio.
      - `-f` : es un archivo.
    - **Cadenas:**
      - `=`  : igual.
      - `!=` : diferente.

- **Ejemplos:**

  - **Verificar si un archivo existe:**

    ```bash
    if [ -e "$archivo" ]; then
      echo "El archivo existe."
    else
      echo "El archivo no existe."
    fi
    ```

  - **Comprobar si un directorio es accesible:**

    ```bash
    if [ -d "$directorio" ]; then
      cd "$directorio"
    else
      echo "El directorio no existe."
    fi
    ```

- **Ejercicio 3:**

  - **Instrucciones:**
    - Crea un script que pida al usuario un nombre de directorio.
    - Si el directorio existe, muestra su contenido con `ls`.
    - Si no existe, créalo usando `mkdir` y confirma su creación.

### **5. Argumentos Posicionales en Bash ($1, $2, ...)**

- **Explicación:**

  - **¿Qué son los argumentos posicionales?**
    - Son parámetros que se pasan al ejecutar un script.
    - `$0` : Nombre del script.
    - `$1`, `$2`, `$3`, ... : Primer, segundo, tercer argumento, etc.
    - `$#` : Número total de argumentos.
    - `$@` : Todos los argumentos.

  - **Cómo utilizarlos:**
    - Dentro del script, se accede a ellos usando `$1`, `$2`, etc.

- **Ejemplos:**

  - **Script simple que muestra los argumentos:**

    ```bash
    #!/bin/bash
    echo "El nombre del script es: $0"
    echo "Primer argumento: $1"
    echo "Segundo argumento: $2"
    echo "Total de argumentos: $#"
    ```

  - **Usar argumentos con comandos:**

    ```bash
    #!/bin/bash
    archivo_origen=$1
    archivo_destino=$2

    if [ -f "$archivo_origen" ]; then
      cp "$archivo_origen" "$archivo_destino"
      echo "Archivo copiado de $archivo_origen a $archivo_destino."
    else
      echo "El archivo origen no existe."
    fi
    ```

- **Ejercicio 4:**

  - **Instrucciones:**
    - Escribe un script que acepte dos argumentos:
      - El primer argumento es un nombre de archivo.
      - El segundo argumento es un nombre de directorio.
    - El script debe mover el archivo al directorio especificado si ambos existen.
    - Si el archivo o el directorio no existen, mostrar mensajes adecuados.

### **6. Combinando Variables, Condicionales y Argumentos Posicionales**

- **Explicación:**

  - **Uso avanzado de variables y argumentos:**
    - Permite crear scripts más flexibles y reutilizables.
    - Los argumentos proporcionan datos al script sin necesidad de modificarlo.

- **Ejemplos:**

  - **Script que verifica si un proceso está corriendo y usa un argumento:**

    ```bash
    #!/bin/bash
    proceso=$1

    if ps aux | grep -q "[${proceso:0:1}]${proceso:1}"; then
      echo "El proceso $proceso está corriendo."
    else
      echo "El proceso $proceso no está activo."
    fi
    ```

    *Nota:* El truco `[${proceso:0:1}]${proceso:1}` evita que el proceso `grep` sea encontrado por sí mismo.

- **Ejercicio 5:**

  - **Instrucciones:**
    - Escribe un script que acepte un argumento que sea el nombre de un usuario.
    - El script debe verificar si el usuario está conectado al sistema utilizando el comando `who`.
    - Muestra un mensaje indicando si el usuario está conectado o no.

### **7. Ejercicios Prácticos Adicionales**

- **Ejercicio 6:**

  - **Instrucciones:**
    - Crea un script que reciba dos argumentos:
      - Un nombre de archivo.
      - Un directorio de destino.
    - El script debe:
      - Verificar si el archivo existe.
      - Si existe, copiarlo al directorio de destino.
      - Si el directorio no existe, crear el directorio antes de copiar.

- **Ejercicio 7:**

  - **Instrucciones:**
    - Escribe un script que acepte tres argumentos:
      - Una operación (`copiar`, `mover` o `eliminar`).
      - Un archivo o directorio.
      - Un destino (solo para copiar o mover).
    - El script debe realizar la operación indicada:
      - Si es `copiar`, copia el archivo o directorio al destino.
      - Si es `mover`, mueve el archivo o directorio al destino.
      - Si es `eliminar`, elimina el archivo o directorio.
    - Asegúrate de manejar casos donde los argumentos no sean correctos.

---
  
  ```bash
  if [ $# -lt 2 ]; then
    echo "Uso: $0 archivo directorio"
    exit 1
  fi
  ```

---
