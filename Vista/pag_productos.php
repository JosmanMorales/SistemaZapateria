<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <title>Productos</title>
</head>
<body>
    <header class="container-fluid">
      <div class="row justify-content-md-between align-items-center">
        <div class="col-lg-4 text-lg-left text-center">
          <a href="index.html"> 
            <img src="../assets/img/logo_zapato.png" width="150" class="img-fluid"> 
          </a>
        </div>
        <div class="col-lg-4">
          <nav class="sociales text-lg-right text-center">
            <ul>
              <li><a href="http://Facebook.com" target="_blank"><i class="fab fa-facebook"></i> <span class="sr-only">Facebook</span></a></li>
              <li><a href="http://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i> <span class="sr-only"> Twitter</span></a></li>
              <li><a href="http://Instagram.com" target="_blank"><i class="fab fa-instagram"></i> <span class="sr-only"> Instagram</span></a></li>
              <li><a href="http://pinterest.com" target="_blank"><i class="fab fa-pinterest"></i><span class="sr-only"> Pinterest</span></a></li>
              <li><a href="http://youtube.com" target="_blank"><i class="fab fa-youtube"></i> <span class="sr-only"> YouTube</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="container productos py-5">
        <h1 class="text-center">Nuestros Productos</h1>

        <div class="row">
        <div class="card-columns">
                <?php
                  $Cargar = new Cargar();
                  $Cargar->cargarZapato();
                ?>
        </div> 
        </div>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../assets/js/Productos.js"></script>
</body>
</html>