<?php $this->load->view('template/header');?>
  <link href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript"> 

$(document).ready(function() {

   
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
         <p><h3>Notas del Cursado:</h3></p> 
     
       <ul class="breadcrumb">
           <legend>
               <h4> 
                   <button type="button" class="btn btn-large btn-primary disabled" disabled="disabled">
                        <?php echo $curso['anio'] ?>º año, división <?php echo $curso['nombre']?>
                       
                   </button>
                   <small>Turno: <?php echo $curso['turno'] ?> - Plan de estudios: <?php echo $curso['plan'] ?></small>
                </h4>
           </legend>
           
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
                        <th colspan="3">Notas</th>
                    </tr>
                    <tr>
                        <th>Materia</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php 
                    $i=1; 
                   foreach($alumnos as $alumno):
                    $cant_notas = count($alumno['notas']) + 1;
                    ?>
                    <tr >
                        <td rowspan="<?php echo $cant_notas; ?>"><?php echo $i; ?></td>
                        <td rowspan="<?php echo $cant_notas; ?>"><?php echo $alumno['datos']['apellido'];?></td>
                        <td rowspan="<?php echo $cant_notas; ?>"><?php echo $alumno['datos']['nombre']?></td>
                        <td rowspan="<?php echo $cant_notas; ?>"><?php echo $alumno['datos']['dni']?></td>
                    </tr>
                        <?php foreach ($alumno['notas'] as $nota):?>
                        <tr>
                            <td><?php echo $nota['nombre']?></td>
                            <td><?php echo $nota['tipo']?></td>
                            <td><?php echo $nota['valor']?></td>
                        </tr>
                    
                       <?php endforeach;?>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
           
            </div>
            <button name="calcnota-<?php echo $division;?>" class="btn btn-primary btn-large" type="button">Calcular Notas Finales</button>
        </div>
         </ul>  
  
       
        </div>
    
    </div>
    <div id="notafinal">
        
    </div> 
</section>
<?php $this->load->view('template/footer');?>
