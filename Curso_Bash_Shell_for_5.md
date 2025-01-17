# Bucles y Condicionales en Bash Shell

### **1. Introducción**

- **¿Qué es un bucle?**
  Es una estructura que permite repetir un conjunto de comandos varias veces, hasta que se cumpla una condición.
  
- **¿Qué es un condicional?**
  Es una estructura que ejecuta comandos solo si se cumple una condición específica.


### **2. El Bucle `for`**
#### **2.1 Iteración sobre una lista de elementos**
- **Explicación:**
  El bucle `for` recorre una lista de elementos y ejecuta comandos para cada uno.

- **Ejemplo básico:**
  ```bash
  for i in $(ls); do
      echo $i
  done
  ```

- **Ejercicio 1:**
  Escribe un script que imprima todos los archivos de un directorio con extensión `.txt`.
  ```bash
for i in *.txt; do
    echo $i 
done
```
#### **2.2 Iteración sobre un rango**
- **Explicación:**
  Puedes usar la expresión `{inicio..fin..incremento}` para generar rangos.

- **Ejemplo:**
  ```bash
  for i in {1..10}; do
      echo "Número: $i"
  done
  ```

- **Ejercicio 2:**
  Crea un script que imprima los números pares entre 1 y 20.

#### **2.3 Bucle tipo C**
- **Explicación:**
  Similar al bucle `for` en C o Java.

- **Ejemplo:**
  ```bash
  for ((i = 0; i < 5; i++)); do
      echo "Iteración: $i"
  done
  ```

- **Ejercicio 3:**
  Escribe un script que imprima "Hola" 10 veces utilizando un bucle tipo C.

---

### **3. El Bucle `while`**
#### **3.1 Introducción al `while`**
- **Explicación:**
  El bucle `while` ejecuta comandos mientras una condición sea verdadera.

- **Ejemplo básico:**
  ```bash
  number=5
  while [ $number -gt 0 ]; do
      echo "Número: $number"
      number=$(($number - 1))
  done
  ```
---
- **Ejercicio 4:**
  Escribe un script que imprima los números del 10 al 1 en orden descendente.
---

#### **3.2 Bucle infinito**
- **Explicación:**
  Un bucle infinito se utiliza para tareas continuas como monitorear procesos.

- **Ejemplo:**
  ```bash
  while true; do
      echo "Trabajando..."
      sleep 1
  done
  ```
---
- **Ejercicio 5:**
  Escribe un script que imprima la fecha actual cada segundo. Deténlo con `Ctrl+C`.
  utiliza el comando date. recuerda para ejecutar $(date) dentro de un echo
  para esperar 1 sg podemos hacer una pausa de 1 sg mediante sleep 1

---

### **4. Combinación de Bucles y Condicionales**
#### **4.1 Uso de `if` dentro de un `for`**
- **Explicación:**
  Puedes combinar bucles con condicionales para realizar verificaciones en cada iteración.

- **Ejemplo:**
  ```bash
  for file in *; do
      if [[ -d $file ]]; then
          echo "$file es un directorio"
      elif [[ -f $file ]]; then
          echo "$file es un archivo"
      fi
  done
  ```

- **Ejercicio 6:**
  Escribe un script que verifique si los elementos de un directorio son ejecutables.

#### **4.2 Control de flujo con `break` y `continue`**
- **`break`:** Sale del bucle inmediatamente.
- **`continue`:** Salta a la siguiente iteración.

- **Ejemplo con `break`:**
  ```bash
  for i in {1..10}; do
      if [ $i -eq 5 ]; then
          break
      fi
      echo "Número: $i"
  done
  ```

- **Ejemplo con `continue`:**
  ```bash
  for i in {1..10}; do
      if [ $i -eq 5 ]; then
          continue
      fi
      echo "Número: $i"
  done
  ```

- **Ejercicio 7:**
  Crea un script que imprima números del 1 al 10, pero omita el número 5.

---

### **5. Leer Archivos con Bucles**
#### **5.1 Usando `while read`**
- **Explicación:**
  Puedes leer un archivo línea por línea usando `while` y `read`.

- **Ejemplo:**
  ```bash
  while read line; do
      echo $line
  done < file.txt
  ```

- **Ejercicio 8:**
  Escribe un script que lea un archivo y cuente cuántas líneas tiene.

---

### **6. Condicionales en Bash**
#### **6.1 Sintaxis básica**
- **Explicación:**
  Los condicionales permiten ejecutar comandos según una condición.

- **Ejemplo:**
  ```bash
  if [ -f archivo.txt ]; then
      echo "El archivo existe"
  else
      echo "El archivo no existe"
  fi
  ```

- **Ejercicio 9:**
  Escribe un script que verifique si un directorio existe y lo cree si no existe.

#### **6.2 Uso de operadores**
- **Explicación:**
  Utiliza operadores para comparar números y cadenas.

- **Ejemplo con cadenas:**
  ```bash
  if [ "hola" == "hola" ]; then
      echo "Las cadenas son iguales"
  fi
  ```

- **Ejemplo con números:**
  ```bash
  if [ 5 -gt 3 ]; then
      echo "5 es mayor que 3"
  fi
  ```

- **Ejercicio 10:**
  Escribe un script que compare dos números ingresados por el usuario.

---

### **7. Ejercicio Final: Creación de un Menú Interactivo**
 Combina bucles y condicionales para crear un programa funcional.

- **Ejemplo:**
  ```bash
  while true; do
      echo "Menú:"
      echo "1. Mostrar archivos"
      echo "2. Mostrar fecha"
      echo "3. Salir"
      read opcion
      
      if [ $opcion -eq 1 ]; then
          ls
      elif [ $opcion -eq 2 ]; then
          date
      elif [ $opcion -eq 3 ]; then
          echo "Saliendo..."
          break
      else
          echo "Opción no válida"
      fi
  done
  ```

- **Reto Final:**
  Amplía el menú para incluir opciones como mostrar el contenido de un archivo o verificar si un archivo existe.
