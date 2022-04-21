<?php
    include ('db.php');

    if (isset($_POST['save_trip'])){
        $FLETE=$_POST['Flete'];
        $DRIVER=$_POST['driver'];
        $CITY_ORIGIN=$_POST['origin'];
        $CITY_DESTINATION=$_POST['destination'];
        $CUSTOMER=$_POST['customer'];
        $COMMODITY=$_POST['commodity'];
        $DEPARTUREDATE=$_POST['departure'];
        $ARRIVALDATE=$_POST['arrival'];

        // echo $origen;
        // echo $destino;
        // echo $gasto_hotel;
        // echo $gasto_transporte;
        // echo $gasto_comida;
        // echo $gasto_extra;
        // echo $fecha_inicio;
        // echo $fecha_fin;

        $query="call save_trip('$FLETE', '$DRIVER', '$CITY_ORIGIN', '$CITY_DESTINATION',' $CUSTOMER', '$COMMODITY', '$DEPARTUREDATE',' $ARRIVALDATE')";

        $result= mysqli_query($conexion, $query);


            if(!$result){
                die("Query failed");
            }
            echo 'guardado.';


            $_SESSION['message']= 'Trip saved correctly';
            $_SESSION['message_type'] = 'success'; 
            //se recarga aqui mismo.
            header("Location: viajes.php");

    }

?>