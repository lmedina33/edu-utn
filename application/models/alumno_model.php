<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona_model
 *
 * @author gsiman
 */
class Alumno_model extends CI_Model{
    //put your code here
    
   function create_inscripcion($inscripcion=""){
       $this->db->insert('inscripcionalumno',$inscripcion);
       return $this->db->insert_id();
       
   }
   
   function create_comunicaciones(){
       $this->db->set('fechaBaja','');
       $this->db->insert('comunicaciones');
       return $this->db->insert_id();
   }
  
    function esta_inscripto($alumno="",$division=""){
        $this->db->select('cursado.id');
        $this->db->from('cursado');
        $this->db->join('inscripcionalumno','cursado.id = inscripcionalumno.cursado','inner');
        $this->db->join('alumno','inscripcionalumno.alumno = alumno.id','left outer');
        $this->db->where('alumno.id',$alumno);
       // $this->db->where('cursado.division',$division);
        
        $query  = $this->db->get();
        $data = $query->result_array();
        
        if(count($data)>0) return true;
        else return false;
        
    }
}

?>
