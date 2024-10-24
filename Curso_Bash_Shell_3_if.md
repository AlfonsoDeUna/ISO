# **Tutorial: Uso de la estructura `if` en Bash Scripting**

La estructura `if` es fundamental en la programación de scripts en bash, ya que permite tomar decisiones basadas en condiciones. Este tutorial te guiará a través de los diferentes usos del `if`, incluyendo comparaciones numéricas, de cadenas y comprobaciones de ficheros y directorios.

## **1. Sintaxis básica del `if`**

La estructura básica de un `if` en bash es la siguiente:

```bash
if [ condición ]; then
    # código a ejecutar si la condición es verdadera
elif [ otra_condición ]; then
    # código a ejecutar si la otra condición es verdadera
else
    # código a ejecutar si ninguna condición es verdadera
fi
```

- **`[ condición ]`**: Es la condición que se evalúa. Se pueden usar distintos operadores para realizar comparaciones.
- **`then`**: Indica el inicio del bloque de código que se ejecutará si la condición es verdadera.
- **`elif`**: (Opcional) Permite evaluar una nueva condición si la anterior es falsa.
- **`else`**: (Opcional) Bloque que se ejecuta si ninguna de las condiciones anteriores es verdadera.
- **`fi`**: Marca el final de la estructura `if`. 

## **2. Comparaciones numéricas**

Para comparar números enteros, se utilizan los siguientes operadores:

- **`-eq`**: Igual a (equal)
- **`-ne`**: No igual a (not equal)
- **`-gt`**: Mayor que (greater than)
- **`-ge`**: Mayor o igual que (greater or equal)
- **`-lt`**: Menor que (less than)
- **`-le`**: Menor o igual que (less or equal)

### **Ejemplo:**

```bash
#!/bin/bash

numero=5

if [ "$numero" -gt 10 ]; then
    echo "El número es mayor que 10."
elif [ "$numero" -eq 10 ]; then
    echo "El número es igual a 10."
else
    echo "El número es menor que 10."
fi
```

**Explicación:**

- Se compara el valor de la variable `numero` con 10.
- Se ejecuta el bloque correspondiente según el resultado de la comparación.

---
## Ejercicios basados en la comparación de números:
### 1. Modifica el script original para que identifique si un número es mayor, meno o igual:

* El usuario ingrese un número por teclado.
* El script verifique si el número es mayor, menor o igual a 100.
* Muestre un mensaje que indique si es mayoro o  menos o igual a 100.

### 2. Modifica el script original para que identifique si un número es positivo, negativo o cero

### 3. Modifica el script original para que:

* El usuario ingrese dos números: numero1 y numero2.
* El script compare los dos números e indique cuál es mayor o si son iguales.
* Muestre un mensaje correspondiente.
---

## **3. Comparaciones de cadenas de texto**

Para comparar cadenas de texto, se utilizan los siguientes operadores:

- **`=`**: Igual a
- **`!=`**: No igual a
- **`-z`**: Cadena de longitud cero (vacía)
- **`-n`**: Cadena no vacía

### **Ejemplo:**

```bash
#!/bin/bash

cadena="hola"

if [ "$cadena" = "hola" ]; then
    echo "La cadena es 'hola'."
elif [ "$cadena" != "hola" ]; then
    echo "La cadena no es 'hola'."
fi
```
**Explicación:**

- Se compara el contenido de la variable `cadena` con la cadena `"hola"`.
- Se utiliza `=` para comprobar igualdad y `!=` para desigualdad.

---
## Ejercicios de comparación de cadenas o texto:
### Ejercicio 1: Comparar la cadena ingresada por el usuario

* El usuario ingrese una cadena de texto.
* El script compare la cadena ingresada con la palabra "hola".
* Muestre un mensaje indicando si la cadena es "hola" o no.

### Ejercicio 2: Verificar si la cadena está vacía o no

* El usuario ingrese una cadena de texto.
* El script verifique si la cadena está vacía.
* Muestre un mensaje indicando si la cadena está vacía o no.

---

## **4. Comprobación de ficheros y directorios**

Bash proporciona operadores para verificar la existencia y tipo de ficheros y directorios.

### **Operadores comunes:**

- **`-e`**: Existe (fichero o directorio)
- **`-f`**: Existe y es un fichero regular
- **`-d`**: Existe y es un directorio
- **`-r`**: Existe y tiene permiso de lectura
- **`-w`**: Existe y tiene permiso de escritura
- **`-x`**: Existe y tiene permiso de ejecución

### **Ejemplo: Comprobar si un directorio existe**

```bash
#!/bin/bash

directorio="/home/usuario/documentos"

if [ -d "$directorio" ]; then
    echo "El directorio existe."
else
    echo "El directorio no existe."
fi
```

**Explicación:**

- Se utiliza `-d` para comprobar si la ruta especificada es un directorio existente.

### **Ejemplo: Comprobar si un fichero existe y es ejecutable**

