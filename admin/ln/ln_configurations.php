<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/db_configurations.php');
class Ln_configurations{

    var $db;

    function __construct()
    {
        $this->db=new Db_configurations();
    }

    function action_controller(){

        if(isset($_GET['action'])){

            switch($_GET['action']){

                
                case 'update':
                    $this->update($_POST);
                break;
            }

            exit();
        }
    }



    function update($data){
        if (isset($data['url'])) { 
            $url = $this->upload('image');
            $data[$data['conf_name_image']] = $data['url'];
            if($url){
                 $data[$data['conf_name_image']] = $url;
            }
            unset($data['url'],$data['conf_name_image']);
        }
        $this->update_configurations($data);
        header('location: '.$_SERVER['HTTP_REFERER']);
    }

    function update_configurations($data){
        foreach($data as $conf_name =>$conf_value){
            $this->db->update($conf_name,$conf_value);
        } 
    }

    function get_configurations_by_category($category){
        return $this->db->get_configurations_by_category($category);
    }

    function get_configuration_by_name($conf_name){
        return $this->db->get_configuration_by_name($conf_name);
    }

    function upload($name){
        $url = false;
        if(!empty($_FILES[$name]['name'])){
            unlink($_POST['url']);
            $path = "assets/uploads/".$this->get_dir_image();
            $path = $path .$_POST['conf_name_image'].'_'. basename( $_FILES[$name]['name']);
            if(move_uploaded_file($_FILES[$name]['tmp_name'], $path)) {
                $url = $path;
            } 
        }
        return $url;
    }

    function get_dir_image(){
        $name=$_POST['conf_name_image'];
        return ($name=='logo')?'logo/':'gallery/';
    }


}

?>