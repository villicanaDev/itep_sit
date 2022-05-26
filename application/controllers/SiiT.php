<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiiT extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();    
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('path');
        $this->load->library('session'); 
        $this->load->model('usuarios_model');       
        
        if (!$this->session->Session_Siit['id'] ) redirect('/'); 
    }


    public function index(){

        $data['tittle'] = 'Siit - ITESP';

        $data["page"] = "/sit_screens/general_view";
        $data["foot_page"] = "/footers/foot_generalView";
        $this->load->view(THEME_PROJECT.'/plantillas/dashboard', $data);
    }

    public function tics(){
        $data['grupo_data'] = $this->usuarios_model->tics_data(8);
        $data['id_carrera'] = 8;


        $data['tittle'] = 'Tecnologias de la Información y Comunicación';

        $data["page"] = "/sit_screens/tics";
        $data["foot_page"] = "/footers/foot_tics";
        $this->load->view(THEME_PROJECT.'/plantillas/dashboard', $data);
    }

    public function detalle_grupos(){
        $data['id'] = $this->input->post('carrera');
        $data['carrera_data'] = $this->usuarios_model->tics_data($data['id']);

        /* switch ($data['grupo_data']->id_carrera) {
            case '2':
              
            break;

            case '3':
              
            break;

            case '5':
              
            break;

            case '6':
              
            break;
            
            case '7':
              
            break;

            case '8':
                
            break;

            default:
                
            break;
        } */


        $this->load->view(THEME_PROJECT.'/sit_screens/grupos', $data);
        $this->load->view(THEME_PROJECT.'/footers/foot_grupos', $data);
    }

    public function get_grupo(){
        //$data['grupo_data'] = $this->usuarios_model->tics_data(8);
        $data['text_carrera'] = $this->input->post('grupo');
        $id_carrera = $this->input->post('carrera');
        $data['data_almns'] = $this->usuarios_model->get_almns($data['text_carrera']);

        //$almn_grupo = $data['data_almns'];

        $data['num_materias'] = [];

        foreach ($data['data_almns'] as $id_almn) {
            $num_materias = $this->usuarios_model->count_materias($id_almn->id_alumn);
            array_push($data['num_materias'], $num_materias);
        }


        //$data['num_materias'] = $num_materias;



    
        $data['tittle'] = 'Grupo '.$data['text_carrera'];

        $data["page"] = "/sit_screens/detalle_grupo";
        $data["foot_page"] = "/footers/foot_detalle_grupo";
        $this->load->view(THEME_PROJECT.'/plantillas/dashboard', $data);
    }



    function table_maker(){
        $tabla = '
            <table id="myFirstGrid" class="display">
                <thead>
                    <tr>
                        <th>Nombre </th>
                        <th>Materias Cursadas</th>
                        <th>Materias Aprovadas</th>
                        <th>Materias Reprovadas</th>
                    </tr>
                </thead>
                <tbody>
            <? foreach ($data_almns as $detalle_almn) { ?>
                    <tr>
                        <td><?= $detalle_almn->nombre ." ". $detalle_almn->apellido ?></td>
                        <td><?= $num_materias?></td>
                        <td></td>
                        <td></td>
                    </tr>
            <? } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>';

        return $tabla;
    }
/* 



(null,'49','1','1','65'),
(null,'49','6','1','70'),
(null,'49','8','1','84'),
(null,'49','2','1','70'),
(null,'49','4','1','85'),
(null,'49','5','1','89'),
(null,'49','10','1','60'),

(null,'50','1','1','88'),
(null,'50','6','1','69'),
(null,'50','8','1','70'),
(null,'50','4','1','75'),
(null,'50','5','1','89'),
(null,'50','10','1','89'),

(null,'51','1','1','100'),
(null,'51','6','1','100'),
(null,'51','4','1','100'),
(null,'51','5','1','60'),
(null,'51','10','1','80'),

(null,'52','1','1','70'),
(null,'52','6','1','86'),
(null,'52','8','1','78'),
(null,'52','2','1','70'),
(null,'52','4','1','70'),
(null,'52','5','1','80'),
(null,'52','10','1','89'),

(null,'53','1','1','90'),
(null,'53','6','1','98'),
(null,'53','8','1','100'),
(null,'53','2','1','81'),
(null,'53','5','1','71'),
(null,'53','10','1','70'),

(null,'54','1','1','66'),
(null,'54','6','1','69'),
(null,'54','8','1','70'),
(null,'54','2','1','70'),
(null,'54','4','1','80'),
(null,'54','5','1','71'),
(null,'54','10','1','74')


        
*/


    

}