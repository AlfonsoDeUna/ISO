

# **Curso de Bash Shell: Uso de Variables y Paso de Argumentos en Bash Scripting**

Las variables son esenciales para bash scripting. Permiten almacenar y manipular datos durante la ejecución de un script. 
Además de las variables, tenemos los argumentos, que permiten pasar información al script desde la línea de comandos.

## **1. Variables en Bash**

### **1.1. Definición de Variables**

En bash, las variables se definen simplemente asignándoles un valor. No es necesario especificar un tipo de dato.

**Sintaxis:**

```bash
nombre_variable=valor
```

**Reglas para nombrar variables:**

- El nombre debe comenzar con una letra o guión bajo (`_`).
- Puede contener letras, números y guiones bajos.
- No debe haber espacios alrededor del signo `=`.

### **Ejemplo:**

```bash
#!/bin/bash

mensaje="Hola, mundo"
numero=42
```

### **1.2. Acceso al Valor de una Variable**

Para acceder al valor de una variable, se utiliza el signo `$` antes del nombre de la variable.

**Ejemplo:**

```bash
echo $mensaje
echo "El número es: $numero"
```

### **1.3. Variables y Comillas**

- **Sin comillas:** Bash separa los argumentos por espacios, lo que puede causar problemas si el valor de la variable contiene espacios.
- **Comillas dobles (""):** Permiten que las variables y comandos se expandan.
- **Comillas simples (''):** Todo dentro de las comillas simples se interpreta literalmente.

**Ejemplo:**

```bash
mensaje="Este es un mensaje con espacios"

echo $mensaje        # Puede causar problemas si hay espacios
echo "$mensaje"      # Recomendado para preservar espacios
echo '$mensaje'      # Muestra literalmente '$mensaje'
```

### **1.4. Operaciones con Variables**

#### **1.4.1. Variables Numéricas**

Para realizar operaciones aritméticas con variables numéricas, se pueden usar:

- `expr`: Comando externo para evaluaciones simples.
- `$(( expresión ))`: Evaluación aritmética integrada.

**Ejemplo con `expr`:**

```bash
numero1=10
numero2=5

suma=$(expr $numero1 + $numero2)
echo "La suma es: $suma"
```

**Ejemplo con `(( ))`:**

```bash
suma=$((numero1 + numero2))
echo "La suma es: $suma"
```

#### **1.4.2. Variables de Texto (Cadenas)**

Las variables de texto pueden ser manipuladas utilizando diversas herramientas y comandos como `echo`, `read`, `cut`, etc.

**Ejemplo:**

```bash
cadena="Hola"
cadena="$cadena, mundo"
echo "$cadena"
```

## **2. Lectura de Variables desde el Usuario**

El comando `read` permite leer la entrada del usuario y almacenarla en una variable.

**Sintaxis:**

```bash
read nombre_variable
```

**Con mensaje:**

```bash
read -p "Ingrese su nombre: " nombre
echo "Hola, $nombre"
```

## **3. Variables Especiales en Bash**

Bash tiene variables especiales que son útiles para manejar argumentos y otros aspectos del script.

### **3.1. Argumentos Posicionales**

Cuando se ejecuta un script, se pueden pasar argumentos desde la línea de comandos.

**Ejemplo:**

```bash
./script.sh arg1 arg2 arg3
```

Dentro del script, estos argumentos se acceden mediante variables especiales:

- `$0`: Nombre del script.
- `$1`, `$2`, `$3`, ...: Argumentos posicionales.
- `$#`: Número de argumentos.
- `$@`: Todos los argumentos como una lista.
- `$*`: Todos los argumentos como una sola cadena.
- `$$`: PID (Process ID) del script.
- `$?`: Código de salida del último comando ejecutado.

### **Ejemplo de Uso:**

```bash
#!/bin/bash

echo "Nombre del script: $0"
echo "Primer argumento: $1"
echo "Segundo argumento: $2"
echo "Número de argumentos: $#"
echo "Todos los argumentos: $@"
```

**Ejecutando el script:**

```bash
chmod +x script.sh
./script.sh uno dos
```

**Salida:**

```
Nombre del script: ./script.sh
Primer argumento: uno
Segundo argumento: dos
Número de argumentos: 2
Todos los argumentos: uno dos
```

## **4. Ejemplos Prácticos**

### **4.1. Script que Suma dos Números Pasados como Argumentos**

**Script (`suma.sh`):**

```bash
#!/bin/bash

if [ $# -ne 2 ]; then
    echo "Uso: $0 número1 número2"
    exit 1
fi

numero1=$1
numero2=$2

suma=$((numero1 + numero2))

echo "La suma de $numero1 y $numero2 es: $suma"
```

**Explicación:**

- Verifica que se hayan pasado exactamente 2 argumentos.
- Asigna los argumentos a variables.
- Realiza la suma utilizando `(( ))`.
- Muestra el resultado.

**Ejecutando el script:**

```bash
chmod +x suma.sh
./suma.sh 5 7
```

**Salida:**

```
La suma de 5 y 7 es: 12
```

## **5. Buenas Prácticas con Variables**

- **Nombrado Claro:** Utiliza nombres de variables descriptivos.
- **Comillas:** Usa comillas dobles alrededor de variables (`"$variable"`) para evitar problemas con espacios o caracteres especiales.
- **Evitar Nombres Reservados:** No utilices nombres que puedan entrar en conflicto con comandos o variables especiales.
- **Inicializar Variables:** Es buena práctica inicializar variables antes de usarlas.
- **Comentarios:** Añade comentarios para explicar el propósito de las variables.

