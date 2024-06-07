<?php
  include_once 'Views/Layouts/header.php';
?>
        <section>
            <table class="table table-bordered">
                <?php
                    $abrirTr="<tr>";
                    $cerrarTr="</tr>";
                    $abrirTd="<td class=tamanioLetra>";
                    $cerrarTd="</td>";
                    $abrirTdImagen="<td class=tdImagen>";
                    $abrirTh="<th>";
                    $cerrarTh="</th>";
                    $apoyoSrc="Util/img/";
                    $apoyo2Img="Util/img/carrito.avif";
                    $apoyoClass2="class=carrito";
                    $apoyoImg="<img ".$apoyoClass2." src=".$apoyo2Img." alt=carritoCompras>";
                    include("Controllers/conectbd.php");
                    $apoyoClass="class=imagenestabla";
                    $Resultado=mysqli_query($conexion, "SELECT * FROM producto WHERE existenciaP>5;");
                    echo $abrirTr.$abrirTh."Nombre".$cerrarTh.$abrirTh."Imagen de muestra".$cerrarTh.$abrirTh."Precio".$cerrarTh.$abrirTh.$cerrarTh.$cerrarTr;
                    while($row=mysqli_fetch_array($Resultado)){
                        $apoyohref="agregar.php?id=".$row['idP'];
                        $abrirAncla="<a href=".$apoyohref.">";
                        $cerrarAncla="</a>";
                        echo $abrirTr;
                        echo $abrirTd.$row['nombreP'].$cerrarTd;
                        echo $abrirTdImagen."<img ".$apoyoClass." src=".$apoyoSrc.$row['imagenP'].">".$cerrarTd;
                        echo $abrirTd.$row['precioP'].$cerrarTd;
                        echo $abrirTdImagen.$abrirAncla.$apoyoImg.$cerrarAncla.$cerrarTd;
                        echo $cerrarTr;
                    }
                    mysqli_close($conexion);
                ?>
            </table>
            <br>
            <div class="container text-center">
        </section>
<?php
include_once 'Views/layouts/footer.php';
?>