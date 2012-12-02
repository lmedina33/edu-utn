<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of especialidad
 *
 * @author gonza
 */
class especialidad extends CI_Controller{
    //put your code here
    
    function abm(){
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        $this->grocery_crud->set_table('especialidad');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Especialidad Escuela');
        
        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','resolucion');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','resolucion','fechaAlta');
      
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('nombre','Nombre de la Especialidad');
        $this->grocery_crud->display_as('descripcion','Descripción');
        $this->grocery_crud->display_as('resolucion','Nº de Resolución');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        $this->grocery_crud->unset_delete();
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre de la Especialidad','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
        $this->grocery_crud->set_rules('resolucion','Resolucion','required|alpha_numeric');
       
        $output = $this->grocery_crud->render();
        $output->titulo = 'Gestión de especialidades';
        $this->load->view('v_abm.php',$output);  
        
    }
}

?>
