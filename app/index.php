<?php
global $urlweb;
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo $urlweb?>/app/css/estilo.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Tienda Virtual - Olvin Varillas</title>
  </head>
<body>
  <div class="navbar-fixed">
    <nav class="black">
      <div class="nav-wrapper">
        <div class=container>
          <ul class="hide-on-med-down">
            <li><a href="<?php echo $urlweb?>" class="brand-logo center-align"><img src="app/img/LOGO-B.png" alt="" width="85%"></a></li>
          </ul>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="sass.html"><i class="material-icons left">account_circle</i>INICIAR SESION</a></li>
            <li><a href="badges.html" class="white-text"><i class="material-icons left">shopping_cart</i>MI CARRITO</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Notificaciones</a></li>
    <li><a href="badges.html">Carrito</a></li>
  </ul>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.slider');
      var instances = M.Slider.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.dropdown-trigger');
      var instances = M.Dropdown.init(elems);
    });

  </script>
  
  <div class="container">
    <div id="col s12">
      <?php $funciones->openModule($modulo);?>
    </div>
  </div>
  <footer class="page-footer black">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contactos</h5>
                <p class="grey-text text-lighten-4">
                  +504 9751-5711
                  +504 9623-4287
                </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Síguenos</h5>
                <ul>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://www.facebook.com/Olvinj11/" target="_blank"><img src="app/img/facebook.png" alt="" width="10%"></a></li>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://www.instagram.com/olvinj11/" target="_blank"><img src="app/img/instagram.png" alt="" width="10%"></a></li>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://paypal.me/olvinvarillas11?country.x=HN&locale.x=es_XC" target="_blank"><img src="app/img/paypal.png" alt="" width="10%"></a></li>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://open.spotify.com/user/12173377132?si=cbed78944c8f4bf0" target="_blank"><img src="app/img/spotify.png" alt="" width="10%"></a></li>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://twitter.com/Olvinj11" target="_blank"><img src="app/img/gorjeo.png" alt="" width="10%"></a></li>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://www.twitch.tv/olvinj11" target="_blank"><img src="app/img/twitch.png" alt="" width="10%"></a></li>
                  <li style="display:inline; padding-left:3px; padding-right:3px;"><a class="grey-text text-lighten-3" href="https://www.tiktok.com/@olvinj11" target="_blank"><img src="app/img/linkedin.png" alt="" width="10%"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2022 Shirt Shop, All rights reserved. 
            <a class="grey-text text-lighten-4 right" href="#!">@Olvinj11 in all Riot Games</a>
            </div>
          </div>
        </footer>
</body>
</html>