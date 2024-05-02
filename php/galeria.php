<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Galeria</title>
        <link href="../css/estilos.css" rel="stylesheet">
        
        <style>
            section{
                display: inline-block;
                background-color: #cde4ff;
                min-height: 720px;
                width: 100%;
            }
        </style>
        
    </head>

    <body>
    <header id="headerEstElectronic" class="fixed-header">
            <div class="container text-center custom-head">
                <div class="row">
                    <div class="col-3">
                        <div class="row ">
                            <div class="col-6">
                                <img src="img/WhatsApp Image 2024-03-07 at 1.24.43 AM (2).jpeg" class="custom-img" alt="Logo">
                            </div>
                            <div class="col-6">
                                <p>Est electronics</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-5">
                        <form>
                            <div class="row align-items-center"> 
                                <div class="col-10"> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-2"> 
                                    <ion-icon name="search" type="submit" form="myForm"></ion-icon>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-3">
                        <button type= "button" class="btn_custom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                              </svg>
                            Iniciar sesion
                        </button>
                    </div>
                    <div class="col-1"><ion-icon name="cart-outline"></ion-icon></div>
                </div>
            </div>
        </header>
        <nav class="text-center custom-nav">
            <ul class="row">
                <li class="col-sm-3 nav_comps">
                    <a>Componentes pasivos</a>
                </li>
                <li class="col-sm-3 nav_comps">
                    <a>Componentes activos</a>
                </li>
                <li class="col-sm-3 nav_comps">
                    <a>Microcontroladores</a>
                </li>
                <li class="col-sm-3 nav_comps">
                    <a>Circuitos integrados</a>
                </li>
            </ul>
        </nav>
        <section>
            <br>
            <table>
                <?php
                    $abrirTr="<tr>";
                    $cerrarTr="</tr>";
                    $abrirTd="<td>";
                    $cerrarTd="</td>";
                    $abrirTdImagen="<td class=tdImagen>";
                    $abrirTh="<th>";
                    $cerrarTh="</th>";
                    $apoyoSrc="../img/";
                    $apoyo2Img="../img/carrito.avif";
                    $apoyoClass2="class=carrito";
                    $apoyoImg="<img ".$apoyoClass2." src=".$apoyo2Img." alt=carritoCompras>";
                    include("conectbd.php");
                    $apoyoClass="class=imagenestabla";
                    $Resultado=mysqli_query($conexion, "SELECT * FROM productos WHERE existenciaP>5;");
                    echo $abrirTr.$abrirTh."Nombre".$cerrarTh.$abrirTh."Imagen de muestra".$cerrarTh.$abrirTh."Precio".$cerrarTh.$cerrarTr;
                    while($row=mysqli_fetch_array($Resultado)){
                        echo $abrirTr;
                        echo $abrirTd.$row['nombreP'].$cerrarTd;
                        echo $abrirTdImagen."<img ".$apoyoClass." src=".$apoyoSrc.$row['imagenP'].">".$cerrarTd;
                        echo $abrirTd.$row['precioP'].$cerrarTd;
                        echo $abrirTdImagen.$apoyoImg.$cerrarTd;
                        echo $cerrarTr;
                    }
                    mysqli_close($conexion);
                ?>
            </table>
            <br>
        </section>
    </body>
</html>