<?php

class Noticias_m extends CI_Model {

    function getNoticias($pagina){
        $this->db->select("*");
        $this->db->from("noticia");
        $this->db->order_by("fecha","desc");
        
        $query = $this->db->get();
        $noticias = array();
        foreach($query->result() as $row){
            $noticias[$row->idnoticia] = $row;
        }
        return $noticias;
    }
    
     function getNoticiasSidebar($pagina){
        $this->db->select("*");
        $this->db->from("noticia");
        $this->db->order_by("fecha","desc");
        
        $query = $this->db->get();
        $noticias = array();
        foreach($query->result() as $row){
            $noticias[$row->idnoticia] = $row;
        }
        return $noticias;
    }
    

}

?>