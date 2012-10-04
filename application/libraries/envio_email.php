<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of control_permisos
 *
 * @author gonza
 */
class envio_email {
    
   private $ci = '';
    
    // en el constructor de la librería implementamos la función de redireccion al login por si no esta creada la session
    function __construct(){
        $this->ci = &get_instance();
        $this->ci->load->library('email');
        $config['protocol'] = 'smtp';
        $config['charset'] = 'utf-8';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'pluma.mendoza@gmail.com';
        $config['smtp_pass'] = 'pluma2012';
        $config['smtp_port'] = '465';
        $config['mailtype'] = 'HTML';
        $config['wordwrap'] = TRUE;

        $this->ci->email->initialize($config);
    }   

   function send_mail($to="",$subject="",$mensaje=""){        
        
        $this->ci->email->from('pluma.mendoza@gmail.com', 'Pluma, tu Escuela Virtual');
        $this->ci->email->to($to); 
      //  $this->email->cc('another@another-example.com'); 
        $this->ci->email->bcc('pluma.mendoza@gmail.com'); 

        $this->ci->email->subject($subject);
        $this->ci->email->message($mensaje);	

        $this->ci->email->send();

        //print_r($this->email->print_debugger()); exit;
        return true;
   }    
    
}

?>
