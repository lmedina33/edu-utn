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
class Admin extends CI_Controller {
    //put your code here   
    
    function index(){
        
        $this->load->view('v_home');
    }
    
    function usuarios(){
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("usuario");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Usuarios');
       // Agregamos la relación n a n con los materias 
        $this->grocery_crud->set_relation_n_n('rol','usuario_rol','rol','usuario','rol','nombre','');
        $this->grocery_crud->set_relation('persona','persona','{apellido} , {nombre} - {dni}');
        

        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('persona','ussername','rol');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('ussername','persona','rol','fechaAlta','fechaBaja');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('persona','Persona');
        $this->grocery_crud->display_as('ussername','Nombre Usuario');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('ussername','Nombre Usuario','required');
      
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
    function roles(){
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("rol");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Roles');
       // Agregamos la relación n a n con los materias 
        $this->grocery_crud->set_relation_n_n('permiso','rol_permiso','permisorol','rol','permiso','descripcion','valor');
               

        // Campos que se requieren para la inserción y modificacion
        $this->grocery_crud->fields('nombre','descripcion','permiso');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('nombre','descripcion','permiso','fechaAlta','fechaBaja');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('permiso','Permiso');
        $this->grocery_crud->display_as('nombre','Nombre de Rol');
        $this->grocery_crud->display_as('descripcion','Descripcion');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre de Rol','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');
      
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
}

?>
