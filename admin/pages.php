<?php
    require_once('ui/ui_pages.php');
    $data=array('title'=>'Gestion de Paginas',
                'url'=>'pages.php');
    $ui=new Ui_pages($data);
    $ui->action_controller();
    $ui->build();  
?>