```bash
#!/bin/bash

fichero="/usr/bin/bash"

if [ -f "$fichero"  ]; then
    echo "El fichero existe y es ejecutable."
else
    echo "El fichero no existe o no es ejecutable."
fi
```

**Explicación:**

- Se utiliza `-f` para comprobar si es un fichero regular

## **7. Ejercicios prácticos**

### **Ejercicio 1: Verificar si un número es par o impar**

```bash
#!/bin/bash

read -p "Ingrese un número entero: " numero

if (( numero % 2 == 0 )); then
    echo "El número es par."
else
    echo "El número es impar."
fi
```

**Explicación:**

- `numero % 2` calcula el resto de dividir el número entre 2.
- Si el resto es 0, el número es par.

### **Ejercicio 2: Comprobar si una cadena está vacía**

```bash
#!/bin/bash

read -p "Ingrese una cadena de texto: " cadena

if [ -z "$cadena" ]; then
    echo "La cadena está vacía."
else
    echo "La cadena no está vacía."
fi
```

**Explicación:**

- `-z` verifica si la longitud de la cadena es cero.

### **Ejercicio 3: Verificar permisos de un fichero**

```bash
#!/bin/bash

read -p "Ingrese la ruta del fichero: " fichero

if [ -e "$fichero" ]; then
    if [ -r "$fichero" ]; then
        echo "El fichero tiene permiso de lectura."
    fi
    if [ -w "$fichero" ]; then
        echo "El fichero tiene permiso de escritura."
    fi
    if [ -x "$fichero" ]; then
        echo "El fichero tiene permiso de ejecución."
    fi
else
    echo "El fichero no existe."
fi
```

**Explicación:**

- Se verifica si el fichero existe con `-e`.
- Se comprueban los permisos de lectura `-r`, escritura `-w` y ejecución `-x`.

## **8. Consejos y buenas prácticas**

- **Espacios en las condiciones:** Asegúrate de dejar espacios entre los corchetes y la condición: `[ condición ]`.
- **Comillas alrededor de variables:** Es recomendable poner comillas alrededor de variables para evitar problemas con espacios o caracteres especiales: `"$variable"`.
- **Uso de `test`:** `[ condición ]` es equivalente a `test condición`. Puedes usar cualquiera de las dos formas.
- **Depuración:** Añade `set -x` al inicio de tu script para activar el modo de depuración y ver cómo se ejecutan los comandos.

## **9. Resumen de operadores y comprobaciones**

### **Operadores numéricos:**

- `-eq`: Igual a
- `-ne`: No igual a
- `-gt`: Mayor que
- `-ge`: Mayor o igual que
- `-lt`: Menor que
- `-le`: Menor o igual que

### **Operadores de cadenas:**

- `=`: Igual a
- `!=`: No igual a
- `-z`: Cadena de longitud cero
- `-n`: Cadena no vacía

### **Operadores de ficheros:**

- `-e`: Existe
- `-f`: Es un fichero regular
- `-d`: Es un directorio
- `-r`: Tiene permiso de lectura
- `-w`: Tiene permiso de escritura
- `-x`: Tiene permiso de ejecución
- `-s`: El fichero no está vacío (tamaño mayor que cero)

### **Operadores lógicos:**

- `&&`: AND lógico
- `||`: OR lógico
- `!`: NOT lógico

---

# **Actividad práctica final**

Combina lo aprendido para crear un script que:

1. Pida al usuario que ingrese una ruta.
2. Verifique si la ruta es un fichero o un directorio.
3. Si es un fichero, muestre si tiene permisos de lectura, escritura y ejecución.
4. Si es un directorio, liste los contenidos del directorio.
5. Si la ruta no existe, muestre un mensaje indicando que no existe.

### **Solución:**

```bash
#!/bin/bash

read -p "Ingrese una ruta: " ruta

if [ -e "$ruta" ]; then
    if [ -f "$ruta" ]; then
        echo "Es un fichero."
        if [ -r "$ruta" ]; then
            echo "Tiene permiso de lectura."
        else
            echo "No tiene permiso de lectura."
        fi
        if [ -w "$ruta" ]; then
            echo "Tiene permiso de escritura."
        else
            echo "No tiene permiso de escritura."
        fi
        if [ -x "$ruta" ]; then
            echo "Tiene permiso de ejecución."
        else
            echo "No tiene permiso de ejecución."
        fi
    elif [ -d "$ruta" ]; then
        echo "Es un directorio."
        echo "Contenido del directorio:"
        ls "$ruta"
    else
        echo "La ruta existe pero no es un fichero regular ni un directorio."
    fi
else
    echo "La ruta no existe."
fi
```

**Explicación:**

- Se utiliza `-e` para comprobar si la ruta existe.
- Se distingue entre fichero `-f` y directorio `-d`.
- Se muestran los permisos si es un fichero.
- Se listan los contenidos si es un directorio.

---
