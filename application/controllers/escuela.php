<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * Description of Escuela
 * Controlador: Escuela
 *
 * @author gsiman
 */
class Escuela extends CI_Controller {
    //put your code here   
    var $sesion_usuario;
    var $sesion_permiso;

    // declaramos el constructor
    function __construct()
	{
		parent::__construct();
                 
               // cargamos las librerias crud, session y obtenemos los valores de la session  
        	$this->load->library('grocery_CRUD');
                $this->grocery_crud->set_theme('datatables');
                $this->load->library('session');
                $this->sesion_usuario = $this->session->userdata('logged_in');
                $this->sesion_permiso = $this->session->userdata('rol');
                
    }
    
    // carga la vista de inicio
    function index(){
        
        $this->load->view('v_home');
    }
    
   
    // alta, baja y modificación de escuelas
    function abm(){
        $this->grocery_crud->set_theme('flexigrid');
        // Pedimos a la librería que nos traiga el permiso
        $permiso = $this->control_permisos->get_permiso($this);
        
        // segun el permiso
        switch ($permiso){
            
            // 1: ver
            // 2: listar
            // 4: modificar
            
            
            case 1:
                // Este es el caso en que puede ver pero sólo los datos de su escuela
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                $this->grocery_crud->where('escuela.id',  $this->sesion_permiso['escuela']);
                break;
            case 2: 
                // En este caso sólo tiene permiso para listar
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                break;
            case 3:
                // En este caso sólo tiene permiso para listar
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
                // se puede modificar los datos de la escuela
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_delete();
                $this->grocery_crud->where('escuela.id',  $this->sesion_permiso['escuela']);
                break;
            case 6:
                // permiso para listar, agregar y modificar
                $this->grocery_crud->unset_delete();
                break;
            case 7:
                // permiso para listar, agregar y modificar
                $this->grocery_crud->unset_delete();
                break;
            
        }
       // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("escuela");
       // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Escuela');    
       // Agregamos la relaciónes n a n 
       // especialidad de la escuela
       $this->grocery_crud->set_relation('especialidad','especialidad','nombre');
       // nivel 
       $this->grocery_crud->set_relation('nivel','nivel','nombre');
       // departamento
       $this->grocery_crud->set_relation('departamento','departamento','nombre');
       // localidad
       $this->grocery_crud->set_relation('localidad','localidad','nombre');
    
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','cue','numero','direccion','departamento','localidad','telefono','fechaResolucion','especialidad','nivel');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','numero','cue','direccion','departamento','localidad');
        
        // enmascaramos los a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre');
        $this->grocery_crud->display_as('cue','Nº CUE');
        $this->grocery_crud->display_as('numero','Nº Esc');
        $this->grocery_crud->display_as('direccion','Dirección');
        $this->grocery_crud->display_as('telefono','Telefono');
        $this->grocery_crud->display_as('fechaResolucion','Fecha de Resol.');
       
        // insertamos las reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->set_rules('cue','CUE','required|numeric|exact_length[5]');
        $this->grocery_crud->set_rules('numero','Nº Esc','required|numeric|exact_length[4]');
        $this->grocery_crud->set_rules('direccion','Dirección','required');
        $this->grocery_crud->set_rules('telefono','Telefono','numeric');
        $this->grocery_crud->set_rules('fechaResolucion','Fecha de Resol.','required|callback_verifica_fecha');
       
        // agregamos las acciones para cargar el directivo y ver el detalle
        $this->grocery_crud->add_action('Director',  base_url('images/director-b.png'),'escuela/add_personal','ui-icon-plus');
        $this->grocery_crud->add_action('Ver detalle',base_url('images/detalle.png'),'escuela/ver_escuela','ui-icon-plus');
        
        // ejecutamos 
        $output = $this->grocery_crud->render();
        
