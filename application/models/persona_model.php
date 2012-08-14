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
}

?>
