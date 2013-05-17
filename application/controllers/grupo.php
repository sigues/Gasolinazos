<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo extends CI_Controller {

	public function perfil()
	{
            $grupo = $this->uri->segment(3);
            $this->load->model('gasolinera_m');
            $this->load->model('reporte_profeco');
            $data["estaciones"] = $this->gasolinera_m->getGasolineras(0,"","","",$grupo);
            $x=1;
            foreach($data["estaciones"] as $c=>$estacion){
                //$data["estaciones"][$c]->promedio = $this->gasolinera_m->getPromedioGasolinera($estacion->idgasolinera);
                $data["estaciones"][$c]->reportes = $this->reporte_profeco->getReportesByEstacion($estacion->idgasolinera);
                if($x==1){
                    $data["nombre_grupo"] = $estacion->nombre;
                    $data["direccion_grupo"] = $estacion->nombre;
                    $data["colonia_grupo"] = $estacion->colonia;
                    $data["nombre_ciudad"] = $estacion->nombre_ciudad;
                    $data["nombre_estado"] = $estacion->nombre_estado;
                    $data["idgrupo"] = $estacion->grupo_idgrupo;
                    $data["telefono_grupo"] = $estacion->telefono;
                    $data["direccion_grupo"] = $estacion->direccion;
                    $x++;
                }
            }
            $data["promedio_grupo"] = $this->gasolinera_m->getPromedioGrupo($data["idgrupo"]);
            $data["estaciones_reportadas"] = $this->gasolinera_m->getGasolineras(0,"","","",$grupo,true);
            
            
//            $promedio = $this->gasolinera_m->getPromedioGasolinera($data["estacion"]["idgasolinera"]);
//            $data["promedio"] = $promedio->promedio*100;
            //$data["votos"] = $promedio->votos;
            //$data["gasolineras"] = $this->gasolinera_m->getGasolineras();
            //var_dump($gasolineras);
            $data["content"] = $this->load->view('grupo',$data,true);
            $this->load->view('main',$data);
	}
        
        public function gasolineras(){
            $grupo = $this->uri->segment(3);
            $this->load->model('gasolinera_m');
            $this->load->model('reporte_profeco');
            $data["estaciones"] = $this->gasolinera_m->getGasolineras(0,"","","",$grupo);
            $x=1;
            foreach($data["estaciones"] as $c=>$estacion){
                //$data["estaciones"][$c]->promedio = $this->gasolinera_m->getPromedioGasolinera($estacion->idgasolinera);
                $data["estaciones"][$c]->reportes = $this->reporte_profeco->getReportesByEstacion($estacion->idgasolinera);
                if($x==1){
                    $data["nombre_grupo"] = $estacion->nombre;
                    $data["direccion_grupo"] = $estacion->nombre;
                    $data["colonia_grupo"] = $estacion->colonia;
                    $data["nombre_ciudad"] = $estacion->nombre_ciudad;
                    $data["nombre_estado"] = $estacion->nombre_estado;
                    $data["idgrupo"] = $estacion->grupo_idgrupo;
                    $data["telefono_grupo"] = $estacion->telefono;
                    $data["direccion_grupo"] = $estacion->direccion;
                    $x++;
                }
            }
            
            
            $data["content"] = $this->load->view('gasolineras',$data,true);
            $this->load->view('main',$data);
        }
        
        
}
