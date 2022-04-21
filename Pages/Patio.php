<?php 
    Include('header.html');
?>
    <div class="container">
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Operador</label>
                            <input type="text" class="form-control" id="idOperador" placeholder="Nombre Operador">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Caja</label>
                            <input type="text" class="form-control" id="idCaja" placeholder="Numero de caja">
                        </div>
                   </form>      
                </div> 


                <div class="col-lg-4 col-md-6 col-sm-6">
                <label>Linea de transporte:</label>

                <div class="form-group">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>          
                <br>
                <br>
                        <label>Fecha Entrada:</label>
                            <div class="form-group">
                                <input type="Date" name="departure" class="form-control" placeholder="Departure date" >
                            </div>
                </div>
                
                
                <div class="col-lg-4 col-md-6 col-sm-6">
                        <label>Fecha Salida</label>
                            <div class="form-group">
                                <input type="Date" name="departure" class="form-control" placeholder="Departure date" >
                            </div>
                        <label>Usuario</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="idOperador" placeholder="Usuario registra" readonly>
                            </div>
                </div> 
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
             <input type="submit" class="btn btn-success btn-block" name="save_trip" value="Save trip">
             </div> 
        </div>
    </div>

    
    <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Operador</th>
                        <th scope="col">Caja</th>
                        <th scope="col">Linea transporte</th>
                        <th scope="col">Fecha Llegada</th>
                        <th scope="col">Fecha Salida</th>
                        <th scope="col">Total horas</th>
                        <th scope="col">Total pagar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>     
           </div>
        </div>
    </div>



<?php 
    Include('footer.html');
?>