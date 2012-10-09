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
class Persona extends CI_Controller {
    //put your code here   
    
    function edit_user(){
       
        $usuario = $this->session->userdata('logged_in');
       // print_r($usuario); exit;
        $this->form_validation->set_rules('old_pass', 'Contraseña actual', 'required|callback_usuario_check['.$usuario['id'].']');
        $this->form_validation->set_rules('new_pass', 'Contraseña nueva', 'required|min_length[8]');
        $this->form_validation->set_rules('new_pass1', 'Repita contraseña', 'required|min_length[8]|matches[new_pass]');
        
       if ($this->form_validation->run() == FALSE)
		{
                       
			$this->load->view('v_moduser');
		}
		else
		{
                    $data['exito'] = 1;
                    $this->load->model('usuarios_model');
                    $this->usuarios_model->change_pass($this->input->post('new_pass'),$usuario['id']);
                    $this->load->view('v_moduser',$data);
                }
                
        
    }
    
     public function usuario_check($str,$usuario)
	{
         $this->load->model('usuarios_model');
         $data = $this->usuarios_model->check_pass($str,$usuario);
         if (count($data)==0)
                {
			$this->form_validation->set_message('usuario_check', 'La contraseña actual es incorrecta.');
			return FALSE;
                }
                else {
                    return TRUE;
                }
        }
    
    
    function  abm($tipo="",$modal=""){
        
        $this->load->library('grocery_CRUD');
       // $this->grocery_crud->set_theme('datatables');
        
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
       
        $this->grocery_crud->required_fields('nombre','apellido','email','dni','nacimiento','sexo','direccion','departamento','localidad');
        // Reglas de validación de los campos
        $this->grocery_crud->set_rules('dni','Nº Documento','numeric|max_length[8]');
        $this->grocery_crud->set_rules('telefono','Nº de Teléfono','numeric|max_length[10]');
        $this->grocery_crud->set_rules('celular','Nº de Celular','numeric|max_length[10]');
        $this->grocery_crud->set_rules('codPostal','Código Postal','numeric');
        $this->grocery_crud->set_rules('email','Correo Electrónico','valid_email');
       
       
           if($tipo == 'alumno'){
                $this->grocery_crud->callback_after_insert(array($this,'crear_alumno'));
                $this->grocery_crud->set_primary_key('persona','alumno');
                $this->grocery_crud->set_relation('id','alumno','persona');
                $this->grocery_crud->where('not(persona is null)');
                $this->grocery_crud->add_action('Padre',base_url('images/hombre.png'),'persona/relacion/padre');
                $this->grocery_crud->add_action('Madre',base_url('images/women.png'),'persona/relacion/madre');
                $this->grocery_crud->add_action('Hermanos',base_url('images/familia2.gif'),'persona/relacion/hermano');
      
                }
           
          else if($tipo == 'persona'){
                $this->grocery_crud->unset_operations();
                $this->grocery_crud->add_action('Marcar directivo',base_url('images/directivo.png'),'persona/marcar_directivo');
                $this->grocery_crud->add_action('Marcar profesor',base_url('images/profesor.png'),'persona/marcar_docente');
                $this->grocery_crud->add_action('Marcar padre/madre',base_url('images/pama.png'),'persona/marcar_padre');
             
                }
           else if($tipo == 'mod'){
                    $this->grocery_crud->unset_back_to_list();
                    $tipo = 'datos personales';
                    $this->grocery_crud->set_subject($tipo);
           }
           else{
                $this->grocery_crud->callback_after_insert(array($this,'crear_'.$tipo));
                $this->grocery_crud->set_primary_key('persona',$tipo);
                $this->grocery_crud->set_relation('id',$tipo,'persona');
                $this->grocery_crud->where('not(persona is null)');
           }
        
        if($modal==1){
            $this->grocery_crud->unset_back_to_list(); 
        }   
        
        
        $this->grocery_crud->unset_delete();
        $output = $this->grocery_crud->render();
        $output->titulo = 'Listado de '.$tipo.'s';
        if($modal==1) $this->load->view('v_modal.php',$output);
            else $this->load->view('v_abm.php',$output);
      
    }
    
    function crear_usuario($post_array,$tipo,$primary_key){
        $this->load->model('usuarios_model');
        $pass = $this->get_random_password();
        $usuario = array(
            'persona' => $primary_key,
            'ussername' => $post_array['email'],
            'password' => md5($pass)
            
        );
        $id_user = $this->usuarios_model->create_user($usuario);
        $id_rol = $this->usuarios_model->get_rol_id($tipo);
        
        $rol = array(
            'usuario' => $id_user,
            'rol' => $id_rol
        );
        
        $this->usuarios_model->insert_rol($rol);
        
        $this->load->library('envio_email');
        
        $data['usuario'] = $post_array['email'];
        $data['pass'] = $pass;
        
        
        $html = $this->load->view('email',$data,true);
        $this->envio_email->send_mail($post_array['email'],'Alta usuario Pluma',$html);
        
        return true;
    }
    
