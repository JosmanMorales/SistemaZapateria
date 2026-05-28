<?php
session_start();
if($_SESSION["nombre"]=="" || $_SESSION["nombre"]==null){
    header("Location: http://localhost/Proyecto_zapateria/ver/login");
}
echo '
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
  <title>SISTEMA UMG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Zapateria">
    <title>Sistema Zapateria</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
 

</head>

<body class="animate__animated animate__fadeIn">
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="http://localhost/Proyecto_zapateria/Ver/dashboard">Sistema Zapateria UMG</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-header">
      <div class="user-pic">';
        if($_SESSION['imagen']==null){
          echo '<img class="img-responsive img-rounded" src="../assets/img/user_icon.jpg" alt="User picture">';
        }else{
          echo '<img class="img-responsive img-rounded" src="../assets/img/fotos_users/'.$_SESSION['imagen'].'" alt="User picture">';
        }          
        echo '
      </div>
      <div class="user-info">
        <span class="user-name">
          '.$_SESSION['nombre'].'
        </span>
        <span class="user-role">Administrator</span>
        <span class="user-status">
          <i class="fa fa-circle"></i>
          <span>Online</span>
        </span>
      </div>
    </div>

      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="">
            <a href="http://localhost/Proyecto_zapateria/Ver/marca">
              <i class="far fa-registered"></i>
              <span>Marca</span>
            </a>
          </li>
          <li class="">
            <a href="http://localhost/Proyecto_zapateria/Ver/proveedor">
              <i class="fas fa-people-carry"></i>
              <span>Proveedor</span>              
            </a>
          </li>
          <li class="">
            <a href="http://localhost/Proyecto_zapateria/Ver/cliente">
              <i class="fas fa-user-friends"></i>
              <span>Cliente</span>
            </a>      
          </li>
              
        </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-box-open"></i>
              <span>Producto</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://localhost/Proyecto_zapateria/Ver/zapato">Registrar Zapato</a>
                </li>
                <li>
                <a  href="http://localhost/Proyecto_zapateria/Ver/ingresos">Registrar factura de compra</a>
              </li>
                <li>
                  <a href="http://localhost/Proyecto_zapateria/Ver/detalle_ingreso">Registrar ingreso Zapato</a>
                </li>
               
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-dollar-sign"></i>
              <span>Venta</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              <li>
              <a href="http://localhost/Proyecto_zapateria/Ver/productos">Producto Venta</a>
                </li>
                <li>
                  <a href="http://localhost/Proyecto_zapateria/Ver/carrito">Carrito</a>
                </li>
                <li>
                  <a href="http://localhost/Proyecto_zapateria/Ver/ventas_hechas">Ventas hechas</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="http://localhost/Proyecto_zapateria/Ver/perfil">Ver Perfil</a>
            <a class="dropdown-item" href="http://localhost/Proyecto_zapateria/Ver/editar_perfil">Editar Perfil</a>
          </div>
      </a>
      <a href="http://localhost/Proyecto_zapateria/Cerrar_session/cerrar">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content h-100">
    <div class="container-fluid contenedor">
';
?>