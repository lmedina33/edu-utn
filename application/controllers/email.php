<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author gonza
 */
class email extends CI_Controller{
    //put your code here
      function __construct(){
          
        parent::__construct();
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['charset'] = "utf-8"; 
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_user'] = "pluma.mendoza@gmail.com";
        $config['smtp_pass'] = "pluma2012";
        $config['smtp_port'] = "465";
        $config['mailtype'] = "html";
        $config['wordwrap'] = FALSE;

        $this->email->initialize($config);
        
    }
    function index(){
        
    }
    
   
    
    function send_mail($to="gonzasiman@gmail.com",$subject="asd",$mensaje=""){
        
        $this->email->from('pluma.mendoza@gmail.com', 'Pluma, tu Escuela Virtual');
        $this->email->to($to); 
      //  $this->email->cc('another@another-example.com'); 
        $this->email->bcc('pluma.mendoza@gmail.com'); 

        $this->email->subject($subject);
    
        
        $this->email->message($mensaje);	

        $this->email->send();

       // echo $this->email->print_debugger();
        
    }
}

?>
