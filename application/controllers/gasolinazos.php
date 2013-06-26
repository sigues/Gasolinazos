<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolinazos extends CI_Controller {

        public function Gasolinazos(){
            parent::__construct();
            
        }
        
        public function index(){
            $data="";
            $this->load->library('user_agent');
            if($this->agent->is_mobile()){
                $this->load->model("gasolineras_m");
                $data["estados"] = $this->gasolineras_m->getEstados();
                $this->load->view('movil/test1',$data);
            } else {
                $this->load->model("gasolinera_m");
                $data["banner"] = true;
                $data["features"] = true;
                $data["precio"] = $this->gasolinera_m->getPreciosProductos();
                $data["content"] = $this->load->view('index/content',$data,true);
                $this->load->view('main',$data);
//                $this->load->view('principal',$data);
            }
            
            //$data["content"] = $this->load->view('principal',$data,true);
        }
        
        public function mobile(){
                $this->load->model("gasolineras_m");
                $data["estados"] = $this->gasolineras_m->getEstados();
                $this->load->view('movil/test1',$data);
        }
        
	public function noticias()
	{
            $pagina = $this->uri->segment(3);
            $this->load->model('noticias_m');
            $pagina = ($pagina>0)?$pagina:1;
            $data["pagina"] = $pagina;
            $data["noticias"] = $this->noticias_m->getNoticias($pagina);
            $data["count_noticias"] = 15;//$this->noticias_m->countNoticias();
            $data["noticiasSidebar"] = $this->noticias_m->getNoticiasSidebar($pagina);
            
            $data["content"] = $this->load->view('noticias',$data,true);
            $this->load->view('main',$data);
	}
        
        public function contacto(){
//            $data["noticias"] = $this->noticias_m->getNoticias();
            $correo = strip_tags($this->input->post("correo"));
            $mensaje = strip_tags($this->input->post("mensaje"));
            $fbid = $this->session->userdata("fbid");
            $first_name = $this->session->userdata("first_name");
            $middle_name = $this->session->userdata("middle_name");
            $last_name = $this->session->userdata("last_name");
            
            $data=array();
            $data["fbid"] = $fbid;
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('mensaje', 'Mensaje', 'required|min_length[5]|max_length[130]|xss_clean');

            if ($this->form_validation->run() == FALSE)
            {
                $data["error"]="error";
            }else{
                //Enviando correo de contacto, esta info no se procesa, como viene se manda
                $this->load->library('email');
                $this->email->from($mensaje, $first_name." ".$middle_name." ".$last_name);
                $this->email->to('someone@example.com');
                $this->email->subject('Contacto por sitio');
                $this->email->message($mensaje);

                $this->email->send();

                $data["success"]="success";
            }
            
            $this->load->model("noticias_m");
            $data["noticias"]=$this->noticias_m->getNoticiasSidebar(1);
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
            $this->session->unset_userdata("idusuario");
            redirect('/gasolinazos/index', 'refresh');
        }
        
        public function boton(){
            if($this->session->userdata('fbid')==false){
                echo '<fb:login-button show-faces="false" width="200" max-rows="1"></fb:login-button>';
            } else {
                echo "Hola ".$this->session->userdata("first_name");
            }
        }
        
        public function noticia(){
            $this->load->model("noticias_m");
            $idnoticia = $this->uri->segment(3);
            $this->load->library('user_agent');
            
            if($this->noticias_m->agregaVista($idnoticia)){
                $data["noticia"] = $this->noticias_m->getNoticia($idnoticia);
                $data["noticias_sidebar"] = $this->noticias_m->getNoticiasSidebar();
                $data["content"]=$this->load->view("noticia",$data,true);
                $main = $this->load->view("main",$data,true);
            }
            echo $main;
            
                
            
        }
        
}
