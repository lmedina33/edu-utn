<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Acceso a Mi Escuela Virtual</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login a Mi Escuela Virtual" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="" />
        <script src="<?php echo base_url();?>js/msdropdown/js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/msdropdown/js/jquery.dd.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/msdropdown/dd.css" />
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
            <form  action="<?php echo site_url('login/selecciona_rol');?>" autocomplete="on" method="post"> 
                <h1>Acceso a Mi Escuela Virtual</h1> 
                <p> 
                    <label class="uname" data-icon="u" > Seleccione un rol para loguearse.. </label>
                <p align="center">
                    <select name="webmenu" id="webmenu" onchange="showValue(this.value)" style="width:300px;">
                      
                        <?php foreach($roles as $rol):?>
                        
                            <?php switch ($rol['rol']) {
                                    case '1':
                                        echo ' <option value="'.$rol['id'].'" title="'.base_url().'images/user-admin.png">Administrador</option>';
                                        break;
                                    case '2':
                                         echo ' <option value="'.$rol['id'].'" title="'.base_url().'images/user-directivo.png">Directivo - Esc Nº '.$rol['escuela'].'</option>';
                                        break;
                                    case '3':
                                         echo ' <option value="'.$rol['id'].'" title="'.base_url().'images/user-profesor.png">Docente - Esc Nº</option>';
                                        break;
                                    case '4':
                                         echo ' <option value="'.$rol['id'].'" title="'.base_url().'images/user-alumno.png">Alumno - Esc Nº </option>';
                                        break;
                                    case '5':
                                         echo ' <option value="'.$rol['id'].'" title="'.base_url().'images/user-pama.png">Padre - Madre</option>';
                                        break;
                                }?>
                        
                        
                        <?php endforeach;?>
                       
                    </select>

                   
                  
                    </select>
                </p>
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
             <script language="javascript">
                    $(document).ready(function(e) {
                    try {
                    $("body select").msDropDown();
                    } catch(e) {
                    alert(e.message);
                    }
                    });
            </script>
        </div>
    </div>
</div>  
 </body>
</html>
