<?php
set_time_limit(0);

$db = mysql_connect("localhost","root","");
mysql_select_db("gasolinazos");

for($x=1;$x<=32;$x++){
	revisaEstado($x);

}


function revisaEstado($x){
	$postdata = http_build_query(
		array(
			'estado' => $x,
			'municipio' => 'T'
		)
	);
	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postdata
		)
	);
	$context  = stream_context_create($opts);

$result = file_get_contents('http://webapps.profeco.gob.mx/verificacion/gasolina/gasolinerias01_(18-09-07).asp', false, $context);

$resultados = explode('<table width="646" border="0" cellpadding="0" cellspacing="1">
        
        <tr bgcolor="#CCCCCC">
          <td width="33" height="33"><span class="enlacenav02 style19 style28 style31">No.</span></td>
          <td width="36"></td>
          <td width="201"><span class="enlacenav02 style19 style28 style31">Domicilio</span></td>
          <td width="105"><span class="enlacenav02 style19 style28 style31">Estado</span></td>
          <td width="265"><span class="enlacenav02 style19 style28 style31">Raz&oacute;n social </span></td>
        </tr>
      </table>
      
      <table width="647" border="0" cellpadding="2" cellspacing="2">

',$result);
	  

$filas = explode('</tr>
        
        <tr class= "barsearch" 
		 bgcolor= "#ffffff" >
',$resultados[1]);

foreach($filas as $fila){
	$strbet = get_string_between($fila,'<a href="gasolinera01.asp?IdEs=',' </a></td> <td width="25" ');
	$columna = explode("<td",$fila);
	$id = strip_tags("<td".$columna[1]);
	$id_profeco = get_string_between($columna[1],"gasolinera01.asp?IdEs=",'">');
	$alerta="";
	if(stripos($columna[2],"ambar")!=false){
		$alerta = "ambar";
	}elseif(stripos($columna[2],"roja")!=false){
		$alerta = "rojo";
	}elseif(stripos($columna[2],"verde")!=false){
		$alerta = "verde";
	}
	
	echo $id." - ".$id_profeco." - ".$alerta."<br>";
	$id = str_pad(trim($id), 5, "0", STR_PAD_LEFT);
	
	if($alerta != ""){
		$gasolinera = getGasolineraByEstacion($id);
		echo "estacion revisada: E$id<br>";
		$reporte = verificaReporte($id,$id_profeco,$alerta);
		if(sizeof($reporte)==0){
			insertaReporte($gasolinera["idgasolinera"],$id_profeco,$alerta);
			echo "&nbsp;&nbsp;&nbsp;&nbsp;alerta $alerta insertada para la estación E$id <br>";
		}else{
			echo "&nbsp;&nbsp;&nbsp;&nbsp;ya existe alerta $alerta para la estación E$id <br>";
		}
	}
	
	
}

} //fin función revisaEstado



function verificaReporte($id,$id_profeco,$alerta){
	switch($alerta){
		case 'verde':
			$alerta=1;
		break;
		case 'ambar':
			$alerta=2;
		break;
		case 'rojo':
			$alerta=3;
		break;
		
	}

	$sql = "select * from reporte_profeco 
			inner join gasolinera on reporte_profeco.gasolinera_idgasolinera = gasolinera.idgasolinera
			where gasolinera.estacion = 'E$id' 
			and semaforo = '$alerta'
			and reporte_profeco.fecha > date_sub(curdate(), interval 180 day)";
	//Si existe el mismo reporte en la misma gasolinera con menos de 180 días de almacenado no se almacena de nuevo
	global $db;
	$res = mysql_query($sql,$db);
	$reporte = array();
	while($row = mysql_fetch_array($res)){
		$reporte[] = $row;
	}
	return $reporte;
}

function insertaReporte($id_gasolinera,$id_profeco,$alerta){
	global $db;
	switch($alerta){
		case 'verde':
			$alerta=1;
		break;
		case 'ambar':
			$alerta=2;
		break;
		case 'rojo':
			$alerta=3;
		break;
		
	}
	$sql = "insert into reporte_profeco (semaforo, fecha, gasolinera_idgasolinera, idprofeco) values
	('$alerta','".date("Y-m-d")."',$id_gasolinera,$id_profeco);";
	$res = mysql_query($sql,$db);
	if(!$res){
		echo mysql_error();
	}
}

function getGasolineraByEstacion($estacion){
	$sql = "select * from gasolinera where estacion = 'E$estacion'";
	global $db;
	$res = mysql_query($sql,$db);
	$gasolinera = array();
	while($row = mysql_fetch_array($res)){
		$gasolinera = $row;
	}
	return $gasolinera;
}
	  

function get_string_between($string, $start, $end){
$string = " ".$string;
$ini = strpos($string,$start);
if ($ini == 0) return "";
$ini += strlen($start);
$len = strpos($string,$end,$ini) - $ini;
return substr($string,$ini,$len);
}

	  
//echo $resultados[1];
?>