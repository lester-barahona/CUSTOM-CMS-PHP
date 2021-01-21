<?php
require_once('admin/ln/ln_configurations.php');
require_once('admin/ln/ln_pages.php');
require_once('admin/ln/ln_images.php');
$ln_conf=new Ln_configurations();
$ln_pages=new Ln_pages();
$ln_images=new Ln_images();
$page=$ln_pages->get_page($_GET['id_page']);
$pages=$ln_pages->get_pages('');
$images=$ln_images->get_images_by_page($page['id_page']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:500|Roboto+Condensed:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_page.css">
    <link rel="shortcut icon" href="admin/<?= $ln_conf->get_configuration_by_name('logo')['conf_value'];?>">
    <link href="assets/vendor/ligth-box/venobox/venobox.css" rel="stylesheet" />
    <title><?= $page['title']?></title>
  </head>
  <body>

    <!-------------------------------------------------------------------------- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand2 mb-2" href="#"><img class="d-inline-block align-top"  src="admin/<?= $ln_conf->get_configuration_by_name('logo')['conf_value']?>" width="40px"> <?= $ln_conf->get_configuration_by_name('name')['conf_value']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item"><a class="nav-link2" href="index.php">Inicio</a></li>
            <?php foreach($pages as $pag) {?> 
                <li class="nav-item "><a class="nav-link2 <?= ($page['id_page']==$pag['id_page'])?'active-link':''?> " href="page.php?id_page=<?= $pag['id_page']?>"><?= $pag['title']?></a></li> 
            <?php }?>
            <li class="nav-item"><a class="nav-link2" href="contact.php">Contacto</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <!--------------------------------------CONTENT ------------>
    <div class="container mt-5"><h1><?= $page['title']?></h1></div>
    <div class="container text-container"><?= $page['content']?></div>
    <div class="container border-bottom text-center mb-3"><h3>Galería</h3></div>


    <!--------------------------------------------GALLERY LIGTHBOX -->
    <div class="container gallery d-flex justify-content-center flex-wrap mb-5">
        <?php for ($i=0; $i <count($images); $i++) {?>
            <a class="venobox m-4" data-gall="gall1" title="Imagen <?= $i+1;?>" href="admin/<?= $images[$i]['url'];?>"><img src="admin/<?= $images[$i]['url'];?>" ></a>
        <?php }?>
    </div>

    <!--------------------------------------------FOOTER -->
    <footer class="bg-dark p-5 text-center text-muted">
        <div class="footer-copyright py-3">© 2020 Copyright:
            <a href="#"> <?= $ln_conf->get_configuration_by_name('name')['conf_value']?></a>
        </div>
      </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Ligthbox -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="assets/vendor/ligth-box/venobox/venobox.js"></script>
    <script src="assets/js/script.js"></script>
    
</body>
</html>

<?php

?>