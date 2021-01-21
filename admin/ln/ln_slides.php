<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/db_slides.php');

class Ln_slides{

    var $db;

    function __construct(){
        $this->db=new Db_slides();
    }

    function action_controller(){
        if (isset($_GET['action'])) {
           switch ($_GET['action']) {
               case 'insert':
                   $this->insert($_POST);
                   header('location: slider.php');
                   break;
                case 'update':
                    $this->update($_POST);
                    header('location: slider.php');
                   break;   
                case 'delete':
                   $this->delete($_GET['id_slide']);
                   header('location: '.$_SERVER['HTTP_REFERER']);
                   break;
                   
               default:
                   exit();
                   break;
           }
        }
    }

    function get_slides(){
        return $this->db->get_slides();
    }

    function get_slide($id_slide){
        return $this->db->get_slide($id_slide);
    }

    function insert($data){
        $url=$this->upload('image');
        if($url){
            $data['url']=$url;
        }
        $this->db->insert($data);
    }

    function delete($id_slide){
         unlink($this->get_slide($id_slide)['url']);
         $this->db->delete($id_slide);
    }

    function update($data){
        $url=$this->upload('image');
        if($url){
            unlink($data['url']);
            $data['url']=$url;
        }
        return $this->db->update($data);
    }

    function get_las_id_slide(){
        return $this->db->get_last_id_slide()['id_slide'];
    }
    
    function upload($name){
        $url = false;
        if(!empty($_FILES[$name]['name'])){
            $path = "assets/uploads/slider/";
            $path = $path.(intval($this->get_las_id_slide())+1).'_'.basename( $_FILES[$name]['name']);
            if(move_uploaded_file($_FILES[$name]['tmp_name'], $path)) {
                $url =$path;
            } 
        }
        return $url;
    }


}

?>