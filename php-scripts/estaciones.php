<?php
$time_start = microtime(true); 
include("estaciones.class.php");
set_time_limit(0);

$db = mysql_connect("localhost","root","");
mysql_select_db("gasolinazos");

$estacion = new estaciones();

$row = 1;
//echo file_get_contents("Estaciones.csv");die();
if (($handle = fopen("Estaciones.csv", "r")) !== FALSE) {
    //$data = fgetcsv($handle, 1000, ",");var_dump($data);
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		if($row>=11000){
			$time_end = microtime(true);
			//dividing with 60 will give the execution time in minutes other wise seconds
			$execution_time = ($time_end - $time_start)/60;

			//execution time of the script
			echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
		
			die();
		}
        $row++;
		foreach($data as $c=>$v){
			$data[$c] = mysql_real_escape_string($v);
		}
		$data[0] = ucwords(strtolower($data[0]));
		$data[1] = ucwords(strtolower($data[1]));
		$estado = buscarEstado($data[0]);
		$ciudad = buscarCiudad($estado["idestado"],$data[1]);

		$estacion->nombre = $data[3];
		$estacion->direccion = $data[4]; 
		$estacion->estacion = $data[2]; 
		$estacion->ciudad_idciudad = $ciudad["idciudad"];
		$estacion->colonia = $data[5];
		$estacion->cp = $data[6]; 
		$estacion->telefono = $data[7]; 
		$estacion->email = $data[8]; 
		$estacion->inicio_operaciones = $data[9]; 
		$estacion->vpm = ($data[10]=="S")?1:0; 
		$estacion->cualli = ($data[11]=="S")?1:0;
		$estacion->tar = $data[12];
		$estacion->magna = $data[13];
		$estacion->premium = $data[14];
		$estacion->diesel = $data[15];
		$estacion->dme = $data[16];
		$estacion->tipo_contrato = $data[17]; 
		$estacion->numero_contrato = $data[18];
		$estacion->fecha_contrato = $data[19]; 
		$estacion->vencimiento_contrato = $data[20]; 
		$estacion->tipo_convenio = $data[22]; 
		$estacion->numero_convenio = $data[29];
		$estacion->fecha_convenio = $data[30]; 
		$estacion->vencimiento_convenio = $data[31];
		
		//$estacion->insertaGasolinera();
                //
                //
                $estacion->updateCualliVpm($estacion->estacion, $estacion->cualli, $estacion->vpm);
//		var_dump($estacion);
//		echo "estado ".$data[0]." ciudad".$data[1]."<br>";
    }
    fclose($handle);
}

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';

die();


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