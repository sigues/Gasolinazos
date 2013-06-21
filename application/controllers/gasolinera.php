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
        
        public function voto(){
            $voto = $this->input->post('voto');
            $gasolinera = $this->input->post('gasolinera');
            $usuario = $this->session->userdata("idusuario");
            $this->load->model('gasolinera_m');
            $usuario = ($this->session->userdata("idusuario"))?$this->session->userdata("idusuario"):0;
            $data=array();
            $data["calificacion"] = $this->gasolinera_m->getCalificacionByUsuario($gasolinera,$usuario);
            if($data["calificacion"]!=$voto && $usuario!=0){
                $voto = array("valor"=>$voto,"gasolinera_idgasolinera"=>$gasolinera,"usuario_idusuario"=>$usuario);
                $this->gasolinera_m->voto($voto);
            }
            $promedio = $this->gasolinera_m->getPromedioGasolinera($gasolinera);
            echo json_encode($promedio);
        }
        
        public function nuevaEstacion(){
            echo "0";
        }
        
}
