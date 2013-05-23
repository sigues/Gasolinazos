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
        $this->db->select("gasolinera.colonia");
        $this->db->from("gasolinera");
        $this->db->where("ciudad_idciudad",$ciudad);
        $this->db->group_by("colonia");
        $this->db->order_by("colonia","asc");
        $query = $this->db->get();
        $colonias = array();
        foreach($query->result() as $row){
            $colonias[$row->colonia] = $row;
        }
        return $colonias;
    }
    
    function buscarGasolineras($estado=null,$ciudad=null,$colonia=null,$texto=null){
        $this->db->select("gasolinera.*");
        $this->db->select("IF(voto.idvoto IS NULL,idvoto,count(idvoto)) as votos,
	IF(voto.idvoto IS NULL,valor,sum(valor)/count(valor)) as promedio ");
        $this->db->from("gasolinera");
        $this->db->join("ciudad","gasolinera.ciudad_idciudad = ciudad.idciudad");
        $this->db->join("voto","gasolinera.idgasolinera = voto.gasolinera_idgasolinera","left");
        if($estado != null && $estado != 0){
            $this->db->where("ciudad.estado_idestado",$estado);
        }
        if($ciudad != null && $ciudad != 0){
            $this->db->where("ciudad.idciudad",$ciudad);
        }
        if($colonia != null && $colonia != 0){
            $this->db->where("gasolinera.colonia",$colonia);
        }
        if($texto != null){
            $where = "gasolinera.nombre like '%$texto%' 
                OR gasolinera.colonia like '%$texto%' 
                OR ciudad.nombre like '%$texto%'";
            $this->db->where($where);
        }
        $this->db->group_by("gasolinera.idgasolinera");
        $this->db->order_by("promedio","desc");
        $this->db->order_by("votos","desc");
        $this->db->limit(10);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $respuesta = array();$x=0;
        foreach($query->result() as $row){
            $respuesta[$x] = $row;
            $x++;
        }
        return $respuesta;
    }

}

?>