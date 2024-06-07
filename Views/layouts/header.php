<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Est Electronic</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="Util/css/styles2.css" rel="stylesheet">
  </head>
  <body class="bg-custom">
    <div>
        <header id="headerEstElectronic" class="fixed-header"> 
            <div class="container text-center custom-head">
                <div class="row">
                    <div class="col-2">
                        <div class="row ">
                            <div class="col-sm-6">
                                <img src="Util/img/logo.jpeg" class="custom-img" alt="Logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <br>
                        <form>
                            <div class="row align-items-center"> 
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-2"> 
                                    <ion-icon name="search" type="submit" form="myForm" style="font-size: 3em; color: rgb(50, 141, 50) ;"></ion-icon>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <div class="row">
                            <div class="col-sm-6" id="nav_login"><a href="Views/register.php"><input name="Agregar" class="btn btn-success btn_custom" type="submit" id="btnAgregar" value="Sign in"></a></div>
                            <br>
                            <div class="col-sm-6" id="nav_register"><a href="Views/login.php" ><input name="Agregar" class="btn btn-success btn_custom" type="submit" id="btnAgregar" value="Login"></a></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <br>
                    <div class="nav-item dropdown" id="nav_usuario" >
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                <span id="usuario_nav" style="font-size:20px;">Usuario logeado</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Mi perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i>Mis pedidos</a></li>
                <li><a class="dropdown-item" href="Controllers/logout.php"><i class="fas fa-user-times"></i>Cerrar sesion</a></li>
              </ul>
</div>
                    </div>
                    <div class="col-1"> <a href="galeria.php" style="font-size: 4em; color: rgb(50, 141, 50) ;"><ion-icon name="cart-outline" class="carrito"></ion-icon></a></div>
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