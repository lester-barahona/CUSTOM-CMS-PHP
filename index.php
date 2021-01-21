<?php
require_once('admin/ln/ln_configurations.php');
require_once('admin/ln/ln_slides.php');
require_once('admin/ln/ln_pages.php');
$ln_conf=new Ln_configurations();
$ln_slides=new Ln_slides();
$ln_pages=new Ln_pages();
$pages=$ln_pages->get_pages('');
$slides=$ln_slides->get_slides();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:500|Roboto+Condensed:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="admin/<?= $ln_conf->get_configuration_by_name('logo')['conf_value'];?>">
    <title>Inicio</title>
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
            <li class="nav-item"><a class="nav-link2 active-link" href="index.php">Inicio</a></li>
            <?php foreach($pages as $page) {?> 
                <li class="nav-item "><a class="nav-link2 " href="page.php?id_page=<?= $page['id_page']?>"><?= $page['title']?></a></li> 
            <?php }?>
            <li class="nav-item"><a class="nav-link2" href="contact.php">Contacto</a></li> 
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

      <!------------------------------------------------------------------------------- TITLES-->
      <div class="container-fluid p-5">
            <div class="container">
                <div class="row">
                    <?php foreach($ln_conf->get_configurations_by_category('title') as $title){?>
                        <div class="col-sm-12 col-md-4 p-4 ">
                            <div class="title-container p-4 ">
                            <?= $title['conf_value']?>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
      </div>

      <!-------------------------------------------------------------------------------- BRAND-->
      <section class="bg-dark p-5">
        <div class="container text-center">
            <h3 class="text-muted"><?= $ln_conf->get_configuration_by_name('brand')['conf_value']?></h3>
            <a class="btn btn-contact" href="contact.php">Contacto</a>
        </div>
      </section>

      <!------------------------------------------------------------------------------ GALLERY-->
      <section>
        <div class="container-fluid p-0 container-gallery-grid">
                        <div class="img-container img-gallery-1"><img src="admin/<?= $ln_conf->get_configuration_by_name('img_gallery_1')['conf_value']?>" alt=""></div>
                        <div class="img-container img-gallery-2"><img src="admin/<?= $ln_conf->get_configuration_by_name('img_gallery_2')['conf_value']?>" alt=""></div>
                        <div class="img-container img-gallery-3"><img src="admin/<?= $ln_conf->get_configuration_by_name('img_gallery_3')['conf_value']?>" alt=""></div>
                        <div class="img-container img-gallery-4"><img src="admin/<?= $ln_conf->get_configuration_by_name('img_gallery_4')['conf_value']?>" alt=""></div>
        </div>
      </section>

      <!------------------------------------------------------------------------------ FOOTER-->
      <footer class="bg-dark p-5 text-center text-muted">
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