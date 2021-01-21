<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/connection.php');

class Db_images extends Connection{

    function __construct(){parent::__construct();}

    function get_image($id_image){
        return $this->query("call sp_get_image($id_image);")[0];
    }

    function get_images_by_page($id_page){
        return $this->query("call sp_get_images_by_page($id_page);");
    }

    function insert($data){
        extract($data);
        return $this->execute("call sp_insert_image($id_page,'$url');");
    }

    function delete($id_image){
        return $this->execute("call sp_delete_image($id_image);");
    }

    function delete_by_page($id_page){
        return $this->execute("call sp_delete_images_by_page($id_page);");
    }

}
?>