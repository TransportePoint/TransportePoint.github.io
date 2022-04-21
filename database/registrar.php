<?php
// Recibe los datos, usuario y contraseña, y se almacenan en $usuario, $contraseña, que son los que haran la validacion
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];
    //metodo para iniciar sesiobn
    //conexion a la bd.
    include ('db.php');

    $consulta="call spInsertUser ('$usuario', '$contrasena')";

    $verificar = mysqli_query($conexion,$consulta);

    if($verificar == 1){
        header("location:../Pages/login.php");
    }else{
        echo "<script>alert('Poner datos correctos');location.href ='javascript:history.back()';</script>";
    }
?>