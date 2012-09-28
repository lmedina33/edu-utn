<?php $this->load->view('template/header');?>
  <link href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript"> 

$(document).ready(function() {

    $(function() {
        $( "#autocomplete" ).autocomplete({
           source: function(request, response) {
              
                $.ajax({ url: "<?php echo site_url('persona/get_alumno'); ?>",
                data: { term: $("#autocomplete").val()},
                dataType: "json",
                type: "POST",
                success: function(data){
                    
                    response(data);
                }
            });
       },
       minLength: 2
        });
    });
    
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
  
});


</script>
<section>
    
    <div class="central">
     <div class="container-fluid">
         <p><h3>Finalización de Cursado</h3></p> 
     <form name="form" method="post" action="">
      <?php foreach ($cursos as $curso) { ?> 
       <ul class="breadcrumb">
           <legend>
               <h4> 
                   <?php echo $curso['datos']['anio'] ?>º año, división <?php echo $curso['datos']['nombre']?>
                   <small>- Turno: <?php echo $curso['datos']['turno'] ?> - Plan de estudios: <?php echo $curso['datos']['plan'] ?></small>
                </h4>
           </legend>
       </ul>
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
                        <th colspan="2" style="text-align: center;"><a name="example" href="#" rel="toltip" data-original-title="Debe seleccionar todos los alumnos para finalizar el cursado.">Estado de fin de cursado</a></th>
                        
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
                        <td style="text-align: center;"><input type="radio" name="check<?php echo $i;?>" id="check<?php echo $i;?>" value="p-<?php echo $inscrip['id'];?>" checked="checked" /> </td>
                        <td style="text-align: center;"><input type="radio" name="check<?php echo $i;?>" id="check<?php echo $i;?>" value="r-<?php echo $inscrip['id'];?>" /> </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach;?>
                    <?php }?>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="2">
                            
                               
                                
                                <select>
                                   
                                 <?php if(count($curso['mayores'])>0){?>
                                    <?php foreach($curso['mayores'] as $curso):?>
                                    
                                    <option><?php echo $curso['anio'] .'º - '. $curso['nombre']?></option>
                                    <?php endforeach;?>
                                   <?php } else {?>
                                    <option>Egresar del colegio</option>
                                   <?php }?>
                                
                                 </select>
                         <input type="hidden" name="curso" id="curso" value="" />
                         </td>
                    </tr>
                </tbody>
            </table>
           
            </div>
        </div>
         <?php }?>
     </form>
        </div>
      
    </div>
      
</section>
<?php $this->load->view('template/footer');?>
