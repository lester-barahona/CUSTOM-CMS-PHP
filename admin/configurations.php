<?php
    require_once('ui/ui_configurations.php');
    $data=array('title'=>'Gestion de Pagina Principal',
                'url'=>'configurations.php?view=information');
    $ui=new Ui_configurations($data);
    $ui->action_controller();
    $ui->build();  
?>