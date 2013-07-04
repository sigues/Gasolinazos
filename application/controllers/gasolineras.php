<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gasolineras extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function buscador(){
            $this->load->model("gasolineras_m");
            $data["estados"] = $this->gasolineras_m->getEstados();
            $data["content"] = $this->load->view('buscador',$data,true);
            $this->load->view('main',$data);

        }
        
        public function buscaCiudad(){
            $estado = $this->input->post("estado");
            $this->load->model("gasolineras_m");
            $ciudades = $this->gasolineras_m->buscaCiudad($estado);
            echo '<label for="ciudad">Ciudad:</label> 
                                <select id="ciudad">
                                    <option value=0> - Seleccionar - </option>';
            foreach($ciudades as $ciudad){
                echo '<option value="'.$ciudad->idciudad.'">'.$ciudad->nombre.'</option>';
            }
            echo '</select>';

        }
        
        public function buscaColonia(){
            $ciudad = $this->input->post("ciudad");
            $this->load->model("gasolineras_m");
            $colonias = $this->gasolineras_m->buscaColonia($ciudad);
            echo '<label for="colonia">Colonia:</label> 
                                <select id="colonia">
                                    <option value=0> - Seleccionar - </option>';
            foreach($colonias as $colonia){
                echo '<option value="'.$colonia->colonia.'">'.$colonia->colonia.'</option>';
            }
            echo '</select>';
        }
        
        public function buscarGasolineras(){
            $estado = $this->input->post("estado");
            $ciudad = $this->input->post("ciudad");
            $colonia = $this->input->post("colonia");
            $texto = $this->input->post("texto");
            $pagina = $this->input->post("pagina");
            $this->load->model("gasolineras_m");
            $gasolineras = $this->gasolineras_m->buscarGasolineras($estado,$ciudad,$colonia,$texto);
            echo json_encode($gasolineras);
        }
        
        public function buscarGasolinerasCoord(){
            $latitud = $this->input->post("latitud");
            $longitud = $this->input->post("longitud");
            $geolat = $this->input->post("geolat");
            $geolng = $this->input->post("geolng");
            $filtros = json_decode($this->input->post("filtros"));
       //     echo $latitud.$longitud;
            $this->load->model("gasolineras_m");
            $gasolineras = $this->gasolineras_m->buscarGasolinerasCoord($latitud,$longitud,0.02,$geolat,$geolng,$filtros);
			header('Access-Control-Allow-Origin: *');
            echo json_encode($gasolineras);
        }
        
        public function buscarGasolinerasCoordWS(){
            $latitud = $this->input->post("latitud");
            $longitud = $this->input->post("longitud");
            $geolat = $this->input->post("geolat");
            $geolng = $this->input->post("geolng");
            $filtros = json_decode($this->input->post("filtros"));
       //     echo $latitud.$longitud;
            $this->load->model("gasolineras_m");
            $gasolineras = $this->gasolineras_m->buscarGasolinerasCoord($latitud,$longitud,0.02,$geolat,$geolng,$filtros,0,rand(0,1000));
			header('Access-Control-Allow-Origin: *');
            echo json_encode($gasolineras);
        }
        
        public function las10mejores(){
            $this->load->model("gasolineras_m");
            $data["estados"] = $this->gasolineras_m->getEstados();
            $data["content"] = $this->load->view('10mejores',$data,true);
            $this->load->view('main',$data);
        }
        
        public function las10peores(){
            $this->load->model("gasolineras_m");
            $data["estados"] = $this->gasolineras_m->getEstados();
            $data["content"] = $this->load->view('10peores',$data,true);
            $this->load->view('main',$data);
        }
        
        public function infowindow(){
            $idgasolinera = $this->input->post("idgasolinera");
            echo $idgasolinera."<-<br>";
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */