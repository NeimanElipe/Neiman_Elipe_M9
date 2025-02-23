<?php
session_start();
$conn = mysqli_connect("localhost", "nelipe", "pirineus", "neiman_elipe_iticdesk");
echo "OK";
if (!$conn) {
    die("No s'ha pogut connectar a la base de dades");
}

if (!isset($_SESSION['email'], $_SESSION['nom'], $_SESSION['rol'])) {
    header("Location: index.html");
    exit();
}

$nom = $_SESSION['nom'];
$rol = $_SESSION['rol'];

echo "<h2>Benvingut, $nom!</h2>";
echo "<p> $rol </p>";
echo "<a href='registre_incidencies.php'><button>Registrar incidència</button></a>";
echo "<a href='incidencies.php'><button>Veure incidències</button></a>";
echo "<a href='logout.php'><button>Tancar sessió</button></a>";
?>