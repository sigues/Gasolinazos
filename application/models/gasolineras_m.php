<?php

class Gasolineras_m extends CI_Model {

    public $idgasolinera;
    public $nombre;
    public $direccion; 
    public $estacion; 
    public $ciudad_idciudad; 
    public $colonia; 
    public $cp; 
    public $telefono; 
    public $email; 
    public $inicio_operaciones;
    public $vpm; 
    public $cualli; 
    public $tar; 
    public $tipo_contrato; 
    public $numero_contrato; 
    public $fecha_contrato; 
    public $vencimiento_contrato; 
    public $tipo_convenio; 
    public $numero_convenio; 
    public $fecha_convenio; 
    public $vencimiento_convenio; 
    public $magna;
    public $premium;
    public $diesel;
    public $dme;
//---------------------
    public $idpemex; 
    public $latitud; 
    public $longitud;
    public $zona_idzona; 
    public $grupo_idgrupo; 
    public $promedio; 
    public $votos; 
        
        
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getEstados() {
        $this->db->select("estado.idestado, estado.nombre nombre");
        $this->db->from("estado");
        $query = $this->db->get();
        $estados = array();
        foreach($query->result() as $row){
            $estados[$row->idestado] = $row;
        }
        return $estados;
    }
    
    function buscaCiudad($estado){
        $this->db->select("ciudad.idciudad, ciudad.nombre");
        $this->db->from("ciudad");
        $this->db->where("estado_idestado",$estado);
        $query = $this->db->get();
        $ciudades = array();
        foreach($query->result() as $row){
            $ciudades[$row->idciudad] = $row;
        }
        return $ciudades;
    }
    
    function buscaColonia($ciudad){
        $this->db->select("distinct gasolinera.colonia nombre");
        $this->db->from("gasolinera");
        $this->db->where("ciudad_idciudad",$ciudad);
        $this->db->order_by("nombre","asc");
        $query = $this->db->get();
        $colonias = array();
        foreach($query->result() as $row){
            $colonias[$row->nombre] = $row;
        }
        return $colonias;
    }

}

?>