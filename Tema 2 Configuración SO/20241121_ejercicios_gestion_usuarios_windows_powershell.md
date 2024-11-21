
### **Ejercicio 1: Crear una carpeta para almacenar los datos de los usuarios**
**Enunciado:**  
Crea una carpeta llamada `C:\UsuariosEmpresa` que se utilizará para guardar los datos relacionados con los usuarios. Verifica si la carpeta ya existe antes de crearla.

**Pasos esperados:**
1. Comprobar si la carpeta existe:
   ```powershell
   Test-Path -Path "C:\UsuariosEmpresa"
   ```
2. Si no existe, crear la carpeta:
   ```powershell
  
   ```

---

### **Ejercicio 2: Crear un usuario llamado `jperez`**
**Enunciado:**  
Crea un usuario local con los siguientes datos:
- Nombre de usuario: `jperez`
- Nombre completo: `Juan Pérez`
- Descripción: `Empleado del departamento de soporte`
- Contraseña: `P@ssw0rd2024`
- Configura el usuario para que cambie la contraseña en el próximo inicio de sesión.

**Pasos esperados:**
1. Crear la contraseña como objeto `SecureString`:
   ```powershell
   
   ```
2. Crear el usuario:
   ```powershell
  
   ```

---

### **Ejercicio 3: Añadir el usuario `jperez` al grupo "Remote Desktop Users"**
**Enunciado:**  
Juan Pérez necesita tener acceso remoto a los equipos de la empresa. Añádelo al grupo `Remote Desktop Users`. 

**Pasos esperados:**
1. Añadir al grupo:
   ```powershell

   ```

---

### **Ejercicio 4: Verificar los usuarios existentes**
**Enunciado:**  
Comprueba si el usuario `jperez` fue creado correctamente y verifica todos los usuarios existentes en el sistema.

**Pasos esperados:**
1. Listar todos los usuarios locales:
   ```powershell
   Get-LocalUser
   ```

---

### **Ejercicio 5: Crear más usuarios**
**Enunciado:**  
Crea los siguientes usuarios con los datos indicados. Luego, añádeles al grupo correspondiente. Configura a todos para que cambien la contraseña en el próximo inicio de sesión.

| Nombre de usuario | Nombre completo      | Descripción                  | Grupo                | Contraseña    |
|--------------------|---------------------|------------------------------|----------------------|---------------|
| alopez            | Antonio López         | Administradora del sistema   | Administradores      | P@ssw0rd2024 |
| atorres           | Antonio Torres          | Personal general             | Usuarios             | P@ssw0rd2024 |

**Pasos esperados:**
1. Crear a María López:
   ```powershell

   ```
2. Crear a Ana Torres:
   ```powershell
 
   ```

---

### **Ejercicio 6: Eliminar un usuario**
**Enunciado:**  
El usuario `jmartinez` ya no pertenece a la empresa. Elimínalo del sistema.

**Pasos esperados:**
1. Eliminar al usuario:
   ```powershell
  
   ```

---

### **Ejercicio 7: Verificar usuarios y grupos**
**Enunciado:**  
Verifica qué usuarios están asignados a cada grupo. Comprueba específicamente si `mlopez` pertenece al grupo `Administradores`.

**Pasos esperados:**
1. Ver los usuarios de un grupo específico:
   ```powershell
  
   ```
