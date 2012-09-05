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
        $this->grocery_crud->set_relation_n_n('materias','planestudio_materia','materia','planestudio','materia','nombre','');
        $this->grocery_crud->set_relation('nivel','nivel','nombre');
        //asd
        

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
    
}

?>
