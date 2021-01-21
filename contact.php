<?php
require_once('admin/ln/ln_configurations.php');
require_once('admin/ln/ln_slides.php');
require_once('admin/ln/ln_pages.php');
$ln_conf=new Ln_configurations();
$ln_pages=new Ln_pages();
$ln_slides=new Ln_slides();
$slides=$ln_slides->get_slides();
$pages=$ln_pages->get_pages('');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:500|Roboto+Condensed:300,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e69abb704.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/general.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="shortcut icon" href="admin/<?= $ln_conf->get_configuration_by_name('logo')['conf_value'];?>">
    <title>Contacto</title>
  </head>
  <body>

    <!-------------------------------------------------------------------------- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand2 mb-2" href="#"><img class="d-inline-block align-top"  src="admin/<?= $ln_conf->get_configuration_by_name('logo')['conf_value']?>" width="40px"> <?= $ln_conf->get_configuration_by_name('name')['conf_value']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item"><a class="nav-link2" href="index.php">Inicio</a></li>
            <?php foreach($pages as $page) {?> 
                <li class="nav-item "><a class="nav-link2 " href="page.php?id_page=<?= $page['id_page']?>"><?= $page['title']?></a></li> 
            <?php }?>
            <li class="nav-item"><a class="nav-link2 active-link" href="contact.php">Contacto</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <!---------------------------------------------------------------------------SLIDER -->
    <section class="m-0" id="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
                <?php for ($i=0; $i < count($slides); $i++) { ?>   
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i?>" class="<?= ($i==0)?'active':'';?>"></li>
                <?php }?>
          </ol>
          <div class="carousel-inner card-container">
          <?php for($i=0; $i < count($slides); $i++) {?>
            <div class="carousel-item card-container <?= ($i==0)?'active':'';?>">
              <img class="d-block " src="admin/<?= $slides[$i]['url']?>" alt="">
              <div class="carousel-caption">
                <p class="lead d-none d-sm-block"><?= $slides[$i]['text_content']?></p>
              </div>
            </div> 
          <?php }?>
        
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>
 
     <!------------------------------------------------------------------------------ INFORMATION-->
       <div class="container mt-5 mb-5">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <h3>SECCIÓN DE CONTACTO</h3>  
                <p>En esta parte de nuestro sitio web podras encontrar información, para poder contactarnos como por ejemplo nuestras redes sociales de FaceBook, Instagram y Otros. Además de nuestros
                  numeros telefonicos y un formulario de contacto. Te invitamos a contactarnos te esperamos.
                </p>
             </div>

              <div class="col-sm-12 col-md-6">
                <div class="row">
                <div class="col-sm-12 col-md-6 text-left">
                    <h3 class="border-bottom"><?= $ln_conf->get_configuration_by_name('name')['conf_value']?></h3>
                    <h5 class="pt-3">Redes Sociales</h5>
                    <?php foreach ($ln_conf->get_configurations_by_category('social') as $social) {?>
                        <a class="d-block p-3 links-social" href="<?= $social['conf_value']?>"><i class="fab fa-<?= $social['conf_name']?>"></i>  <?= $social['conf_name']?></a>
                    <?php }?>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center"><img width="200px" height="200px" src="admin/<?= $ln_conf->get_configuration_by_name('logo')['conf_value']?>" alt=""></div>
                </div>
                </div>
            </div>
       </div>
      <!------------------------------------------------------------------------------ CONTACT-->

    <div class="container-fluid container-contact-full bg-dark">
        <div class="container ">
            <div class="row container-contact">
                <div class="col-sm-12 col-md-6 container-form">
                    <form class="form">
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <input type="text" class="form-control text-white id="validationDefault01"  placeholder="Nombre" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <input type="text" class="form-control text-white" id="validationDefault02" placeholder="Correo" required>
                          </div>
                         
                        </div>
                        <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <textarea class="form-control text-white" id="exampleFormControlTextarea1" rows="3" placeholder="Mensaje"></textarea>
                          </div>
                       
                        </div>
                  
                        <button class="btn-enviar float-right" type="submit">Enviar</button>
                      </form>
                </div>


                <div class="col-sm-12 col-md-6 container-contacts-full">
                    <div class="container container-contacts">
                        <div class="item-cotact"><i class="fas fa-phone-alt contact"></i><p><?= $ln_conf->get_configuration_by_name('phone')['conf_value']?></p></div>
                        <div class="item-cotact"v><i class="fas fa-envelope"></i><p><?= $ln_conf->get_configuration_by_name('email')['conf_value']?></p></div>
                        <div class="item-cotact"><i class="fas fa-location-arrow"></i><p>Siquirres, Limón, Costa Rica, 500mts oeste de la <br> plaza central.</p></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!------------------------------------------------------------------------------ FOOTER-->
      <footer class="copy p-5 text-center bg-dark text-muted">
        <div class="footer-copyright py-3">© 2020 Copyright:
            <a href="#"> <?= $ln_conf->get_configuration_by_name('name')['conf_value']?></a>
        </div>
      </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php
?>