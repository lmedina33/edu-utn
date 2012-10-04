<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarios_model
 *
 * @author gonza
 */
class usuarios_model extends CI_Model{
    //put your code here
   function login($username, $password)
     {
        // Esta función recibe como parámetros el nombre de usuario y password  
      $this -> db -> select('id, ussername, persona'); //Indicamos los campos que usaremos del resultado de la consulta
      $this -> db -> from('usuario'); // indicamos la tabla a usar
      $this -> db -> where('ussername = ' . "'" . $username . "'"); // Indicamos que va a buscar el nombre de usuario
      $this -> db -> where('password = ' . "'" . MD5($password) . "'"); // Indicamos que va a buscar el password con MD5
      
      $this -> db -> limit(1);
                // Solo deberá de existir un usuario
       
      $query = $this -> db -> get(); 
                // Obtenemos los resultados del query
       
      if($query -> num_rows() == 1)
      {
         return $query->result();
                        // Existen nombre de usuario y contra seña.
      }
      else
      {
         return false;
                       // No existe nombre de usuario o contraseña.
      }
       
   }
   
    function get_roles($id_usuario)
     {
        // Esta función recibe como parámetros el nombre de usuario y password  
      $this -> db -> select('rol.nombre, rol.id'); //Indicamos los campos que usaremos del resultado de la consulta
      $this -> db -> from('usuario'); // indicamos la tabla a usar
      $this -> db -> join('usuario_rol','usuario.id = usuario_rol.usuario','left outer');
      $this -> db -> join('rol','usuario_rol.rol = rol.id','left outer');
      $this -> db -> where('usuario.id = ' . "'" . $id_usuario . "'"); 
      
       
      $query = $this -> db -> get(); 
                // Obtenemos los resultados del query
      $data = $query->result_array();
      
      return $data;
     }
       
   
   
   function get_permiso($controlador,$funcion,$rol){
      
       $this->db->select('rol_permiso.valor'); 
       $this->db->from('rol');
       $this->db->join('rol_permiso','rol.id = rol_permiso.rol','left outer');
       $this->db->join('permisorol','rol_permiso.permiso = permisorol.id','left outer');
       $this->db->where('permisorol.nombre',$controlador);
       $this->db->where('permisorol.funcion',$funcion);
       $this->db->where('rol.id',$rol);
       
       
       $query = $this->db->get();
       $data = $query->row_array();
       if($data)  return $data['valor'];
       else return 0;
        
   }
   
   function verifica_rol($usuario="",$rol="",$escuela=""){
     
      $this -> db -> select('usuario.id'); 
      $this -> db -> from('usuario'); // indicamos la tabla a usar
      $this -> db -> join('usuario_rol','usuario.id = usuario_rol.usuario','left outer');
      $this -> db -> join('rol','usuario_rol.rol = rol.id','left outer');
     
       
       switch ($rol):
           // Si el rol es directivo buscamos las escuelas donde es director
           case 2:
               $this->db->join('persona','usuario.persona = persona.id','left outer');
               $this->db->join('escuelapersona','persona.id = escuelapersona.persona','left outer');
               $this->db->join('escuela','escuelapersona.escuela = escuela.id','left outer');
               $this->db->join('tiporelacion_esc','escuelapersona.tiporelacion_esc = tiporelacion_esc.id','left outer');
               $this->db->where('tiporelacion_esc.nombre',"Director");
               $this->db->where('escuela.id',$escuela);
               break;
           case 3:
               break;
           case 4:
               break;
           case 5:
               break;
       endswitch;
       
      $this -> db -> where('usuario.id = ' . "'" . $usuario . "'");
      $this -> db -> where('rol.id',$rol);
      
      $query = $this->db->get();
      $data = $query->row_array();
     // print_r($data); exit; 
      return $data;
   }
   function check_pass($pass="",$usuario=""){
       
       $this->db->select('id');
       $this->db->from('usuario');
       $this->db->where('id',$usuario);
       $this->db->where('password',  md5($pass));
       $query = $this->db->get();
       $data = $query->row_array();
       
       return $data;
   }
   
   function change_pass($pass="",$usuario=""){
       $this->db->set('password',  md5($pass));
       $this->db->where('id',$usuario);
       $this->db->update('usuario');
       
       return true;
       
   }
   
   function create_user($usuario){
       $this->db->insert('usuario',$usuario);
       
       return $this->db->insert_id();
   }
   
   function get_rol_id($rol=""){
       $this->db->select('id');
       $this->db->from('rol');
       $this->db->where('nombre',$rol);
       
       $query = $this->db->get();
       $data = $query->row_array();
       
       return $data['id'];
   }
   
   function insert_rol($rol){
       $this->db->insert('usuario_rol',$rol);
       return true;
   }
   
}

?>

