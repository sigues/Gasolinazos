<?php

class Gasolinazos_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getUsuarioByFbid($fbid) {
        $this->db->select("usuario.*");
        $this->db->from("usuario");
        $this->db->where("usuario.fbid",$fbid);
        //        $query = $this->db->query("SELECT * FROM gasolinera WHERE estacion = ?", array($estacion));
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function registraUsuario($values){
        $valores = array();
        $valores_permitidos = array("id","first_name","middle_name","last_name","link","username","gender","locale","verified","email");
        foreach($values as $c=>$v){
            if(in_array($c,$valores_permitidos)){
                if($c == "id"){
                    $c="fbid";
                }
                $valores[$c]=$v;
            }
        }
        $this->db->insert("usuario",$valores);
//        echo $this->db->last_query();
//        var_dump($valores);
    }
    
    function getUsuarioByUUID($uuid,$tipo){
        $usuario = $this->getDevice($uuid,$tipo);
        if($usuario == false){
            $this->insertDevice($uuid,$tipo);
            $usuario = $this->getDevice($uuid,$tipo);
        }
        return $usuario["idusuario"];
    }
    
    function getDevice($uuid,$tipo){
        $query = $this->db->get_where("usuario",array("uuid"=>$uuid,"tipo"=>$tipo));
        return $query->row_array();
    }
    
    function insertDevice($uuid,$tipo){
        $valores = array("uuid"=>$uuid,"tipo"=>$tipo);
        $this->db->insert("usuario",$valores);
    }
    
    

}

?>