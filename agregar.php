<?php
  include_once 'Views/Layouts/header.php';
?>
    <div class="centrar">
        <br><br>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include("Controllers/conectbd.php");
        $query = "SELECT * FROM producto WHERE idP=".$id.";";
        $Resultado = mysqli_query($conexion, $query);
        
        
        if($Resultado && mysqli_num_rows($Resultado) > 0) {
            $apoyoClass = "class=imagenestabla";
            $apoyoSrc = "Util/img/";
            while($row = mysqli_fetch_array($Resultado)) {
                echo "<img ".$apoyoClass." src=".$apoyoSrc.$row['imagenP'].">";
                echo'<form action="acumular3.php" method="post" name="AgregarCarrito">';
                echo'<input type="text" name="nombre" class="borde" value="'.htmlspecialchars($row['nombreP']).'" readonly="readonly">'."<br><br>";
                echo"&nbsp;&nbsp;";
                echo'$<input type="text" name="precio" class="borde" size="1" value="'.$row['precioP'].'" readonly="readonly">MXN';
                echo"&nbsp;&nbsp;";
                echo'<input type="number" placeholder="Cantidad a Pedir" name="cantidad" size="8" max="10" min="1">';
                echo"&nbsp;&nbsp;";
                echo'<input name="Agregar" class="btn btn-success" type="submit" id="btnAgregar" value="AGREGAR">';
                echo'</form>';
            }
        } else {
            echo "No se encontraron resultados para el ID proporcionado.";
        }
        mysqli_close($conexion);
    } else {
        echo "No se proporcionó ningún ID en la URL.";
    }
    ?>
    </div>
    <br><br><br>
    
<?php
include_once 'Views/layouts/footer.php';
?>
