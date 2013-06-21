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
   //     var_dump($colonia);
        $this->db->select("gasolinera.*");
        $this->db->select("IF(voto.idvoto IS NULL,idvoto,count(idvoto)) as votos,
	IF(voto.idvoto IS NULL,valor,sum(valor)/count(valor)) as promedio ");
        $this->db->from("gasolinera");
        $this->db->join("ciudad","gasolinera.ciudad_idciudad = ciudad.idciudad");
        $this->db->join("voto","gasolinera.idgasolinera = voto.gasolinera_idgasolinera","left");
        if($estado != null && $estado != 0){
            $where["ciudad.estado_idestado"] = $estado;
        }
        if($ciudad != null && $ciudad != 0){
            $where["ciudad.idciudad"] = $ciudad;
        }
        //var_dump($colonia);//die();
        if($colonia != '0'){
            $where["gasolinera.colonia"] = $colonia;
        }
        if($texto != null){
            $where = "(gasolinera.nombre like '%$texto%' 
                OR gasolinera.colonia like '%$texto%' 
                OR ciudad.nombre like '%$texto%')";
            $this->db->where($where);
        }
        $this->db->where($where);
//        var_dump($where);die();
        $this->db->where("latitud is not null");
        $this->db->group_by("gasolinera.idgasolinera");
        $this->db->order_by("promedio","desc");
        $this->db->order_by("votos","desc");
        $this->db->limit(10);
        $query = $this->db->get();
        $respuesta = array();$x=0;
        foreach($query->result() as $row){
            $respuesta[$x] = $row;
            $respuesta[$x]->distancia = 0;
            $reportes = $this->getReportesProfeco($row->idgasolinera);
            $respuesta[$x]->reportes = $reportes;
            $x++;
        }
        return $respuesta;
    }
    
    function buscarGasolinerasCoord($latitud,$longitud,$radio=0.02,$geolat = 0, $geolng=0, $filtros=null,$iterador=0){
        if($iterador == 80){
            $error = array("error"=>"No se encontraron gasolineras cercanas con los parámetros solicitados");
            return $error;
        }
        //echo $iterador;
        $iterador++;
        $lat_ini = $latitud + $radio;
        $lng_ini = $longitud - $radio;
        $lat_fin = $latitud - $radio;
        $lng_fin = $longitud + $radio;
        $usuario = $this->session->userdata("idusuario");
        //echo $usuario."<--";
        $this->db->select("gasolinera.*");
        $this->db->select("IF(voto.idvoto IS NULL,idvoto,count(idvoto)) as votos,
	IF(voto.idvoto IS NULL,valor,sum(valor)/count(valor)) as promedio");
        $this->db->select("(select valor from voto where usuario_idusuario=$usuario and gasolinera_idgasolinera = gasolinera.idgasolinera order by idvoto desc limit 0,1) calificacion",false);
        $this->db->from("gasolinera");
        $this->db->join("ciudad","gasolinera.ciudad_idciudad = ciudad.idciudad");
        $this->db->join("voto","gasolinera.idgasolinera = voto.gasolinera_idgasolinera","left");
        if(isset($filtros->magna) || isset($filtros->premium) || isset($filtros->diesel) || isset($filtros->dme)){
            $this->db->join("gasolinera_has_producto","gasolinera_has_producto.gasolinera_idgasolinera = gasolinera.idgasolinera");
        }

        //Condiciones de coordenadas
        $this->db->where("gasolinera.latitud <=",$lat_ini);
        $this->db->where("gasolinera.longitud >=",$lng_ini);
        
        $this->db->where("gasolinera.latitud >=",$lat_fin);
        $this->db->where("gasolinera.longitud <=",$lng_fin);
        //Fin condiciones de coord
        $servicio=array();
        if(isset($filtros->magna)){
            $servicio[] = "1";
        }
        if(isset($filtros->premium)){
            $servicio[] = "2";
        }
        if(isset($filtros->diesel)){
            $servicio[] = "3";
        }
        if(isset($filtros->dme)){
            $servicio[] = "4";
        }
        if(sizeof($servicio)>0){
            $this->db->where_in("gasolinera_has_producto.producto_idproducto",$servicio);
        }
        if(isset($filtros->cualli)){
            $this->db->where("gasolinera.cualli","1");
        }
        if(isset($filtros->vpm)){
            $this->db->where("gasolinera.vpm","1");
        }
        
        $this->db->group_by("gasolinera.idgasolinera");
        $this->db->order_by("promedio","desc");
        $this->db->order_by("votos","desc");
//        $this->db->limit(10);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $respuesta = array();$x=0;
        $distancias=array();
        if($geolat != 0 && $geolng != 0){
            $dis_lat = $geolat;
            $dis_lng = $geolng;
        }else{
            $dis_lat = $latitud;
            $dis_lng = $longitud;
        }
        foreach($query->result() as $row){
            $respuesta[$row->idgasolinera] = $row;
            $distancia = $this->vincentyGreatCircleDistance($dis_lat,$dis_lng,$row->latitud,$row->longitud);
            $respuesta[$row->idgasolinera]->distancia = $distancia;
            $reportes = $this->getReportesProfeco($row->idgasolinera);
            $respuesta[$row->idgasolinera]->reportes = $reportes;
            $distancias[$row->idgasolinera] = $distancia;
            $distancias_1[$distancia] = $distancia;
            
            $x++;
        }
        if(sizeof($distancias)<=5){
            return $this->buscarGasolinerasCoord($latitud,$longitud,$radio+0.02,$geolat, $geolng, $filtros,$iterador);
        }
        
        asort($distancias);
        $x=0;
        foreach($distancias as $c=>$gasolinera){
            if($x<20 || ($latitud != $geolat || $longitud != $geolng)){
            $response[$x] = $respuesta[$c];
            } else {
                break(1);
            }
            $x++;
        }
        return $response;


    }
    
    public function getReportesProfeco($idgasolinera){
        $this->db->select("reporte_profeco.*");
        $this->db->from("reporte_profeco");
        $this->db->where("gasolinera_idgasolinera",$idgasolinera);
        $this->db->order_by("semaforo","desc");
        $query = $this->db->get();
        $respuesta = array();
        foreach($query->result() as $row){
            $respuesta[] = $row;
        }
        return $respuesta;
    }
    
    public function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
      // convert from degrees to radians
      $latFrom = deg2rad($latitudeFrom);
      $lonFrom = deg2rad($longitudeFrom);
      $latTo = deg2rad($latitudeTo);
      $lonTo = deg2rad($longitudeTo);

      $lonDelta = $lonTo - $lonFrom;
      $a = pow(cos($latTo) * sin($lonDelta), 2) +
        pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
      $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

      $angle = atan2(sqrt($a), $b);
      return $angle * $earthRadius;
    }
}


?>