<?php

class Reporte_profeco extends CI_Model {

    public $idgasolinera;
    public $fecha;
    public $alerta; 
    public $idprofeco; 
    public $idreporte_profeco; 
        
        
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getReportesByEstacion($idgasolinera="",$estacion=""){
        if($idgasolinera=="" && $estacion==""){
            return false;
        }
        if($idgasolinera != ""){
            $query = $this->db->get_where("reporte_profeco",array("gasolinera_idgasolinera"=>$idgasolinera));
        }
        if($estacion != ""){
            $this->db->select("reporte_profeco.*");
            $this->db->from("reporte_profeco");
            $this->db->join("gasolinera","reporte_profeco.gasolinera_idgasolinera = gasolinera.idgasolinera");
            $this->db->where("gasolinera.estacion",$estacion);
            $query = $this->db->get();
        }
        
        $resultado = array();
        foreach($query->result() as $row){
            $resultado[$row->idreporte_profeco] = $row;
        }

        return $resultado;
        
        
    }
}

?>