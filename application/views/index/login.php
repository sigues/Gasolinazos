<?

parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
$CI = & get_instance();
    
$idusuario = $CI->session->userdata("idusuario");
if(!isset($idusuario) || $idusuario == null){
    $CI->config->load("facebook",TRUE);
    $config = $CI->config->item('facebook');
    $CI->load->library('Facebook', $config);

    $userId = $CI->facebook->getUser();
    $CI->load->model('gasolinazos_m');
    // If user is not yet authenticated, the id will be zero
    if($userId == 0){
        // Generate a login url
        $url = $CI->facebook->getLoginUrl(array('scope'=>'email'));
    } else {
        // Get user's data and print it
        $user = $CI->facebook->api('/me');
        $CI->session->set_userdata("name",$user["name"]);
        $CI->session->set_userdata("fbid",$user["fbid"]);
        $usuario = $CI->gasolinazos_m->getUsuarioByFbid($user["id"]);
        if(sizeof($usuario)==0){
            $CI->gasolinazos_m->registraUsuario($user);
            $usuario = $CI->gasolinazos_m->getUsuarioByFbid($user["id"]);
        }
        $CI->session->set_userdata("idusuario",$usuario["idusuario"]);
        $CI->session->set_userdata("first_name",$usuario["first_name"]);
        $CI->session->set_userdata("middle_name",$usuario["middle_name"]);
        //verificar existencia previa de usuario y almacenar datos
    }
}

$nombre_usuario = $CI->session->userdata("first_name")." ".$CI->session->userdata("middle_name");
?>
<? if(isset($url)){ ?>
<a href="<?php echo $url; ?>">Iniciar sesión</a>
<? } else {
    echo "<b style='color:#efefef'>Hola ".$nombre_usuario."</b>";
}