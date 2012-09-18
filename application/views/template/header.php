<!DOCTYPE HTML>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Mi Escuela Virtual</title>


   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

<link href="<?php echo base_url();?>css/body.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>js/acordion/css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo base_url();?>js/acordion/js/jquery.cookie.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/acordion/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/acordion/js/jquery.dcjqaccordion.2.7.min.js'></script>
<script type="text/javascript">
$(document).ready(function($){
					$('#accordion-5').dcAccordion({
						eventType: 'hover',
						autoClose: false,
						saveState: true,
						disableLink: true,
						menuClose: true,
						speed: 'fast',
						showCount: true
					});
				
});
</script>
<link href="<?php echo base_url();?>js/acordion/css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/acordion/css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/acordion/css/skins/grey.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<div class="container1">
 
  <header>
  <!-- Barra Superior -->
  
  <div class="navbar">
     
  <div class="navbar-inner">
    <img class="brand" src="<?php echo base_url('images/pluma.jpg');?>" class="img-rounded">
    <a class="brand" href="#">Pluma</a>
     <div class="btn-group pull-right">
        <a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i> Usuario</a>
        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-pencil"></i> Editar</a></li>
            <li><a href="#"><i class="icon-ban-circle"></i> Salir</a></li>
          
     </div>
  </div>
        
</div>
    
    
  
  </header>

  <div class="sidebar1">
    <p>
      <!-- Barra lateral Izquierda-->
        <div class="grey demo-container">
        <ul class="accordion"  id="accordion-5">
            <li><a href="<?php echo site_url('inicio') ?>">Inicio</a></li>
            <li>
                <a href="#">Escuela</a>
                <ul>
                    <li><a href="<?php echo site_url('escuela/abm') ?>">Gestión Escuela</a></li>
                </ul>
            </li>
                <li>
                <a href="<?php echo site_url('abm/plan_estudio'); ?>">Curriculares</a>
                <ul>
                    <li><a href="<?php echo site_url('abm/plan_estudio') ?>">Planes de Estudio</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('abm/materia') ?>">Materias</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('abm/especialidad') ?>">Especialidades</a></li>
                </ul>
           </li>
             <li>
                <a href="#">Personas</a>
                <ul>
                    <li><a href="<?php echo site_url('abm/persona') ?>">Listar Personas</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('abm/persona/directivo') ?>">Directivos</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('abm/persona/docente') ?>">Docentes</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo site_url('abm/persona/alumno') ?>">Alumnos</a></li>
                <ul>
                    <li><a href="<?php echo site_url('abm/persona/padre') ?>">Padres</a></li>
                </ul>
                </ul>
           </li>
            <li>
                <a href="#">Usuarios y Permisos</a>
                <ul>
                    <li><a href="<?php echo site_url('admin/usuarios') ?>">Administrar Usuarios</a></li>
                </ul>
            </li>

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
  <article class="content">
      <div class="container">
         <div class="hero-unit">
      