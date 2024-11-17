# GESTION DE USUARIOS, GRUPOS Y PERMISOS EN WINDOWS CON POWERSHELL

## Entrar en powershell en modo administrador en ISE

#### Crear una carpeta llamada "MiCarpeta"
New-Item -Path "C:\MiCarpeta" -ItemType Directory

#### Crear un archivo vacío llamado "MiArchivo.txt"
New-Item -Path "C:\MiCarpeta\MiArchivo.txt" -ItemType File

#### Crear un archivo llamado "Notas.txt" y escribir "Hola, PowerShell!" en él
Set-Content -Path "C:\MiCarpeta\Notas.txt" -Value "Hola, PowerShell!"

#### Agregar una nueva línea de texto a "Notas.txt"
Add-Content -Path "C:\MiCarpeta\Notas.txt" -Value "Esta es una nueva línea de texto."

#### Crear varias carpetas con un bucle
1..5 | ForEach-Object { New-Item -Path "C:\MiCarpeta\MiCarpeta$_" -ItemType Directory }

#### Elimina archivos
Remove-Item -Path "C:\MiCarpeta\MiArchivo.txt"

#### Eliminar Carpeta (Con Contenido)
Remove-Item -Path "C:\MiCarpeta" -Recurse -Force

## Variables
$variable = 10
$variable2="texto"

# CREACIÓN DE USUARIOS

#### Crear la contraseña usando SecureString
$password = ConvertTo-SecureString "Passw0rd!2024Secure@" -AsPlainText -Force

#### Crear un usuario nuevo con contraseña, nombre completo y descripción
New-LocalUser -Name "UsuarioEjemplo" -Password $password -FullName "asir1" -Description "Usuario de prueba con configuración avanzada"

#### Ver o listar usuarios
Get-LocalUser

#### Modificar usuario
Set-LocalUser -Name asir1 -Description "Usuario Nuevo ASIR"

#### Modificar la contraseña del usuario para que se cambie al iniciar la sesión
Set-LocalUser -Name "asir1" -PasswordChangeOnNextLogon $true

#### Bloquear una cuenta de usuario para impedir el acceso
Disable-LocalUser -Name "asir1"

#### Habilitar una cuenta de usuario previamente desactivada
Enable-LocalUser -Name "asir1"

#### Eliminar usuario
Remove-LocalUser asir1

#### Mostrar usuarios y sus grupos
Get-LocalUser | ForEach-Object { $_.Name; Get-LocalGroup -Member $_.Name }

#### Añadir usuario al grupo Usuarios
Add-LocalGroupMember -Group "Usuarios" -Member "NombreUsuario"

#### Añadir usuario al grupo Administradores
Add-LocalGroupMember -Group "Administradores" -Member "NombreUsuario"

#### Añadir usuario al grupo usuarios remotos
Add-LocalGroupMember -Group "Remote Desktop Users" -Member "NombreUsuario"
