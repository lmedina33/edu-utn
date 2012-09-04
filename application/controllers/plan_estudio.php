<?php

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
}

?>
