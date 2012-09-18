<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of control_permisos
 *
 * @author gonza
 */
class control_permisos {
    //put your code here
    public function get_permiso($param){
       $ci = &get_instance();
       $ci->load->model('usuarios_model');	
       
             
       $controlador = $param['controlador'];
       $funcion = $param['funcion'];
       $rol =  $param['rol'];
       
       $data = $ci->usuarios_model->get_permiso($controlador,$funcion,$rol);
    
       return $data;
       
       }
}

?>
