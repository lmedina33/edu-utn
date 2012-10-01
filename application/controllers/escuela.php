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
       
        // Pedimos a la librería que nos traiga el permiso
        $permiso = $this->control_permisos->get_permiso($this);
        
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
        
        $output -> titulo = 'Gestionar Escuela';
        $output -> html_inf = '';
        $this->load->view('v_abm.php',$output);  
    }
  
   function division($escuela=""){
       
       
        // Pedimos a la librería que nos traiga el permiso
        $permiso = $this->control_permisos->get_permiso($this);
        
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
       
       
        $escuela = $this->sesion_permiso['escuela'];
        $this->load->model('escuela_model');
        $nivel = $this->escuela_model->get_nivel($escuela);
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
      //$this->grocery_crud->set_model("MY_grocery_model");
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("division");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Divisiones');
     
        $this->grocery_crud->where('escuela',$escuela); 
     //   $this->grocery_crud->where('plandeestudio.nivel = 1');
        $this->grocery_crud->set_relation('turno','turno','nombre');
        $this->grocery_crud->set_relation('planestudio','plandeestudio','nombre','nivel = '.$nivel);
        // Seteamos el id de la escuela
        $this->grocery_crud->change_field_type('escuela','hidden',$escuela);
    
       // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','anio','descripcion','planestudio','turno','escuela');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','anio','planestudio','turno');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre');
        $this->grocery_crud->display_as('descripcion','Observaciones');
        $this->grocery_crud->display_as('anio','Año');
       
        $this->grocery_crud->add_action('Matricula alumnos..','','escuela/inscripcion','ui-icon-plus');
        $this->grocery_crud->callback_after_insert(array($this, 'generar_cursado'));
        
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
       
        $output = $this->grocery_crud->render();
        $output -> titulo = 'Gestionar cursos y divisiones';
        
        $this->load->view('v_abm.php',$output);  
       
   }
   
   function modificar_estado_cursado($alumno="",$estado="",$division="",$redirect=""){
       $this->load->model('alumno_model');
       $inscripciones = $this->alumno_model->get_inscripciones($alumno,'Cursando',$division);
       //print_r($inscripciones); exit;
      
       foreach ($inscripciones as $inscrip):       
       switch ($estado){
           case 'abandono':
               $this->alumno_model->modifica_cursado($inscrip,'abandono');
               break;
           case 'pase':
               $this->alumno_model->modifica_cursado($inscrip,'pase');
               break;
           case 'cambio':
                $this->alumno_model->modifica_cursado($inscrip,'cambio');
               break;
           case 'promocion':
                $this->alumno_model->modifica_cursado($inscrip,'promocion');
               break;
           case 'egreso':
                $this->alumno_model->modifica_cursado($inscrip,'egreso');
               break;
           case 'repetidor':
                $this->alumno_model->modifica_cursado($inscrip,'repetidor');
               break;
       }
       endforeach;
       if(!$redirect) redirect('escuela/inscripcion/'.$division);
       else return true;
   }




   function inscripcion($division=""){
       $this->load->model('cursado_model');
       
       $data['division']=$division;
       $data['curso'] = $this->cursado_model->get_datos_curso($division);
       $data['inscriptos'] = $this->cursado_model->get_inscriptos_division($division);
       $data['cursos'] = $this->cursado_model->get_cursos_mayores($division);
      // print_r($data['cursos']); exit;
       $this->form_validation->set_rules('alumno', 'Alumno', 'required|callback_alumno_check['.$division.']');
       if ($this->form_validation->run() == FALSE)
		{
                        $data['division']=$division;
                        $data['inscriptos'] = $this->cursado_model->get_inscriptos_division($division);
			$this->load->view('v_inscripcion',$data);
		}
		else
		{
                        $input = $this->input->post('alumno');
                        $division = $this->input->post('division');
                        
                        
                        $str_explode = explode('-', $input);
                        $ape_nom = explode(',', $str_explode[0]);

                        $apellido = trim($ape_nom[0]);
                        $nombre = trim($ape_nom[1]);
                        $dni = trim($str_explode[1]);
                        
                        $this->load->model('persona_model');
                        $data = $this->persona_model->get_alumno_criteria($apellido,$nombre,$dni);
                       
                        $this->inscribir($data['id'],$division);
                        redirect('escuela/inscripcion/'.$division,'refresh');
		}
   }
  
   function fin_cursado(){
       $this->load->model('cursado_model');
       $this->load->model('escuela_model');
       
       $escuela = $this->sesion_permiso['escuela'];
       //Buscamos todos los cursados activos de la escuela
       $divisiones = $this->escuela_model->get_divisiones($escuela);
     //  print_r($divisiones); exit;
       $i=0;
       foreach ($divisiones as $division):
           $data['cursos'][$i]['datos'] = $this->cursado_model->get_datos_curso($division['id']);
           $data['cursos'][$i]['inscriptos'] = $this->cursado_model->get_inscriptos_division($division['id']);
           $data['cursos'][$i]['mayores'] = $this->cursado_model->get_cursos_mayores($division['id']);
           $data['cursos'][$i]['division'] = $division['id'];
           $i++;
       endforeach;
       //print_r($data); exit;
        // print_r($data['cursos']); exit;
       $this->load->view('v_fin_curso',$data);
		
   }
   
   
    function finalizar_cursado($division_origen=""){
      
       $division_destino = $this->input->post('curso');
       $inputs = $this->input->post();
       //$inputs['curso'] = '';
      // print_r($inputs);exit;
       $this->load->model('alumno_model');
       $this->load->model('cursado_model');
       $i=0;
       $alumno = array();
       foreach($inputs as $inpt):
          
               $data = explode('-', $inpt);
              // print_r($data); 
               if($data[0] == 'origen'){
                   $pase[$i]['origen'] = $data[1];
                    
               }
               else if($data[0] == 'destino'){
                   $pase[$i]['destino'] = $data[1];
                   $i++;
               }
               else if($data[0]=='p'){
                   $pase[$i]['alumno']['pase'][] = $data[1];
                   
               }
               else{
                  $pase[$i]['alumno']['repe'][] = $data[1]; 
               }
                    
       endforeach;
    //  print_r($pase); exit;
      $cursos = array();
     
      foreach ($pase as $ps):
          //1º Finalizar el cursado actual
          //2º Generamos los nuevos cursados
           
          if(! (in_array($ps['origen'], $cursos))){
               $this->cursado_model->fin_cursado($ps['origen']);
               $this->generar_cursado('', $ps['origen']);
               $cursos[] = $ps['origen'];
          }
          if(! (in_array($ps['destino'], $cursos))) {
              if($ps['destino'] != 'egreso'){
               $this->cursado_model->fin_cursado($ps['destino']);
               $this->generar_cursado('', $ps['destino']);   
               $cursos[] = $ps['destino'];
              } 
          } 
          
          //3º Modificamos las inscripciones de los alumnos
          if(isset($ps['alumno']['repe'])){
              //print_r($ps['alumno']['repe']); exit;
          foreach($ps['alumno']['repe'] as $alumno):
              $this->modificar_estado_cursado($alumno,'repetidor', $ps['origen'],'1');
              $this->inscribir($alumno, $ps['origen']);
          endforeach;
          }
          if(isset($ps['alumno']['pase'])){
          foreach($ps['alumno']['pase'] as $alumno):
             
                if($ps['destino'] != 'egreso') {
                     $this->modificar_estado_cursado($alumno,'pase', $ps['origen'],'1');
                     $this->inscribir($alumno, $ps['destino']);
                }
                else {
                  //  print_r($alumno); exit;
                    $this->modificar_estado_cursado($alumno,'egreso', $ps['origen'],'1');
                
                }
                
          endforeach;
          }
          
      endforeach;
      
      redirect('escuela/fin_cursado','refresh'); 
   }
   
   
   public function alumno_check($str,$division)
	{ 
       
        $this->load->model('persona_model');
        $str_explode = explode('-', $str);
        $ape_nom = explode(',', $str_explode[0]);
        
        $apellido = trim($ape_nom[0]);
     
        if(isset($ape_nom[1]))$nombre = trim($ape_nom[1]);
        if(isset($str_explode[1]))$dni = trim($str_explode[1]);
        if(isset($apellido) and isset($dni) and isset($nombre)) $data = $this->persona_model->get_alumno_criteria($apellido,$nombre,$dni);
       // print_r($data); exit;
		if (!isset($data))
                {
			$this->form_validation->set_message('alumno_check', 'El %s no existe.');
			return FALSE;
		}
                else if(count($data) == 0){
                   
                        $this->form_validation->set_message('alumno_check', 'El %s no existe.');
			return FALSE;
                }
		else
		{
                        //Ahora verificamos que no este inscripto
                        $this->load->model('alumno_model');
                        
                        if($this->alumno_model->esta_inscripto($data['id'])){
                            $this->form_validation->set_message('alumno_check', 'El %s ya se encuentra inscripto.');
                            return FALSE;  
                            
                        }
                    else
			return TRUE;
		}
	}
   
  
   
   function inscribir($alumno="",$division=""){
      // primero buscamos los cursados correspondientes a la division
       $this->load->model('cursado_model');
       $this->load->model('alumno_model');
       
       $cursados = $this->cursado_model->get_cursado_division($division);
      // print_r($cursados);exit;
       foreach($cursados as $cursado):
            // creamos el cuaderno de comunicaciones
            $id_cuderno = $this->alumno_model-> create_comunicaciones();
             $valores  = array(
                        'alumno' => $alumno,
                        'comunicaciones' => $id_cuderno,
                        'estado' => 1,
                        'cursado' => $cursado['id']
             );
            // creamos la inscripcion
            $id_inscripcion = $this->alumno_model->create_inscripcion ($valores);
       endforeach;
      
   }
   
  
   
   function cursado($division=""){
       
        $escuela = $this->sesion_permiso['escuela'];
        
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("cursado");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Cursados');
     
        $this->grocery_crud->set_relation('division','division','{anio} - {nombre}','escuela = '.$escuela);
        $this->grocery_crud->set_relation('materia','materia','{nombre}');
        // Seteamos el id de la escuela
        
       // Campos que se requieren para la inserción y modificacion
        /*$this->grocery_crud->fields('nombre','anio','descripcion','planestudio','turno','escuela');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','anio','planestudio','turno');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre');
        $this->grocery_crud->display_as('descripcion','Observaciones');
        $this->grocery_crud->display_as('anio','Año');
       
        
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
       */
        $output = $this->grocery_crud->render();
        
        
        $this->load->view('v_abm.php',$output);  
       
   }
   //$post_array,$primary_key
   function generar_cursado($post_array="",$division=""){
       
       $this->load->model('escuela_model');
       $this->load->model('cursado_model');
       $this->load->model('planestudio_model');
     
       // Obtenemos el plan de estudio de la division
       $plan_estudio = $this->escuela_model->get_planestudio_division($division);
       $datos_division = $this->escuela_model->get_datos_division($division);
       // Buscamos las materias que tiene asignadas el plan de estudio
       
       $materias = $this->planestudio_model->get_materias_plan($plan_estudio,$datos_division['anio']);
       
       // Por cada materia del plan de estudio generamos un cursado
       foreach ($materias as $materia):
           // Verificamos que no exista un cursado activo
           $cursado = $this->cursado_model->get_cursado($division,$materia['id']);
           if(count($cursado)== 0){
               // No existe un cursado activo para la materia y division
                $cursado['materia'] = $materia['id'];
                $cursado['division'] = $division;
                $this->cursado_model->insert_cursado($cursado);
           }
           else{
               // Existe un cursado activo para la materia y division
               print_r('ya existe'); exit();
           }
       endforeach;
       
       
    //   print_r($data); exit();
   }
   
   function add_personal($primary_key){
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
   
   function materias(){
        $this->grocery_crud->set_theme('datatables');
        $escuela = $this->sesion_permiso['escuela'];
     
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("cursado");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Materias');
        
        
        $this->grocery_crud->set_relation('division','division','{anio}º - {nombre}','division.escuela = '.$escuela);
        $this->grocery_crud->set_relation('materia','materia','nombre');
        
        $this->grocery_crud->where('cursado.fechaBaja is null'); 
     //   $this->grocery_crud->where('division.escuela',$escuela); 
      
       
        
        
         $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  

   }

}

?>
