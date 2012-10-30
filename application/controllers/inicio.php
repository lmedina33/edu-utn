<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicio
 *
 * @author gsiman
 */
class Inicio extends CI_Controller {
    //put your code here   
    
    function index(){
        
       // $this->load->view('v_inicio');
        $this->load->view('frame'); 
    }
    function home(){
        $this->load->view('v_inicio'); 
    }
}

?>
