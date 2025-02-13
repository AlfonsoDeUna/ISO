<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tienes un usuario diferente
$password = ""; // Cambia esto si tienes una contraseña
$dbname = "registro_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

// Insertar los datos en la tabla
$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
