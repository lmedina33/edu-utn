<?php $this->load->view('template/header');?>

<section>
   <div class="central">
     <div class="container-fluid">
         <ul class="breadcrumb">
           <legend>
               <p><h3>Modificación de contraseña</h3></p> 
               
           </legend>
       </ul>
         <?php if(isset($exito)){?>
         <div class="alert alert-success">
            Su contraseña fué actualizada correctamente.
          </div>
         <?php }else{?>
         <form method="POST" action="<?php echo site_url('persona/edit_user');?>">
             
             <p><label>Contraseña actual</label><input type="password" name="old_pass" placeholder="Escriba su contraseña actual"></p> 
             <p><label>Contraseña nueva</label><input type="password" name="new_pass" placeholder="Escriba su nueva contraseña"></p>
             <p><input type="password" name="new_pass1" placeholder="Repita su nueva contraseña"></p>
             <span class="help-block">La contraseña debe tener al menos 8 caracteres.</span>
              <?php if(validation_errors()){ ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php echo validation_errors(); ?>
                         </div> 
              <?php }?>  
                <button type="submit" class="btn">Grabar</button>
         </form>
         <?php }?>
    </div>
   </div>    
</section>

<?php $this->load->view('template/footer');?>
