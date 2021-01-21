<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pp1/admin/db/connection.php');

class Db_configurations extends Connection{

function __construct(){parent::__construct();}

function insert($data){
    extract($data);
    return $this->execute("call sp_insert_configuration('$conf_name','$conf_value','$category');");
}

function update($conf_name,$conf_value){
    return $this->execute("call sp_update_configuration_by_conf_name('$conf_name','$conf_value');");
}

function get_configuration_by_name($conf_name){
    return $this->query("call sp_get_configuration_by_name('$conf_name');")[0];
}

function get_configurations_by_category($category){
    return $this->query("call sp_get_configurations_by_category('$category');");
}

}


?>