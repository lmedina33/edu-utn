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
                redirect('login/selecciona_rol');
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
        
       function selecciona_rol(){
          
           if(!isset($_POST['webmenu'])){
                $this->load->library('session');
                $session = $this->session->userdata('logged_in');
                $id_usuario = $session['id'];
                $persona = $session['persona'];
                
                $this->load->model('usuarios_model');
                // Buscamos los roles que tiene asignado el usuario 
                $roles = $this->usuarios_model->get_roles($id_usuario);
               
                $this->load->model('persona_model');
                $i = 0;
                
                // Recorremos los roles que tiene la persona
                foreach($roles as $rol):
                
                    // Si el rol es 2 (directivo) buscamos las escuelas en las que es director
                    if($rol['id'] == 2){
                        
                        $escuelas = $this->persona_model->get_escuela_persona($persona,"Director");
                        
                        // Por cada escuela en la que es director agregamos un rol asociado a la escuela
                        foreach($escuelas as $escuela):
                            
                            $aux[$i]['rol'] = $rol['id'];
                            $aux[$i]['id'] = $rol['id'].'-'.$escuela['id'];
                            $aux[$i]['escuela'] = $escuela['numero'];
                                                    
                            $i++;
                        endforeach;
                        
                        
                    }
                    
                    // FALTA!! agregar el caso de docentes y alumnos..
                    
                    else{
                       $aux[$i]['rol'] = $rol['id'];
                       $aux[$i]['id'] = $rol['id'].'-';
                       $i++;   
                    }
                    
                endforeach;
               
               // print_r($aux); exit();
                
                $data['roles'] = $aux;
                print_r($roles);exit;
                
                
                $this -> load -> view('v_login_roles',$data);
           }
           else{
               // Recibimos por post el dato del rol con el que accedera
               $rol = $_POST['webmenu'];
               
               // Separamos el rol del numero de escuela en rol_esc[0] tenemos el rol y en rol_esc[1] tenemos la escuela
               $rol_esc = explode('-',$rol);
               
               // Verificamos que verdaderamente tenga permisos con el rol y la escuela (para evitar formulario modificado)
             
                $this->load->library('session');
                $session = $this->session->userdata('logged_in');
                $id_usuario = $session['id'];
                $persona = $session['persona'];
                
                $this->load->model('usuarios_model');
               
                $aux = $this->usuarios_model->verifica_rol($id_usuario,$rol_esc[0],$rol_esc[1]);
                
                if(isset($aux['id'])){
                    // Enhorabuena! existe el permiso!!
                   // Agregamos ahora en la sesión los datos del rol y la escuela
                    $sess_array = array(
                    'rol' => $rol_esc[0], 
                    'escuela' => $rol_esc[1]
                    );
                   
                    $this->load->model('escuela_model');
                    $escuela = $this->escuela_model->get_datos_escuela($sess_array['escuela']);
                    
                    if($escuela != NULL)$this -> session -> set_userdata('escuela',$escuela);
                    $this -> session -> set_userdata('rol', $sess_array);
                   // exit;
                    //print_r($this->session->userdata('rol')); exit(); 
                    
                    redirect('inicio','refresh');
                }
               // Si no es por que el formulario ha sido modificado recargamos el login con mensaje de error. 
               else {
                $data['error'] = 'Ha ocurrido un error en la verificación de permisos!'; //Error que será enviado a la vista en forma de arreglo
                // Cerramos la sesión
                $this -> session -> unset_userdata('logged_in');
                $this -> load -> view('v_login', $data); //Cargamos el mensaje de error en la vista.
               }
           }
           //$java = '<script>alert("'.$roles[0].'");</script>';
           //print_r($java); exit();
           
           
       }
       
       function logout(){
          $this->session->sess_destroy();
           redirect('login');
       }
}
?>
