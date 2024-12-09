<?php
try {
    $isLogged = isset($_SESSION['usuari']);
    $visites = $_SESSION['visites'];

    if ($isLogged && $visites == 10) {
        echo "<p>Codi de descompte: PROMO24 - 30% de descompte</p>";
    } elseif (!$isLogged && $visites == 20) {
        echo "<p>Codi de descompte: PROMO24 - 20% de descompte</p>";
    }
} catch (Exception $e) {
    error_log("Error en descomptes.php: " . $e->getMessage());
}
?>
