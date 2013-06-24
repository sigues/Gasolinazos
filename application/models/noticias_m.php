<?php

class Noticias_m extends CI_Model {

    function getNoticias($pagina=1){
        $this->db->select("*");
        $this->db->from("noticia");
        $this->db->order_by("fecha","desc");
        $limit = 5;
        $inicio = ($pagina-1)*5;
        $this->db->limit($limit,$inicio);
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
        $this->db->set("vistas","vistas + 1",FALSE);
        $this->db->where('idnoticia', $idnoticia);
        $this->db->update('noticia');
        
        return true;
    }
    
    function countNoticias(){
        $this->db->select("count(idnoticia) noticias");
        $this->db->from("noticia");
        $query = $this->db->get();
        $noticias = $query->row_array();
        return $noticias["noticias"];
    }
    
    function getNoticiasPortada(){
        $this->db->select("*");
        $this->db->from("noticia");
        $this->db->order_by("fecha","desc");
        $this->db->limit(4);
        $query = $this->db->get();
        $noticias = array();
        foreach($query->result() as $row){
            $noticias[$row->idnoticia] = $row;
        }
        return $noticias;
    }
    
}

?>