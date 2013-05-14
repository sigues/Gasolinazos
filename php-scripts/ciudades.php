<?php
set_time_limit(0);

$db = mysql_connect("localhost","root","");
mysql_select_db("gasolinazos");



$row = 1;
if (($handle = fopen("Ciudades.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $row++;
		//if($row>=10){
		//	die();
		//}
		$data[0] = ucwords(strtolower($data[0]));
		$data[1] = ucwords(strtolower($data[1]));
		$estado = buscarEstado($data[0]);
		if(!$estado){
			insertarEstado($data[0]);
			$estado = buscarEstado($data[0]);
		}
		$ciudad = buscarCiudad($estado["idestado"],$data[1]);
		if(!$ciudad){
			insertarCiudad($estado["idestado"],$data[1]);
			$ciudad = buscarCiudad($estado["idestado"],$data[1]);
		}

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