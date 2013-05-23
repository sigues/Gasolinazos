<?php
set_time_limit(0);

$time_start = microtime(true); 
/*
$postdata = http_build_query(
		array(
                        'MSOGallery_FilterString' => '',
                        'MSOGallery_SelectedLibrary' => '',
                        'MSOLayout_InDesignMode' => '',
                        'MSOLayout_LayoutChanges' => '',
                        'MSOSPWebPartManager_DisplayModeName' => 'Browse',
                        'MSOSPWebPartManager_EndWebPartEditing' => false,
                        'MSOSPWebPartManager_ExitingDesignMode' => false,
                        'MSOSPWebPartManager_OldDisplayModeName' => 'Browse',
                        'MSOSPWebPartManager_StartWebPartEditingName' => false,
                        'MSOTlPn_Button' => 'none',
                        'MSOTlPn_SelectedWpId' => '',
                        'MSOTlPn_ShowSettings' => false,
                        'MSOTlPn_View' => 0,
                        'MSOWebPartPage_PostbackSource' => '',
                        'MSOWebPartPage_Shared' => '',
                        '__EVENTARGUMENT' => '',
                        '__EVENTTARGET' => '',
                        '__EVENTVALIDATION' => '/wEWEQKEjvKOCQLy0Kb7BALFqpmICAKRiYb5BwKFuvuHBgKP8NGbBQL6uZaODALao8TCCALju5GdDwLWo8TCCALPg9L6AgLGiObPAgK98o7HBQKSoPoiAu7MsrEHArPJlJkLAsLe0ooPloqiUUiMwhsdQ6xuiCf1Hf/b3yE=',
                        '__LASTFOCUS' => '',
                        '__REQUESTDIGEST' => '0x194ADCEE8AF88670273FB3C2F313052D928B70B283C6A782426D1DE31D2970E5144CDE44404C1348F79990477D9E8B08752C07C3A3F8CC377F8B5BFF4A7F24AA,21 May 2013 21:44:48 -0000',
                        '__VIEWSTATE' => '/wEPDwUBMA9kFgJmD2QWAgIBD2QWBAIBD2QWAgIGD2QWAmYPZBYCAgEPFgIeE1ByZXZpb3VzQ29udHJvbE1vZGULKYgBTWljcm9zb2Z0LlNoYXJlUG9pbnQuV2ViQ29udHJvbHMuU1BDb250cm9sTW9kZSwgTWljcm9zb2Z0LlNoYXJlUG9pbnQsIFZlcnNpb249MTQuMC4wLjAsIEN1bHR1cmU9bmV1dHJhbCwgUHVibGljS2V5VG9rZW49NzFlOWJjZTExMWU5NDI5YwFkAgMPZBYGAgMPZBYKBSZnXzIzMDBjZDUzXzRiYjhfNDJiZF9iNTM4Xzk1ZmUyZDI4YzUwNA9kFgJmD2QWBAIBDxQrAAIPFgQeC18hRGF0YUJvdW5kZx4LXyFJdGVtQ291bnQCoAFkZBYCZg9kFgICAQ9kFhRmD2QWAmYPZBYCZg8VBQZFMDM0NTEHMTkuNDM5OAgtOTkuMDc1OCJBRVJPUFVFUlRPUyBZIFNFUlZJQ0lPUyBBVVhJTElBUkVTbEFWLiBDQVJMT1MgTEVPTiBBRVJPUFVFUlRPIElOVEVSTkFDSU9OQUwgQ0QuIE1FWElDTywgY29sLiBQRU5PTiAgREUgTE9TIEJBTk9TLCBDUCAxNTUyMCwgVkVOVVNUSUFOTyBDQVJSQU5aQWQCAQ9kFgJmD2QWAmYPFQUGRTAzNTAwBzE5LjQ4NzcILTk5LjExMjceTFVCUklDQU5URVMgUk9CSSwgUy5BLiBERSBDLlYuREFWLiBDQU5URVJBIE5PLiAxMzQsIGNvbC4gTUFSVElOIENBUlJFUkEsIENQIDcwNzAsIEdVU1RBVk8gQS4gTUFERVJPZAICD2QWAmYPZBYCZg8VBQZFMDc4NjMHMTkuNDIwNAgtOTkuMTM0MjJFU1RBQ0lPTiBERSBTRVJWSUNJTyBQQVJBIEFVVE9TIENFTlRSTyBTLkEuREUgQy5WLjZMVUNBUyBBTEFNQU4gTk8uIDE3NywgY29sLiBPQlJFUkEsIENQIDY4MDAsIENVQVVIVEVNT0NkAgMPZBYCZg9kFgJmDxUFBkUwMzI1MwcxOS40NTQ2By05OS4xODgVR0FTT1NFVCwgUy5BLiBERSBDLlYuRkFWLiBNQVJJTkEgTkFDSU9OQUwgTk8uIDE5MSwgY29sLiBBaHVlaHVldGVzLCBDUCAxMTQxMCwgTUlHVUVMIEhJREFMR09kAgQPZBYCZg9kFgJmDxUFBkUwMzMzMwcxOS40OTAzCC05OS4xNDQ0KUVTVEFDSU9OIFRFUk1JTkFMIERFTCBOT1JURSwgUy5BLiBERSBDLlYuVUFWLiBMQVpBUk8gQ0FSREVOQVMgTk8uIDU1NSwgY29sLiBTQU4gQkFSVE9MTyBBVEVQRUhVQUNBTiwgQ1AgNzczMCwgR1VTVEFWTyBBLiBNQURFUk9kAgUPZBYCZg9kFgJmDxUFBkUwNTI4NAYxOS40NTgHLTk5LjExOCFDT05TT1JDSU8gUklPIENPTlNVTEFETywgU0EgREUgQ1ZLQVYuIFJJTyBDT05TVUxBRE8gTk8uIDIwMTEsIGNvbC4gVmFsbGUgR29tZXosIENQIDE1MjEwLCBWRU5VU1RJQU5PIENBUlJBTlpBZAIGD2QWAmYPZBYCZg8VBQZFMDMwNDYFMTkuNDcILTk5LjA4NjITVEFUTyBERVpBIE1BUklBIEFOQWBDRVJSQURBIEFMVkFSTyBPQlJFR09OIE5PLiA0OTgsIGNvbC4gVU5JREFEIEhBQklUQUNJT05BTCBMQSBDVUNISUxMQSwgQ1AgNzkzMCwgR1VTVEFWTyBBLiBNQURFUk9kAgcPZBYCZg9kFgJmDxUFBkUwMzA4MgYxOS4zODEHLTk5LjExMR9TRVJWSUNJTyBBUEFUTEFDTywgUy5BLiBERSBDLlYuOUFWLiBBUEFUTEFDTyBOTy4zMDcsIGNvbC4gRWwgVHJpdW5mbywgQ1AgOTQzMCwgSVpUQVBBTEFQQWQCCA9kFgJmD2QWAmYPFQUGRTAzMTgxBzE5LjQ2OTcHLTk5LjEwMRlKT1NFIExVSVMgR1VMSUFTIE1FUkVMTEVTSUFWLiBUQUxJU01BTiBOTy4gNDEwMywgY29sLiBHRVJUUlVESVogU0FOQ0hFWiwgQ1AgNzgzMCwgR1VTVEFWTyBBLiBNQURFUk9kAgkPZBYCZg9kFgJmDxUFBkUwMDAwMwcxOS40NDAyCC05OS4xNTE5FVNFUlZJQ0lPIEFMREFNQSwgUy5BLjFBbGRhbWEgTm8uIDM4LCBjb2wuIEd1ZXJyZXJvLCBDUCA2MzAwLCBDVUFVSFRFTU9DZAIDDxQrAAJkZBYCAgEPZBYGAgEPDxYCHgRUZXh0BQExZGQCAw8PFgIfAwUCMTBkZAIFDw8WAh8DBQMxNjBkZAUmZ184YzhjNzY5MF8wYjRiXzRkN2ZfOTA5NV9lYTZiZjhhMjBmOTUPZBYCZg9kFgQCAg8PFgIfA2VkZAIHD2QWAmYPZBYEAgEPEA8WAh4HQ2hlY2tlZGdkZGRkAgMPDxYCHgdWaXNpYmxlZ2RkBSZnXzM3MjVmZGI5X2Y2YmZfNDUwNV85YTVmX2MyOGE3NDA4YzcxYg9kFgRmDxYCHwVoZAIBDxYCHwVoZAUmZ181OTUyYjMxNl9jNTYwXzQ3NDNfOGFmZV80NzI4ZjMyNDVkNWIPZBYEZg8WAh8FaGQCAQ8WAh8FaGQFJmdfMGVkYjhhM2NfOTQ1ZV80OTk4XzhiMWVfZjg5NzdmZjA3MjcyD2QWBGYPFgIfBWhkAgEPFgIfBWhkAgcPZBYCAgEPZBYEZg9kFgICAQ8WAh8FaBYCZg9kFgQCAg9kFgYCAQ8WAh8FaGQCAw8WCB4TQ2xpZW50T25DbGlja1NjcmlwdAVuamF2YVNjcmlwdDpDb3JlSW52b2tlKCdUYWtlT2ZmbGluZVRvQ2xpZW50UmVhbCcsMSwgNTMsICdodHRwOlx1MDAyZlx1MDAyZmd1aWFwZW1leC5wZW1leC5jb20nLCAtMSwgLTEsICcnLCAnJykeGENsaWVudE9uQ2xpY2tOYXZpZ2F0ZVVybGQeKENsaWVudE9uQ2xpY2tTY3JpcHRDb250YWluaW5nUHJlZml4ZWRVcmxkHgxIaWRkZW5TY3JpcHQFIlRha2VPZmZsaW5lRGlzYWJsZWQoMSwgNTMsIC0xLCAtMSlkAgUPFgIfBWhkAgMPDxYKHglBY2Nlc3NLZXkFAS8eD0Fycm93SW1hZ2VXaWR0aAIFHhBBcnJvd0ltYWdlSGVpZ2h0AgMeEUFycm93SW1hZ2VPZmZzZXRYZh4RQXJyb3dJbWFnZU9mZnNldFkC6wNkZAIBD2QWBAIFD2QWAgIBDxAWAh8FaGQUKwEAZAIHD2QWAmYPZBYCZg8UKwADZGRkZAIJD2QWBAIID2QWAmYPZBYCAgEPD2QWBh4FY2xhc3MFIm1zLXNidGFibGUgbXMtc2J0YWJsZS1leCBzNC1zZWFyY2geC2NlbGxwYWRkaW5nBQEwHgtjZWxsc3BhY2luZwUBMGQCFg9kFgICBQ8PFgIfBWhkFgICAw9kFgJmD2QWAgIDD2QWAgIFDw8WBB4GSGVpZ2h0GwAAAAAAAHlAAQAAAB4EXyFTQgKAAWQWAgIBDzwrAAkBAA8WBB4NUGF0aFNlcGFyYXRvcgQIHg1OZXZlckV4cGFuZGVkZ2RkGAMFQ2N0bDAwJG0kZ18yMzAwY2Q1M180YmI4XzQyYmRfYjUzOF85NWZlMmQyOGM1MDQkY3RsMDAkbHZ3R2Fzb2xpbmVyYXMPPCsACgIHPCsACgAIAqABZAVCY3RsMDAkbSRnXzIzMDBjZDUzXzRiYjhfNDJiZF9iNTM4Xzk1ZmUyZDI4YzUwNCRjdGwwMCRkcEdhc29saW5lcmFzDzwrAAQBAwKgAWQFHl9fQ29udHJvbHNSZXF1aXJlUG9zdEJhY2tLZXlfXxYKBT9jdGwwMCRtJGdfOGM4Yzc2OTBfMGI0Yl80ZDdmXzkwOTVfZWE2YmY4YTIwZjk1JGN0bDAwJENoa0hvdGVsZXMFRWN0bDAwJG0kZ184YzhjNzY5MF8wYjRiXzRkN2ZfOTA5NV9lYTZiZjhhMjBmOTUkY3RsMDAkQ2hrUHVudG9zSW50ZXJlcwVDY3RsMDAkbSRnXzhjOGM3NjkwXzBiNGJfNGQ3Zl85MDk1X2VhNmJmOGEyMGY5NSRjdGwwMCRDaGtHYXNvbGluZXJhcwVCY3RsMDAkbSRnXzhjOGM3NjkwXzBiNGJfNGQ3Zl85MDk1X2VhNmJmOGEyMGY5NSRjdGwwMCRDaGtHYXNQcmVtaXVtBUFjdGwwMCRtJGdfOGM4Yzc2OTBfMGI0Yl80ZDdmXzkwOTVfZWE2YmY4YTIwZjk1JGN0bDAwJENoa0dhc0RpZXNlbAVBY3RsMDAkbSRnXzhjOGM3NjkwXzBiNGJfNGQ3Zl85MDk1X2VhNmJmOGEyMGY5NSRjdGwwMCRDaGtHYXNUaWVuZGEFS2N0bDAwJG0kZ184YzhjNzY5MF8wYjRiXzRkN2ZfOTA5NV9lYTZiZjhhMjBmOTUkY3RsMDAkQ2hrR2FzQ2FqZXJvQXV0b21hdGljbwVGY3RsMDAkbSRnXzhjOGM3NjkwXzBiNGJfNGQ3Zl85MDk1X2VhNmJmOGEyMGY5NSRjdGwwMCRDaGtHYXNSZXN0YXVyYW50ZQVEY3RsMDAkbSRnXzhjOGM3NjkwXzBiNGJfNGQ3Zl85MDk1X2VhNmJmOGEyMGY5NSRjdGwwMCRDaGtSZXN0YXVyYW50ZXMFPGN0bDAwJG0kZ184YzhjNzY5MF8wYjRiXzRkN2ZfOTA5NV9lYTZiZjhhMjBmOTUkY3RsMDAkQ2hrU3Bhc89WavnxpVd4dzf8qQ11ZWSYz9oA',
                        '__spText1' => '',
                        '__spText2' => '',
                        '_wpSelected' => '',
                        '_wpcmWpid' => '',
                        '_wzSelected' => '',
                        'ctl00$ctl35$ctl00' => 'http://guiapemex.pemex.com',
			'ctl00$ctl35$ctl04' => 0,
			'ctl00$m$g_8c8c7690_0b4b_4d7f_9095_ea6bf8a20f95$ctl00$BtnBuscar' => 'Buscar',
			'ctl00$m$g_8c8c7690_0b4b_4d7f_9095_ea6bf8a20f95$ctl00$ChkGasolineras' => 'on',
			'ctl00$m$g_8c8c7690_0b4b_4d7f_9095_ea6bf8a20f95$ctl00$Txb_LocalidadMunicipio' => 'Tijuana , Tijuana',
			'wpcmVal' => ''
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

$result = file_get_contents('http://guiapemex.pemex.com/Paginas/gasolinerias.aspx', false, $context);

echo $result;*/
//centro de leon a oaxaca
//21.69, -103.37
//16.19, -95.64
//sureste veracruz a chiapas
//19.62, -96.35
//14.50, -90.36
//península de Yucatán
//21.76, -90.60
//17.87, -86.69
//tepic hasta colima
//22.76, -105.93
//18.21, -103.25
//norte, parral a tampico
//26.76, -106.02
//21.25, -97.19
//sinaloa
//26.35, -109.58
//22.37, -105.05
//mas al norte, hermosillo a matamoros
//30.09, -112.83
//26.33, -98.86
//df doublecheck
//20.262, -100.47
//18.649, -98.39
//mas mas al norte, cd juarez, caborca, etc.
//32.25, -113.78
//29.78, -104.44
//bc
//32.23, -117.12
//28.00, -112.68
//bcs
//28.17, -115.34
//22.88, -109.16
//sobaco de mexico
//32.88, -115.56
//31.39, -113.54
//
//pendientes



