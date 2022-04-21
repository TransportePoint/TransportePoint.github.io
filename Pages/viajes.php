<?php include('../database/db.php'); ?>

<?php 
    Include('header.html');
?>
            <div class="container-fluid p-4">
                <div class="row">
                
                <div class="col-md-2">
                <!-- Mensaje donde se hizo correcto. -->
                      <!-- Mensaje donde se hizo correcto. -->
                      <?php if(isset($_SESSION['message'])){ ?> 
                        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php session_unset();} ?>  
                        <!-- creacion del formulario -->

                    <div class="card1 card-body">
                        <form action="../database/save_trip.php"  method="POST">

                          <!--flete-->
                        <div class="form-group">
                            <input type="text" name="Flete" class="form-control" placeholder="Number freight" autofocus>
                        </div>
                         <!--driver-->
                        <label>Driver</label>
                        <div class="form-group">
                            <select name="driver">
                                <option value="0">Select Driver</option>
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
                                    <option value="0">Select Origin</option>
                                    <?php
                                        $CityOrigi="call spSelectCity()";
                                        $resultadoOrigi=mysqli_query($conexion,$CityOrigi);

                                        while($resultadosOrigi = mysqli_fetch_array($resultadoOrigi)){
                                            echo '<option value="'.$resultadosOrigi[id_ciudad].'">'.$resultadosOrigi[nombre_ciudad].'</option>';
                                        }
                                        $resultadoOrigi->Close();
                                    $conexion->next_result();
                                     ?>
                                </select>
                            </div>
                            <br><br>
                    
                        <label>Destination</label>
                        <!--destination-->
                        <div class="form-group">
                        <select name="destination">
                                <option value="0">Select Destination</option>
                                <?php
                                    $CityDestino="call spSelectCity()";
                                    $resultadoDestino=mysqli_query($conexion,$CityDestino);

                                    while($resultadosDestino = mysqli_fetch_array($resultadoDestino)){
                                        echo '<option value="'.$resultadosDestino[id_ciudad].'">'.$resultadosDestino[nombre_ciudad].'</option>';
                                    }
                                    $resultadoDestino->Close();
                                    $conexion->next_result();

                                ?>
                            </select>   
                        </div>
                        <br><br>
                        <label>Customer</label>
                        <!--customer-->
                        <div class="form-group">
                        <select name="customer">
                                <option value="0">Select Customer</option>
                                <?php
                                    $Customer="call spSelectCustomer()";
                                    $resultadoCustomer=mysqli_query($conexion,$Customer);

                                    while($resultadosCustomer = mysqli_fetch_array($resultadoCustomer)){
                                        echo '<option value="'.$resultadosCustomer[id_customer].'">'.$resultadosCustomer[nombre_customer].'</option>';
                                    }
                                    $resultadoCustomer->Close();
                                    $conexion->next_result();

                                ?>
                            </select>  
                        </div>
                        <br><br>
                        <label>Commodity</label>
                        <!--commodity-->
                        <div class="form-group">
                        <select name="commodity">
                                <option value="0">Select commodity</option>
                                <?php
                                    $Mercancia="call spSelectMercancia()";
                                    $resultadoMercancia=mysqli_query($conexion,$Mercancia);

                                    while($resultadosMercancia = mysqli_fetch_array($resultadoMercancia)){
                                        echo '<option value="'.$resultadosMercancia[id_mercancia].'">'.$resultadosMercancia[nombre_mercancia].'</option>';
                                    }
                                    $resultadoMercancia->Close();
                                    $conexion->next_result();

                                ?>
                            </select>                          
                        </div> 
                        <br><br>                    
                        <!--departure date-->
                        <label>Departure date:</label>
                        <div class="form-group">
                            <input type="Date" name="departure" class="form-control" placeholder="Departure date" >
                        </div>
                        <!--arrival date-->
                        <label>Arrival date:</label>
                        <div class="form-group">
                            <input type="Date" name="arrival" class="form-control" placeholder="Arrival date" >
                        </div>
                        
                        <input type="submit" class="btn btn-success btn-block" name="save_trip" value="Save trip">
                        
                        </form>
                    </div>


                </div>


                <div class="col-md-10">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Consecutivo</th>
                                    <th>Number freight</th>
                                    <th>Driver</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Customer</th>
                                    <th>Commodity</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Acciones</th>
                                </tr>
                                <tbody>
                                <?php

                                    $query= "call spSelectViajes()";

                                    $result_viajes=mysqli_query($conexion, $query);
                                    
                                    // while que recorrera cada row de mi tabla agendaviajes
                                    while($row=mysqli_fetch_array($result_viajes)){ ?>
                                    <tr>
                                        <td><?php echo $row['id_consecutivo']?></td>
                                        <td><?php echo $row['id_viaje']?></td>
                                        <td><?php echo $row['nombre_driver']?></td>
                                        <td><?php echo $row['nombre_ciudad']?></td>
                                        <td><?php echo $row['ciudad']?></td>
                                        <td><?php echo $row['nombre_customer']?></td>
                                        <td><?php echo $row['nombre_mercancia']?></td>
                                        <td><?php echo $row['departuredate']?></td>
                                        <td><?php echo $row['arrivaldate']?></td>
                                        <td>
                                        <a href="edit.php?id=<?php echo $row['id_consecutivo']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        
            
                                        <a href="../database/delete_trip.php?id=<?php echo $row['id_consecutivo']?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>

                                        <a href="download.php?id=<?php echo $row['id_consecutivo']?>" id="save-btn" class="btn btn-success">
                                        <i class="fas fa-download"></i>
                                        </a>
                                        </td>
                                    </tr>
                                   
                                  <?php 
                                } 
                                ?>
                          </tbody>

                            </thead>
                        
                        </table>
                        <a href="uploadinvoice.php" class="btn btn-success"><label>Upload invoice </label><i class="fas fa-upload"></i></a>
                        <button type="button" class="botonCambiarModo MoradoVerdeBotones-Mode btn btn-secondary btn-lg" onclick="CambiarModo()">Cambiar modo</button>

                </div>
                
                </div>
            </div>


        




<?php 
    Include('footer.html');
?>


<script>

function CambiarModo(){
    var body = document.body;
    body.classList.toggle("GrisAzulBody-Mode");
    var botones = document.getElementsByTagName("button");
    for(var i = 0; i < botones.length;i++){
        botones[i].classList.toggle("GrisAzulBotones-Mode");
    }
}


</script>