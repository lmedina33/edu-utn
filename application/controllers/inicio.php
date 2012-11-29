<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicio
 *
 * @author gsiman
 */
class Inicio extends CI_Controller {
    //put your code here   
    
    function index(){
        $usuario = $this->session->userdata('logged_in');
        $this->load->model('usuarios_model');
        $fecha = $this->usuarios_model->get_fechaModPass($usuario['id']);
        //$calculo = strtotime("-30 days");
        $fecha_comparacion = date("Y-m-d");
        $datetime1 = date_create($fecha);
        $datetime2 = date_create($fecha_comparacion);
        
        $intervalo = date_diff($datetime1, $datetime2);
        $dias = $intervalo->format('%a');
        //print_r($dias); exit;
        if($fecha == NULL) {
            redirect('persona/edit_user/1','refresh');
        }
        else if($dias >= 30 ){
            redirect('persona/edit_user/2','refresh');
        }
       // $this->load->view('v_inicio');
        $this->load->view('v_inicio'); 
    }
    function home(){
        $this->load->view('v_inicio'); 
    }
}

?>
