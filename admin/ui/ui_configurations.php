<?php
require_once('UI.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/ln/ln_configurations.php');

class Ui_configurations extends UI{

    var $ln;

    function __construct($settings){
        parent::__construct($settings);
        $this->ln=new Ln_configurations();
    }

    function action_controller(){
        $this->ln->action_controller();
    }

    function get_content(){
        if(isset($_GET['view'])){

            switch ($_GET['view']) {
                case 'information':
                        $this->get_form_information();
                    break;
                
                case 'social':
                    $this->get_form_social();
                    break;

                case 'inicio':
                    $this->get_form_titles();
                    $this->get_gallery();
                break;   

                default:
                    exit();
                break;
            }

        }        
    }
    //--------------------------------------------------------------------FORM INFORMATION
    function get_form_information(){
        $data=$this->ln->get_configurations_by_category('information');
        ?>
        <div class="col-md-6 mt-2">
            <div class="x_panel">
                  <div class="x_title"><h2>Información<small>Información general de la pagina</small></h2><div class="clearfix"></div></div>
                  <div class="x_content">                
                    <form class="form-information" data-parsley-validate class="form-horizontal form-label-left"
                     method="POST" enctype="multipart/form-data" action='configurations.php?action=update'>                    
                    
                    <input type="hidden" name="conf_name_image" value="<?= $data[0]['conf_name']?>">
                    <input type="hidden" name="url" value="<?= $data[0]['conf_value']?>">

                    <label style="width:100%; text-align:center;">Logo Actual</label>
                    <div class="d-flex justify-content-center mb-2"><img src="<?= $data[0]['conf_value']?>" width="100" height="100"></div>        
                    <div class="form-group">
                        <i class="fa fa-image"></i>
                        <label for="custom-file">Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input overflow-hidden" id="file-input" name="image"  accept="image/png, image/jpeg">
                            <label class="custom-file-label overflow-hidden" for="customFile">imagen</label>
                        </div> 
                    </div> 
                    <div class="form-group">
                        <i class="fa fa-building-o"></i>
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="<?= $data[1]['conf_value']?>" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope"></i>
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" value="<?= $data[2]['conf_value']?>" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone"></i>
                        <label for="phone">Teléfono</label>
                        <input type="number" class="form-control" name="phone" value="<?= $data[3]['conf_value']?>" required>
                    </div>
                    <div class="ln_solid"></div>                      
                    <div class="form-group float-right">  
                        <button type="submit" class="btn btn-success">Guardar Cambios <i class="fa fa-check"></i></button>  
                    </div>
                    </form>                    
                </div>
            </div>
        </div>
    <?php
    }
    //--------------------------------------------------------------------FORM SOCIAL

    function get_form_social(){
        $data=$this->ln->get_configurations_by_category('social');
        ?>
        <div class="col-md-6 mt-2">
            <div class="x_panel">
                  <div class="x_title"><h2>Redes Sociales<small>Enlaces a las Paginas</small></h2><div class="clearfix"></div></div>
                  <div class="x_content">     
                    <form class="form-social" data-parsley-validate class="form-horizontal form-label-left"
                     method="POST" action='configurations.php?action=update'>              
                    <div class="form-group">
                        <i class="fa fa-facebook"></i>
                        <label for="facebook">FaceBook</label>
                        <input type="text" class="form-control" name="facebook" value="<?= $data[0]['conf_value']?>" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-twitter"></i>
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="<?= $data[1]['conf_value']?>" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-instagram"></i>
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="<?= $data[2]['conf_value']?>" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-youtube"></i>
                        <label for="youtube">YouTube</label>
                        <input type="text" class="form-control" name="youtube" value="<?= $data[3]['conf_value']?>" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-pinterest"></i>
                        <label for="Pinteres">Pinterest</label>
                        <input type="text" class="form-control" name="Pinterest" value="<?= $data[4]['conf_value']?>" required>
                    </div>
                    <div class="ln_solid"></div>     
                    <div class="form-group float-right">  
                        <button type="submit" class="btn btn-success">Guardar Cambios <i class="fa fa-check"></i></button>  
                    </div>

                    </form>                    
                  </div>
            </div>
        </div>
        <?php
    }

