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
        $this->grocery_crud->fields('persona','ussername','password','rol');
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('ussername','persona','rol','fechaAlta');
        
        //Nombre a mostrar por cada campo de la tabla
        $this->grocery_crud->display_as('persona','Persona');
        $this->grocery_crud->display_as('ussername','Nombre Usuario');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('password','Contraseña');
       
        $this->grocery_crud->change_field_type('password', 'password');
        
        $this->grocery_crud->callback_before_insert(array($this,'encrypt_password_callback'));
        $this->grocery_crud->callback_before_update(array($this,'encrypt_password_callback'));
        
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('ussername','Nombre Usuario','required');
        $this->grocery_crud->set_rules('password','Contraseña','required|min_length[8]');
       
        $output = $this->grocery_crud->render();
        
        // Ahora agregamos lo que queremos que muestre la vista además de la grilla de grocery_crud:
        // en $output['html_sup'] vamos a colocar el html que queremos mostrar por encima de la grilla recibiéndola como $html_sup
        // en $output['html_inf'] vamos a colocar el html que queremos mostrar por debajo de la grilla recibiéndola como $html_inf
        
        $output -> titulo = 'Administración de Usuarios';
        $output -> html_inf = '';
        
      //  print_r($data); exit();
        $this->load->view('v_abm',$output);  
    }
    
    function encrypt_password_callback($post_array) {
           
            
            $post_array['password'] = md5($post_array['password']);

            return $post_array;
    }  

    function roles(){
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("rol");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Roles');
       // Agregamos la relación n a n con los materias 
        $this->grocery_crud->set_relation_n_n('permiso','rol_permiso','permisorol','rol','permiso','{nombre}','');
               

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
    
    function permisos(){
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("rol_permiso");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Permisos');
        
        $this->grocery_crud->set_relation('rol','rol','nombre');
        $this->grocery_crud->set_relation('permiso','permisorol','{nombre} - {funcion}');
       // Agregamos la relación n a n con los materias 
        //$this->grocery_crud->set_relation_n_n('permiso','rol_permiso','permisorol','rol','permiso','nombre','');
               

        // Campos que se requieren para la inserción y modificacion
        //$this->grocery_crud->fields('nombre','descripcion','permiso');
        // Campos que se muestran en la tabla con los registros existentes
        //$this->grocery_crud->columns('nombre','descripcion','permiso','fechaAlta','fechaBaja');
        
        //Nombre a mostrar por cada campo de la tabla
        /*$this->grocery_crud->display_as('permiso','Permiso');
        $this->grocery_crud->display_as('nombre','Nombre de Rol');
        $this->grocery_crud->display_as('descripcion','Descripcion');
        $this->grocery_crud->display_as('fechaAlta','Fecha de Alta');
        $this->grocery_crud->display_as('fechaBaja','Fecha de Baja');
       
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('nombre','Nombre de Rol','required');
        $this->grocery_crud->set_rules('descripcion','Descripcion','required');*/
      
       
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
     function permisosrol(){
        
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        
        // Elegimos la tabla sobre la que vamos a trabajar
        $this->grocery_crud->set_table("permisorol");
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Permisos');
  
        $output = $this->grocery_crud->render();
        $this->load->view('v_abm.php',$output);  
    }
    
}

?>
