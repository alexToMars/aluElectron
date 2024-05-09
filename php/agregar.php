<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles2.css" rel="stylesheet">
</head>
<body class="bg-custom">
<div>
        <header id="headerEstElectronic" class="fixed-header">
            <div class="container text-center custom-head">
                <div class="row">
                    <div class="col-3">
                        <div class="row ">
                            <div class="col-6">
                                <img src="WhatsApp Image 2024-03-07 at 1.24.43 AM (2).jpeg" class="custom-img" alt="Logo">
                            </div>
                            <div class="col-6 apoyo_nav">
                                <p style="font-size: 22px;">Est electronics</p>
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
                    <div class="col-1"><a href="php/galeria.php" style="font-size: 2em;"><ion-icon name="cart-outline"></ion-icon></a></div>
                    
                </div>
            </div>
        </header>
        <nav class="text-center custom-nav">
            <br>
            <ul class="row">
                <li class="col-sm-3 nav_comps">
                    <a class="apoyo_nav">Componentes pasivos</a>
                </li>
                <li class="col-sm-3 nav_comps">
                    <a class="apoyo_nav">Componentes activos</a>
                </li>
                <li class="col-sm-3 nav_comps">
                    <a class="apoyo_nav">Microcontroladores</a>
                </li>
                <li class="col-sm-3 nav_comps">
                    <a class="apoyo_nav">Circuitos integrados</a>
                </li>
            </ul>
            <br>
        </nav>
        <br>
        <br><br>
    <div class="centrar">
        <br><br>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include("conectbd.php");
        $query = "SELECT * FROM productos WHERE idP=".$id.";";
        $Resultado = mysqli_query($conexion, $query);
        
        
        if($Resultado && mysqli_num_rows($Resultado) > 0) {
            $apoyoClass = "class=imagenestabla";
            $apoyoSrc = "../img/";
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
</body>
</html>
