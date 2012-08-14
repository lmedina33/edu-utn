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
        <meta name="description" content="Login a Mi Escuela Virtual" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="" />
      
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/login/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/login/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/login/css/animate-custom.css" />
    </head>
 <body>
  <div id="container_demo" >
    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
        <div id="login" class="animate form">
            <form  action="<?php echo site_url('login/process');?>" autocomplete="on" method="post"> 
                <h1>Acceso a Mi Escuela Virtual</h1> 
                <p> 
                    <label for="username" class="uname" data-icon="u" > Tu email o usuario </label>
                    <input id="username" name="username" required="required" type="text" placeholder="minombreusuario o mimail@mail.com"/>
                </p>
                <p> 
                    <label for="password" class="youpasswd" data-icon="p"> Tu contraseña </label>
                    <input id="password" name="password" required="required" type="password" placeholder="je. X8df!90EO" /> 
                </p>
              
                <p class="login button"> 
                    <input type="submit" value="Acceder" /> 
                </p>
                <p>
                    <?php if(isset($error))
                    {
                    ?>
                    <div class="error">
                    <?php 
                    echo $error;
                    ?>
                    </div>
                    <?php 
                    }
                    echo validation_errors(); 
                    ?>
                </p>
            </form>
        </div>
       
    </div>
</div>  
 </body>
</html>
