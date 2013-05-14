<?php

include("estaciones.class.php");
set_time_limit(0);

$db = mysql_connect("localhost","root","");
mysql_select_db("gasolinazos");

$estacion = new estaciones();

$row = 1;
if (($handle = fopen("Estaciones.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		if($row>=2){
			die();
		}
        $row++;

		$data[0] = ucwords(strtolower($data[0]));
		$data[1] = ucwords(strtolower($data[1]));
		$estado = buscarEstado($data[0]);
		$ciudad = buscarCiudad($estado["idestado"],$data[1]);

/*		
0		ENTIDAD,MUNICIPIO,NO. ES,RAZON SOCIAL,UBICACION,
5		COLONIA,CP,TELEFONO,EMAIL,INI. OPER.,
10		VPM,CUALLI,TAR,MAGNA,PREMIUM,
15		DIESEL,DME,TIPO,NUMERO,FECHA CONTRATO,
20		FECHA VENCIMIENTO,MONTO,TIPO,NUMERO CONT,FECHA CONTRATO,
25		FECHA VENCIMIENTO,MONTO,,TIPO,NUMERO,
30		FEC. CONV.,VENC. CONV.,MONTO,TIPO,NUMERO,
35		FEC. CONV.,VENC. CONV.,MONTO
*/		
//	$estacion->idgasolinera;
	$estacion->ciudad_idciudad = $ciudad["idciudad"];
	$estacion->nombre = $data[3];
	$estacion->direccion = $data[4]; 
	$estacion->estacion = $data[2]; 
	$estacion->ciudad_idciudad = $ciudad["idciudad"];
	$estacion->colonia = $data[5];
	$estacion->cp = $data[6]; 
	$estacion->telefono = $data[7]; 
	$estacion->email = $data[8]; 
	$estacion->inicio_operaciones = $data[9]; 
	$estacion->vpm = $data[10]; 
	$estacion->cualli = $data[11]; 
	$estacion->tar = $data[12];
	//magna
	//premium
	//diesel
	//dme	
	$estacion->tipo_contrato = $data[17]; 
	$estacion->numero_contrato = $data[18];
	$estacion->fecha_contrato = $data[19]; 
	$estacion->vencimiento_contrato = $data[20]; 
	$estacion->tipo_convenio = $data[22]; 
	$estacion->numero_convenio = $data[29];
	$estacion->fecha_convenio = $data[30]; 
	$estacion->vencimiento_convenio = $data[31]; 		
		
		var_dump($estacion);
		echo "estado ".$data[0]." ciudad".$data[1]."<br>";
    }
    fclose($handle);
}


function buscarEstado($nombre){
	global $db;
	$sql = "select * from estado where nombre = '$nombre'";
	$res = mysql_query($sql,$db);
	$estado = false;
	while($row = mysql_fetch_array($res)){
		$estado = $row;
	}
	return $estado;
}

function insertarEstado($nombre){
	global $db;
	$sql = "insert into estado (nombre) values ('$nombre')";
	mysql_query($sql,$db);
}

function buscarCiudad($estado,$nombre){
	global $db;
	$sql = "select * from ciudad where nombre = '$nombre' and estado_idestado = $estado";
	$res = mysql_query($sql);
	
if($res === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

	$ciudad = false;
	while($row = mysql_fetch_array($res, MYSQL_BOTH)){
		$ciudad = $row;
	}
	return $ciudad;
}

function insertarCiudad($estado,$nombre){
	global $db;
	$sql = "insert into ciudad (nombre,estado_idestado) values ('$nombre',$estado);";
	mysql_query($sql);
}

?>