<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","subastas");

$consulta="SELECT*FROM users where nombre='$usuario' and passwd='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
    <?php
    include("index.html");

  ?>
  
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
