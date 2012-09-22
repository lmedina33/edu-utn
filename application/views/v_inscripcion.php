<?php $this->load->view('template/header');?>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
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
});


</script>
<section>
    
    <div class="central">
     <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <form method="post" action="<? echo site_url('escuela/inscripcion/'.$division); ?>">
                        <legend>Inscripcion a Cursado:</legend>
                        <label>Alumno:</label>
                        <span class="help-block">(Apellido, Nombre - Documento)</span>
                         <p class="span8"> <input type="text" placeholder="Busque al alumno…"  id="autocomplete" name="alumno" rel="tooltip" data-placement="bottom" title="Escriba apellido, nombre o documento"> </p> 
                         <p >  <button  href="#myModal" role="button" class="btn btn-info" data-toggle="modal">Alumnos...</button></p> 
                         <p>
                             <button type="submit" class="btn  icon-arrow-right"> Inscribir</button>
                         </p>    
                         <p>
                              <?php if(validation_errors()){ ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo validation_errors(); ?>
                                </div> 
                               <?php }?>
                             
                         </p>  
                      
                        
                        <input type="hidden" value="<?php echo $division;?>" name="division"/>
                  </form>
            <!--Sidebar content-->
           <br />
         
           
 </div>
            <div class="span6">
                 <legend>Alumnos inscriptos:</legend>
            <!--Body content-->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($inscriptos)){?>
                    <?php foreach($inscriptos as $inscrip): ?>
                    <tr>
                        <td><?php echo $inscrip['apellido']?></td>
                        <td><?php echo $inscrip['nombre']?></td>
                        <td><?php echo $inscrip['dni']?></td>
                    </tr>
                    <?php endforeach;?>
                    <?php }?>
                </tbody>
            </table>
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
                <iframe src="<?php echo site_url('persona/abm/alumno/1');?>" height="700px" width="900px"></iframe>
            </div>
        <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
        </div>
        </div>
</section>
<?php $this->load->view('template/footer');?>
