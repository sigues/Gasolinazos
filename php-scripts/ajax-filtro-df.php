<?
$link = $_POST["link"];
echo $link."--<br>";
$link = str_replace("GasolineriasDetalle.aspx?numeroGas=","",$link);


$id = substr($link, 0,6);
$latlng = explode("&latitud=",$link);//var_dump($latlng);
$latlng = explode("&longitud=",$latlng[1]);

if(getLatLng($id)==false){
    echo "cargar<br>";
    updateGasolinera($id,$latlng[0],$latlng[1]);
}else{
    echo "no cargar<br>";
}

/*

$spans = explode("<span>",$page);
if(sizeof($spans)>1){
    for($x=1;$x<=10;$x++){
        $valor = get_string_between($spans[$x], "/GasolineriasDetalle.aspx?numeroGas=", ', false, true))');
        $id = substr($valor, 0,6);
        $latlng = explode("&amp;latitud=",$valor);//var_dump($latlng);
        $latlng = explode("&amp;longitud=",$latlng[1]);
//        $latitud = 
        echo $id." - ".$latlng[0]." - ".str_replace("&quot;","",$latlng[1])."--------<br>";
        updateGasolinera($id,$latlng[0],str_replace("&quot;","",$latlng[1]));
    }
}
*/
//var_dump($spans);
//echo ($page);



function updateGasolinera($id,$latitud,$longitud){
$db = mysql_connect("localhost","root","");
mysql_select_db("gasolinazos");
//    global $db;
    $sql = "update gasolinera set latitud = '$latitud', longitud='$longitud' where estacion = '$id'";
    mysql_query($sql,$db);
    echo $sql."<br>";
}

function get_string_between($string, $start, $end){
$string = " ".$string;
$ini = strpos($string,$start);
if ($ini == 0) return "";
$ini += strlen($start);
$len = strpos($string,$end,$ini) - $ini;
return substr($string,$ini,$len);
}

function getLatLng($estacion){
    $db = mysql_connect("localhost","root","");
    mysql_select_db("gasolinazos");
    $sql = "select latitud,longitud from gasolinera where estacion = '$estacion'";
    $res = mysql_query($sql,$db);
    $estado = false;
    while($row = mysql_fetch_array($res)){
        if($row["latitud"]=="" && $row["longitud"]==""){
            return false;
        }else{
            return true;
        }
//            $estado = $row;
    }
}


?>