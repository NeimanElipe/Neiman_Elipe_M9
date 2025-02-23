<?php
session_start();
$conn = mysqli_connect("localhost", "nelipe", "pirineus", "neiman_elipe_iticdesk");

if (!$conn) {
    die("No s'ha pogut connectar a la base de dades");
}
else{
}
if(isset($_POST['email']) && isset ($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT nom, rol, password FROM usuaris WHERE email = '$email'";
    $result = mysqli_query( $conn,  $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) {
            $_SESSION['email'] = $email;
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['rol'] = $row['rol'];
            header("Location: acces.php");
            exit();
        }
    }
    echo "Usuari o contrasenya incorrecta";
}
?>
