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
class Abm extends CI_Controller {
    //put your code here   
    
    function index(){
        
        $this->load->view('drag');
    }
    
        
    function plan_estudio(){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
      //$this->grocery_crud->set_model("MY_grocery_model");
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("plandeestudio");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Plan de Estudios');
       // Agregamos la relación n a n con los materias 
        $this->grocery_crud->set_relation_n_n('materias','planestudio_materia','materia','planestudio','materia','nombre','');
        $this->grocery_crud->set_relation('nivel','nivel','nombre');
        

        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','resolucion','fechaAlta','nivel');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','resolucion','fechaAlta','fechaBaja','materias');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre del Plan');
        $this->grocery_crud->display_as('descripcion','Descripción');
        $this->grocery_crud->display_as('resolucion','Nº de Resolución');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
        $this->grocery_crud->set_rules('resolucion','Resolucion','required|alpha_numeric');
        $this->grocery_crud->set_rules('fechaAlta','Fecha de Alta','required');
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
  
    function materia(){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
      //$this->grocery_crud->set_model("MY_grocery_model");
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table('materia');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Materia');
        $this->grocery_crud->set_relation_n_n('planes','planestudio_materia','plandeestudio','materia','planestudio','nombre','');
      
        
        $this->grocery_crud->add_action('Contenidos','','abm/contenido','ui-icon-plus');
        
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','resolucion','planes','year');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','year','fechaAlta','fechaBaja');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre de la Materia');
        $this->grocery_crud->display_as('descripcion','Descripción');
        $this->grocery_crud->display_as('year','Año');
        $this->grocery_crud->display_as('planes','Plan de Estudio');
        $this->grocery_crud->display_as('resolucion','Nº de Resolución');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
        $this->grocery_crud->set_rules('resolucion','Resolucion','required|alpha_numeric');
        $this->grocery_crud->set_rules('year','Año','required|numeric|max_length[1]|less_than[9]|greater_than[0]');
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
     function contenido($materia){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table('contenido');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Contenido de Materia');
        $this->grocery_crud->set_relation('materia','materia','nombre');
        $this->grocery_crud->where('materia',$materia);
        $this->grocery_crud->change_field_type('materia','hidden',$materia);
        
        // Campos que se requieren para la inserción y modificacion
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','materia');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre del Contenido');
        $this->grocery_crud->display_as('descripcion','Descripción');
     
        
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
      
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
    function especialidad(){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        $this->grocery_crud->set_table('especialidad');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Especialidad Escuela');
        
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','resolucion');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','resolucion','fechaAlta','fechaBaja');
      
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre de la Especialidad');
        $this->grocery_crud->display_as('descripcion','Descripción');
        $this->grocery_crud->display_as('resolucion','Nº de Resolución');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre de la Especialidad','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
        $this->grocery_crud->set_rules('resolucion','Resolucion','required|alpha_numeric');
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
        
    }
    
    function  persona($tipo=""){
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        $this->grocery_crud->set_table('persona');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject($tipo);
        
        $this->grocery_crud->set_relation('departamento','departamento','nombre');
        $this->grocery_crud->set_relation('localidad','localidad','nombre');
            
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','apellido','dni','nacimiento','sexo','direccion','departamento','localidad','codPostal','telefono','celular','email');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','apellido','dni');
        
        
       
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
       
        $this->grocery_crud->required_fields('nombre','apellido','dni','nacimiento','sexo','direccion','departamento','localidad');
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('dni','Nº Documento','numeric|max_length[8]');
        $this->grocery_crud->set_rules('telefono','Nº de Teléfono','numeric|max_length[10]');
        $this->grocery_crud->set_rules('celular','Nº de Celular','numeric|max_length[10]');
        $this->grocery_crud->set_rules('codPostal','Código Postal','numeric');
        $this->grocery_crud->set_rules('email','Correo Electrónico','valid_email');
       
        if($tipo){
            if($tipo == 'alumno'){
                $this->grocery_crud->callback_after_insert(array($this,'crear_alumno'));
                $this->grocery_crud->set_primary_key('persona','alumno');
                $this->grocery_crud->set_relation('id','alumno','persona');
                $this->grocery_crud->where('not(persona is null)');
                $this->grocery_crud->add_action('Padre','','abm/relacion/padre','ui-icon-plus');
                $this->grocery_crud->add_action('Madre','','abm/relacion/madre','ui-icon-plus');
                $this->grocery_crud->add_action('Hermanos','','abm/relacion/hermano','ui-icon-plus');
                $this->grocery_crud->add_action('Familia','','abm/relacionar','ui-icon-plus');
      
                }
             else{
                $this->grocery_crud->callback_after_insert(array($this,'crear_'.$tipo));
                $this->grocery_crud->set_primary_key('persona',$tipo);
                $this->grocery_crud->set_relation('id',$tipo,'persona');
                $this->grocery_crud->where('not(persona is null)');
             }
        }
        $this->grocery_crud->unset_delete();
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
    function crear_alumno($post_array,$primary_key){
        $alumno = array(
            'persona' => $primary_key,
            'fechaIngreso' => date('Y-m-d'),
            
        );
        $this->db->insert('alumno',$alumno);
        
        return true;
    }
   
    function crear_docente($post_array,$primary_key){
        $docente = array(
            'persona' => $primary_key,
                
        );
        $this->db->insert('docente',$docente);
        
        return true;
    }
    
     function crear_directivo($post_array,$primary_key){
        $directivo = array(
            'persona' => $primary_key,
                
        );
        $this->db->insert('directivo',$directivo);
        
        return true;
    }
    
      function crear_padre($post_array,$primary_key){
        $padre = array(
            'persona' => $primary_key,
                
        );
        $this->db->insert('padre',$padre);
        
        return true;
    }
    
    function relacion($tipo,$primary_key){
        
        // Buscamos si existen relaciones con el tipo
        $this->load->model('persona_model');
        $data['relaciones'] = $this->persona_model->get_relacion($tipo,$primary_key);
        
        
        // En caso de que no existan relaciones redirigimos para agregar las relaciones del tipo.
     
         //    
      //    $this->grocery_crud->unset_edit();
      //    $this->grocery_crud->unset_delete();
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        
        $this->grocery_crud->set_table('relacion');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject($tipo);
        
       if($tipo == 'padre' or $tipo == 'madre'){
        if(count($data['relaciones'])> 0){
             $this->grocery_crud->unset_add();  
             
        }
      }
        
        $this->db->select('id');
        $this->db->from('tiporelacion');
        $this->db->where('nombre',$tipo);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        $id_tipo = $data['id'];
        
        $this->grocery_crud->where('idprimera ='.$primary_key);
        $this->grocery_crud->change_field_type('tipoRelacion', 'hidden', $id_tipo);
        $this->grocery_crud->change_field_type('idprimera', 'hidden', $primary_key);
        
        switch ($tipo){
            case 'padre':
           
                $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','sexo = "M" and  id != '.$primary_key);
                $this->grocery_crud->where('tipoRelacion = '.$id_tipo);
                $this->grocery_crud->display_as('idsegunda','Padre');
                break;
            case 'madre':
                $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','sexo = "F" and  id != '.$primary_key);
                $this->grocery_crud->where('tipoRelacion = '.$id_tipo);
                $this->grocery_crud->display_as('idsegunda','Madre');
                break;
            case 'hermano':
                //$this->grocery_crud->set_relation('idsegunda','alumn','id','not(id s null)');
                $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','id != '.$primary_key);
                
                $this->grocery_crud->where('tipoRelacion = '.$id_tipo);
                $this->grocery_crud->display_as('idsegunda','Hermanos');
                break;
                     
        }
        
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('idsegunda');
      //  $this->grocery_crud->fields('idsegunda');
       // print_r($this);exit;
        //if($this['sexo'] == 'M') 
       
   
      //  $this->grocery_crud->set_primary_key('idprimera','relacion');
     //   $this->grocery_crud->set_relation_n_n('Familiares','relacion','persona','idprimera','idsegunda','nombre','');
     //   $this->grocery_crud->set_relation('idsegunda','persona','nombre');
      //  $this->grocery_crud->set_relation('idsegunda','persona','apellido');
       
    //    $this->grocery_crud->set_relation('localidad','localidad','nombre');
        
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
    function relacionar($primary_key){
      
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        
        $this->grocery_crud->set_table('relacion');
        $this->grocery_crud->set_subject('Familiares');
        
        $this->grocery_crud->where('idprimera ='.$primary_key);
        $this->grocery_crud->change_field_type('idprimera', 'hidden', $primary_key);
        $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','id != '.$primary_key);
        $this->grocery_crud->set_relation('tipoRelacion','tiporelacion','nombre');
        $this->grocery_crud->order_by('tipoRelacion','asc');
        $this->grocery_crud->columns('idsegunda','tipoRelacion');
        
        $this->grocery_crud->display_as('idsegunda','Familiar');
        $this->grocery_crud->display_as('tipoRelacion','Relación Familiar');
        
         $output = $this->grocery_crud->render();
         $this->load->view('v_abm.php',$output);  
   
    }
}

?>