        // asignamos el titulo
        $output -> titulo = 'Gestionar Escuela';
        // si hay info adicional
        $output -> html_inf = ''; 
        // cargamos la vista con los datos
        $this->load->view('v_abm.php',$output);  
    }
  
   // muestra el detalle de una escuela
   function ver_escuela($escuela=""){
       // cargamos el modelo de escuela
       $this->load->model('escuela_model');
       // pedimos al modelo los datos de la escuela
       $output['escuela'] = $this->escuela_model->get_datos_escuela($escuela);
       // asignamos el titulo
       $output['titulo'] = 'Datos de Escuela';
       // cargamos la vista con los datos
       $this->load->view('v_escuela',$output);
       
   }
   
   // alta, baja y modificaciones de las divisiones de una escuela
   function division($escuela=""){
       
       
        // Pedimos a la librería que nos traiga el permiso
        $permiso = $this->control_permisos->get_permiso($this);
        
        switch ($permiso){
            
            // 1: ver
            // 2: listar
            // 4: modificar
            
            
            case 1:
                // Este es el caso en que puede ver pero sólo los datos de su escuela
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                $this->grocery_crud->where('escuela.id',  $this->sesion_permiso['escuela']);
                break;
            case 2: 
                // En este caso sólo tiene permiso para listar
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                break;
            case 3:
                // En este caso sólo tiene permiso para listar
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_edit();
                $this->grocery_crud->unset_delete();
                break;
            case 4:
                // Este es el caso en que puede modificar los datos de cualquier escuela
                // quitamos la funcion de agregar escuelas
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_delete();
                
                break;
            case 5:
                // se peden modificar los datos de una escuela
                $this->grocery_crud->unset_add();
                $this->grocery_crud->unset_delete();
                $this->grocery_crud->where('escuela.id',  $this->sesion_permiso['escuela']);
                break;
            case 6:
                // se puede listar, agregar y modificar
                $this->grocery_crud->unset_delete();
                break;
            case 7:
                // se puede listar, agregar y modificar
                $this->grocery_crud->unset_delete();
                break;
            
        }
       
        // pedimos el nº de escuela a la sesion
        $escuela = $this->sesion_permiso['escuela'];
        // cargamos el modelo de escuela
        $this->load->model('escuela_model');
        // pedimos al modelo el nivel de la escula
        $nivel = $this->escuela_model->get_nivel($escuela);
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("division");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Divisiones');
        
        // añadimos la cláusula where con el nº de escuela
        $this->grocery_crud->where('escuela',$escuela); 
     
        // relación con el turno
        $this->grocery_crud->set_relation('turno','turno','nombre');
        // relación con el plan de estudio
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
       
        // Agregamos las opciones que redirigen a la matricula y materias
        $this->grocery_crud->add_action('Matricula alumnos..','','escuela/inscripcion','ui-icon-plus');
        $this->grocery_crud->add_action('Materias','','escuela/materias','ui-icon-plus');
        $this->grocery_crud->add_action('Notas','','cursado/notas','ui-icon-plus');
        // al insertar llamamos a generar_cursado
        $this->grocery_crud->callback_after_insert(array($this, 'generar_cursado'));
        $this->grocery_crud->callback_after_update(array($this, 'generar_cursado'));
        
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->unset_delete();
        
        // ejecutamos
        $output = $this->grocery_crud->render();
        // asignamos el título
        $output -> titulo = 'Gestionar cursos y divisiones';
        // cargamos la vista
        $this->load->view('v_abm.php',$output);  
       
   }
   
   // modifica el estado del cursado de un alumno en un curso
   function modificar_estado_cursado($alumno="",$estado="",$division="",$redirect=""){
       // cargamos el modelo de un alumno
       $this->load->model('alumno_model');
       // le pedimos la modelo las inscripciones del alumno
       $inscripciones = $this->alumno_model->get_inscripciones($alumno,'Cursando',$division);
       
        // recorremos las inscripciones
       foreach ($inscripciones as $inscrip):       
       // segun el estado modificamos el mismo
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
       // si tenemos que redireccionar 
       if(!$redirect) redirect('escuela/inscripcion/'.$division);
       // sino volvemos
       else return true;
   }



   // con esta función administramos la matrícula de un curso
   function inscripcion($division=""){
       //cargamos el modelo del cursado
       $this->load->model('cursado_model');
       
       // generamos el arreglo para generar la inscripción
       $data['division']=$division;
       // pedimos al modelo los datos del curso
       $data['curso'] = $this->cursado_model->get_datos_curso($division);
       // pedimos los inscriptos al cursado
       $data['inscriptos'] = $this->cursado_model->get_inscriptos_division($division);
       // buscamos si hay cursos de años posteriores
       $data['cursos'] = $this->cursado_model->get_cursos_mayores($division);
       // cargamos las reglas de validación
       $this->form_validation->set_rules('alumno', 'Alumno', 'required|callback_alumno_check['.$division.']');
       // si las reglas de validación fallan
       if ($this->form_validation->run() == FALSE)
		{
                        // volvemos a cargar los datos y la vista
                        $data['division']=$division;
                        $data['inscriptos'] = $this->cursado_model->get_inscriptos_division($division);
			$this->load->view('v_inscripcion',$data);
		}
		else
		{
                        // recibimos los datos del alumno del formulario
                        $input = $this->input->post('alumno');
                        $division = $this->input->post('division');
                        
                        
                        $str_explode = explode('-', $input);
                        $ape_nom = explode(',', $str_explode[0]);

                        $apellido = trim($ape_nom[0]);
                        $nombre = trim($ape_nom[1]);
                        $dni = trim($str_explode[1]);
                        
                        // cargamos el modelo de persona
                        $this->load->model('persona_model');
                        // obtenemos los datos del alumno
                        $data = $this->persona_model->get_alumno_criteria($apellido,$nombre,$dni);
                       
                        // llamamos a la función inscribir con el id del alumno
                        $this->inscribir($data['id'],$division);
                        // redireccionamos al inicio y refrescamos
                        redirect('escuela/inscripcion/'.$division,'refresh');
		}
   }
  
   //generación de pantalla de finalización del cursado anual
   function fin_cursado(){
       // cargamos el modelo de cursado
       $this->load->model('cursado_model');
       // cargamos el modelo de escuela 
       $this->load->model('escuela_model');
       
       // obtenemos el nº de escuela de la sesion
       $escuela = $this->sesion_permiso['escuela'];
       //Buscamos todos los cursados activos de la escuela
       $divisiones = $this->escuela_model->get_divisiones($escuela);
    
       $data = array();
       $i=0;
       // recorremos las divisiones
       foreach ($divisiones as $division):
           // generamos un arreglo con los datos de la divisiones
           $data['cursos'][$i]['datos'] = $this->cursado_model->get_datos_curso($division['id']);
           $data['cursos'][$i]['inscriptos'] = $this->cursado_model->get_inscriptos_division($division['id']);
           $data['cursos'][$i]['mayores'] = $this->cursado_model->get_cursos_mayores($division['id']);
           $data['cursos'][$i]['division'] = $division['id'];
           $i++;
       endforeach;
       
       // cargamos la pantalla de fin de cursado
       $this->load->view('v_fin_curso',$data);
		
   }
   
   // finalización de un cursado
    function finalizar_cursado($division_origen=""){
      
       // obtenemos del formulario el curso
       $division_destino = $this->input->post('curso');
       $inputs = $this->input->post();
       
       // cargamos el modelo de alumno y cursado
       $this->load->model('alumno_model');
       $this->load->model('cursado_model');
       $i=0;
       $alumno = array();
       // recorremos los campos del formulario
       foreach($inputs as $inpt):
          
               $data = explode('-', $inpt);
              // si es la division origen
               if($data[0] == 'origen'){
                   $pase[$i]['origen'] = $data[1];
                    
               }
               // si es la division destino
               else if($data[0] == 'destino'){
                   $pase[$i]['destino'] = $data[1];
                   $i++;
               }
               // si es un pase de curso
               else if($data[0]=='p'){
                   $pase[$i]['alumno']['pase'][] = $data[1];
                   
               }
               // si es un alumno que repite
               else{
                  $pase[$i]['alumno']['repe'][] = $data[1]; 
               }
                    
       endforeach;
   
      $cursos = array();
     // recorremos los valores del arreglo $pase
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
          // primero de los repetidores
          if(isset($ps['alumno']['repe'])){
             
          foreach($ps['alumno']['repe'] as $alumno):
              $this->modificar_estado_cursado($alumno,'repetidor', $ps['origen'],'1');
              $this->inscribir($alumno, $ps['origen']);
          endforeach;
          }
          // despues de los alumnos que pasan
          if(isset($ps['alumno']['pase'])){
          foreach($ps['alumno']['pase'] as $alumno):
             
              // si tiene división destino lo inscribimos
                if($ps['destino'] != 'egreso') {
                     $this->modificar_estado_cursado($alumno,'pase', $ps['origen'],'1');
                     $this->inscribir($alumno, $ps['destino']);
                }
                else {
               // no tiene divisin destino, solo modificamos el estado del cursado
                    $this->modificar_estado_cursado($alumno,'egreso', $ps['origen'],'1');
                
                }
                
          endforeach;
          }
          
      endforeach;
      // redirigimos a la función fin_cursado
      redirect('escuela/fin_cursado','refresh'); 
   }
   
   // verifica si un alumno existe
   public function alumno_check($str,$division)
	{ 
       // cargamos el modelo de persona
        $this->load->model('persona_model');
        $str_explode = explode('-', $str);
        $ape_nom = explode(',', $str_explode[0]);
        
        $apellido = trim($ape_nom[0]);
     
        if(isset($ape_nom[1]))$nombre = trim($ape_nom[1]);
        if(isset($str_explode[1]))$dni = trim($str_explode[1]);
        if(isset($apellido) and isset($dni) and isset($nombre)) $data = $this->persona_model->get_alumno_criteria($apellido,$nombre,$dni);
  
		if (!isset($data))
                {   // la validación es incorrecta
			$this->form_validation->set_message('alumno_check', 'El %s no existe.');
			return FALSE;
		}
                else if(count($data) == 0){
                   // la validación es incorrecta
                        $this->form_validation->set_message('alumno_check', 'El %s no existe.');
			return FALSE;
                }
		else
		{// la validacion es correcta
                        //Ahora verificamos que no este inscripto
                        $this->load->model('alumno_model');
                        
                        // si esta inscripto devolvemos false
                        if($this->alumno_model->esta_inscripto($data['id'])){
                            $this->form_validation->set_message('alumno_check', 'El %s ya se encuentra inscripto.');
                            return FALSE;  
                            
                        }
                    else
                        // no esta inscripto devolvemos true
			return TRUE;
		}
	}
   
  
   // inscribe a un alumno en una division
   function inscribir($alumno="",$division=""){
      // cargamos los modelos de cursado y alumno
       $this->load->model('cursado_model');
       $this->load->model('alumno_model');
       // primero buscamos los cursados correspondientes a la division
       $cursados = $this->cursado_model->get_cursado_division($division);
       // recorremos el cursado
       foreach($cursados as $cursado):
            // creamos el cuaderno de comunicaciones
           // $id_cuderno = $this->alumno_model-> create_comunicaciones();
             $valores  = array(
                        'alumno' => $alumno,
                        //'comunicaciones' => $id_cuderno,
                        'estado' => 1,
                        'cursado' => $cursado['id']
             );
            // creamos la inscripcion
            $id_inscripcion = $this->alumno_model->create_inscripcion ($valores);
       endforeach;
      
   }
   
  
 
   // generamos el cursado para una divisón
   function generar_cursado($post_array="",$division=""){
       
       // cargamos los modelos de escuela, cursado y plande estudio
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
               redirect('escuela','refresh');
           }
       endforeach;
    
   }
   
   // agregar personal a una escuela
   function add_personal($primary_key){
       // seleccionamos el tema por defecto 
       $this->grocery_crud->set_theme('datatables');
        
     
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("escuelapersona");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Personal');

        // filtramos la escuela
        $this->grocery_crud->where('escuela',$primary_key); 
        // relacion con escuela
        $this->grocery_crud->set_relation('escuela','escuela','nombre');
        // relacion con persona
        $this->grocery_crud->set_relation('persona','persona','{nombre}, {apellido} - {dni}','id in (select persona from directivo)');
        // tipo de relacion
        $this->grocery_crud->set_relation('tiporelacion_esc','tiporelacion_esc','nombre');
        // ocultamos el id de escuela
        $this->grocery_crud->change_field_type('escuela','hidden',$primary_key);
       // camos requeridos para la inserción y modificación
        $this->grocery_crud->fields('escuela','persona','tiporelacion_esc');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('escuela','persona','tiporelacion_esc');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('persona','Personal');
        $this->grocery_crud->display_as('tiporelacion_esc','Cargo');
        // reglas de validación, campos requeridos
        $this->grocery_crud->required_fields('persona','tiporelacion_esc');
        //ejecutamos
        $output = $this->grocery_crud->render();
        // cargamos el titulo
        $output -> titulo = 'Personal Directivo del Colegio';  
        // cargamos la vista
        $this->load->view('v_abm.php',$output);  
       
   }
   
   // mostramos las materias de una division
   function materias($division=""){
        $this->grocery_crud->set_theme('datatables');
        // obtenemos el nº de escuela
        $escuela = $this->sesion_permiso['escuela'];
     
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("cursado");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Materias');
        
        // relacion con division
        $this->grocery_crud->set_relation('division','division','{anio}º - {nombre}','division.escuela = '.$escuela);
        // relación con materia
        $this->grocery_crud->set_relation('materia','materia','nombre');
        
        // filtramos por la fecha de baja y la división
        $this->grocery_crud->where('cursado.fechaBaja is null'); 
        $this->grocery_crud->where('cursado.division ='.$division);
        
        // campos a mostrar
        $this->grocery_crud->columns('materia','division');
        // agregamos la acción para asignar el profesor a la materia
        $this->grocery_crud->add_action('Profesor','','escuela/profesor','ui-icon-plus');
        
        
        // desabilitamos la creación, modificacion y eliminacion de una materia
        $this->grocery_crud->unset_delete();
        $this->grocery_crud->unset_add();
        $this->grocery_crud->unset_edit();
        
        // ejecutamos
         $output = $this->grocery_crud->render();
         // cargamos el título
         $output -> titulo = 'Materias del cursado';  
         // cargamos la vista 
        $this->load->view('v_abm.php',$output);  

   }
   
   // asignamos un profesor al cursado
   function profesor($cursado=""){
        $this->grocery_crud->set_theme('datatables');
        // obtenemos el nº de escuela
        $escuela = $this->sesion_permiso['escuela'];
     
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("dictadoprofesor");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Profesor');
        
        // filtramos por fecha de baja y cursado
        $this->grocery_crud->where('fechaBaja is null'); 
        $this->grocery_crud->where('cursado ='.$cursado);
        // agregamos la relacion con profesor
        $this->grocery_crud->set_relation_n_n('profesor','persona_dictado','persona','dictado','persona','{nombre}, {apellido} - {dni}','','persona.id in (select persona from docente)');
        // relación con el cargo
        $this->grocery_crud->set_relation('cargo','cargo','nombre');
        
        // ocultamos el cursado
        $this->grocery_crud->change_field_type('cursado','hidden',$cursado);
        // al eliminar llamamos a desincribir
        $this->grocery_crud->callback_delete(array($this,'callback_delete_profesor'));
        // campos a mostrar
        $this->grocery_crud->fields('profesor','cargo','cursado');
        $this->grocery_crud->columns('profesor','cargo');
        // html del modal para agregar un profesor
          $add_html = '<button href="#myModal3" role="button" class="btn btn-large btn-info" data-toggle="modal">Agregar Personal Docente...</button>
             <div id="myModal3" class="modal-datos hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Agregar Docente</h3>
            </div>
            <div class="modal-body">
              <iframe src="'.site_url("persona/abm/docente/1/add").'"  width=930 height=700 frameborder="0"></iframe>  
            </div>
        <div class="modal-footer">
              <button class="btn" data-dismiss="modal" onclick="location.reload();">Close</button>
        </div>
     </div>
<script type="text/javascript">
    $(document).focusout(function() {
        $("#myModal3").focusout(function() {
            location.reload();
        });
    });
</script>     
';
        // ejecutamos
        $output = $this->grocery_crud->render();
        
        if(isset($add_html)){
            $output->html_inf = $add_html;
        }
        //cargamos el titulo
        $output -> titulo = 'Profesores del cursado'; 
        // cargamos la vista
        $this->load->view('v_abm.php',$output);  
       
   }
   
   // da de baja a un profeso de un cursado
   function callback_delete_profesor($primary_key){
       // llamamos al modelo
       $this->load->model('cursado_model');
       // damos de baja al profesor
       $this->cursado_model->baja_profesor($primary_key);
       // volvemos
       return true;
   }
   
   // listamos los alumnos inscriptos en la esuela
   function alumnos(){
        $escuela = $this->sesion_permiso['escuela'];
       
        $this->grocery_crud->set_theme('flexigrid');
        $this->grocery_crud->set_table('persona');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Alumnos');
        // relacion con departamento
        $this->grocery_crud->set_relation('departamento','departamento','nombre');
        // relacion con localidad
        $this->grocery_crud->set_relation('localidad','localidad','nombre');
        
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','apellido','dni','nacimiento','sexo','direccion','departamento','localidad','codPostal','telefono','celular','email');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','apellido','dni','nacimiento');
        
        // campos requeridos
         $this->grocery_crud->required_fields('nombre','apellido','dni','nacimiento','sexo','direccion','departamento','localidad','email');
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('dni','Nº Documento','numeric|max_length[8]');
        $this->grocery_crud->set_rules('telefono','Nº de Teléfono','numeric|max_length[10]');
        $this->grocery_crud->set_rules('celular','Nº de Celular','numeric|max_length[10]');
        $this->grocery_crud->set_rules('codPostal','Código Postal','numeric');
        $this->grocery_crud->set_rules('email','Correo Electrónico','valid_email');
        
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre');
        $this->grocery_crud->display_as('apellido','Apellido');
        $this->grocery_crud->display_as('dni','Nº Documento');
        $this->grocery_crud->display_as('nacimiento','Fecha de Nacimiento');
        $this->grocery_crud->display_as('dirección','Dirección');
        $this->grocery_crud->display_as('departamento','Departamento');
        $this->grocery_crud->display_as('localidad','Localidad');
        $this->grocery_crud->display_as('codPostal','Código Postal');
        $this->grocery_crud->display_as('telefono','Nº de Teléfono');
        $this->grocery_crud->display_as('celular','Nº de Celular');
        $this->grocery_crud->display_as('email','Correo Electrónico');
      
        $this->grocery_crud->set_primary_key('persona','alumno');
        $where = 'jb80bb774.id in (select distinct(alumno) from inscripcionalumno left join cursado on inscripcionalumno.cursado = cursado.id left join division on cursado.division = division.id where cursado.fechaBaja is null and inscripcionalumno.fechaBaja is null and division.escuela ='.$escuela.')';
        
        // validamos la herencia del alumno de persona
        $this->grocery_crud->set_relation('id','alumno','persona');
        
        $this->grocery_crud->where('not(persona is null) and '.$where);

        // agregamos las acciones para agregar los familiares de los alumnos
        $this->grocery_crud->add_action('Padre/Tutor',base_url('images/hombre.png'),'persona/relacion/padre');
        $this->grocery_crud->add_action('Madre/Tutora',base_url('images/women.png'),'persona/relacion/madre');
        $this->grocery_crud->add_action('Hermanos',base_url('images/familia2.gif'),'persona/relacion/hermano');
        
        // deshabilitamos eliminar y agregar
        $this->grocery_crud->unset_delete();
        $this->grocery_crud->unset_add();
     
        // ejecutamos
        $output = $this->grocery_crud->render();
        // cargamos el título
        $output->titulo = 'Listado de Alumnos';
        //cargamos la vista
        $this->load->view('v_abm.php',$output);
        
   }
   // devuelve un md5 de un campo   
   protected function _unique_join_name($field_name)
    {
    	return 'j'.substr(md5($field_name),0,8); //This j is because is better for a string to begin with a letter and not a number
    }	
  // devuelve un md5 de un campo
   protected function _unique_field_name($field_name)
    {
    	return 's'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not a number
    } 
    
    function verifica_fecha($str){
        //print_r(substr($str, 0, 4));
        if(! checkdate(substr($str, 3, 2),  substr($str, 0, 2),  substr($str, 6,4))){
            $this->form_validation->set_message('verifica_fecha', 'La Fecha ingresada es inválida.');
            return FALSE;
            
        }
        else{
            return TRUE;
        }
    }

}

?>
