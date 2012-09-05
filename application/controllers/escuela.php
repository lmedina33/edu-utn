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
class Escuela extends CI_Controller {
    //put your code here   
    var $sesion_usuario;
    var $sesion_permiso;
    
    function __construct()
	{
		parent::__construct();
                 
                 // Lo primero que hacemos es cargar la librería que hace el control de los permisos
        	$this->load->library('control_permisos');
                $this->load->library('grocery_CRUD');
                $this->grocery_crud->set_theme('datatables');
                $this->load->library('session');
                $this->sesion_usuario = $this->session->userdata('logged_in');
                $this->sesion_permiso = $this->session->userdata('rol');
                
    }
    
    
    function index(){
        
        $this->load->view('v_home');
    }
    
        
    function abm(){
       
        // Armamos los parámetros con los datos para controlar los permisos (rol hay que sacarlo de la session)
        $params = array('rol' => $this->sesion_permiso['rol'], 'controlador' => 'escuela', 'funcion' => 'abm');
        //  print_r($params);exit;
        // Pedimos a la librería que nos traiga el permiso
        $permiso = $this->control_permisos->get_permiso($params);
        
        switch ($permiso){
            
            // 1: ver
            // 2: listar
            // 4: modificar
            
            
            case 1:
                // En este caso sólo tiene permiso para listar
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                $this->grocery_crud->where('escuela.id',  $this->sesion_permiso['escuela']);
                break;
            case 2: 
                // Este es el caso en que puede ver pero sólo los datos de su escuela
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                break;
            case 3:
                // Este es el caso en que se puede ver y listar
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                break;
            case 4:
                // Este es el caso en que puede modificar los datos de su escuela
                // quitamos la funcion de agregar escuelas
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_delete();
                
                break;
            case 5:
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_delete();
                $this->grocery_crud->where('escuela.id',  $this->sesion_permiso['escuela']);
                break;
            case 6:
                $this->grocery_crud->unset_delete();
                break;
            case 7:
                // Este es el caso en que se pueden listar todas las escuelas y modificarlas
                $this->grocery_crud->unset_delete();
                break;
            
        }
       // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("escuela");
       // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Escuela');    
       // Agregamos la relación n a n con los materias 
       //   $this->grocery_crud->set_relation_n_n('materias','planestudio_materia','materia','planestudio','materia','nombre','');
       $this->grocery_crud->set_relation('especialidad','especialidad','nombre');
       $this->grocery_crud->set_relation('nivel','nivel','nombre');
       $this->grocery_crud->set_relation('departamento','departamento','nombre');
       $this->grocery_crud->set_relation('localidad','localidad','nombre');
    
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','cue','numero','direccion','departamento','localidad','telefono','fechaResolucion','especialidad','nivel');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','numero','telefono','departamento');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre');
        $this->grocery_crud->display_as('cue','Nº CUE');
        $this->grocery_crud->display_as('numero','Nº Esc');
        $this->grocery_crud->display_as('direccion','Dirección');
        $this->grocery_crud->display_as('telefono','Telefono');
        $this->grocery_crud->display_as('fechaResolucion','Fecha de Resol.');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->set_rules('cue','CUE','required|numeric|exact_length[5]');
        $this->grocery_crud->set_rules('numero','Nº Esc','required|numeric|exact_length[4]');
        $this->grocery_crud->set_rules('direccion','Dirección','required');
        $this->grocery_crud->set_rules('telefono','Telefono','numeric');
        $this->grocery_crud->set_rules('fechaResolucion','Fecha de Resol.','required');
       
        $this->grocery_crud->add_action('Director','','escuela/add_personal','ui-icon-plus');
        
        $output = $this->grocery_crud->render();
        
        $output -> titulo = 'Gestión Escuela';
        $output -> html_inf = '';
        $this->load->view('v_abm.php',$output);  
    }
  
   function division($escuela=""){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
      //$this->grocery_crud->set_model("MY_grocery_model");
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("division");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Divisiones');
     
       $this->grocery_crud->where('escuela',$escuela); 
       $this->grocery_crud->set_relation('turno','turno','nombre');
       $this->grocery_crud->set_relation('planestudio','plandeestudio','nombre');
       // Seteamos el id de la escuela
       $this->grocery_crud->change_field_type('escuela','hidden',$escuela);
    
       // Campos que se requieren para la inserción y modificacion
       $this->grocery_crud->fields('nombre','descripcion','planestudio','turno','escuela');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','planestudio','turno');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre de la División');
        $this->grocery_crud->display_as('descripcion','Observaciones');
       
       
        
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
       
        $output = $this->grocery_crud->render();
        
        
        $this->load->view('v_abm.php',$output);  
       
   }
   
   function generar_cursado($division=""){
       
       $this->load->model('escuela_model');
     
       // Obtenemos el plan de estudio de la division
       $plan_estudio = $this->escuela_model->get_planestudio_division($division);
       
       // Buscamos las materias que tiene asignadas el plan de estudio
       $this->load->model('planestudio_model');
       $materias = $this->planestudio_model->get_materias_plan($plan_estudio);
       
       // Por cada materia del plan de estudio generamos un cursado
       foreach ($materias as $materia):
           // Verificamos que no exista un cursado activo
           $cursado = $this->escuela_model->get_cursado($division,$materia['id']);
           if(count($cursado)== 0){
               // No existe un cursado activo para la materia y division
                $cursado['materia'] = $materia['id'];
                $cursado['division'] = $division;
                $this->escuela_model->insert_cursado($cursado);
           }
           else{
               // Existe un cursado activo para la materia y division
               print_r('ya existe'); exit();
           }
       endforeach;
       
       
    //   print_r($data); exit();
   }
   
   function add_personal($primary_key){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
     
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("escuelapersona");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Personal');

        
        $this->grocery_crud->where('escuela',$primary_key); 
        $this->grocery_crud->set_relation('escuela','escuela','nombre');
        $this->grocery_crud->set_relation('persona','persona','{nombre}, {apellido} - {dni}','id in (select persona from directivo)');
        $this->grocery_crud->set_relation('tiporelacion_esc','tiporelacion_esc','nombre');
        
        $this->grocery_crud->change_field_type('escuela','hidden',$primary_key);
       
        $this->grocery_crud->fields('escuela','persona','tiporelacion_esc');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('escuela','persona','tiporelacion_esc');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('persona','Personal');
        $this->grocery_crud->display_as('tiporelacion_esc','Cargo');
       
         $this->grocery_crud->required_fields('persona','tiporelacion_esc');
      
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
       
   }

}

?>
