<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/db_pages.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/ln/ln_images.php');
class Ln_pages{

    var $db;
    var $ln_images;

    function __construct(){
       $this->db=new Db_pages();
       $this->ln_images=new Ln_images(); 
    }

    function action_controller(){

        if(isset($_GET['action'])){

            switch($_GET['action']){

                case 'insert':
                    $this->insert($_POST);
                break;
                
                case 'update':
                    $this->update($_POST);
                break;

                case 'delete':
                    $this->ln_images->delete_by_page($_GET['id_page']);
                    $this->delete($_GET['id_page']);   
                break;

                case 'insert_image':
                    $this->ln_images->insert($_POST);
                    header('Location:pages.php?view=edit&id_page='.$_POST['id_page']);
                break;

                case 'delete_image':
                    $this->ln_images->delete($_GET['id_image']);
                    header('location: '.$_SERVER['HTTP_REFERER']);
                   //header('Location:pages.php?view=edit&id_page='.$_GET['id_page']);
                break;
            }

            exit();
        }

    }

    function get_page($id_page){
        return $this->db->get_page($id_page);
    }
        
    function get_pages($search=''){
        return $this->db->get_pages($search);
    }
        
    function insert($data){
        $this->db->insert($data);
        header('Location:pages.php');
    } 
        
    function update($data){
      $this->db->update($data);
      header("Location:pages.php?view=edit&id_page=".$data['id_page']);  
    }
        
    function delete($id_page){
        $this->db->delete($id_page);
        header('Location: pages.php');  
    }    


}
?>