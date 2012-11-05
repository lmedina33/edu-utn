<!DOCTYPE HTML>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Pluma</title>


   <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap-responsive.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url();?>js/acordion/css/skins/clean.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>css/body.css" rel="stylesheet" type="text/css"> 
   <link href="<?php echo base_url();?>js/acordion/css/dcaccordion.css" rel="stylesheet" type="text/css" />
   <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
   

</head>

<body>
<div class="container1">
 
  <header>
  <!-- Barra Superior -->
  
  <div class="navbar">
     
  <div class="navbar-inner">
    <img class="brand" src="<?php echo base_url('images/logo.png');?>" width="80px" class="img-rounded">
    <a class="brand" href="#"></a>
       <div class="btn-group pull-right">
        <a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i> Usuario</a>
        <a class="btn btn-primary" data-toggle="dropdown" href="#"><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('persona/edit_user');?>"><i class="icon-pencil"></i> Cambiar contraseña</a></li>
            <li><a href="<?php echo site_url('login/logout');?>"><i class="icon-ban-circle"></i> Salir</a></li>
           <li class="divider"></li>
           <li><a href="#myModal2" data-toggle="modal"><i class="icon-pencil"></i>Modificar datos personales.</a></li>
     </div>
  </div>
        
</div>
    
    
  
  </header>
    <?php $rol  = $this->session->userdata('rol'); //print_r($rol);exit; ?>
    <?php $persona = $this->session->userdata('logged_in');?>
  <div class="sidebar1">
    <p>
      <!-- Barra lateral Izquierda-->
        <div class="clean demo-container">
        <ul class="accordion"  id="accordion-5">
            <li><a href="<?php echo site_url('inicio/home') ?>">Inicio</a></li>
            <li>
                <a href="#">Escuela</a>
                <ul>
                    <li><a href="<?php echo site_url('escuela/abm') ?>">Gestionar Escuela</a></li>
                </ul>
               <?php if($rol['rol']==2){?>   
                <ul>
                    <li><a href="<?php echo site_url('escuela/division') ?>">Cursos y Divisiones</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('escuela/fin_cursado') ?>">Finalizar Cursado Anual</a></li>
                </ul>
               <?php }?> 
            </li>
          <?php if($rol['rol']==2){?>       
            <li>
                <a href="#">Alumnos</a>
                <ul>
                    <li><a href="<?php echo site_url('escuela/alumnos') ?>">Listado de Alumnos</a></li>
                </ul>
           </li>
         <?php }?>
         <?php if($rol['rol']==1){?>       
            <li>
                <a href="#">Curriculares</a>
                <ul>
                    <li><a href="<?php echo site_url('plan_estudio/abm') ?>">Planes de Estudio</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('materia/abm') ?>">Materias</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('especialidad/abm') ?>">Especialidades</a></li>
                </ul>
           </li>
         
             <li>
                <a href="#">Personas</a>
                <ul>
                    <li><a href="<?php echo site_url('persona/abm/persona') ?>">Todas</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('persona/abm/directivo') ?>">Directivos</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('persona/abm/docente') ?>">Docentes</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('persona/abm/alumno') ?>">Alumnos</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('persona/abm/padre') ?>">Padres</a></li>
                
                </ul>
           </li>
         <?php }?>
         <?php if($rol['rol']==1){?>         
            <li>
                <a href="#">Usuarios y Permisos</a>
                <ul>
                    <li><a href="<?php echo site_url('admin/usuarios') ?>">Administrar Usuarios</a></li>
                </ul>
            </li>
        <?php }?>
        </ul>
        </div>
      
      <!-- end .sidebar1 -->
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
   
  </div>
     <div id="myModal2" class="modal-datos hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Modificar datos Personales</h3>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo site_url('persona/abm/mod/1/edit/'.$persona['persona']);?>" width="930" height="700" frameborder="0"></iframe>
            </div>
        <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
        </div>
        </div>
  <article class="content">
      <div class="container">
         <div class="hero-unit">
            
            <?php if($rol['rol']==2){
                $escuela = $this->session->userdata('escuela');
                ?>
             <div class="navbar ">
                <div class="navbar-inner">
                    <a class="brand" href="#">Escuela Nº <?php echo $escuela['numero'].' '.$escuela['nombre'];?></a>
                </div>
                </div>
          
             <?php }?>
