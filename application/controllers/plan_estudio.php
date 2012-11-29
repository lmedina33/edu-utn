<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plan_estudio
 *
 * @author gonza
 */
class plan_estudio extends CI_Controller{
    
    //put your code here
    public function abm(){
      
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
      //$this->grocery_crud->set_model("MY_grocery_model");
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("plandeestudio");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Plan de Estudios');
       // Agregamos la relación n a n con los materias 
       // $this->grocery_crud->set_relation_n_n('materias','planestudio_materia','materia','planestudio','materia','nombre','');
        $this->grocery_crud->set_relation('nivel','nivel','nombre');
        //asd
        
        $this->grocery_crud->unset_delete();
       
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','resolucion','fechaAlta','nivel');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','resolucion','fechaAlta');
        
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
        $this->grocery_crud->set_rules('fechaAlta','Fecha de Alta','required|callback_verifica_fecha');
       
         $this->grocery_crud->add_action('Materias','','plan_estudio/materia','ui-icon-plus');
        
        $output = $this->grocery_crud->render();
        
        $output -> titulo = 'Gestión de planes de estudio';
        
        $this->load->view('v_abm.php',$output);  
    
        
    }
    
    function materia($plan_estudio=""){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
      //$this->grocery_crud->set_model("MY_grocery_model");
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table('materia');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Materia');
       if($plan_estudio) {
           $this->grocery_crud->set_primary_key('materia','planestudio_materia');
           $this->grocery_crud->set_relation('id','planestudio_materia','materia','materia.id = planestudio.materia and planestudio_materia.planestudio ='.$plan_estudio);
       }
           
       //    $this->grocery_crud->set_relation_n_n('materias','planestudio_materia','materia','planestudio','materia','nombre','','planestudio_materia.planestudio = '.$plan_estudio);
      // else $this->grocery_crud->set_relation_n_n('materias','planestudio_materia','plandeestudio','materia','planestudio','nombre','');
        
        $this->grocery_crud->where('planestudio',$plan_estudio);
        $this->grocery_crud->add_action('Contenidos','','materia/contenido','ui-icon-plus');
        
        $this->grocery_crud->unset_add();
        $this->grocery_crud->unset_edit();
        $this->grocery_crud->unset_delete();
       
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','resolucion','planes','year');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','year','fechaAlta');
        $this->grocery_crud->order_by('year','asc');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre de la Materia');
        $this->grocery_crud->display_as('descripcion','Descripción');
        $this->grocery_crud->display_as('year','Año');
        $this->grocery_crud->display_as('materias','Plan de Estudio');
        $this->grocery_crud->display_as('resolucion','Nº de Resolución');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
        $this->grocery_crud->set_rules('resolucion','Resolucion','required|alpha_numeric');
        $this->grocery_crud->set_rules('year','Año','required|numeric|max_length[1]|less_than[9]|greater_than[0]');
       
        $output = $this->grocery_crud->render();
        $this->load->model('planestudio_model');
        $nombre_plan = $this->planestudio_model->get_nombre($plan_estudio);
        $output -> titulo = 'Materias del Plan de Estudios "'.$nombre_plan.'"';
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
