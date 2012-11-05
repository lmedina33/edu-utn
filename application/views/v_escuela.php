<?php $this->load->view('template/header');?>

<section>
    
    <div class="central">
        <ul class="breadcrumb">
           <legend>
                <h3> 
                   <?php if(isset($titulo)) echo $titulo ; ?>
                   <small></small>
                </h3>
               
           </legend>
             <p><?php if(isset($html_inf)) echo $html_inf ; ?></p>
       </ul>
        
       <br />
       <div class="dataTable well row" style="margin-left: 1px;"> 
           <div class="container-fluid ">
           <div class="row-fluid">
           <div class="span6 " >
            
               <p><strong>Nombre:</strong><?php echo $escuela['nombre']; ?></p><br />
                <p><strong>Número:</strong> <?php echo $escuela['numero']; ?></p><br />
                <p><strong>CUE: </strong><?php echo $escuela['cue']; ?></p><br />
                <p><strong>Especialidad: </strong><?php echo $escuela['especialidad_nombre']; ?></p><br />
                <p><strong>Nivel: </strong><?php echo $escuela['nivel_nombre']; ?></p><br />
                <p><strong>Dirección:</strong> <?php echo $escuela['direccion']; ?></p><br />
                <p><strong>Localidad: </strong><?php echo $escuela['localidad_nombre']; ?></p><br />
                <p><strong>Departamento:</strong><?php echo $escuela['departamento_nombre']; ?></p><br />
                <p><strong>Teléfono:</strong> <?php echo $escuela['telefono']; ?></p><br />
                <p><strong>Fecha de Resolución: </strong><?php echo $escuela['fechaResolucion']; ?></p><br />
               
              </div>
           </div>
           </div>
      </div>
    </div>
        
</section>
<?php $this->load->view('template/footer');?>