     function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=true, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }
                                
        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        
        return $password;
    }
    
    function marcar_directivo($persona){
        $this->load->model('persona_model');
        $aux = $this->persona_model->es_('directivo',$persona);
        
        if($aux == ''){
            $directivo = array(
                'persona' => $persona,

            );
            $this->db->insert('directivo',$directivo);
        }
        redirect('persona/abm/directivo');
    }
    
     function marcar_docente($persona){
        $this->load->model('persona_model');
        $aux = $this->persona_model->es_('docente',$persona);
        
        if($aux == ''){
            $directivo = array(
                'persona' => $persona,

            );
            $this->db->insert('docente',$directivo);
        }
        redirect('persona/abm/docente');
    }
    
     function marcar_padre($persona){
        $this->load->model('persona_model');
        $aux = $this->persona_model->es_('padre',$persona);
        
        if($aux == ''){
            $directivo = array(
                'persona' => $persona,

            );
            $this->db->insert('padre',$directivo);
        }
        redirect('persona/abm/padre');
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
        $this->crear_usuario($post_array, 'directivo', $primary_key);
        
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
     
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        $this->grocery_crud->unset_edit();
        $this->grocery_crud->unset_print();
        $this->grocery_crud->unset_export();
        
        $this->grocery_crud->set_table('relacion');
        // Nombre que se muestra como referencia a la tabla
        $this->grocery_crud->set_subject('Relacion '.$tipo);
        
       if($tipo == 'padre' or $tipo == 'madre'){
        if(count($data['relaciones'])> 0){
             $this->grocery_crud->unset_add();  
             
        }
        
        
        $add_html = '<button href="#myModal2" role="button" class="btn btn-large btn-info" data-toggle="modal">Agregar Padre/Madre...</button>
  <div id="myModal2" class="modal-datos hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Agregar Padre/Madre</h3>
            </div>
            <div class="modal-body">
              <iframe src="'.site_url("persona/abm/padre/1/add").'" class="frame" width=930 height=700 frameborder="0"></iframe>  
            </div>
        <div class="modal-footer">
              <button class="btn" data-dismiss="modal" onclick="location.reload();">Close</button>
        </div>
     </div>
<script type="text/javascript">
    $(document).focusout(function() {
        $("#myModal").focusout(function() {
            location.reload();
        });
    });
</script>     
';
      }
        
        $this->db->select('id');
        $this->db->from('tiporelacion');
        $this->db->where('nombre',$tipo);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        $id_tipo = $data['id'];
        
        switch ($tipo){
            case 'padre':
                $parentesco = 'Padre';
                $this->grocery_crud->where('idprimera ='.$primary_key);
                $this->grocery_crud->change_field_type('tipoRelacion', 'hidden', $id_tipo);
                $this->grocery_crud->change_field_type('idprimera', 'hidden', $primary_key);
                $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','sexo = "M" and  id != '.$primary_key);
                $this->grocery_crud->where('tipoRelacion = '.$id_tipo);
                $this->grocery_crud->display_as('idsegunda','Padre');
                break;
            case 'madre':
                $parentesco = 'Madre';
                $this->grocery_crud->where('idprimera ='.$primary_key);
                $this->grocery_crud->change_field_type('tipoRelacion', 'hidden', $id_tipo);
                $this->grocery_crud->change_field_type('idprimera', 'hidden', $primary_key);
                $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','sexo = "F" and  id != '.$primary_key);
                $this->grocery_crud->where('tipoRelacion = '.$id_tipo);
                $this->grocery_crud->display_as('idsegunda','Madre');
                break;
            case 'hermano':
                $parentesco = 'Hermanos';
                $this->grocery_crud->where('idprimera ='.$primary_key);
              //  $this->grocery_crud->or_where('idprimera ='.$primary_key);
                $this->grocery_crud->change_field_type('tipoRelacion', 'hidden', $id_tipo);
                $this->grocery_crud->change_field_type('idprimera', 'hidden', $primary_key);
                $this->grocery_crud->set_relation('idsegunda','persona','{nombre}, {apellido} - {dni}','persona.id != '.$primary_key);
                $this->grocery_crud->where('tipoRelacion = '.$id_tipo);
                $this->grocery_crud->display_as('idsegunda','Hermanos');
               // $this->grocery_crud->callback_after_delete(array($this,'del_hermano'));
                $this->grocery_crud->callback_after_insert(array($this,'add_hermano'));
                
                break;
                     
        }
        
        // Campos que se muestran en la tabla con los registros existentes
        $this->grocery_crud->columns('idsegunda');
        $output = $this->grocery_crud->render();
        if(isset($add_html)){
            $output->html_inf = $add_html;
        }
        $this->load->model('persona_model');
        $persona = $this->persona_model->get_persona($primary_key);
        
        
        $output->titulo = $parentesco. ' de '.$persona['apellido'].', '.$persona['nombre'];
        
        $this->load->view('v_abm.php',$output);  
    }
    
    function add_hermano($post_array,$primary_key)
        {
            $relacion = array(
                "idsegunda" => $post_array['idprimera'],
                "idprimera" => $post_array['idsegunda'],
                "tipoRelacion" => 3
            );

            $this->db->insert('relacion',$relacion);

            return true;
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
    
   public function get_alumno(){
        $valor = $this->input->post('term');
        $this->load->model('persona_model');
        if(is_numeric($valor)){
             $data = $this->persona_model->get_alumno('',$valor); 
        }
        else{
             $data = $this->persona_model->get_alumno($valor,''); 
        }
        
      
        $arr = array();
        foreach($data as $persona):
           $arr[] = $persona['apellido'] .', '.$persona['nombre'].' - '.$persona['dni'];
        endforeach;
        
        echo json_encode($arr);
    }
}

?>
