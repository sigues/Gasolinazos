<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinera extends CI_Controller {

	public function estacion()
	{
            $estacion = $this->uri->segment(3);
            $this->load->model('gasolinera_m');
            
            $data["estacion"] = $this->gasolinera_m->getGasolineraByEstacion($estacion);
            $data["productos"] = $this->gasolinera_m->getProductosByIdgasolinera($data["estacion"]["idgasolinera"]);
            $data["content"] = $this->load->view('estacion',$data,true);
            $this->load->view('main',$data);
	}
        
}
