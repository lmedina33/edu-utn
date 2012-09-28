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
}


?>