    //--------------------------------------------------------------------FORM INICIO
    function get_form_titles(){
        $titles=$this->ln->get_configurations_by_category('title');
        ?>
        <div class="col-sm-12 col-md-5 mt-2">
            <div class="x_panel">
                  <div class="x_title"><h2>Contenidos<small>Contenidos principales de la pagina</small></h2><div class="clearfix"></div></div>
                  <div class="x_content">     
                    <form id="" data-parsley-validate class="form-horizontal form-label-left"
                     method="POST" action='configurations.php?action=update'>              
                            <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-title1-tab" data-toggle="tab" href="#nav-title1" role="tab" aria-controls="nav-title1" aria-selected="true">Titulo 1</a>
                                <a class="nav-item nav-link" id="nav-title2-tab" data-toggle="tab" href="#nav-title2" role="tab" aria-controls="nav-title2" aria-selected="false">Titulo 2</a>
                                <a class="nav-item nav-link" id="nav-title1-tab" data-toggle="tab" href="#nav-title3" role="tab" aria-controls="nav-title3" aria-selected="false">Titulo 3</a>
                            </div>
                            </nav>
                            <div class="mt-3 tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-title1" role="tabpanel" aria-labelledby="nav-title1-tab">
                                <label for="title1">Contenido Titulo 1</label>
                                <textarea class="form-control tiny" name="title1" required><?= $titles[0]['conf_value']?></textarea>
                            </div>
                            <div class="tab-pane fade" id="nav-title2" role="tabpanel" aria-labelledby="nav-title2-tab">
                                <label for="title2">Contenido Titulo 2</label>
                                <textarea class="form-control tiny" name="title2" required><?= $titles[1]['conf_value']?></textarea>
                            </div>
                            <div class="tab-pane fade" id="nav-title3" role="tabpanel" aria-labelledby="nav-title3-tab">
                            <label for="title3">Contenido Titulo 3</label>
                            <textarea class="form-control tiny" name="title3" required><?= $titles[2]['conf_value']?></textarea>
                            </div>
                            </div>

                        <div class="form-group mt-4">
                            <label for="brand">Titulo Cinta</label>
                            <input type="text" class="form-control" name="brand" value="<?= $this->ln->get_configuration_by_name('brand')['conf_value']; ?>" required>
                        </div>

                    <div class="ln_solid"></div>     
                    <div class="form-group float-right">  
                        <button type="submit" class="btn btn-success">Guardar Cambios <i class="fa fa-check"></i></button>  
                    </div>

                    </form>                    
                  </div>
            </div>
        </div>
        <?php
    }
    //--------------------------------------------------------------------GALLERY
    function get_gallery(){
        $gallery=$this->ln->get_configurations_by_category('gallery');
        ?>
        <div class="col-sm-12 col-md-7 mt-2">
            <div class="x_panel">
                  <div class="x_title"><h2>Galeria<small>Galeria de la pagina</small></h2><div class="clearfix"></div></div>
                  <div class="x_content container-galery-grid pb-3"> 

                        <div class="img-galery-1 img-container">
                            <img src="<?= $gallery[0]['conf_value'];?>" alt="">
                            <form id="" data-parsley-validate class="form-horizontal form-file-input"
                            method="POST" enctype="multipart/form-data" action='configurations.php?action=update'>                           
                                <input type="hidden" name="conf_name_image" value="<?= $gallery[0]['conf_name'];?>">
                                <input type="hidden" name="url" value="<?= $gallery[0]['conf_value'];?>">
                                <span class="btn btn-primary btn-file m-0"><i class="fa fa-edit"></i><input type="file" name="image" title="Cambiar Imagen" onchange="javascript:this.form.submit();"></span>
                            </form>
                        </div>

                        <div class="img-galery-2 img-container">
                            <img src="<?= $gallery[1]['conf_value'];?>" alt="">
                            <form id="" data-parsley-validate class="form-horizontal form-label-left"
                                method="POST" enctype="multipart/form-data" action='configurations.php?action=update'>                           
                                    <input type="hidden" name="conf_name_image" value="<?= $gallery[1]['conf_name'];?>">
                                    <input type="hidden" name="url" value="<?= $gallery[1]['conf_value'];?>">
                                    <span class="btn btn-primary btn-file m-0"><i class="fa fa-edit"></i><input type="file" name="image" title="Cambiar Imagen" onchange="javascript:this.form.submit();"></span>
                            </form>
                        </div>

                        <div class="img-galery-3 img-container">
                            <img src="<?= $gallery[2]['conf_value'];?>" alt="">
                            <form id="" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" enctype="multipart/form-data" action='configurations.php?action=update'>                           
                                <input type="hidden" name="conf_name_image" value="<?= $gallery[2]['conf_name'];?>">
                                <input type="hidden" name="url" value="<?= $gallery[2]['conf_value'];?>">
                                <span class="btn btn-primary btn-file m-0"><i class="fa fa-edit"></i><input type="file" name="image" title="Cambiar Imagen" onchange="javascript:this.form.submit();"></span>
                            </form>
                        </div>

                        <div class="img-galery-4 img-container">
                            <img src="<?= $gallery[3]['conf_value'];?>" alt="">
                            <form id="" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" enctype="multipart/form-data" action='configurations.php?action=update'>                           
                                <input type="hidden" name="conf_name_image" value="<?= $gallery[3]['conf_name'];?>">
                                <input type="hidden" name="url" value="<?= $gallery[3]['conf_value'];?>">
                                <span class="btn btn-primary btn-file m-0"><i class="fa fa-edit"></i><input type="file" name="image" title="Cambiar Imagen" onchange="javascript:this.form.submit();"></span>
                            </form>
                        </div>             
                  </div>
            </div>
        </div>
        <?php
    }

    //--------------------------------------------------------------------NAV BUTTONS

    function get_nav_top_buttons(){
        ?>
        <div class="d-flex flex-wrap justify-content-center pt-1">
            <a class="btn btn-primary nav-top-item" href="configurations.php?view=information">Información</a>
            <a class="btn btn-primary nav-top-item" href="configurations.php?view=social">Redes Sociales</a>
            <a class="btn btn-primary nav-top-item" href="slider.php">Slider</a>
            <a class="btn btn-primary nav-top-item" href="configurations.php?view=inicio">Inicio</a>
        </div>
        <?php
    }

    //---------------------------------------------LINKS AND SCRIPTS

    function is_inicio(){
        if ($_GET['view']=='inicio') {
            return true;
        }else{
            return false;
        }
    }

    function get_page_links(){
       ?>
       <link rel="stylesheet" href="assets/css/style_configurations.css">
      <?php if($this->is_inicio()){?>
        <script src="https://cdn.tiny.cloud/1/4yr1tecurd5tw0qa9rjnatmyht38vc7oh79cp7fmigesbbwy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <?php }?>
       <?php 
    }

    function get_page_scripts(){
        ?>
        <script src="assets/js/browse.js"></script>
        <?php if($this->is_inicio()){?>
        <script src="assets/js/tiny.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php }?>
        <?php
    }

}
?>