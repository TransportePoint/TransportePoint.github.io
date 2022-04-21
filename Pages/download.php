<?php
Include('../database/db.php');


        if(isset($_GET['id'])){

            $id_consecutivo=$_GET['id'];

            $query="call spAllTrip  ('$id_consecutivo')";

            $result=mysqli_query($conexion, $query);

            // comprobar cuantas filas tiene mi resultado
            //nombre de como esta en la base de datos.
            if(mysqli_num_rows($result) == 1){
                $row=mysqli_fetch_array($result);
                $FLETE=$row['id_viaje'];
                $CUSTOMER=$row['id_customer'];
                $COMMODITY=$row['id_mercancia'];

            }
            $result->Close();
            $conexion->next_result();

             //nombre de mercancia
             $nombreCustomer="call spNameCustomer  ('$CUSTOMER')";
             $resultadoCustomer=mysqli_query($conexion,$nombreCustomer);
 
             while($resultadonameCustomer= mysqli_fetch_array($resultadoCustomer)){
                 $nameCustomer = $resultadonameCustomer[0];
             } 

             $resultadoCustomer->Close();
             $conexion->next_result();

            //nombre de mercancia
            $nombreMercancia="call spNameMercancia  ('$COMMODITY')";
            $resultadoCommodity=mysqli_query($conexion,$nombreMercancia);

            while($resultadonameCommodity = mysqli_fetch_array($resultadoCommodity)){
                $nameCommodity = $resultadonameCommodity[0];
            } 
            $resultadoCommodity->Close();
            $conexion->next_result();
            

        }

        function totalFacturaImporte(){
            $totalImporte=$cost*$exchangerate;
            $Impuestos=($IVA*$totalImporte)*$Retencion;
            $totalFactura=$totalImporte+$Impuestos;
        }

?>

<?php
    Include('header.html');
?>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
            <form method="post" name = "form" action="">
                      <!--Number freight-->  
                      <div class="form-group">
                          <label for="">Number freight:</label>
                          <input  type="text" class="form-control" name="numberfreight" id="numberfreight" placeholder="Number Freight"
                          style="text-transform:uppercase;" value="<?php echo $FLETE; ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();"
                          disabled>
                      </div>
              
                      <!--Customer-->  
                      <div class="form-group">
                          <label for="">Customer</label>
                          <input type="text" class="form-control" name="Customer" id="Customer" placeholder="Customer"
                          style="text-transform:uppercase;" 
                          value="<?php echo $nameCustomer?>"
                          disabled>
                      </div>
              
                      <!--Commodity-->  
                      <div class="form-group">
                          <label for="">Commodity</label>
                          <input type="text" class="form-control" name="Commodity" id="Commodity" placeholder="Commodity"
                          style="text-transform:uppercase;" value="<?php echo $nameCommodity; ?>" disabled >                           
                      </div>

                      
                <!--invoice date-->
                        <div class="form-group">
                            <label for="">invoice date </label>
                            <input type="date" class="form-control" name="invoicedate" id="invoicedate" >
                        </div>  

                        <!--Cost-->
                      <div class="form-group">
                        <label for="">Cost</label>
                        <input type="text" class="form-control" name="Cost" id="Cost" change="calcular();" placeholder="Cost"
                        style="text-transform:uppercase;" value="">
                    </div>

                    <!--exchange rate-->
                    <div class="form-group">
                        <label for="">exchange rate</label>
                        <input type="text" class="form-control" name="exchangerate" id="exchangerate" change="calcular();" placeholder="Exchange rate"
                        style="text-transform:uppercase;" value="">
                    </div>

                    
                    <!--IVA-->
                    <div class="form-group">
                        <label for="">IVA</label>
                        <input type="text" class="form-control" name="IVA" id="IVA" change="calcular();" placeholder="IVA"
                        style="text-transform:uppercase;" value="">
                    </div>

                     <!--retention-->
                     <div class="form-group">
                        <label for="">retention</label>
                        <input type="text" class="form-control" name="retention"  change="calcular();" id="retention" placeholder="Retention"
                        style="text-transform:uppercase;" value="">
                    </div>

                <!--calculated total-->
                <div class="form-group">
                        <label for="">calculated total</label>
                        <input type="text" class="form-control" name="calculatedtotal" id="calculatedtotal" placeholder="Calculated total"
                        style="text-transform:uppercase;" value="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" id="save-btn">Download xml</button>

                    <button type="button" class="btn btn-primary btn-lg" id="totalImporte" onClick="calcular();">Calcular total factura</button>

                    </form>
     
                     

            </div>
            <div class="col-md-4">  
                <!--calculated total-->

                        <button type="button" class="botonCambiarModo MoradoVerdeBotones-Mode btn btn-secondary btn-lg" onclick="CambiarModo()">Cambiar modo</button>

                
            </div>


        </div>
    </div>


<?php
    Include('footer.html');
?>

<script>
    function calcular(){
        /*alert("ok");*/
        let Cost= document.getElementById("Cost").value;
        let exchangerate= document.getElementById("exchangerate").value;
        let retention= document.getElementById("retention").value;
        let iva= document.getElementById("IVA").value;
        alert(Cost);
        let calculatedtotal= document.getElementById("calculatedtotal").value;
        document.getElementById(calculatedtotal).value =calculatedtotal;

        // calculatedtotal=document.getElementById("12").value;
}
function CambiarModo(){
    var body = document.body;
    body.classList.toggle("GrisAzulBody-Mode");
    var botones = document.getElementsByTagName("button");
    for(var i = 0; i < botones.length;i++){
        botones[i].classList.toggle("GrisAzulBotones-Mode");
    }
}


</script>