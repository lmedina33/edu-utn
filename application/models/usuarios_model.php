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
}

?>
