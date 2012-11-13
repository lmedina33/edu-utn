<?php $this->load->view('template/header');?>
  <link href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript"> 

$(document).ready(function() {

   
    $("input[name=checktodos]").change(function(){
		$('input[name*=check]').each( function() {			
			if($("input[name=checktodos]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
     
   $('a[name*=example]').tooltip()
   
   $('button[name*=calcnota]').click(function(){
       ///alert(this.name);
       nombre = this.name;
       valores = nombre.split('-');
       url = '<?php echo site_url('cursado/calcular_notas');?>';
       $.ajax({
            url: url+'/'+valores[1] ,
            type: 'POST',
            dataType: 'json',
            success:
                function(output_string){
                      if( confirm(output_string) ) { //show confirm dialog
                           location.reload(); //do nothing if cancel is clicked (prevent the browser from following clicked link)
                         }
                   }
        })
       // location.reload();
       //alert(valores[1]);
     
   })
});


</script>
<section>
    
    <div class="central">
     <div class="container-fluid">
         <p><h3>Finalización de Cursado</h3></p> 
     <form name="form" method="post" action="<?php echo site_url('escuela/finalizar_cursado');?>">
      <?php foreach ($cursos as $curso) { ?> 
       <ul class="breadcrumb">
           <legend>
               <h4> 
                   <button type="button" class="btn btn-large btn-primary disabled" disabled="disabled">
                        <?php echo $curso['datos']['anio'] ?>º año, división <?php echo $curso['datos']['nombre']?>
                       
                   </button>
                   <small>Turno: <?php echo $curso['datos']['turno'] ?> - Plan de estudios: <?php echo $curso['datos']['plan'] ?></small>
                </h4>
           </legend>
           <input type="hidden" name="origen-<?php echo $curso['division'];?>" value="origen-<?php echo $curso['division'];?>" />
        <div class="row-fluid">
          
           <div class="span12">
           
            <!--Body content-->
            <table class="table table-striped table-bordered" >
                <thead >
                    <tr >
                        <th rowspan="2">#</th>
                        <th rowspan="2">Apellido</th>
                        <th rowspan="2">Nombre</th>
                        <th rowspan="2">Documento</th>
                        <th colspan="2" style="text-align: center;"><a name="example" href="#" rel="toltip" data-original-title="Debe seleccionar el estado de fin de curso de cada alumno inscripto.">Estado de fin de cursado</a></th>
                        
                    </tr>
                    <tr>
                        <th width="70" style="text-align: center;"><a name="example" href="#" rel="toltip" data-original-title="Seleccione los alumnos que promocionan el cursado">Promociona</a></th>
                        <th width="70" style="text-align: center;"><a name="example" href="#" rel="toltip" data-original-title="Seleccione los alumnos que repiten el cursado">Repite</a></th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php if(isset($curso['inscriptos'])){?>
                    <?php foreach($curso['inscriptos'] as $inscrip): ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $inscrip['apellido']?></td>
                        <td><?php echo $inscrip['nombre']?></td>
                        <td><?php echo $inscrip['dni']?></td>
                        <td style="text-align: center;"><input type="radio" name="check<?php echo $i;?>-<?php echo $curso['division'];?>" id="check<?php echo $i;?>" value="p-<?php echo $inscrip['alumno'];?>" checked="checked" /> </td>
                        <td style="text-align: center;"><input type="radio" name="check<?php echo $i;?>-<?php echo $curso['division'];?>" id="check<?php echo $i;?>" value="r-<?php echo $inscrip['alumno'];?>" /> </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach;?>
                    <?php }?>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="2">
                            
                               
                                
                              <select name="pase-<?php echo $curso['division'];?>">
                                   
                                 <?php if(count($curso['mayores'])>0){?>
                                    <?php foreach($curso['mayores'] as $curso_m):?>
                                    
                                    <option value="destino-<?php echo $curso_m['id']?>"><?php echo $curso_m['anio'] .'º - '. $curso_m['nombre']?></option>
                                    <?php endforeach;?>
                                   <?php } else {?>
                                    <option value="destino-egreso">Egresar del colegio</option>
                                   <?php }?>
                                
                                 </select>
                      
                         </td>
                    </tr>
                </tbody>
            </table>
           
            </div>
            <button name="calcnota-<?php echo $curso['division'];?>" class="btn btn-primary btn-large" type="button">Calcular Notas Finales</button>
        </div>
         </ul>  
        
         <?php }?>
         
         <button class="btn btn-primary btn-inverse btn-large" type="submit">Finalizar Cursado</button>
     </form>
       
        </div>
    
    </div>
    <div id="notafinal">
        
    </div> 
</section>
<?php $this->load->view('template/footer');?>
