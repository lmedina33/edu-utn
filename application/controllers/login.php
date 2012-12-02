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
                
                 $fecha = $this->usuarios_model->get_fechaModPass($result[0]->id);
                //$calculo = strtotime("-30 days");
                $fecha_comparacion = date("Y-m-d");
                $datetime1 = date_create($fecha);
                $datetime2 = date_create($fecha_comparacion);

                $intervalo = date_diff($datetime1, $datetime2);
                $dias = $intervalo->format('%a');
                //print_r($dias); exit;
                if($fecha == NULL) {
                    redirect('login/edit_user/1');
                    //redirect('persona/edit_user/1/1','refresh');
                }
                else if($dias >= 30 ){
                    redirect('login/edit_user/2');
                    //print_r($dias); exit;
                    //redirect('persona/edit_user/2/1');
                }
                else{
                    redirect('login/selecciona_rol');
                }
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
        
     function edit_user($motivo=""){
       
        $usuario = $this->session->userdata('logged_in');
       // print_r($usuario); exit;
        $this->form_validation->set_rules('old_pass', 'Contraseña actual', 'required|callback_usuario_check['.$usuario['id'].']');
        $this->form_validation->set_rules('new_pass', 'Contraseña nueva', 'required|min_length[8]');
        $this->form_validation->set_rules('new_pass1', 'Repita contraseña', 'required|min_length[8]|matches[new_pass]|callback_pass');
        
       if ($this->form_validation->run() == FALSE)
		{
                        $data= array();
                        if($motivo == 1){
                            $data['mensaje'] = 'Debe cambiar su contraseña por ser un usuario nuevo del sistema.';
                          
                        }
                        else if($motivo == 2){
                            $data['mensaje'] = 'Su contraseña ha caducado ,debe cambiar la misma.';
                          
                        }
                        
                            $this->load->view('v_login_mod_pass',$data);
                        
                        
		}
		else
		{
                    $data['exito'] = 1;
                    $this->load->model('usuarios_model');
                    $this->usuarios_model->change_pass($this->input->post('new_pass'),$usuario['id']);
                    redirect('login');
                }
                
        
    }
    public function  pass($str){
        if($str == $this->input->post('old_pass')){
            $this->form_validation->set_message('pass', 'La contraseña nueva debe ser diferente a la actual.');
	
            return FALSE;
        }
        else{
            return TRUE;
        }
    }


    public function usuario_check($str,$usuario)
	{
         $this->load->model('usuarios_model');
         $data = $this->usuarios_model->check_pass($str,$usuario);
         if (count($data)==0)
                {
			$this->form_validation->set_message('usuario_check', 'La contraseña actual es incorrecta.');
			return FALSE;
                }
                else {
                    return TRUE;
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
                     
                        //si el directivo no tiene una escuela asignada
                    
                        
                    }
                    
                    // FALTA!! agregar el caso de docentes y alumnos..
                    
                    else{
                       $aux[$i]['rol'] = $rol['id'];
                       $aux[$i]['id'] = $rol['id'].'-';
                       $i++;   
                    }
                    
                endforeach;
                
                   if(count($roles)== 0){
                       
                          $data['error'] = 'Actualmente no tiene ningun rol asignado.'; //Error que será enviado a la vista en forma de arreglo
                          $this -> load -> view('v_login', $data);
                        
                   }
               
                  else if(count($roles)== 1 and $roles[0]['id'] != 1 and (! isset($escuela) || $escuelas == NULL)){
                           $data['error'] = 'Actualmente no tiene Escuela asignada.'; //Error que será enviado a la vista en forma de arreglo
                           $this -> load -> view('v_login', $data);
                          
                     }
                     else{ 

                    // print_r($aux); exit();

                        $data['roles'] = $aux;
                    //  print_r($roles);exit;


                        $this -> load -> view('v_login_roles',$data);
                     }
                     
           }
           else{
               // Recibimos por post el dato del rol con el que accedera
               $rol = $_POST['webmenu'];
               
               // Separamos el rol del numero de escuela en rol_esc[0] tenemos el rol y en rol_esc[1] tenemos la escuela
               $rol_esc = explode('-',$rol);
               
               // Verificamos que verdaderamente tenga permisos con el rol y la escuela (para evitar formulario modificado)
               //print_r($rol_esc[0]);exit;
                 if($rol_esc[0] != 1 and (! isset($rol_esc[1]) || $rol_esc[1] == NULL)){
                           $data['error'] = 'Actualmente no tiene Escuela asignada.'; //Error que será enviado a la vista en forma de arreglo
                           $this -> load -> view('v_login', $data);
                          
                     }
                else{
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
           }
           //$java = '<script>alert("'.$roles[0].'");</script>';
           //print_r($java); exit();
           
           
       }
       
       function logout(){
          $this->session->sess_destroy();
           redirect('inicio/home','refresh');
       }
}
?>
