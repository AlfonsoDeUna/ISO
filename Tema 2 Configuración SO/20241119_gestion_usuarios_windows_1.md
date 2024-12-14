# GESTION DE USUARIOS, GRUPOS Y PERMISOS EN WINDOWS CON POWERSHELL

## Entrar en powershell en modo administrador en ISE

#### Crear una carpeta llamada "MiCarpeta"
```powershell
New-Item -Path "C:\MiCarpeta" -ItemType Directory
```

#### Crear un archivo vacío llamado "MiArchivo.txt"
```powershell
New-Item -Path "C:\MiCarpeta\MiArchivo.txt" -ItemType File
```
#### Crear un archivo llamado "Notas.txt" y escribir "Hola, PowerShell!" en él
```powershell
Set-Content -Path "C:\MiCarpeta\Notas.txt" -Value "Hola, PowerShell!"
```

#### Agregar una nueva línea de texto a "Notas.txt"
```powershell
Add-Content -Path "C:\MiCarpeta\Notas.txt" -Value "Esta es una nueva línea de texto."
```

#### Crear varias carpetas con un bucle
```powershell
1..5 | ForEach-Object { New-Item -Path "C:\MiCarpeta\MiCarpeta$_" -ItemType Directory }
```

#### Elimina archivos
```powershell
Remove-Item -Path "C:\MiCarpeta\MiArchivo.txt"
```
#### Eliminar Carpeta (Con Contenido)
```powershell
Remove-Item -Path "C:\MiCarpeta" -Recurse -Force
```

## Variables
```powershell
$variable = 10
$variable2="texto"
```

# CREACIÓN DE USUARIOS

#### Crear la contraseña usando SecureString
```powershell
$password = ConvertTo-SecureString "Passw0rd!2024Secure@" -AsPlainText -Force
```
#### Crear un usuario nuevo con contraseña, nombre completo y descripción
```powershell
New-LocalUser -Name "UsuarioEjemplo" -Password $password -FullName "asir1" -Description "Usuario de prueba con configuración avanzada"
```

#### Ver o listar usuarios
```powershell
Get-LocalUser
```
#### Modificar usuario
```powershell
Set-LocalUser -Name asir1 -Description "Usuario Nuevo ASIR"
```
#### Que el usuario no pueda modificar la contraseña
```powershell
Set-LocalUser -Name "asir1" -UserMayChangePassword $true
```
#### Bloquear una cuenta de usuario para impedir el acceso
```powershell
Disable-LocalUser -Name "asir1"
```
#### Habilitar una cuenta de usuario previamente desactivada
```powershell
Enable-LocalUser -Name "asir1"
```
#### Eliminar usuario
```powershell
Remove-LocalUser asir1
```
#### Mostrar usuarios y sus grupos
```powershell
Get-LocalGroup
Get-LocalGroupMember -group nombre_grupo
```
#### Añadir usuario al grupo Usuarios
```powershell
Add-LocalGroupMember -Group "Usuarios" -Member "NombreUsuario"
```
#### Añadir usuario al grupo Administradores
```powershell
Add-LocalGroupMember -Group "Administradores" -Member "NombreUsuario"
```
#### Añadir usuario al grupo usuarios remotos
```powershell
Add-LocalGroupMember -Group "Remote Desktop Users" -Member "NombreUsuario"
```
