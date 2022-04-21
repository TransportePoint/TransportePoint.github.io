<?php 
    include ('../database/db.php');

    if(isset($_GET['id'])){

        $id_consecutivo=$_GET['id'];

        $query="call spAllTrip('$id_consecutivo')";

        $result=mysqli_query($conexion, $query);

        // comprobar cuantas filas tiene mi resultado
        //nombre de como esta en la base de datos.
        if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_array($result);
            $FLETE=$row['id_viaje'];
            $DRIVER=$row['id_driver'];
            $CITY_ORIGIN=$row['id_ciudadorigen'];
            $CITY_DESTINATION=$row['id_ciudaddestino'];
            $CUSTOMER=$row['id_customer'];
            $COMMODITY=$row['id_mercancia'];
            $DEPARTUREDATE=$row['departuredate'];
            $ARRIVALDATE=$row['arrivaldate'];

        }
        $result->Close();
        $conexion->next_result();

    }

    if(isset($_POST['update'])){

        $id_consecutivo=$_GET['id'];
        $FLETE=$_POST['Flete'];
        $DRIVER=$_POST['driver'];
        $CITY_ORIGIN=$_POST['origin'];
        $CITY_DESTINATION=$_POST['destination'];
        $CUSTOMER=$_POST['customer'];
        $COMMODITY=$_POST['commodity'];
        $DEPARTUREDATE=$_POST['departure'];
        $ARRIVALDATE=$_POST['arrival'];

        //  echo $origen;
        // echo $destino;
        // echo $gasto_hotel;
        // echo $gasto_transporte;
        // echo $gasto_comida;
        // echo $gasto_extra;
        // echo $fecha_inicio;
        // echo $fecha_fin;


        $query= "call spEditTrip('$id_consecutivo','$FLETE','$DRIVER','$CITY_ORIGIN','$CITY_DESTINATION','$CUSTOMER','$COMMODITY',
        '$DEPARTUREDATE','$ARRIVALDATE')";

        mysqli_query($conexion, $query);


        $_SESSION['message']= 'Viaje modificado correctamente';
        $_SESSION['message_type'] = 'info';
        header("Location: viajes.php");
    }

    

    if(isset($_POST['cancelar'])){
        $_SESSION['message']= 'Viaje modificado correctamente';
        $_SESSION['message_type'] = 'info';
        header("Location: viajes.php");

    }

?>

