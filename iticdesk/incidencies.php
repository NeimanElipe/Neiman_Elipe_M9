<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

$conn = mysqli_connect("localhost", "nelipe", "pirineus", "neiman_elipe_iticdesk");

if (!$conn) {
    die("No s'ha pogut connectar a la base de dades");
}

$email_usuario = $_SESSION['email'];

$sql_rol = "SELECT rol FROM usuaris WHERE email = '$email_usuario'";
$result_rol = mysqli_query($conn, $sql_rol);

if ($result_rol) {
    $row_rol = mysqli_fetch_assoc($result_rol);
    $rol_usuario = $row_rol['rol'];
} else {
    die("Error al obtener el rol del usuario");
}

if ($rol_usuario == 'professor') {
    $sql = "SELECT * FROM incidencies WHERE usuari_email = '$email_usuario' ORDER BY FIELD(prioritat, 'Tipus I', 'Tipus II', 'Tipus III', 'Tipus IV'), data_creacio DESC";
} else {
    $sql = "SELECT * FROM incidencies ORDER BY FIELD(prioritat, 'Tipus I', 'Tipus II', 'Tipus III', 'Tipus IV'), data_creacio DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidències Registrades</title>
</head>
<body>
    <h2>Incidències Registrades</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Referència</th>
                <th>Prioritat</th>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Usuari</th>
                <th>Data de Creació</th>
                <th>Estat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['referencia'] . "</td>";
                    echo "<td>" . $row['prioritat'] . "</td>";
                    echo "<td>" . $row['titol'] . "</td>";
                    echo "<td>" . $row['descripcio'] . "</td>";
                    echo "<td>" . $row['usuari_email'] . "</td>";
                    echo "<td>" . $row['data_creacio'] . "</td>";
                    echo "<td>" . $row['estat'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hi ha incidències registrades.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
