El **bucle `for` en Bash** es una estructura de control que permite iterar sobre una lista de elementos o un rango de números. Su sintaxis es simple y versátil, lo que facilita automatizar tareas repetitivas.

### Sintaxis básica:

```bash
for variable in lista
do
    # Instrucciones a ejecutar
done
```

### Ejemplos prácticos

#### 1. Iterar sobre una lista de palabras
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

#### 2. Iterar sobre un rango de números
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

#### 3. Iterar con pasos específicos
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

#### 4. Iterar sobre archivos en un directorio
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

#### 5. Usar el bucle `for` con comandos
```bash
for usuario in $(cat usuarios.txt)
do
    echo "Creando usuario: $usuario"
    sudo useradd $usuario
done
```

#### 6. Bucle infinito
```bash
for (( ; ; ))
do
    echo "Presiona Ctrl+C para detener este bucle"
    sleep 1
done
```

### Notas:
- **Rangos**: `{inicio..fin..paso}` solo funcionan en versiones modernas de Bash.
- **Variables**: `$variable` se usa para acceder al valor de la variable.
- **Archivos**: Utiliza comodines como `*.txt` para iterar sobre ciertos tipos de archivos.

