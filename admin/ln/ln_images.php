<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/db_images.php');

class Ln_images{

    var $db;

    function __construct(){
        $this->db=new Db_images();
    }

    function get_image($id_image){
        return $this->db->get_image($id_image);
    }

    function get_images_by_page($id_page){
        return $this->db->get_images_by_page($id_page);
    }

    function insert($data){
        $data=array_merge($data,array('url'=> $this->upload('image')));
        $this->db->insert($data);
    }

    function delete($id_image){
        $this->delete_image($this->db->get_image($id_image)['ulr']);
        return $this->db->delete($id_image);
    }

    function delete_by_page($id_page){
        $this->delete_images($id_page);
        return $this->db->delete_by_page($id_page);
    }

    function delete_images($id_page){
        $pages=$this->get_images_by_page($id_page);
        foreach ($pages as $page) {
           $this->delete_image($page['url']);
        }
    }

    function upload($name){
        $url = false;
        if(!empty($_FILES[$name])){
            $path = "assets/uploads/gallery/";
            $path = $path .$_POST['id_page'].'_'.basename( $_FILES[$name]['name']);
            if(move_uploaded_file($_FILES[$name]['tmp_name'], $path)) {
                $url =$path;
            } 
        }
        return $url;
    }

    function delete_image($url){
        if(file_exists($url)){
            unlink($url); 
          }
    }

}
?>