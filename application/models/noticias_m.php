<?php

class Noticias_m extends CI_Model {

    function getNoticias($pagina){
        $this->db->select("*");
        $this->db->from("noticia");
        $this->db->order_by("fecha","desc");
        
        $query = $this->db->get();
        foreach($query->result() as $row){
            $producto[$row->idproducto] = $row;
        }
        return $producto;
    }
    

}

?>