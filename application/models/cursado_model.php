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
class cursado_model extends CI_Model{
    //put your code here
    
    function get_cursado_division($division=""){
        $this->db->select('*');
        $this->db->from('cursado');
        $this->db->where('division',$division);
        $this->db->where('fechaBaja is null');
        
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
        
    }
    
    function get_cursado($division="",$materia=""){
        $this->db->select('*');
        $this->db->from('cursado');
        $this->db->where('division',$division);
        $this->db->where('materia',$materia);
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
    }
    
    
    function insert_cursado($cursado=""){
        $this->db->insert('cursado',$cursado);
        return true;
    }
    
    function get_inscriptos_division($division=""){
        $this->db->select('persona.id, persona.nombre, persona.apellido, persona.dni');
        $this->db->distinct('persona.id');
        $this->db->from('cursado');
        $this->db->join('inscripcionalumno','cursado.id = inscripcionalumno.cursado','inner');
        $this->db->join('alumno','inscripcionalumno.alumno = alumno.id','left outer');
        $this->db->join('persona','alumno.persona = persona.id','left outer');
        $this->db->where('cursado.division',$division);
        $this->db->where('inscripcionalumno.fechaBaja is null');
        //$this->db->group
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
        
    }
    
    function get_datos_curso($division=""){
        $this->db->select('division.nombre, division.anio, turno.nombre as turno, plandeestudio.nombre as plan');
        $this->db->from('division');
        $this->db->join('turno','division.turno = turno.id','left outer');
        $this->db->join('plandeestudio','division.planestudio = plandeestudio.id','left outer');
        $this->db->where('division.id',$division);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data;
    }
    
    function get_cursos_activos($escuela=""){
        $this->db->select('distinct(division.id as division, cursado.id as cursado)');
        $this->db->from('division');
        $this->db->join('cursado','cursado.division = division.id','left outer');
        $this->db->where('division.escuela',$escuela);
        $this->db->where('cursado.fechaBaja is null');
        
        $query = $this->db->get();
        $data = $query->result_array();
        
        return $data;
   }
    
    function get_cursos_mayores($division){
        $this->db->select('anio, escuela');
        $this->db->from('division');
        $this->db->where('id',$division);
        $query = $this->db->get();
        $data = $query->row_array();
        
        $this->db->select('id, anio, nombre');
        $this->db->from('division');
        $this->db->where('anio >',$data['anio']);
        $this->db->where('anio <=',$data['anio']+1);
        $this->db->where('escuela',$data['escuela']);
        
        $query1 = $this->db->get();
        $datos = $query1->result_array();
        
        return $datos;
       
    }
    
     function finalizar_cursado($division){
        
        /*
         * 
         * Consulta para cuando existen 2 cursados activos
            update cursado as c 
            left join cursado as c2 on c.materia = c2.materia and c.division = c2.division 
            set c.fechaBaja = now() 
            where c.division = 19  and c.fechaAlta < c2.fechaAlta
         * 
         */
        $this->db->select('materia, division, count(*) as cantidad');
        $this->db->from('cursado');
        $this->db->where('cursado.division',$division);
        $this->db->where('cursado.fechaBaja is null');
        $this->db->group_by('materia, division');
        $query = $this->db->get();
        $cursados = $query->result_array();
        
        foreach($cursados as $curso):
            if($curso['cantidad']>1){
                
                $this->db->select('id');
                $this->db->from('cursado');
                $this->db->where('division',$division);
                $this->db->where('materia',$curso['materia']);
                $this->db->where('cursado.fechaBaja is null');
                $this->db->order_by('id','asc');
                $this->db->limit('1');
                $query1 = $this->db->get();
                $data = $query1->row_array();
                
                $this->db->set('fechaBaja',date("Y-m-d"));
                $this->db->where('id',$data['id']);
                $this->db->update('cursado');
            }
        else {
            $this->db->set('fechaBaja',date("Y-m-d"));
            $this->db->where('division',$division);
            $this->db->where('materia',$curso['materia']);
            $this->db->where('fechaBaja is null');
            $this->db->update('cursado');
        }    
            
        endforeach;
                 
    }
    
    
}

?>
