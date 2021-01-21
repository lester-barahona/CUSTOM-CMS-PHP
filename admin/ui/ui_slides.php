<?php
require_once('UI.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/ln/ln_slides.php');
class Ui_slides extends UI{

    var $ln;

    function __construct($settings){
        parent::__construct($settings);
        $this->ln=new Ln_slides();
    }

    function action_controller(){
        $this->ln->action_controller();
    }

    function get_content(){
        $this->get_form();
        $this->get_gallery();
    }


    function get_form(){

        $data=array('slide'=>-1,
                    'text_content'=>' ',
                    'url'=>'');
        if($this->is_edit()){
            $data=$this->ln->get_slide($_GET['id_slide']);
        }
        extract($data);
        ?>
        <div class="col-md-5 col-sm-12">
        <div class="x_panel">
                  <div class="x_title"><h2>Slide<small>Configuraciones del Slider</small></h2><div class="clearfix"></div></div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left"
                     method="POST" action="slider.php?action=<?= ($this->is_edit())?'update':'insert'?>"enctype="multipart/form-data">
                     <?php 
                     if($this->is_edit()){?>
                        <div class="text-center"><label for="">Imagen Actual</label></div>
                        <div class="container d-flex justify-content-center mb-3">
                            <img  src="<?= $url?>" width="200px" alt="">
                        </div>
                        <input type="hidden" class="form-control" name="id_slide" value="<?= $id_slide?>">
                    <?php }?>    
                    <input type="hidden" class="form-control" name="url" value="<?= $url?>">
                    <div class="form-group">
                        <label for="custom-file">Elige Una Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input overflow-hidden" id="file-input" name="image"  accept="image/png, image/jpeg">
                            <label class="custom-file-label overflow-hidden" for="customFile">Foto</label>
                        </div> 
                    </div>
                   
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea class="form-control tiny" name="text_content" required><?= $text_content?></textarea>
                    </div>

                    <div class="ln_solid"></div>
                      
                    <div class="form-group float-right">  
                          <button type="submit" class="btn btn-success"><?= ($this->is_edit())?'Guardar ':'Crear Nuevo '?><i class="fa fa-check"></i></button>  
                      </div>

                    </form>                    
                  </div>
                </div>
        </div>
        <?php
    }

    function get_gallery(){
        $slides=$this->ln->get_slides();
        ?>
        <div class="col-md-7 col-sm-12">
            <div class="x_panel">
                    <div class="x_title">
                        <h2>Galeria</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="gallery-container d-flex justify-content-around flex-wrap">
                            <?php foreach($slides as $slide){?>
                                <div class="card-container mb-4">
                                    <a class="btn-primary btn-edit" href="slider.php?view=edit&id_slide=<?= $slide['id_slide']?>"><i class="fa fa-edit"></i></a> 
                                    <a class="btn-danger btn-delete" href="slider.php?action=delete&id_slide=<?= $slide['id_slide']?>"><i class="fa fa-trash"></i></a> 
                                    <img src="<?= $slide['url']?>" class="" alt=""> 
                                <div class="text-container-slide"><?= $slide['text_content']?></div>
                            </div>    
                            <?php }?>
                        </div>
                    </div>
            </div>
        </div>
        <?php
    }


    function is_edit(){
        if (isset($_GET['view'])&&$_GET['view']=='edit') {
           return true;
        }else{
           return false;
        }
    }


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

    function get_page_links(){
      ?>
      <link rel="stylesheet" href="assets/css/styles_slider.css">
      <script src="https://cdn.tiny.cloud/1/4yr1tecurd5tw0qa9rjnatmyht38vc7oh79cp7fmigesbbwy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>    
      <?php        
    }

    function get_page_scripts(){
        ?>
        <script src="assets/js/browse.js"></script>
        <script src="assets/js/tiny.js"></script>
        <?php
    }

}
?>