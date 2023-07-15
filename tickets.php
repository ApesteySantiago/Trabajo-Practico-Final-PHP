<?php
// Conectar a la base de datos utilizando las mismas credenciales que en "datosCompra.php"
$servername = "localhost";
$username = "id21041810_seminario_bsas";
$password = "seminario_BSAS1";
$database = "id21041810_database_tickets";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ejecutar una consulta SELECT para obtener todos los datos de los tickets comprados
$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="tickets_estiloPhp.css">
    <title>Tickets Comprados</title>
</head>
<body>
    
    <header>
        <div class="label_menu">
            <label class="label-menu">Conf Bs As</label>
        </div>
        <nav class="menu">
            <ul>
                <li class="inactivo"><a href="index.html#conferencia">La conferencia</a></li>
                <li class="inactivo"><a href="index.html#oradores">Los oradores</a></li>
                <li class="inactivo"><a href="index.html#lugar">El lugar y la fecha</a></li>
                <li class="inactivo"><a href="index.html#conviertete">Conviertete en orador</a></li>
                <li class="compra"><a href="tickets.html">Comprar tickets</a></li>
             </ul>
           </nav> 
    
        <nav class="menu-chico">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle menu-chi" data-bs-toggle="dropdown" href="#dropdown-menu" role="button" aria-expanded="false">☰</a>
            <ul class="dropdown-menu">
              <li class="inactivo"><a href="index.html#conferencia">La conferencia</a></li>
                <li class="inactivo"><a href="index.html#oradores">Los oradores</a></li>
                <li class="inactivo"><a href="index.html#lugar">El lugar y la fecha</a></li>
                <li class="inactivo"><a href="index.html#conviertete">Conviertete en orador</a></li>
                <li class="compra"><a href="tickets.html">Comprar tickets</a></li>
            </ul>
          </li>
    
        </nav>
    
    </header>
    
    <div class=tabla>
    <h1 id=titulo>Tickets Comprados</h1>
    <table>
        <tr id="aux">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo electrónico</th>
            <th>Cantidad</th>
            <th>Categoría</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['id'] % 2 == 0){
                    echo '<tr>';
                    echo '<td id="color">' . $row['id'] . "</td>";
                    echo '<td id="color">' . $row['nombre'] . "</td>";
                    echo '<td id="color">' . $row['apellido'] . "</td>";
                    echo '<td id="color">' . $row['email'] . "</td>";
                    echo '<td id="color">' . $row['cantidad'] . "</td>";
                    echo '<td id="color">' . $row['categoria'] . "</td>";
                    echo '</tr>';
                } else {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . "</td>";
                    echo '<td>' . $row['nombre'] . "</td>";
                    echo '<td>' . $row['apellido'] . "</td>";
                    echo '<td>' . $row['email'] . "</td>";
                    echo '<td>' . $row['cantidad'] . "</td>";
                    echo '<td>' . $row['categoria'] . "</td>";
                    echo '</tr>';
                }
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron tickets comprados</td></tr>";
        }
        ?>
    </table>

    </div>
    
    <footer>
        <div class="enlaces">
          <ul class="pie">
            <li class="elemento"><a class="elem" href="#">Preguntas frecuentes</a></li>
            <li class="elemento"><a class="elem" href="#">Contáctanos</a></li>
            <li class="elemento"><a class="elem" href="#">Prensa</a></li>
            <li class="elemento"><a class="elem" href="#">Conferencias</a></li>
            <li class="elemento"><a class="elem" href="#">Términos y condiciones</a></li>
            <li class="elemento"><a class="elem" href="#">Privacidad</a></li>
            <li class="elemento"><a class="elem" href="tickets.php">Tickets</a></li>
          </ul>
        </div>
      </footer>

</body>
</html>

<?php
$conn->close();
?>