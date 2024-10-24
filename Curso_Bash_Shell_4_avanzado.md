# Curso de Bash Shell: Funciones en Bash Shell en Unix

## Introducción
En este curso aprenderás a crear y utilizar funciones en Bash Shell dentro de entornos Unix. A través de ejemplos explicados y ejercicios prácticos, aprenderás a estructurar y reutilizar código eficientemente para optimizar la creación y mantenimiento de scripts.

## Objetivos de Aprendizaje
1. Comprender qué es una función en Bash y cómo definirla.
2. Saber cómo pasar parámetros a las funciones y gestionar variables locales y globales.
3. Aplicar conceptos de recursividad y manejo de múltiples parámetros.
4. Utilizar comandos como `ps`, `cat`, y `grep` dentro de funciones para el manejo de procesos y archivos.

---

## 1. ¿Qué es una función en Bash?

Una función en Bash es un grupo de comandos que se pueden invocar mediante un nombre específico. Este nombre actúa como un atajo para ejecutar todos los comandos definidos dentro de la función.

### **Ejemplo 1: Definición de una función básica**
```bash
#!/bin/bash
saludo() {
    echo "¡Hola, mundo!"
}

# Llamar a la función
saludo
```

### **Ejercicio 1:**
Crea una función llamada \`mostrar_fecha\` que imprima la fecha y hora actuales usando el comando \`date\`. Luego, llama a la función en tu script.

---

## 2. Sintaxis de las funciones

Para definir una función en Bash:
```bash
nombre_funcion() {
    # comandos
}
````

### **Ejemplo 2: Función con parámetros**
```bash
calcular_potencia() {
    resultado=$(( $1 ** $2 ))
    echo "$1 elevado a $2 es $resultado"
}

# Llamar a la función con argumentos
calcular_potencia 2 3
``` 

### **Ejercicio 2:**
Define una función llamada \`listar_procesos\` que use el comando \`ps\` para listar los procesos actuales. Luego, llama a la función en tu script.

---

## 3. Pasando parámetros a las funciones

Las funciones en Bash aceptan parámetros, los cuales se acceden mediante \`$1\`, \`$2\`, etc.

### **Ejemplo 3:**
``` bash
saludar() {
    echo "Hola, $1!"
}

# Llamar a la función con un parámetro
saludar "Alfonso"
``` 

### **Ejercicio 3:**
Crea una función llamada \`crear_archivo\` que tome un nombre de archivo como parámetro y cree un archivo vacío con ese nombre utilizando el comando \`touch\`.

---

## 4. Retorno de valores desde funciones

Aunque las funciones en Bash no retornan valores como en otros lenguajes, se puede usar \`echo\` para enviar el resultado y capturarlo.

### **Ejemplo 4:**
``` bash
obtener_usuario() {
    whoami
}

# Capturar el valor retornado
usuario=$(obtener_usuario)
echo "El usuario actual es $usuario"
``` 

### **Ejercicio 4:**
Escribe una función llamada \`contar_lineas\` que tome un archivo como parámetro y devuelva el número de líneas que contiene utilizando \`wc -l\`.

---

## 5. Variables locales y globales en funciones

En Bash, las variables son globales por defecto. Para que una variable sea local a una función, utiliza la palabra clave \`local\`.

### **Ejemplo 5:**
``` bash
incrementar_contador() {
    local contador=0
    contador=$((contador + 1))
    echo "Contador: $contador"
}

# Llamar a la función
incrementar_contador
incrementar_contador
``` 

### **Ejercicio 5:**
Modifica la función \`crear_archivo\` para que utilice una variable local que confirme la creación del archivo mostrando un mensaje.

---

## 6. Funciones con múltiples parámetros

Para acceder a todos los parámetros que recibe una función, utiliza $num .

### **Ejemplo 7:**
```bash
#!/bin/bash

# Definir una función que toma dos argumentos
sumar() {
    local a=$1  # Primer argumento
    local b=$2  # Segundo argumento
    local resultado=$((a + b))  # Sumar los dos argumentos
    echo $resultado  # Devolver el resultado
}

# Llamar a la función con argumentos
resultado_final=$(sumar 5 3)

# Imprimir el resultado
echo "La suma es: $resultado_final"
``` 
### **Ejercicio 6:**
Escribe una función llamada \`buscar_texto\` que tome un archivo y una palabra como parámetros, y cuente cuántas veces aparece la palabra en el archivo usando \`grep\` y \`wc -l\`.

---

## 7. Utilizando \`ps\` y \`cat\` en funciones

Ya que conoces los comandos \`ps\` y \`cat\`, los integraremos en las funciones.

### **Ejemplo 7:**
``` bash
mostrar_usuarios_procesos() {
    ps -eo user | sort | uniq
}

# Llamar a la función
mostrar_usuarios_procesos
``` 

### **Ejercicio 7:**
Crea una función llamada \`mostrar_contenido\` que tome un nombre de archivo como parámetro y muestre su contenido utilizando \`cat\`. Asegúrate de que el archivo exista antes de mostrarlo.

---



