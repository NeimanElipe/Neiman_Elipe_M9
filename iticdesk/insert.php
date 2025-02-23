<?php
session_start();
$conn = mysqli_connect("localhost", "nelipe", "pirineus", "neiman_elipe_iticdesk");

if (!$conn) {
    die("No s'ha pogut connectar a la base de dades");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $referencia = $_POST['referencia'];
    $prioritat = $_POST['prioritat'];
    $titol = $_POST['titol'];
    $descripcio = $_POST['descripcio'];
    $usuari_email = $_POST['usuari_email'];
    $estat = $_POST['estat'];
    $data_creacio = date('Y-m-d H:i:s');

    $sql = "INSERT INTO incidencies (referencia, prioritat, titol, descripcio, usuari_email, data_creacio, estat) 
            VALUES ('$referencia', '$prioritat', '$titol', '$descripcio', '$usuari_email', '$data_creacio', '$estat')";

    if (mysqli_query($conn, $sql)) {
        header ("Incidencia registrada amb exit.");
        header("Location: acces.php"); 
        exit();
    } else {
        echo "Error al registrar la incidència: " . mysqli_error($conn);
    }
}
?>
