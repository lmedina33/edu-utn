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
    
    // en el constructor de la librería implementamos la función de redireccion al login por si no esta creada la session
    function __construct(){
       $ci = &get_instance();
       $sesion = $ci->session->userdata('logged_in');
       if($sesion == ''){
           //print_r($ci->router->class); exit;
           // si estamos en el controlador login no hacemos nada
           if($ci->router->class == 'login') return false;
           // si estamos en otro controlador es por que se esta accediendo sin iniciar session!! paramos el carro de una y lo redirigimos
           // al controlador de acceso. que te pasa guachinnnnnnn!
           else {
            redirect('login');
           }
       }
    }
   // funcion para traer los permisos de la bd
    // en instance tenemos la instancia de la clase que esta pidiendo los permisos
    public function get_permiso($instance){
       $ci = &get_instance();
       $ci->load->model('usuarios_model');	
       //print_r($param); exit;
             
       $controlador = $instance->router->class;
       $funcion = $instance->router->method;
       $rol =  $instance->sesion_permiso['rol'];
       
       $data = $ci->usuarios_model->get_permiso($controlador,$funcion,$rol);
    
       return $data;
       
       }
}

?>
