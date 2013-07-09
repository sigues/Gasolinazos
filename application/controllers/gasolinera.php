<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinera extends CI_Controller {

	public function estacion()
	{
            $estacion = $this->uri->segment(3);
            $this->load->model('gasolinera_m');
            $this->load->model('reporte_profeco');
            $this->load->model('gasolineras_m');
            if($this->uri->segment(4) == "ruta"){
                $data["ruta"]="true";
            }else{
                $data["ruta"]="false";            
            }
            $data["usuario"] = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            
            $data["estacion"] = $this->gasolinera_m->getGasolineraByEstacion($estacion);
            $data["productos"] = $this->gasolinera_m->getProductosByIdgasolinera($data["estacion"]["idgasolinera"]);
            $data["reportes"] = $this->reporte_profeco->getReportesByEstacion($data["estacion"]["idgasolinera"]);
            $promedio = $this->gasolinera_m->getPromedioGasolinera($data["estacion"]["idgasolinera"]);
            $data["promedio"] = $promedio->promedio*100;
            $usuario = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            $data["calificacion"] = $this->gasolinera_m->getCalificacionByUsuario($data["estacion"]["idgasolinera"],$usuario);
            $data["votos"] = $promedio->votos;
            $data["gasolineras"] = $this->gasolinera_m->getGasolineras();
            $data["gasolineras"] = $this->gasolineras_m->buscarGasolinerasCoord($data["estacion"]["latitud"],$data["estacion"]["longitud"]);
            //var_dump($gasolineras);
            $data["content"] = $this->load->view('estacion',$data,true);
            $this->load->view('main',$data);
	}
        
        public function estacionByID()
	{
            
            $idgasolinera = $this->input->post("idgasolinera");
            $this->load->model('gasolinera_m');
            /*$this->load->model('reporte_profeco');
            $this->load->model('gasolineras_m');
            if($this->uri->segment(4) == "ruta"){
                $data["ruta"]="true";
            }else{
                $data["ruta"]="false";            
            }
            $data["usuario"] = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            */
            $data["estacion"] = $this->gasolinera_m->getGasolineraByID($idgasolinera);
            /*$data["productos"] = $this->gasolinera_m->getProductosByIdgasolinera($data["estacion"]["idgasolinera"]);
            $data["reportes"] = $this->reporte_profeco->getReportesByEstacion($data["estacion"]["idgasolinera"]);
            $promedio = $this->gasolinera_m->getPromedioGasolinera($data["estacion"]["idgasolinera"]);
            $data["promedio"] = $promedio->promedio*100;
            $usuario = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            $data["calificacion"] = $this->gasolinera_m->getCalificacionByUsuario($data["estacion"]["idgasolinera"],$usuario);
            $data["votos"] = $promedio->votos;
            $data["gasolineras"] = $this->gasolinera_m->getGasolineras();
            $data["gasolineras"] = $this->gasolineras_m->buscarGasolinerasCoord($data["estacion"]["latitud"],$data["estacion"]["longitud"]);
            //var_dump($gasolineras);
            $data["content"] = $this->load->view('estacion',$data,true);
            $this->load->view('main',$data);*/
            header('Access-Control-Allow-Origin: *');
            echo json_encode($data["estacion"]);
	}
        
        public function getPerfilEstacion(){
            $idgasolinera = $this->input->post("idgasolinera");
            $latitud = $this->input->post("latitud");
            $longitud = $this->input->post("longitud");
            $usuario = $this->input->post("movil");
            $tipo = $this->input->post("tipo");
            $this->load->model("gasolinazos_m");
            $usuario = $this->gasolinazos_m->getUsuarioByUUID($usuario,$tipo);
        
            //$idgasolinera = $this->uri->segment(3);
            $this->load->model('gasolinera_m');
            $this->load->model('gasolineras_m');
            $this->load->model('reporte_profeco');
            /*if($this->uri->segment(4) == "ruta"){
                $data["ruta"]="true";
            }else{
                $data["ruta"]="false";            
            }*/
            //$data["usuario"] = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            
            $data["estacion"] = $this->gasolinera_m->getGasolineraByID($idgasolinera);
            $data["estacion"]["productos"] = $this->gasolinera_m->getProductosByIdgasolinera($data["estacion"]["idgasolinera"]);
            $data["estacion"]["reportes"] = $this->reporte_profeco->getReportesByEstacion($data["estacion"]["idgasolinera"]);
            $promedio = $this->gasolinera_m->getPromedioGasolinera($data["estacion"]["idgasolinera"]);
            $data["estacion"]["promedio"] = $promedio->promedio*100;
            $data["estacion"]["distancia"] = $this->gasolineras_m->vincentyGreatCircleDistance($latitud, $longitud, $data["estacion"]["latitud"], $data["estacion"]["longitud"]);
            //echo $data["distancia"]."<bR>" ;
            /*$usuario = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            */
            
            $data["calificacion"] = $this->gasolinera_m->getCalificacionByUsuario($data["estacion"]["idgasolinera"],$usuario);
            $data["estacion"]["votos"] = $promedio->votos;
            //$data["gasolineras"] = $this->gasolinera_m->getGasolineras();
            //$data["gasolineras"] = $this->gasolineras_m->buscarGasolinerasCoord($data["estacion"]["latitud"],$data["estacion"]["longitud"]);
            //var_dump($gasolineras);
            //$data["content"] = $this->load->view('estacion',$data,true);
            //$this->load->view('main',$data);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($data["estacion"]);
        }
        
        public function voto(){
            $voto = $this->input->post('voto');
            $gasolinera = $this->input->post('gasolinera');
            $usuario = $this->session->userdata("idusuario");
            $this->load->model('gasolinera_m');
            $movil = $this->input->post('movil');
            if($movil != false){
                $usuario = $movil;
            }else{
                $usuario = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            }
            $data=array();
            $data["calificacion"] = $this->gasolinera_m->getCalificacionByUsuario($gasolinera,$usuario);
            if($data["calificacion"]!=$voto && $usuario!=0){
//
                $this->gasolinera_m->deleteCalificacionByUsuario($gasolinera,$usuario);
                $voto = array("valor"=>$voto,"gasolinera_idgasolinera"=>$gasolinera,"usuario_idusuario"=>$usuario);
                $this->gasolinera_m->voto($voto);
            }
            $promedio = $this->gasolinera_m->getPromedioGasolinera($gasolinera);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($promedio);
        }
        
        public function votoWS(){
            $voto = $this->input->post('voto');
            $gasolinera = $this->input->post('gasolinera');
            $usuario = $this->input->post("movil");
            $tipo = $this->input->post("tipo");
            $this->load->model("gasolinazos_m");
            $usuario = $this->gasolinazos_m->getUsuarioByUUID($usuario,$tipo);
        
            $this->load->model('gasolinera_m');
            //$usuario = rand(0,1000);//($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            $data=array();
            $data["calificacion"] = $this->gasolinera_m->getCalificacionByUsuario($gasolinera,$usuario);
            if($data["calificacion"]!=$voto && $usuario!=0){
//
                                $this->gasolinera_m->deleteCalificacionByUsuario($gasolinera,$usuario);
                $voto = array("valor"=>$voto,"gasolinera_idgasolinera"=>$gasolinera,"usuario_idusuario"=>$usuario);
                $this->gasolinera_m->voto($voto);
            }
            $promedio = $this->gasolinera_m->getPromedioGasolinera($gasolinera);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($promedio);
        }
        
        public function nuevaEstacion(){
            $latitud = $this->input->post('latitud');
            $longitud = $this->input->post('longitud');
            $estacion = $this->input->post('estacion');
            
            
            $this->load->library('email');
            $this->email->from('contacto@gasolinazos.com', "nueva estación");
            $this->email->to('contacto@gasolinazos.com');
            $this->email->subject('Contacto por sitio');
            $this->email->message("$estacion : $latitud,$longitud");
            $var = $this->email->send();
            var_dump($var);
            
            
            echo "0";
        }
        
}
