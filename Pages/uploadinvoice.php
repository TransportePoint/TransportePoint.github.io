<?php
    Include('header.html');
?>
    <form id="xmlForm" name="xmlForm" class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!--Number freight-->
                    <div class="form-group">
                        <label for="numberfreight">Number freight:</label>
                        <input type="text" class="form-control" name="numberfreight" id="numberfreight"
                            placeholder="Number Freight">
                    </div>

                    <!--Customer-->
                    <div class="form-group">
                        <label for="Customer">Customer</label>
                        <input type="text" class="form-control" name="Customer" id="Customer" placeholder="Customer">
                    </div>

                    <!--Commodity-->
                    <div class="form-group">
                        <label for="Commodity">Commodity</label>
                        <input type="text" class="form-control" name="Commodity" id="Commodity" placeholder="Commodity">
                    </div>


                    <!--invoice date-->
                  <div class="form-group">
                              <label for="invoicedate">invoice date </label>
                              <input type="date" class="form-control" name="invoicedate" id="invoicedate">
                          </div>   
                </div>
                <div class="col-md-4">

                    <!--Cost-->
                    <div class="form-group">
                        <label for="Cost">Cost</label>
                        <input type="text" class="form-control" name="Cost" id="Cost" placeholder="Cost">
                    </div>

                    <!--exchange rate-->
                    <div class="form-group">
                        <label for="exchangerate">exchange rate</label>
                        <input type="text" class="form-control" name="exchangerate" id="exchangerate" placeholder="Exchange rate" >
                    </div>


                    <!--IVA-->
                    <div class="form-group">
                        <label for="IVA">IVA</label>
                        <input type="text" class="form-control" name="IVA" id="IVA" placeholder="IVA">
                    </div>

                    <!--retention-->
                    <div class="form-group">
                        <label for="retention">retention</label>
                        <input type="text" class="form-control" name="retention" id="retention" placeholder="Retention">
                    </div>

                </div>
                <div class="col-md-4">
                    <!--calculated total-->
                    <div class="form-group">
                        <label for="calculatedtotal">calculated total</label>
                        <input type="text" class="form-control" name="calculatedtotal" id="calculatedtotal"
                            placeholder="Calculated total">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 text-center mt-4">
                        <div>
                            <label for="input">Elija un archivo XML</label>
                        </div>
                        <div class="m-3">
                            <input id="input" type="file" accept="text/xml">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 text-center mt-4">
                        <input type="submit" value="Cargar" class="btn btn-primary">
                    </div>


                    <button type="button" class="botonCambiarModo MoradoVerdeBotones-Mode btn btn-secondary btn-lg" onclick="CambiarModo()">Cambiar modo</button>


                </div>

            </div>
        </div>
        </div>
    </form>


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