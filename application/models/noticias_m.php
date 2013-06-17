<?php

class Noticias_m extends CI_Model {

    function getNoticias($pagina=1){
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
    
     function getNoticiasSidebar($pagina=1){
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
    
    function getNoticia($idnoticia){
        $this->db->select("*");
        $this->db->from("noticia");
        $this->db->where("idnoticia",$idnoticia);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function agregaVista($idnoticia){
        
    }
}

?>