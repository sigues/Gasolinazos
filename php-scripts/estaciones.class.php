<?php

class estaciones{
	public $idgasolinera;
	public $nombre;
	public $direccion; 
	public $estacion; 
	public $ciudad_idciudad; 
	public $colonia; 
	public $cp; 
	public $telefono; 
	public $email; 
	public $inicio_operaciones;//falta meter este campo en la base 
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
	public $db;
	
	public function estaciones(){
		$this->db = mysql_connect("localhost","root","");
		mysql_select_db("gasolinazos");
	}
	
	public function insertaGasolinera(){
		$idgrupo = $this->getGrupo($this->nombre);
		if($idgrupo == false){
			$idgrupo = $this->insertaGrupo($this->nombre);
		}
		$this->grupo_idgrupo = $idgrupo;
		$this->cualli = ($this->cualli == "S")? 1 : 0;
		$this->vpm = ($this->vpm == "S") ? 1 : 0;
		
		$estacion = $this->getGasolineraByEstacion($this->estacion);
		if(is_array($estacion)){
			echo "Ya existe la gasolinera en la base: ".$this->estacion."<br>";
		}else{
			echo "Se insertó la gasolinera: ".$this->estacion."<br>";
			$idgasolinera = $this->insertGasolinera();
			if($this->magna == "S"){
				$this->insertProductoGasolinera($idgasolinera,1);
			}
			if($this->premium == "S"){
				$this->insertProductoGasolinera($idgasolinera,2);
			}
			if($this->diesel == "S"){
				$this->insertProductoGasolinera($idgasolinera,3);
			}
			if($this->dme == "S"){
				$this->insertProductoGasolinera($idgasolinera,4);
			}
		}
	}
	
	public function insertGasolinera(){
	$sql = "insert into gasolinera (
		nombre, direccion, estacion, ciudad_idciudad, 
		zona_idzona, grupo_idgrupo, colonia, 
		cp, telefono, email, vpm, cualli, 
		tar, tipo_contrato, numero_contrato, fecha_contrato, vencimiento_contrato, 
		tipo_convenio, numero_convenio, fecha_convenio, vencimiento_convenio, inicio_operaciones) values (
		'".$this->nombre."',
		'".$this->direccion."',
		'".$this->estacion."',
		'".$this->ciudad_idciudad."',
		'10',
		'".$this->grupo_idgrupo."',
		'".$this->colonia."',
		'".$this->cp."',
		'".$this->telefono."',
		'".$this->email."',
		'".$vpm."',
		'".$cualli."',
		'".$this->tar."',
		'".$this->tipo_contrato."',
		'".$this->numero_contrato."',
		'".$this->fecha_contrato."',
		'".$this->vencimiento_contrato."',
		'".$this->tipo_convenio."',
		'".$this->numero_convenio."',
		'".$this->fecha_convenio."',
		'".$this->vencimiento_convenio."',
		'".$this->inicio_operaciones."')";
//		echo $sql;
		if(!mysql_query($sql,$this->db)){
			echo mysql_error();die();
		}
		$gas = mysql_insert_id();
		return $gas;
	}
	
	public function getGasolineraByEstacion($estacion){
		$sql = "select * from gasolinera where estacion = '$estacion'";
		$estacion = false;
		$res = mysql_query($sql,$this->db);
		while($row = mysql_fetch_array($res)){
			$estacion = $row;
		}
		return $estacion;
	}
	
	public function insertaGrupo($nombre){
		$nombre = trim($nombre);
		$sql = "insert into grupo (nombre) values ('$nombre')";
		mysql_query($sql,$this->db);
		$idgrupo = mysql_insert_id();
		return $idgrupo;
	}
	
	public function getGrupo($nombre){
		$nombre = trim($nombre);
		$sql = "select idgrupo, nombre from grupo where nombre = '$nombre'";
		$res = mysql_query($sql,$this->db);
		$grupo = false;
		while($row = mysql_fetch_array($res)){
			$grupo = $row["idgrupo"];
		}
		return $grupo;
	}
	
	public function insertProductoGasolinera($gasolinera, $producto){
		$sql = "insert into gasolinera_has_producto (gasolinera_idgasolinera, producto_idproducto) values ($gasolinera,$producto)";
		mysql_query($sql,$this->db);
		
	}
	
	

}

?>