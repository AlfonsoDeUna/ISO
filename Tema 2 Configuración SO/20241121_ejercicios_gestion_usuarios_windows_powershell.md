# Ejercicio de creación de usuarios en porwershell

Crea el siguiente script en powershell debes completar con los comandos vistos en clase donde pone la marca ### con las instrucciones

Cuando acabes guarda este script como creacionusuario.ps1

```powershell
# Configuración inicial: Crear carpeta principal
$carpetaBase = "C:\UsuariosEmpresa"

# Crear la carpeta principal si no existe
if (-not (Test-Path -Path $carpetaBase)) {
    ### añade aquí el cmdlet para crear una carpeta, el nombre de la carpeta lo coge de la variable creada $carpetaBase
    Write-Host "Carpeta principal creada: $carpetaBase"
} else {
    Write-Host "La carpeta principal ya existe: $carpetaBase"
}

# Lista de usuarios a crear (definida directamente en el script) - esto es una variable en forma de tabla que guarda la información del usuario.
$usuarios = @(
    @{ Nombre = "Juan"; Apellido = "López"; NombreUsuario = "mlopez"; Grupo = "Administradores" },
    @{ Nombre = "Ignacio"; Apellido = "Pérez"; NombreUsuario = "jperez"; Grupo = "Remote Desktop Users" },
    @{ Nombre = "Antonio"; Apellido = "Torres"; NombreUsuario = "atorres"; Grupo = "Usuarios" }
)

# Contraseña predeterminada para los usuarios
## crea una variable $password donde almacene la contraseña y con el cmdlet ConvertTo-SecureString crea la contraseña en la misma línea

# Crear usuarios y asignarles grupos
foreach ($usuario in $usuarios) {
    # PAra cada usuario guardamos el nombre y el grupo   
    $nombreUsuario = $usuario.NombreUsuario
    $grupo = $usuario.Grupo

    try {
        # Crear el usuario
        ### añadir aquí el cmdlet para crear un usuario cuyo usuario está almacenado en $nombreUsuario la password en $password,
        # para el nombre completo la opción -FullName utiliza $(usuario.Nombre) $(usuario.Apellido)
        # utiliza la opción -PasswordChangeOnNextLogon $true
        
        Write-Host "Usuario creado: $nombreUsuario"

        # Asignar el usuario al grupo
        ### Añadir el usuario al grupo con el cmdlet para añadir usuarios a los grupos indicados el usuario está almacenado en $nombreusuario y el grupo está almacenado en $grupo
        Write-Host "Usuario $nombreUsuario añadido al grupo $grupo"
    } catch {
        Write-Host "Error al crear o asignar el usuario $nombreUsuario: $_"
    }
}
```


