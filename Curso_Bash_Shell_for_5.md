El **bucle `for` en Bash** es una estructura de control que permite iterar sobre una lista de elementos o un rango de números. Su función es automatizar tareas repetitivas.

### Sintaxis básica:

```bash
for variable in lista
do
    # Instrucciones a ejecutar
done
```

#### Iterar sobre una lista de palabras
```bash
for palabra in manzana naranja plátano
do
    echo "Fruta: $palabra"
done
```
**Salida:**
```
Fruta: manzana
Fruta: naranja
Fruta: plátano
```

#### Iterar sobre un rango de números

Otra forma de iterar es decirle desde donde empieza hasta donde acaba y
- **Rangos**: `{inicio..fin..paso}` solo funcionan en versiones modernas de Bash.


```bash
for numero in {1..5}
do
    echo "Número: $numero"
done
```
**Salida:**
```
Número: 1
Número: 2
Número: 3
Número: 4
Número: 5
```

#### Iterar con pasos específicos
```bash
for numero in {1..10..2}
do
    echo "Número impar: $numero"
done
```
**Salida:**
```
Número impar: 1
Número impar: 3
Número impar: 5
Número impar: 7
Número impar: 9
```

#### Iterar sobre archivos en un directorio
```bash
for archivo in *.txt
do
    echo "Procesando $archivo"
done
```
**Salida:**
```
Procesando archivo1.txt
Procesando archivo2.txt
Procesando archivo3.txt
```

#### Usar el bucle `for` con comandos
```bash
for usuario in $(cat usuarios.txt)
do
    echo "Creando usuario: $usuario"
    sudo useradd $usuario
done
```

#### Bucle infinito
```bash
for (( ; ; ))
do
    echo "Presiona Ctrl+C para detener este bucle"
    sleep 1
done
```
Aquí tienes varios ejemplos prácticos de cómo usar el bucle `for` en **Bash** para trabajar con ficheros:

---

###  **Iterar sobre todos los archivos en un directorio**
```bash
for archivo in *
do
    echo "Archivo encontrado: $archivo"
done
```
**Explicación:**  
Esto imprimirá el nombre de todos los archivos y carpetas en el directorio actual.

###  **Procesar solo archivos de texto (`*.txt`)**
```bash
for archivo in *.txt
do
    echo "Procesando archivo de texto: $archivo"
    # Por ejemplo, contar las líneas del archivo
    lineas=$(wc -l < "$archivo")
    echo "El archivo $archivo tiene $lineas líneas"
done
```
**Explicación:**  
Se seleccionan únicamente archivos con extensión `.txt` y se cuentan sus líneas.

---

### **Cambiar la extensión de múltiples archivos**
```bash
for archivo in *.txt
do
    nuevo_nombre="${archivo%.txt}.bak"
    mv "$archivo" "$nuevo_nombre"
    echo "Renombrado: $archivo -> $nuevo_nombre"
done
```
**Explicación:**  
Este script renombra todos los archivos `.txt` a `.bak`.

---

### **Copiar archivos a otra carpeta**
```bash
for archivo in *.jpg
do
    cp "$archivo" /ruta/a/destino/
    echo "Copiado $archivo a /ruta/a/destino/"
done
```
**Explicación:**  
Copia todos los archivos con extensión `.jpg` a un directorio específico.

---

### **Leer el contenido de varios archivos y procesarlo**
```bash
for archivo in *.log
do
    echo "Contenido del archivo $archivo:"
    cat "$archivo"
    echo "--------------------------------"
done
```
**Explicación:**  
Muestra el contenido de todos los archivos con extensión `.log`.

---

### **Eliminar archivos grandes (mayores a 1MB)**
```bash
for archivo in *
do
    if [ $(stat -c%s "$archivo") -gt 1000000 ]; then
        echo "Eliminando archivo grande: $archivo"
        rm "$archivo"
    fi
done
```
**Explicación:**  
Este script elimina archivos que ocupan más de 1 MB.


### **Añadir una cabecera a todos los archivos de texto**
```bash
for archivo in *.txt
do
    echo "Añadiendo cabecera a $archivo"
    echo "Cabecera del archivo" | cat - "$archivo" > temp && mv temp "$archivo"
done
```
**Explicación:**  
Añade una línea al inicio de cada archivo `.txt`.


### 8. **Mover archivos según su fecha de modificación**
```bash
for archivo in *
do
    if [ "$(date -r "$archivo" +%Y)" -lt 2023 ]; then
        mv "$archivo" /ruta/a/archivos_antiguos/
        echo "Movido $archivo a archivos_antiguos"
    fi
done
```
**Explicación:**  
Mueve los archivos modificados antes del año 2023 a un directorio específico.



