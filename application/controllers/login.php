<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author gonza
 */
class Login extends CI_Controller {
    
    //put your code here
     function __construct(){
        parent::__construct();
    }
 
    public function index(){
        $this->load->view('v_login');
    }
   
    public function process(){
        $data = array();
       
        
        if($this -> input -> post('username'))
        { // Verificamos si llega mediante post el username

       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        { //Si la informacion no fue correctamente enviada
            $this->load->view('v_login'); //Carga la vista de login
        }
        else
        {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
        
            $this->load->model('usuarios_model');
           // $username = $this -> input -> post('username');
           // $password = $this -> input -> post('password');
            $result = $this -> usuarios_model -> login($username, $password); 
            
            if($result)
            { //login exitoso
                $sess_array = array();
                foreach($result as $row)
                {

                    $sess_array = array(
                    'id' => $row -> id, 
                    'ussername' => $row -> ussername,
                    'persona' => $row -> persona
                    );

                    $this -> session -> set_userdata('logged_in', $sess_array); //Iniciamos una sesión con los datos obtenidos de la base.
                }
                redirect('home', 'refresh');
            }
            else
            { // La validación falla
                $data['error'] = 'Nombre de usuario / Password Incorrecto'; //Error que será enviado a la vista en forma de arreglo
                $this -> load -> view('v_login', $data); //Cargamos el mensaje de error en la vista.
            }
        }
        }
        else
        {
            $this -> load -> view('v_login');
        }
        }
}
?>
