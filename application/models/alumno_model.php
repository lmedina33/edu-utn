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
      
       $this->db->query('insert into comunicaciones values ()');
       return $this->db->insert_id();
   }
  
    function esta_inscripto($alumno="",$division=""){
        $this->db->select('cursado.id');
        $this->db->from('cursado');
        $this->db->join('inscripcionalumno','cursado.id = inscripcionalumno.cursado','inner');
        $this->db->join('alumno','inscripcionalumno.alumno = alumno.id','left outer');
        $this->db->where('alumno.id',$alumno);
        $this->db->where('inscripcionalumno.fechaBaja is null');
       // $this->db->where('cursado.division',$division);
        
        $query  = $this->db->get();
        $data = $query->result_array();
        
        if(count($data)>0) return true;
        else return false;
        
    }
    function get_inscripciones($alumno="",$estado="",$division=""){
        $this->db->select('inscripcionalumno.id');
        $this->db->from('cursado');
        $this->db->join('inscripcionalumno','cursado.id = inscripcionalumno.cursado','inner');
        $this->db->join('estadoinscripcion','inscripcionalumno.estado = estadoinscripcion.id','left outer');
        $this->db->join('alumno','inscripcionalumno.alumno = alumno.id','left outer');
        $this->db->join('persona','alumno.persona = persona.id','left outer');
        $this->db->join('division','cursado.division = division.id','left outer');
        $this->db->where('alumno.id',$alumno);
        $this->db->where('estadoinscripcion.nombre',$estado);
        $this->db->where('division.id',$division);
        $this->db->where('inscripcionalumno.fechaBaja is null');
        
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
        
    }
    function modifica_cursado($inscripcion="",$estado=""){
        $this->db->select('id');
        $this->db->from('estadoinscripcion');
        $this->db->where('nombre',$estado);
        $query = $this->db->get();
        $data = $query->row_array();
        
        $this->db->set('inscripcionalumno.fechaBaja',date("Y-m-d"));
        $this->db->set('inscripcionalumno.estado',$data['id']);
        $this->db->where('inscripcionalumno.id',$inscripcion['id']);
        $this->db->update('inscripcionalumno');
        
        return true;
        
    }
    
    function get_alumno_id($persona){
        $this->db->select('alumno.id');
        $this->db->from('persona');
        $this->db->join('alumno','persona.id = alumno.persona','inner');
        $this->db->where('persona.id',$persona);
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data['id'];
    }
    
   
    
}

?>
