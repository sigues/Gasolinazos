<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinazos extends CI_Controller {

        public function index(){
            $data="";
            $this->load->library('user_agent');
            if(!$this->agent->is_mobile()){
               /* $data["content"] = $this->load->view('movil',$data,true);
                $data["footer"] = true;
                $this->load->view('main',$data);*/
                $this->load->model("gasolineras_m");
                $data["estados"] = $this->gasolineras_m->getEstados();
                $this->load->view('movil/test1',$data);
            } else {
                $this->load->view('principal',$data);
            }
            
            //$data["content"] = $this->load->view('principal',$data,true);
        }
        
	public function noticias()
	{
            $pagina = $this->uri->segment(3);
            $this->load->model('noticias_m');
            
            $data["noticias"] = $this->noticias_m->getNoticias($pagina);
            $data["noticiasSidebar"] = $this->noticias_m->getNoticiasSidebar($pagina);
            
            $data["content"] = $this->load->view('noticias',$data,true);
            $this->load->view('main',$data);
	}
        
        public function contacto(){
//            $data["noticias"] = $this->noticias_m->getNoticias();
            $correo = $this->input->post("correo");
            $mensaje = $this->input->post("mensaje");
            $data=array();
            
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('mensaje', 'Mensaje', 'required|min_length[5]|max_length[130]|xss_clean');

            if ($this->form_validation->run() == FALSE)
            {
                $data["error"]="error";
            }
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