<?php include("header.html") ?>

            <div class="container p-4">
                <!-- Este archivo recibe pero tambien sirve para actualizar. -->
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST" >
                    <div class="row">

                        <div class="md-4">
                <!--flete-->
                                    <label>Number freight</label>

                                    <div class="form-group">
                                        <input type="text" name="Flete" class="form-control" placeholder="Number freight" 
                                        value="<?php echo $FLETE; ?>" disabled>
                                    </div>
                                    <!--driver-->
                                    <label>Driver</label>
                        <div class="form-group">
                            <select name="driver">
                                <?php 
                                $nombredriver="call spNameDriver('$DRIVER')";
                                $resultadodriver=mysqli_query($conexion,$nombredriver);

                                while($resultadonamedriver = mysqli_fetch_array($resultadodriver)){
                                    echo '<option value="'.$DRIVER.'">'.$resultadonamedriver[0].'</option>';
                                } 
                                $resultadodriver->Close();
                                $conexion->next_result(); 
                                
                                ?>
                                <?php
                                    $Driver="call spSelectDriver()";
                                    $resultado=mysqli_query($conexion,$Driver);

                                    while($resultados = mysqli_fetch_array($resultado)){
                                        echo '<option value="'.$resultados[id_driver].'">'.$resultados[nombre_driver].'</option>';
                                    }
                                    $resultado->Close();
                                    $conexion->next_result(); 
                                ?>
                            </select>
                        </div>
                                    <br><br>
                                    <!--origin-->
                                    <label>Origin</label>

                                    <div class="form-group">
                                    <select name="origin">
                                    <?php 
                                        $nombreOrigin="call spNameCity('$CITY_ORIGIN')";
                                        $resultadoOrigin=mysqli_query($conexion,$nombreOrigin);

                                        while($resultadonameOrigin = mysqli_fetch_array($resultadoOrigin)){
                                            echo '<option value="'.$CITY_ORIGIN.'">'.$resultadonameOrigin[0].'</option>';
                                        } 
                                        $resultadoOrigin->Close();
                                        $conexion->next_result();
                                        ?>                                     
                                       <?php
                                                $CityOrigi="call spSelectCity()";
                                                $resultado=mysqli_query($conexion,$CityOrigi);

                                                while($resultados = mysqli_fetch_array($resultado)){
                                                    echo '<option value="'.$resultados[id_ciudad].'">'.$resultados[nombre_ciudad].'</option>';
                                                }
                                                $resultado->Close();
                                                $conexion->next_result();
                                            ?>
                                        </select>
                                    </div>
                                    <br><br>
                                    <label>Destination</label>
                                    <!--destination-->
                                    <div class="form-group">
                                    <select name="destination">
                                    <?php 
                                        $nombreDestination="call spNameCity('$CITY_DESTINATION')";
                                        $resultadoDestination=mysqli_query($conexion,$nombreDestination);

                                        while($resultadonameDestination = mysqli_fetch_array($resultadoDestination)){
                                            echo '<option value="'.$CITY_DESTINATION.'">'.$resultadonameDestination[0].'</option>';
                                        }
                                        $resultadoDestination->Close();
                                        $conexion->next_result();  
                                        
                                        ?>                                             
                                        <?php
                                                $CityDestino="call spSelectCity()";
                                                $resultado=mysqli_query($conexion,$CityDestino);

                                                while($resultados = mysqli_fetch_array($resultado)){
                                                    echo '<option value="'.$resultados[id_ciudad].'">'.$resultados[nombre_ciudad].'</option>';
                                                }
                                                $resultado->Close();
                                        $conexion->next_result();  
                                            ?>
                                        </select>   
                                    </div>
                    </div>

                    <div class="md-4">
                    <label>Customer</label>
                        <!--customer-->
                        <div class="form-group">
                        <select name="customer">
                                     <?php 
                                        $nombreCustomer="call spNameCustomer ('$CUSTOMER')";
                                        $resultadoCustomer=mysqli_query($conexion,$nombreCustomer);

                                        while($resultadonameCustomer = mysqli_fetch_array($resultadoCustomer)){
                                            echo '<option value="'.$CUSTOMER.'">'.$resultadonameCustomer[0].'</option>';
                                        }  
                                        $resultadoCustomer->Close();
                                        $conexion->next_result();
                                        ?> 
                                         
                                                                        <?php
                                    $Customer="call spSelectCustomer()";
                                    $resultado=mysqli_query($conexion,$Customer);

                                    while($resultados = mysqli_fetch_array($resultado)){
                                        echo '<option value="'.$resultados[id_customer].'">'.$resultados[nombre_customer].'</option>';
                                    }
                                    $resultado->Close();
                                    $conexion->next_result();
                                ?>
                            </select>  
                        </div>
                        <br><br>
                        <label>Commodity</label>
                        <!--commodity-->
                        <div class="form-group">
                        <select name="commodity">
                                     <?php 
                                        $nombreMercancia="call spNameMercancia  ('$COMMODITY')";
                                        $resultadoCommodity=mysqli_query($conexion,$nombreMercancia);

                                        while($resultadonameCommodity = mysqli_fetch_array($resultadoCommodity)){
                                            echo '<option value="'.$COMMODITY.'">'.$resultadonameCommodity[0].'</option>';
                                        } 
                                        $resultadoCommodity->Close();
                                        $conexion->next_result(); ?>  
                                                                        
                                <?php
                                    $Customer="call spSelectMercancia()";
                                    $resultado=mysqli_query($conexion,$Customer);

                                    while($resultados = mysqli_fetch_array($resultado)){
                                        echo '<option value="'.$resultados[id_mercancia].'">'.$resultados[nombre_mercancia].'</option>';
                                    }
                                    $resultado->Close();
                                    $conexion->next_result();
                                ?>
                            </select>                          
                        </div> 
                        <br><br>                    
                        <!--departure date-->
                        <label>Departure date:</label>
                        <div class="form-group">
                            <input type="Date" name="departure" class="form-control" placeholder="Departure date"
                            value="<?php echo $DEPARTUREDATE; ?>" >
                        </div>
                        <!--arrival date-->
                        <label>Arrival date:</label>
                        <div class="form-group">
                            <input type="Date" name="arrival" class="form-control" placeholder="Arrival date"
                            value="<?php echo $ARRIVALDATE; ?>" >
                        </div>
                    </div>
                    </div>
                    <button class="btn btn-success" name="update">Update</button>
                          </form>
            </div>
                

<?php include("footer.html") ?>