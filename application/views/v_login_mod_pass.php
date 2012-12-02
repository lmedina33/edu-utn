<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Acceso a Mi Escuela Virtual</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login a Pluma" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="" />
      
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/login/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/login/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/login/css/animate-custom.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
        <style>
            #fondo{
               width: 100%;
               height: 100%;
            }
         #img {
            position: fixed;
            z-index: -20;
            heigth: 700px;
            margin-left: -180px;
            margin-top: -150px;
            top: 50%;
            left: 50%;
            opacity:0.1;
            
            
            }

        </style>
    </head>
 <body>
  <div id="container_demo" >
    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
        
        <div id="login" class="animate form">
            <div id="fondo">
                <img id="img" src="<?php echo base_url('images/pluma.png');?>"/>

             <form method="POST" action="<?php echo site_url('login/edit_user');?>">
                <h1>Acceso a Pluma</h1>
                <h4>  <?php if(isset($mensaje)) echo $mensaje; ?></h4>
                <p> 
                    <label for="old_pass" class="youpasswd" data-icon="p" >Contraseña actual </label>
                    <input id="old_pass" name="old_pass" required="required" type="password" placeholder="Escriba su contraseña actual."/>
                </p>
                <p> 
                    <label for="new_pass" class="youpasswd" data-icon="p">Contraseña nueva</label>
                    <input id="new_pass" name="new_pass" required="required" type="password" placeholder="Escriba su nueva contraseña." /> 
                </p>
                  <p> 
                    <label for="new_pass1" class="youpasswd" data-icon="p">Repita su contraseña nueva</label>
                    <input id="new_pass1" name="new_pass1" required="required" type="password" placeholder="Repita su nueva contraseña." /> 
                </p>
                <p>
                 
                    <?php if( validation_errors() ){?>
                      <div class="alert alert-error">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php                  
                            echo validation_errors(); 
                            ?>
                   </div>
                <?php }?>
                </p>
                <p class="login button"> 
                    <input type="submit" value="Guardar" /> 
                </p>
                
            </form>
        </div>
        </div> 
    </div>
</div>
      <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
     <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

 </body>
</html>
