<?php
  include_once 'Views/Layouts/header.php';
?>
        <div class="externo-carrusel">
            <div class="carrucel container">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="Util/img/arduino.jpg" class="d-block w-100" alt="Arduino">
                                </div>
                                <div class="carousel-item">
                                    <img src="Util/img/circuitosIntegrados.jpg" class="d-block w-100" alt="Circuitos integrados">
                                </div>
                                <div class="carousel-item">
                                    <img src="Util/img/componentesPasivos.jpg" class="d-block w-100" alt="Componentes pasivos">
                                </div>
                                <div class="carousel-item">
                                    <img src="Util/img/transistores.jpg" class="d-block w-100" alt="Componentes activos">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <main>
                <h2 class="centrar-texto letras" style="text-align: center;">Ofertas del dia</h2>
                <div class="bg-gray seccion-ofertas">
                    
                    <div class="oferta-ind">
                        <!--Una vez que se tiene un componente se empieza a replicar-->
                        <div>
                            <img class="img-producto" src="Util/img/resistenciasStock.jpg" alt="Resistencia">
                        </div>
                        <div>
                            <span class="txt-base-carousel-section--discount ml-1">-10%</span>
                            <span class="txt-base-carousel-section--discount ml-1">Componente pasivo</span>
                        </div>
                        <div style="margin-top: 10px;">
                            <h3 class="ml-1 title-producto">Resistencia</h3>
                        </div>
                        <div class="ml-1" style="margin-top: 10px;">
                            <div class="txt-base-carousel-section-price ml-2">MNX/0.90
                                <!--Aca se pone el precio original-->
                                <label class="txt-base-carousel-section-price--dscto txt-base-carousel-section-price ">MNX/ 1.00</label>
                            </div>
                        </div>
                        <div class="float-right mr-2 mt-5">
                            <input type="submit" value="Agregar" class="botton-small boton--primario">
                        </div>
                    </div>
    
                    <div class="oferta-ind">
                        <!--Una vez que se tiene un componente se empieza a replicar-->
                        <div>
                            <img class="img-producto" src="Util/img/arduino-comp.jpg" alt="Arduino">
                        </div>
                        <div>
                            <span class="txt-base-carousel-section--discount ml-1">-10%</span>
                            <span class="txt-base-carousel-section--discount ml-1">Microcontrolador</span>
                        </div>
                        <div style="margin-top: 10px;">
                            <h3 class="ml-1 title-producto">Arduino uno</h3>
                        </div>
                        <div class="ml-1" style="margin-top: 10px;">
                            <div class="txt-base-carousel-section-price ml-2">MXN/ 315.00
                                <!--Aca se pone el precio original-->
                                <label class="txt-base-carousel-section-price--dscto txt-base-carousel-section-price ">MXN/ 350.00</label>
                            </div>
                        </div>
                        <div class="float-right mr-2 mt-5">
                            <input type="submit" value="Agregar" class="botton-small boton--primario">
                        </div>
                    </div>
    
                    <div class="oferta-ind">
                        <!--Una vez que se tiene un componente se empieza a replicar-->
                        <div>
                            <img class="img-producto"src="Util/img/capacitor.jpg" alt="capacitor">
                        </div>
                        <div>
                            <span class="txt-base-carousel-section--discount ml-1">-33%</span>
                            <span class="txt-base-carousel-section--discount ml-1">Componente pasivo</span>
                        </div>
                        <div style="margin-top: 10px;">
                            <h3 class="ml-1 title-producto">Capacitor</h3>
                        </div>
                        <div class="ml-1" style="margin-top: 10px;">
                            <div class="txt-base-carousel-section-price ml-2">MXN/ 8.00
                                <!--Aca se pone el precio original-->
                                <label class="txt-base-carousel-section-price--dscto txt-base-carousel-section-price ">MXN/ 12.00</label>
                            </div>
                        </div>
                        <div class="float-right mr-2 mt-5">
                            <input type="submit" value="Agregar" class="botton-small boton--primario">
                        </div>
                    </div>
    
                    <div class="oferta-ind">
                        <!--Una vez que se tiene un componente se empieza a replicar-->
                        <div>
                            <img class="img-producto"src="Util/img/raspberrystock.jpg" alt="raspberry">
                        </div>
                        <div>
                            <span class="txt-base-carousel-section--discount ml-1">-50%</span>
                            <span class="txt-base-carousel-section--discount ml-1">Microcontrolador</span>
                        </div>
                        <div style="margin-top: 10px;">
                            <h3 class="ml-1 title-producto">Raspberry</h3>
                        </div>
                        <div class="ml-1" style="margin-top: 10px;">
                            <div class="txt-base-carousel-section-price ml-2">MXN/ 200.00
                                <!--Aca se pone el precio original-->
                                <label class="txt-base-carousel-section-price--dscto txt-base-carousel-section-price ">MXN/ 400.00</label>
                            </div>
                        </div>
                        <div class="float-right mr-2 mt-5">
                            <input type="submit" value="Agregar" class="botton-small boton--primario">
                        </div>
                    </div>
    
                    <div class="oferta-ind">
                        <!--Una vez que se tiene un componente se empieza a replicar-->
                        <div>
                            <img class="img-producto"src="Util/img/picMicrocontroller.jpg" alt="pic">
                        </div>
                        <div>
                            <span class="txt-base-carousel-section--discount ml-1">-50%</span>
                            <span class="txt-base-carousel-section--discount ml-1">Microcontrolador</span>
                        </div>
                        <div style="margin-top: 10px;">
                            <h3 class="ml-1 title-producto">PIC</h3>
                        </div>
                        <div class="ml-1" style="margin-top: 10px;">
                            <div class="txt-base-carousel-section-price ml-2">MXN/ 40.00
                                <!--Aca se pone el precio original-->
                                <label class="txt-base-carousel-section-price--dscto txt-base-carousel-section-price ">MXN/ 80.00</label>
                            </div>
                        </div>
                        <div class="float-right mr-2 mt-5">
                            <input type="submit" value="Agregar" class="botton-small boton--primario">
                        </div>
                    </div>
                </div>
            </main>
            <br><br>
                <!-- Ayudanos a mejorar -->
            <section class="contenedor letras">
                <h3 class="centrar-texto">Ayudanos a mejorar</h3>
                <br>
                <div class="contacto-bg"></div>
                <br><br>
                <form class="formulario" style="font-size: 12px;">
                    <div class="campo">
                        <label class="campo_label" for="name">Nombre</label>
                        <input type="text" class="campo__field" placeholder="Tu nombre completo" id="nombre">
                    </div>
                    <div class="campo">
                        <label class="campo_label" for="name">Asunto</label>
                        <input type="text" class="campo__field" placeholder="Asunto de tu recomendacion" id="nombre">
                    </div>
                    <div class="campo">
                        <label class="campo_label" for="name">Detalle</label>
                        <textarea type="text" class="campo__field campo__field--textarea" placeholder="Tu nombre completo" id="mensaje"></textarea>
                    </div>
                    <div class="campo">
                        <input type="submit" value="Enviar" style="background-color: rgb(59, 138, 59);" class="botton botton--primario">
                    </div>
                </form>
            </section>
            <br>
            
        </div>  
    </div>
<?php
include_once 'Views/layouts/footer.php';
echo 'Incluido exitosamente';
?>
