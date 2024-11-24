<?php
session_start();

// Inicialitza la cistella si no existeix
if (!isset($_SESSION['cistella'])) {
    $_SESSION['cistella'] = [
        'producte1' => 0,
        'producte2' => 0
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['cistella']['producte1'] += isset($_POST['producte1']) ? (int)$_POST['producte1'] : 0;
    $_SESSION['cistella']['producte2'] += isset($_POST['producte2']) ? (int)$_POST['producte2'] : 0;
}
header("Location: index.html");
exit();
?>
