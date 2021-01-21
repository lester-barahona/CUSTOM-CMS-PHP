<?php

require_once('ui/ui_slides.php');
$data=array('title'=>'Gestion de Pagina Principal',
            'url'=>'configurations.php?view=information');
$ui=new Ui_slides($data);
$ui->action_controller();
$ui->build(); 

?>