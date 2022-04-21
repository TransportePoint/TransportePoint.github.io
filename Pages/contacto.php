<?php 
  include('header.html');
?>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="../assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap">
                                <h2>Contacto</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="#">Contacto</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!--? our info Start -->
    <div class="our-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="info-caption">
                            <p>Atención al cliente</p>
                            <span>+52 (867) 158-73-56</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-clock"></span>
                        </div>
                        <div class="info-caption">
                            <p>Horario</p>
                            <span>Lunes - Sabado 8:00 am - 18:00 pm</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-place"></span>
                        </div>
                        <div class="info-caption">
                            <p>Carretera Piedras Negras #1203</p>
                            <span>Nuevo Laredo, Tamaulipas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our info End -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">

            <form id="contact-form" method="post" action="../database/contact.php" role="form">
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nombre *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="NOMBRE" required="required" data-error="Ingrese su nombre.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Apellido *</label>
                                    <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="APELLIDO" required="required" data-error="Ingrese su apellido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="EMAIL*" required="required" data-error="Ingrese Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Mensaje *</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="MENSAJE" rows="4" required="required" data-error="Ingresa algun mensaje."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Send message">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    </div>
                        </div>
                    </div>
            </form>
            </div>
            <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3537.899678963649!2d-99.57350178494167!3d27.534575682863817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86611fca50e8ad29%3A0x7f26dd38c281f196!2sTransportes%20Point!5e0!3m2!1ses-419!2smx!4v1631237426187!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>


        </div>
    </div>
   

        </main>
<?php 
  include('footer.html');
?>