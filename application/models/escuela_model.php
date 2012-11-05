<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of escuela_model
 *
 * @author gsiman
 */
class escuela_model extends CI_Model{
    
    //put your code here
    
    function get_datos_escuela($escuela=""){
        $this->db->select('escuela.nombre,escuela.id, escuela.cue, escuela.direccion, escuela.numero, escuela.telefono, DATE_FORMAT(escuela.fechaResolucion, "%d/%m/%y") as fechaResolucion, escuela.fechaCreacion, escuela.fechaCierre, nivel.nombre as nivel_nombre, especialidad.nombre as especialidad_nombre, localidad.nombre as localidad_nombre, departamento.nombre as departamento_nombre',FALSE);
        $this->db->from('escuela');
            $this->db->join('nivel','escuela.nivel = nivel.id','left outer');
            $this->db->join('especialidad','escuela.especialidad = especialidad.id','left outer');
            $this->db->join('localidad','escuela.localidad = localidad.id','left outer');
            $this->db->join('departamento','escuela.departamento = departamento.id','left outer');
            
        $this->db->where('escuela.id',$escuela);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data;
    }
 
    function get_planestudio_division($division=""){
       
        $this->db->select('planestudio');
        $this->db->from('division');
        $this->db->where('id',$division);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data['planestudio'];
        
    }
    
    
    function get_nivel($escuela=""){
        $this->db->select('nivel');
        $this->db->from('escuela');
        $this->db->where('id',$escuela);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data['nivel'];
    }
    
    function get_divisiones($escuela=""){
        $this->db->select('id');
        $this->db->from('division');
        $this->db->where('division.escuela',$escuela);
        $this->db->where('fechaBaja is null');
        $this->db->order_by('anio','asc');
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
              
    }
    function get_datos_division($division=""){
        $this->db->select('*');
        $this->db->from('division');
        $this->db->where('division.id',$division);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data;
        
    }
    
    
}


?>
