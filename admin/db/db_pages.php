<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/connection.php');

class Db_pages extends Connection{

function __construct(){parent::__construct();}


function get_page($id_page){
return $this->query("call sp_get_page('$id_page');")[0];
}

function get_pages($search){
return $this->query("call sp_get_pages('$search');");
}

function insert($data){
extract($data);
return $this->execute("call sp_insert_page('$title',' ');");
} 

function update($data){
extract($data);
return $this->execute("call sp_update_page($id_page,'$title','$content');");
}

function delete($id_page){
return $this->execute("call sp_delete_page($id_page);");
}

}
?>