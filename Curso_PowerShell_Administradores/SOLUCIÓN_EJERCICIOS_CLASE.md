# Ejercicios de PowerShell - Nivel 0 y 1

## NIVEL 0 – Primeros Pasos

### 1. Mensaje de bienvenida

```powershell
Write-Host "Hola, esto es PowerShell"

```

### 2. Uso de variables

```powershell
$nombre = "TuNombre"
$edad = 25
$ciudad = "Madrid"

Write-Host "Me llamo $nombre, tengo $edad años y vivo en $ciudad."

```

### 3. Entrada de usuario

```powershell
$nombre = Read-Host "Introduce tu nombre"
Write-Host "Encantado de conocerte, $nombre!"

```

### 4. Repetir frase

```powershell
$frase = Read-Host "Escribe una frase"
Write-Host $frase
Write-Host $frase
Write-Host $frase

```

### 5. Ficha personal

```powershell
$nombre = Read-Host "Nombre"
$apellido = Read-Host "Apellido"
$edad = Read-Host "Edad"
$profesion = Read-Host "Profesión"

Write-Host "`n--- FICHA PERSONAL ---"
Write-Host "Nombre completo: $nombre $apellido"
Write-Host "Edad: $edad años"
Write-Host "Profesión: $profesion"

```

### 6. Comillas simples vs Dobles

```powershell
$animal = "gato"

# Comillas dobles: Interpretan la variable (Interpolación)
Write-Host "El animal es: $animal"

# Comillas simples: Tratan todo como texto literal
Write-Host 'El animal es: $animal'

# EXPLICACIÓN: 
# Las comillas dobles permiten que PowerShell busque variables dentro del texto y muestre su valor.
# Las comillas simples muestran el texto exactamente como se escribe, incluyendo el símbolo $.

```

---

## NIVEL 1 – Números y Conversiones

### 7. Concatenación (Error común)

```powershell
$num1 = Read-Host "Dime un número"
$num2 = Read-Host "Dime otro número"

Write-Host "Resultado: $($num1 + $num2)"

# EXPLICACIÓN: 
# Si escribes 5 y 3 da 53 porque Read-Host guarda los datos como "String" (texto). 
# El signo + en texto sirve para unir (concatenar) las palabras, no para sumar matemáticamente.

```

### 8. Suma con conversión [int]

```powershell
$num1 = [int](Read-Host "Dime un número")
$num2 = [int](Read-Host "Dime otro número")

Write-Host "La suma real es: $($num1 + $num2)"

```

### 9. Operaciones básicas

```powershell
$n1 = [float](Read-Host "Número 1")
$n2 = [float](Read-Host "Número 2")

Write-Host "Suma: $($n1 + $n2)"
Write-Host "Resta: $($n1 - $n2)"
Write-Host "Multiplicación: $($n1 * $n2)"
Write-Host "División: $($n1 / $n2)"

```

### 10. Conversor de moneda

```powershell
$euros = [float](Read-Host "Introduce cantidad en Euros")
$cambio = 1.08
$dolares = $euros * $cambio

Write-Host "$euros € equivalen a $dolares $"

```

### 11. Área y Perímetro

```powershell
$base = [float](Read-Host "Base del rectángulo")
$altura = [float](Read-Host "Altura del rectángulo")

$area = $base * $altura
$perimetro = (2 * $base) + (2 * $altura)

Write-Host "Área: $area"
Write-Host "Perímetro: $perimetro"

```

### 12. Calculadora de días vividos

```powershell
$edad = [int](Read-Host "Dime tu edad")
$dias = $edad * 365

Write-Host "Has vivido aproximadamente $dias días."

```

### 13. Media aritmética

```powershell
$n1 = [float](Read-Host "Nota 1")
$n2 = [float](Read-Host "Nota 2")
$n3 = [float](Read-Host "Nota 3")

$media = ($n1 + $n2 + $n3) / 3

Write-Host "La nota media es: $media"

```

### 14. Cálculo de IVA

```powershell
$precioBase = [float](Read-Host "Precio del producto (sin IVA)")
$iva = $precioBase * 0.21
$precioTotal = $precioBase + $iva

Write-Host "Precio sin IVA: $precioBase €"
Write-Host "IVA (21%): $iva €"
Write-Host "Precio TOTAL: $precioTotal €"

```

---

¿Te gustaría que te ayude a crear un script que automatice la ejecución de todos estos ejercicios a la vez?
