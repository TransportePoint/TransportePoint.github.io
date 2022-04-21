<?php 
    include ('db.php');

    // el id que recibe es del parametro que se manda desde el boton de eliminar. 
    // el id_numviaje = es el que pertenece a mi id de mi tabla.
    if(isset($_GET['id'])) {
        
         
        $id_consecutivo=$_GET['id'];

        $query="call delete_trip ('$id_consecutivo')";

        $result=mysqli_query($conexion, $query);

        if(!$result){
            die("Query failed");
        }
        echo 'eliminado.';
        $_SESSION['message']= 'Trip removed successfully';
        $_SESSION['message_type'] = 'danger'; 
        //se recarga aqui mismo.
        header("location:../Pages/viajes.php");
    }
?>