$lat_ini = 32.88;
$lng_ini = -115.56;
$lat_fin = 31.39;
$lng_fin = -113.54;
$z = 1;$w=0;
$actualizada=array();
$faltantes = array();
for($x=$lat_ini;$x>=$lat_fin;$x=$x-0.17){
    for($y=$lng_ini;$y<=$lng_fin;$y=$y+0.17){
        $url = "http://pronosticodemanda.pemex.com/WS_GP/Pemex.Servicios.svc/nearby/$x/$y/param?category=3";
        $arr = json_decode(file_get_contents($url));
        foreach($arr->places as $gasolinera){
            echo $z." .- ".$gasolinera->id." - ".$gasolinera->place_latitude.", ".$gasolinera->place_longitude."<br>";
            $z++;
            $existe=getLatLng($gasolinera->id);
//            var_dump($existe);
            if(!$existe){
                updateGasolinera($gasolinera->id,$gasolinera->place_latitude,$gasolinera->place_longitude);
                if(isset($actualizada[$gasolinera->id]) && $actualizada[$gasolinera->id] == true){
                    $faltantes[$gasolinera->id] = $gasolinera;                            
                }else{
                    $actualizada[$gasolinera->id] = true;
                }
                echo "Actualizada<br>";
            }elseif((string)$existe=="no existe"){
                $faltantes[$gasolinera->id] = $gasolinera;      
                echo "no existe<br>";
            }else{
                echo "No Act.<br>";
            }
        }
        //var_dump($arr);
        //die();
        //echo $z." - ".$x.",".$y."<br>";$z++;
        $w++;
    }
}

echo "<br>".$w." Requests<br>";
$time_end = microtime(true);
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';

echo "<br><br>Actualizadas";
var_dump($actualizada);
echo "<br><br>Faltantes";
$fal_json = json_encode($faltantes);
echo $fal_json;
$file = 'faltantes-norte.txt';
// Write the contents back to the file
file_put_contents($file, $fal_json);


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
    $estado = false;$existe=false;
    while($row = mysql_fetch_array($res)){
        $existe=true;
        if($row["latitud"]=="" || $row["longitud"]==""){
            return false;
        }else{
            return true;
        }
//            $estado = $row;
    }
    return "no existe";
}
?>
