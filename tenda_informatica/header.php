<?php
session_start();
if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 0;
}
$_SESSION['visites']++;
$isLogged = isset($_SESSION['usuari']);
$visites = $_SESSION['visites'];
$nomUsuari = $isLogged ? $_SESSION['usuari'] : '';
if ($visites % 2 == 0) {
    echo "<h1>Benvingut de nou, esperem que tingui un bon dia</h1>";
} else {
    echo "<h1>Benvingut, és un plaer que ens visitis</h1>";
}
if ($isLogged) {
    echo "<p>Hola, $nomUsuari!</p>";
}
if ($isLogged && $visites == 10) {
    echo "<p>$nomUsuari, agraïm la seva fidelitat, utilitzi el codi PROMO24 per un 30% de descompte</p>";
} elseif (!$isLogged && $visites == 20) {
    echo "<p>Agraïm la seva fidelitat, utilitzi el codi PROMO24 per un 20% de descompte</p>";
}
?>
