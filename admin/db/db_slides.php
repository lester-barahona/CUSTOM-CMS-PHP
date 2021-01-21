<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/connection.php');

class Db_slides extends Connection{

    function __construct(){ parent::__construct();}

    function get_slides(){
        return $this->query("call sp_get_slides();");
    }

    function get_slide($id_slide){
        return $this->query("call sp_get_slide($id_slide);")[0];
    }

    function insert($data){
        extract($data);
        return $this->execute("call sp_insert_slide('$text_content','$url');");
    }

    function delete($id_slide){
        return $this->execute("call sp_delete_slide($id_slide);");
    }

    function update($data){
        extract($data);
        return $this->execute("call sp_update_slide($id_slide,'$text_content','$url');");
    }

    function get_last_id_slide(){
        return $this->query('call sp_get_last_id_slide();')[0];
    }

}
?>