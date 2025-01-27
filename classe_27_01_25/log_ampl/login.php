<?php
session_start();

$_SESSION['user_login']='intento';
$user=$_POST['user_log'];
$password=$_POST['pswd'];

$conn = mysqli_connect("localhost", "nelipe", "pirineus", "test");
if(! $conn){
    echo "no se ha podido";
}



$sql_verificacio = "SELECT * FROM acces WHERE user=\"$user\" AND contra=\"$password\"";
echo "$sql_verificacio";

$query_verificacio=mysqli_query($conn,$sql_verificacio);
$rows= mysqli_num_rows($query_verificacio);

if($rows != 1){
    header("Location: index.html");
}
else{
    header("Location: pag2.php");
}


#if ($user != $password) {
#    echo "Login incorrecte!";
    
#    session_destroy();
        
#    header("Location: ./index.html");
#}
#else {


#    echo "<h1>Bienvenido:  $user</h1> <br>";
    #$_SESSION['user_login']=$user;
    #$_SESSION['log']=true;