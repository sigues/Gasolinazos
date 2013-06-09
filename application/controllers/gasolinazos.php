<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinazos extends CI_Controller {

        public function index(){
            $data="";
            $this->load->library('user_agent');
            if(!$this->agent->is_mobile()){
               /* $data["content"] = $this->load->view('movil',$data,true);
                $data["footer"] = true;
                $this->load->view('main',$data);*/
                $this->load->view('movil/test1');
            } else {
                $this->load->view('principal',$data);
            }
            
            //$data["content"] = $this->load->view('principal',$data,true);
        }
        
	public function noticias()
	{
            $pagina = $this->uri->segment(3);
            $this->load->model('noticias_m');
            
            $data["noticias"] = $this->noticias_m->getNoticias();
            $data["noticiasSidebar"] = $this->noticias_m->getNoticiasSidebar();
            
            $data["content"] = $this->load->view('noticias',$data,true);
            $this->load->view('main',$data);
	}
        
        public function contacto(){
//            $data["noticias"] = $this->noticias_m->getNoticias();
            $data["content"] = $this->load->view('contacto',$data,true);
            $this->load->view('main',$data);
        }
        
        public function regDat(){
//            var_dump($_POST);
            $this->load->model("gasolinazos_m");
            $usuario = $this->gasolinazos_m->getUsuarioByFbid($_POST["id"]);
            if(sizeof($usuario)==0){
//                echo "registrando";die();
                $this->gasolinazos_m->registraUsuario($_POST);
            }            
            $usuario = $this->gasolinazos_m->getUsuarioByFbid($_POST["id"]);
            $this->session->set_userdata($usuario);
        }
        
        public function lo(){
             $this->session->unset_userdata("fbid");
        }
        
        public function boton(){
            if($this->session->userdata('fbid')==false){
                echo '<fb:login-button show-faces="false" width="200" max-rows="1"></fb:login-button>';
            } else {
                echo "Hola ".$this->session->userdata("first_name");
            }
        }
        
}
