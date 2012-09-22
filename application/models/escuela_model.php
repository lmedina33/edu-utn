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
}


?>
