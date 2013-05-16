<?php

class Gasolinera_m extends CI_Model {

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
    
    function getGasolineraByEstacion($estacion) {
        $this->db->select("gasolinera.*,ciudad.nombre nombre_ciudad,estado.nombre nombre_estado");
        $this->db->from("gasolinera");
        $this->db->join("ciudad","gasolinera.ciudad_idciudad = ciudad.idciudad");
        $this->db->join("estado","ciudad.estado_idestado = estado.idestado");
        $this->db->where("gasolinera.estacion",$estacion);
        //        $query = $this->db->query("SELECT * FROM gasolinera WHERE estacion = ?", array($estacion));
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getProductosByIdgasolinera($idgasolinera){
        $this->db->select("zona_has_producto.precio, producto.nombre, producto.idproducto");
        $this->db->from("producto");
        $this->db->join("zona_has_producto","producto.idproducto = zona_has_producto.producto_idproducto");
        $this->db->join("gasolinera","gasolinera.zona_idzona = zona_has_producto.zona_idzona");
        $this->db->where("gasolinera.idgasolinera",$idgasolinera);
        
        $query = $this->db->get();
        foreach($query->result() as $row){
            $producto[$row->idproducto] = $row;
        }
        return $producto;
    }
    
    function getPromedioGasolinera($idgasolinera){
        $this->db->select("count(idvoto) votos, sum(valor)/count(valor) promedio");
        $this->db->from("voto");
        $this->db->where("gasolinera_idgasolinera",$idgasolinera);
        $query = $this->db->get();
        foreach($query->result() as $row){
            $promedio = $row;
        }
        return $promedio;
        
    }
    
    function getGasolineras($limit = 10, $colonia="", $ciudad="", $estado=""){
        $this->db->select("count(idvoto) votos, sum(valor)/count(valor) promedio, 
            gasolinera.idgasolinera,
            gasolinera.estacion, gasolinera.nombre, gasolinera.direccion");
        $this->db->from("voto");
        $this->db->join("gasolinera","voto.gasolinera_idgasolinera = gasolinera.idgasolinera");
        $this->db->order_by("promedio","desc");
        $this->db->order_by("votos","desc");
        $this->db->limit("10");
        $query = $this->db->get();
        //echo $this->db->last_query();
        $gasolinera=array();
        foreach($query->result() as $row){
            $gasolinera[$row->idgasolinera] = $row;
        }
        return $gasolinera;
        
    }
    
    function voto($voto){
        $this->db->insert("voto",$voto);
    }

}

?>