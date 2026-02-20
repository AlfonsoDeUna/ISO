# Gestión de Usuarios Locales con PowerShell

---

## Ejercicio 1 – Tu primera cuenta

Crea un usuario llamado `Becario01` con tu nombre completo y la descripción `"Prácticas 2025"`.  
Luego comprueba que existe usando `Get-LocalUser` y muestra el resultado por pantalla.

---

## Ejercicio 2 – Cuenta temporal

Crea un usuario llamado `Sustituto` configurado para que deba cambiar la contraseña la primera vez que inicie sesión.  
Una vez creado, deshabilita la cuenta y luego vuelve a habilitarla.  
Comprueba el estado tras cada operación.

---

## Ejercicio 3 – Solo para mirar

Lista todos los usuarios locales del equipo mostrando únicamente las columnas `Name`, `Enabled` y `LastLogon`.  
Exporta ese resultado a un archivo de texto llamado `usuarios.txt` en el escritorio.

---

## Ejercicio 4 – Alta completa

Crea un usuario llamado `AdminDept` y, en un paso separado, añádelo al grupo `Administradores`.  
Verifica con `Get-LocalGroupMember` que el usuario aparece correctamente en el grupo.

---

## Ejercicio 5 – Reseteo y modificación

Trabaja sobre el usuario `Becario01` creado en el ejercicio 1:

- **a)** Cambia su descripción a `"Contratado Fijo"`
- **b)** Cambia su nombre completo a otro distinto
- **c)** Resetea su contraseña (sin necesidad de conocer la anterior)

---

## Ejercicio 6 – Alta masiva desde array

Crea de una sola vez los usuarios `Dpto01`, `Dpto02` y `Dpto03` usando un array y un bucle `foreach`, asignando a todos la misma contraseña.  
Por cada usuario creado, muestra un mensaje de confirmación en verde.  
Al terminar, lista todos los usuarios del sistema.

---

## Ejercicio 7 – Alta condicional

Crea un script que pida al usuario un nombre por teclado y, antes de crear la cuenta, compruebe si ya existe:

- Si **existe** → muestra un aviso en amarillo y **NO** la crea.
- Si **no existe** → la crea y muestra confirmación en verde.

> **Pista:** `Get-LocalUser -Name "X" -ErrorAction SilentlyContinue`

---

## Ejercicio 8 – Baja segura

Crea un script que reciba el nombre de un usuario y realice los siguientes pasos en orden:

1. Deshabilitar la cuenta
2. Quitarla del grupo `Administradores` si pertenecía a él
3. Mostrar un resumen final indicando qué acciones se han realizado

> **Importante:** el script **NO** debe eliminar la cuenta, solo desactivarla.

---

## Ejercicio Final – `GestionUsuarios.ps1`

Crea un script llamado `GestionUsuarios.ps1` que muestre el siguiente menú en bucle hasta que el usuario elija la opción `0` (Salir):

```
╔══════════════════════════════════╗
║   GESTIÓN DE USUARIOS LOCALES    ║
╠══════════════════════════════════╣
║  1. Crear usuario                ║
║  2. Listar usuarios              ║
║  3. Deshabilitar / Habilitar     ║
║  4. Resetear contraseña          ║
║  5. Añadir a grupo               ║
║  6. Eliminar usuario             ║
║  0. Salir                        ║
╚══════════════════════════════════╝
```

### Requisitos obligatorios

- Cada opción debe estar implementada en una **función separada**.  
  Ejemplos: `function CrearUsuario {}`, `function ListarUsuarios {}`, etc.
- Los mensajes de confirmación se muestran en **verde**.
- Los mensajes de error se muestran en **rojo**.
- La opción `6` (Eliminar) debe pedir confirmación antes de borrar: `"¿Estás seguro? (S/N)"`
- Si se introduce una opción no válida, mostrar aviso y volver al menú.
- El menú debe volver a aparecer automáticamente tras cada acción.

### Reto extra *(opcional)*

Añade una opción `7` al menú que genere un archivo `informe_usuarios.md` con una tabla Markdown de todos los usuarios locales del sistema (columnas: `Name`, `Enabled`, `LastLogon`).
