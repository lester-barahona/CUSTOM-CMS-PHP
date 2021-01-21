<?php
require_once('UI.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/ln/ln_pages.php');

class Ui_pages extends UI{

    var $ln;
    var $ln_img;
    function __construct($settings){
       parent::__construct($settings);
       $this->ln=new Ln_pages(); 
       $this->ln_img=new Ln_images();
    }

    function action_controller(){
        $this->ln->action_controller();
    }

    function get_content(){
      $this->get_form();
      if($this->is_edit()){
        $this->get_gallery();
      }else{
      $this->get_table(); 
      } 
    }

    function get_gallery(){
        ?>
        <div class="col-md-7 col-sm-12">
            <div class="x_panel">
                    <div class="x_title">
                        <h2>Galeria</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="pages.php?action=insert_image" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_page" value="<?=$_GET['id_page']?>">
                        <div class="form-row">
                        <div class="form-group col-sm-9">
                            <label for="custom-file">Elige Una Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input overflow-hidden" id="file-input" name="image"  accept="image/png, image/jpeg" required>
                                <label class="custom-file-label overflow-hidden" for="customFile">Foto</label>
                            </div> 
                        </div>
                        <div class="form-group col-sm-3  d-flex  justify-content-center">
                           <button class="btn btn-success btn-upload align-self-end" type="submit">Subir <i class="fa fa-upload"></i></button>
                        </div>
                        </div>
                        </form>
                        <div class="ln_solid"></div>

                        <div class="gallery-container d-flex justify-content-around flex-wrap">
                            <?php foreach($this->ln_img->get_images_by_page($_GET['id_page']) as $img){?>
                                <div class="card-container mb-4">
                                    <a class="btn btn-danger m-0" href="pages.php?action=delete_image&id_image=<?=$img['id_image']?>"><i class="fa fa-trash"></i></a> <!-- &id_page=<?php //$_GET['id_page']?> -->
                                    <img src="<?=$img['url']?>" class="" alt=""> 
                                </div>
                                
                            <?php }?>
                        </div>
                    </div>
            </div>
        </div>
        <?php
    }

    function get_form(){
        $data=array('id_page'=>-1,
                    'title'=>'',
                    'content'=>'');
        if($this->is_edit()){
            $data=$this->ln->get_page($_GET['id_page']);
        }
        ?>
        <div class="col-md-5">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Pagina</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left"
                     method="POST" action='pages.php?<?= ($this->is_edit())?'view=edit&action=update':'action=insert'?>'>
                     <?php 
                     if($this->is_edit()){?>
                        <input type="hidden" class="form-control" name="id_page" value="<?= $data['id_page']?>">
                    <?php }?>    
                  
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" value="<?= $data['title']?>" required>
                    </div>
                    <?php
                     if($this->is_edit()){?>
                            <label for="content">Descripción</label>
                            <textarea class="form-control tiny" name="content" required><?=$data['content']?></textarea>
                    <?php }?>  
                    <div class="ln_solid"></div>
                      
                    <div class="form-group float-right">  
                          <button type="submit" class="btn btn-success"><?= ($this->is_edit())?'Guardar ':'Crear Nueva '?><i class="fa fa-check"></i></button>  
                      </div>

                    </form>                    
                  </div>
                </div>
        </div>
        <?php
    }

    function get_table(){
        ?>
        <div class="col-md-7 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Paginas</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                                 
                        <table id="datatable" class="table-striped table-bordered table-hover text-center" style="width:100%">
                            <thead>
                                    <tr><th>ID</th><th>Titulo</th><th>Editar</th><th>Eliminar</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach( $this->ln->get_pages('') as $page){?>
                                <tr>
                                    <td><?=$page['id_page']?></td>
                                    <td><?=$page['title']?></td>
                                    <td><a class="btn btn-primary"  href="pages.php?view=edit&id_page=<?=$page['id_page']?>"><i class="fa fa-edit"></i></a></td>
                                    <td><a class="btn btn-danger" href="pages.php?action=delete&id_page=<?=$page['id_page']?>"><i class="fa fa-trash"></i> </a></td>
                                </tr>
                            <?php
                            }?>  
                              
                            </tbody>
                        </table>   
                </div>
            </div>
        </div> 
        <?php
    }

    function get_nav_top_buttons(){
        if ($this->is_edit()) {
            ?>
            <div class="nav-buttons-top pt-1"><a class="btn btn-primary" href="pages.php">Regresar <i class="fa fa-reply"></i></a></div>
            <?php
        }
    }

    function is_edit(){
        if(isset($_GET['view'])&&$_GET['view']=='edit'){
            return true;
        }else{
            return false;
        }
    }

    function get_page_links(){
       if(!$this->is_edit()){
          $this->get_links_table();
       }else{
            $this->get_links_des();
       }
    }

    function get_page_scripts(){
      if($this->is_edit()){
        $this->get_scripts_des();
      }else{
        $this->get_scripts_table();
      }
    }

    function get_links_table(){
        ?>
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/ajust_table.css">
        <?php
    }
    function get_scripts_table(){
        ?>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/ajust_table.js"></script>
       <?php
    }

    function get_scripts_des(){
        ?>
        <script src="assets/js/tiny.js"></script>
        <script src="assets/js/browse.js"></script>
        <?php
    }
    function get_links_des(){
        ?>
         <script src="https://cdn.tiny.cloud/1/4yr1tecurd5tw0qa9rjnatmyht38vc7oh79cp7fmigesbbwy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
         <link rel="stylesheet" href="assets/css/style_edit_page.css">
        <?php
    }

}

?>