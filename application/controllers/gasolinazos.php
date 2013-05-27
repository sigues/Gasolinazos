<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinazos extends CI_Controller {

	public function noticias()
	{
            $estacion = $this->uri->segment(3);
            $this->load->model('noticias_m');
            
            $data["noticias"] = $this->noticias_m->getNoticias();
            $data["content"] = $this->load->view('noticias',$data,true);
            $this->load->view('main',$data);
	}
        
        public function contacto(){
//            $data["noticias"] = $this->noticias_m->getNoticias();
            $data["content"] = $this->load->view('contacto',$data,true);
            $this->load->view('main',$data);
        }
        
}
