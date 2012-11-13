<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Cursado extends CI_Controller {
    //put your code here   
    var $sesion_usuario;
    var $sesion_permiso;

    // declaramos el constructor
    function __construct()
	{
		parent::__construct();
                 
                // cargamos la libreria session y obtenemos los valores de la session  
        	$this->load->library('session');
                $this->sesion_usuario = $this->session->userdata('logged_in');
                $this->sesion_permiso = $this->session->userdata('rol');
                
    }
    function notas($division=""){
       
       $this->load->model('cursado_model');
       // cargamos el modelo de escuela 
       
       $inscriptos = $this->cursado_model->get_inscriptos_division($division);
       $data['curso'] = $this->cursado_model->get_datos_curso($division);
       $data['division'] = $division;
       $i=0;
      // print_r($inscriptos);exit;
       foreach ($inscriptos as $inscripto):
           $data['alumnos'][$i]['datos'] = $inscripto;
           // generamos un arreglo con los datos de la divisiones
           $data['alumnos'][$i]['notas'] = $this->cursado_model->get_notas_comp($inscripto['id']);
           $i++;
       endforeach;
      // print_r($data); exit;
       
       // cargamos la pantalla de fin de cursado
       $this->load->view('v_notas',$data);
    }
    
    function calcular_notas($division="",$tipo=0){
        $this->load->model('cursado_model');
        $cursados = $this->cursado_model->get_cursado_division($division);
        
        foreach ($cursados as $curso):
         //   print_r('curso: '.$curso['id']); print_r('<br />');
            $inscriptos = $this->cursado_model->get_inscriptos_cursado($curso['id']);
           
            foreach ($inscriptos as $inscripcion):
                 
            $T1=0;
            $T2=0;
            $T3=0;
            $G=0;
            $F=0;
             //   print_r('inscripto: '.$inscripcion['id']); print_r('<br />');
                $notas = $this->cursado_model->get_notas($inscripcion['id']);
                foreach ($notas as $nota):
              //      print_r('nota tipo: '.$nota['tipo']. ' nota valor:'.$nota['valor']); print_r('<br />');
                    switch ($nota['tipo']):
                        case 'T1':
                            $T1 = $nota['valor'];
                            break;
                        case 'T2':
                            $T2 = $nota['valor'];
                            break;
                        case 'T3':
                            $T3 = $nota['valor'];
                            break;
                        case 'G1':
                            $G = $nota['valor'];
                            break;
                    endswitch;
                endforeach;
                
                if($tipo == 0){
                 //(T1+T2+T3+G)/4
                    $F = ($T1 + $T2 + $T3 + $G)/4;
                    //print_r($T1 .' - '. $T2.' - '. $T3.' - '. $G);
                }
                else if($tipo == 1){
                //(T1+T2+T3)/3*0.4+G*0.6
                   $F = ($T1 + $T2 + $T3 )/3 * 0.4 + $G * 0.6 ;
                }
            //     print_r('nota tipo: Final Nota valor:'.$F); print_r('<br />'); 
               // print_r('Nota:'.$F. 'Inscripto:' .$inscripcion['id']); exit;
                $this->cursado_model->set_nota_final($inscripcion['id'],'F',$F);
            endforeach;
        
        endforeach;
        $output_string = 'Las notas fueron generadas correctamente';
        echo json_encode($output_string);
    }
    
}
?>
