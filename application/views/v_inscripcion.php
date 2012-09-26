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
     
      $("input[name=repetodos]").change(function(){
		$('input[name*=repe]').each( function() {			
			if($("input[name=repetodos]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
});


</script>
<section>
    
    <div class="central">
     <div class="container-fluid">
       <ul class="breadcrumb">
           <legend>
               <p><h3>Matrícula de alumnos</h3></p> 
               <h4> 
                   <?php echo $curso['anio'] ?>º año, división <?php echo $curso['nombre']?>
                   <small>- Turno: <?php echo $curso['turno'] ?> - Plan de estudios: <?php echo $curso['plan'] ?></small>
                </h4>
           </legend>
       </ul>
        <div class="row-fluid">
            <div class="span6">
                <form method="post" action="<?php echo site_url('escuela/inscripcion/'.$division); ?>">
                        <legend>Inscripcion a Cursado:</legend>
                        <label>Alumno:</label>
                        <span class="help-block">(Apellido, Nombre - Documento)</span>
                        
                        <div class="input-append">
                            <input type="text" placeholder="Busque al alumno…" size="100" id="autocomplete" name="alumno" rel="tooltip" data-placement="bottom" title="Escriba apellido, nombre o documento"> 
                           <button href="#myModal" role="button" class="btn " data-toggle="modal">Agregar...</button>
                           <button type="submit" class="btn"> Inscribir</button>
                        </div>
                        <?php if(validation_errors()){ ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php echo validation_errors(); ?>
                         </div> 
                        <?php }?>
                        <input type="hidden" value="<?php echo $division;?>" name="division"/>
                 </form>
           <br />
           </div>
           <div class="span12">
                 <legend>Alumnos inscriptos:</legend>
            <!--Body content-->
            <form id="form1" name="form1" method="post" action="<?php echo site_url('escuela/finalizar_cursado/'.$division);?>">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Editar estado</th>
                        <th>Promocionan <p>(seleccionar todos) <input type="checkbox" name="checktodos" value="ON" onchange="" title="Seleccionar todos"/></p></th>
                        <th>Repiten <p>(seleccionar todos) <input type="checkbox" name="repetodos" value="ON" onchange="" title="Seleccionar todos"/></p></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php if(isset($inscriptos)){?>
                    <?php foreach($inscriptos as $inscrip): ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $inscrip['apellido']?></td>
                        <td><?php echo $inscrip['nombre']?></td>
                        <td><?php echo $inscrip['dni']?></td>
                        <td>
                            <div class="btn-toolbar" style="margin: 0;">
                            <div class="btn-group">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">estados ...<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="<?php echo site_url('escuela/modificar_estado_cursado/'.$inscrip['id'].'/abandono/'.$division);?>">Abandono</a></li>
                                  <li><a href="<?php echo site_url('escuela/modificar_estado_cursado/'.$inscrip['id'].'/pase/'.$division);?>">Pase de colegio</a></li>
                                  <li><a href="<?php echo site_url('escuela/modificar_estado_cursado/'.$inscrip['id'].'/cambio/'.$division);?>">Cambio de curso</a></li>
                                  <li class="divider"></li>
                                  <li><a href="<?php echo site_url('escuela/modificar_estado_cursado/'.$inscrip['id'].'/promocion/'.$division);?>">Promoción de curso</a></li>
                                  <li><a href="<?php echo site_url('escuela/modificar_estado_cursado/'.$inscrip['id'].'/repetidor/'.$division);?>">Repetidor de curso</a></li>
                                </ul>
                              </div>
                            </div>
                        </td>
                        <td><input type="checkbox" id="check<?php echo $i;?>" name="check<?php echo $i;?>" value="<?php echo $inscrip['id'];?>" /></td>
                        <td><input type="checkbox" id="repe<?php echo $i;?>" name="repe<?php echo $i;?>" value="<?php echo $inscrip['id'];?>" /></td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach;?>
                    <?php }?>
                    <tr>
                        <td colspan="7">
                            <label>Finalizar cursado y mover alumnos:</label> 
                            <div class="btn-toolbar pull-right" style="margin: 0;">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">cursos ...<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <?php if(count($cursos)>0){?>
                                    <?php foreach($cursos as $curso):?>
                                    <li name="asd" value="123"><a onclick="document.getElementById('curso').value='<?php echo $curso['id'];?>';document.form1.submit();"><?php echo $curso['anio'] .'º - '. $curso['nombre']?></a></li>
                                    <?php endforeach;?>
                                   <?php } else {?>
                                    <li><a onclick="document.getElementById('curso').value='0';document.form1.submit();">Egresar del colegio</a></li>
                                   <?php }?>
                                </ul>
                              </div>
                            </div>
                           <input type="hidden" name="curso" id="curso" value="" />
                         </td>
                    </tr>
                </tbody>
            </table>
            </form>
            </div>
        </div>
        </div>
      
    </div>
       <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Agregar Alumnos</h3>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo site_url('persona/abm/alumno/1');?>" height="700px" width="900px" frameborder="0"></iframe>
            </div>
        <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
        </div>
        </div>
</section>
<?php $this->load->view('template/footer');?>
