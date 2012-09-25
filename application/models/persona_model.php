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
class persona_model extends CI_Model{
    //put your code here
   
    function es_($tipo="",$persona=""){
        $this->db->select('id');
        $this->db->from($tipo);
        $this->db->where('persona',$persona);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data['id'];
        
    }
    
    function get_relacion($tipo_relacion,$primary_key){
        
        $this->db->select('*');
        $this->db->from('relacion');
        $this->db->join('persona','relacion.idsegunda = persona.id','left outer');
        $this->db->join('tiporelacion','relacion.tiporelacion = tiporelacion.id','left outer');
        $this->db->where('idprimera',$primary_key);
        
        if($tipo_relacion){
          
            $this->db->where('tiporelacion.nombre',$tipo_relacion);
          
        }
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
        
    }
    function get_escuela_persona($persona="",$cargo=""){
        
        $this->db->select('escuela.id, escuela.numero');
        $this->db->from('escuelapersona');
        $this->db->join('escuela','escuelapersona.escuela = escuela.id','left outer');
        $this->db->join('tiporelacion_esc','escuelapersona.tiporelacion_esc = tiporelacion_esc.id','left outer');
        $this->db->where('escuelapersona.persona',$persona);
        $this->db->where('tiporelacion_esc.nombre',$cargo);
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
        
    }
    
    function get_persona($persona=""){
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where('id',$persona);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data;
    }
    
    function get_alumno($apenom="",$dni=""){
        $this->db->select('persona.apellido, persona.nombre, persona.dni');
        $this->db->from('persona');
        $this->db->join('alumno','alumno.persona = persona.id','inner');
        if($apenom){
            $this->db->like('persona.apellido',$apenom,'both');
            $this->db->or_like('persona.nombre',$apenom,'both');
            
            }
        if($dni) $this->db->like('dni',$dni);
        $this->db->limit(7);
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
        
    }
    function get_alumno_criteria($apellido="",$nombre="",$dni=""){
       
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->join('alumno','alumno.persona = persona.id','inner');
        $this->db->where('persona.apellido',$apellido);
        $this->db->where('persona.nombre',$nombre);
        $this->db->where('persona.dni',$dni);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data;
        
        
        
    }
}

?>
