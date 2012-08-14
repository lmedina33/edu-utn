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
    function get_divisiones($escuela=""){
        
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
    
    function get_planestudio_division($division=""){
       
        $this->db->select('planestudio');
        $this->db->from('division');
        $this->db->where('id',$division);
        
        $query = $this->db->get();
        $data = $query->row_array();
        
        return $data['planestudio'];
        
    }
    
    function insert_cursado($cursado=""){
        $this->db->insert('cursado',$cursado);
        return true;
    }
}


?>
