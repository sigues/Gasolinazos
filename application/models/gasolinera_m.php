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
    
    function getGasolineras($limit = 10, $colonia="", $ciudad="", $estado="", $grupo="",$reporte = false){
        $this->db->select("	IF(voto.idvoto IS NULL,idvoto,count(idvoto)) as votos,
	IF(voto.idvoto IS NULL,valor,sum(valor)/count(valor)) as promedio, 
            gasolinera.idgasolinera, gasolinera.estacion, gasolinera.nombre, gasolinera.telefono,
            gasolinera.direccion, gasolinera.colonia, ciudad.nombre nombre_ciudad, estado.nombre nombre_estado,
            gasolinera.grupo_idgrupo");
        if($reporte == true){
            $this->db->select("count(idreporte_profeco) reportes");
        }
        $this->db->from("gasolinera");
        $this->db->join("voto","gasolinera.idgasolinera = voto.gasolinera_idgasolinera","left");
        $this->db->join("ciudad","gasolinera.ciudad_idciudad = ciudad.idciudad");
        $this->db->join("estado","ciudad.estado_idestado = estado.idestado");
        if($reporte == true){
            $this->db->join("reporte_profeco","reporte_profeco.gasolinera_idgasolinera = gasolinera.idgasolinera");
        }
        $this->db->group_by("gasolinera.idgasolinera");

        if($grupo != ""){
            $this->db->where("gasolinera.grupo_idgrupo",$grupo);
        }
        if($ciudad != ""){
            $this->db->where("gasolinera.ciudad_idciudad",$ciudad);
        }
        if($estado != ""){
            $this->db->where("estado.idestado",$estado);
        }
        if($colonia != ""){
            $this->db->where("gasolinera.idgasolinera.colonia",$colonia);
        }
        if($reporte == true){
            $this->db->where("reporte_profeco.semaforo >","1");
        }
        
        if($reporte == true){
            $this->db->order_by("reporte_profeco.semaforo","desc");
        }
        $this->db->order_by("promedio","desc");
        $this->db->order_by("votos","desc");
        if($limit != 0){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        $gasolinera=array();
        foreach($query->result() as $row){
            $gasolinera[$row->idgasolinera] = $row;
        }
        return $gasolinera;
        
    }
    
    function getPromedioGrupo($idgrupo){
        $this->db->select("count(idvoto) votos, sum(valor)/count(idvoto) promedio");
        $this->db->from("voto");
        $this->db->join("gasolinera","voto.gasolinera_idgasolinera = gasolinera.idgasolinera");
        $this->db->where("gasolinera.grupo_idgrupo",$idgrupo);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function voto($voto){
        $this->db->insert("voto",$voto);
    }
    
    function getPreciosProductos(){
        $this->db->select("max(zona_has_producto.precio) precio, producto.nombre, producto.idproducto");
        $this->db->from("producto");
        $this->db->join("zona_has_producto","producto.idproducto = zona_has_producto.producto_idproducto");
        $this->db->group_by("producto.idproducto");
        $this->db->order_by("zona_has_producto.fecha","asc");
        $query = $this->db->get();
        foreach($query->result() as $row){
            $producto[$row->nombre] = $row->precio;
        }
        return $producto;
    }
    
    function getCalificacionByUsuario($idgasolinera,$idusuario){
        $this->db->select("valor");
        $this->db->from("voto");
        $this->db->where("gasolinera_idgasolinera",$idgasolinera);
        $this->db->where("usuario_idusuario",$idusuario);
        $this->db->order_by("idvoto","desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $calificacion=array();
        foreach($query->result() as $row){
            $calificacion = $row->valor;
        }
        return $calificacion;
    }

    function deleteCalificacionByUsuario($idgasolinera,$idusuario){
        $this->db->delete("voto",array("gasolinera_idgasolinera"=>$idgasolinera, "usuario_idusuario"=>$idusuario));
//        echo $this->db->last_query();
    }

}

?>