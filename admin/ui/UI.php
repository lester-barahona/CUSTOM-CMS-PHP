<?php
require_once('ln/ln_configurations.php');
class UI{

    var $settings;
    var $ln_confi;
    function __construct($settings){
        $this->settings = array(
            'title'     => 'TITULO',
            'url'       => ''
        );

        if($settings){
            $this->settings = array_merge($this->settings, $settings);
        }
        $this->ln_confi=new Ln_configurations();
    }

    function get_head(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrador</title>
        <link href="assets/vendor/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/vendor/build/css/custom.min.css" rel="stylesheet">
        <?php $this->get_page_links();?>
        <link rel="shortcut icon" href="<?= $this->ln_confi->get_configuration_by_name('logo')['conf_value'];?>">
        <link rel="stylesheet" href="assets/css/styles_ui.css">  
        </head>

        <body id="body" class="nav-md">
            <div class="container body">
                <div class="main_container">

        <?php
    }


    function get_navbar(){
        $menu = array(
            array(
                'url'   => 'pages.php',
                'text'  => 'Paginas',
                'icon'  => 'fa fa-files-o'
            ),
            array(
                'url'   => 'configurations.php?view=information',
                'text'  => 'Ajustes',
                'icon'  => 'fa fa-cogs'
            ),
        );
        ?>
        <div class="col-md-3 left_col">
          <div class="left_col ">
            <div class="navbar nav_title" style="border: 0;">
              <a href="pages.php" class="site_title"><img src="<?= $this->ln_confi->get_configuration_by_name('logo')['conf_value'];?>" width="50px" height="50px"> <span>Administrador</span></a>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                    <?php
                    foreach($menu as $item){?>
                        <li  <?=($item['url']==$this->settings['url']?'class="active"':'');?>><a href="<?=$item['url']?>"><i class="<?=$item['icon']?>"></i><?=$item['text']?></a></li>
                    <?php }?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <?php
    }

    function get_top_navigation(){
        ?>
         <!-- top navigation -->
         <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class="navbar-right">
                    <li class="nav-item pl-4" >
                    <a href="../index.php">Salir</a>
                  </li>    
                  <li class="nav-item " >
                    <a href="../index.php">Ver Sitio Web</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
        <?php
    }

    function get_page_content(){
        ?>
        <!-- content -->
        <div class="right_col" role="main">
           <div class="clearfix"></div>
            <div class="row">
                   <div class="col-sm-12 col-md-5"><h3><?=$this->settings['title'];?></h3></div>
                   <div class="col-sm-12 col-md-7"><?php $this->get_nav_top_buttons();?></div>
            </div>
            <div class="clearfix"></div>
                <div class="row justify-content-center">
                    <?php $this->get_content();?>
                </div>
          
        </div>
        <!-- /content --> 
        <?php
    }

    function get_footer(){
        ?>
                    </div>
                </div>
                <!-- jQuery an toogle -->
                <script src="assets/vendor/vendors/jquery/dist/jquery.min.js"></script>
                <script src="assets/js/menu-toggle.js"></script>
                <!-- page need -->
                <?php $this->get_page_scripts();?>
            </body>
        </html>
        <?php


    }

    public function get_nav_top_buttons(){}

    public function get_content(){}
    
    public function get_page_links(){}

    public function get_page_scripts(){}

    public function build(){
        $this->get_head();
        $this->get_navbar();
        $this->get_top_navigation();
        $this->get_page_content();
        $this->get_footer();
    }

}
?>