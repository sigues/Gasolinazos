<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinera extends CI_Controller {

	public function estacion()
	{
            $estacion = $this->uri->segment(3);
            $this->load->model('gasolinera_m');
            $this->load->model('reporte_profeco');
            
            $data["estacion"] = $this->gasolinera_m->getGasolineraByEstacion($estacion);
            $data["productos"] = $this->gasolinera_m->getProductosByIdgasolinera($data["estacion"]["idgasolinera"]);
            $data["reportes"] = $this->reporte_profeco->getReportesByEstacion($data["estacion"]["idgasolinera"]);
            $promedio = $this->gasolinera_m->getPromedioGasolinera($data["estacion"]["idgasolinera"]);
            $data["promedio"] = $promedio->promedio*100;
            $data["votos"] = $promedio->votos;
            $data["gasolineras"] = $this->gasolinera_m->getGasolineras();
            //var_dump($gasolineras);
            $data["content"] = $this->load->view('estacion',$data,true);
            $this->load->view('main',$data);
	}
        
        public function voto(){
            $voto = $this->input->post('voto');
            $gasolinera = $this->input->post('gasolinera');
            $usuario = 1;
            $this->load->model('gasolinera_m');
            $voto = array("valor"=>$voto,"gasolinera_idgasolinera"=>$gasolinera,"usuario_idusuario"=>$usuario);
            $this->gasolinera_m->voto($voto);
            $promedio = $this->gasolinera_m->getPromedioGasolinera($gasolinera);
            echo json_encode($promedio);
        }
        
}
