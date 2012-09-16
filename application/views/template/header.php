<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mi Escuela Virtual</title>
<link href="<?php echo base_url();?>css/body.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>js/acordion/css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
<div class="container">
 
  <header>
  <!-- Barra Superior -->
    <a href="#"><img src="" alt="Insertar logotipo aquí" name="Insert_logo" width="180" height="90" id="Insert_logo" style="background: #C6D580; display:block; background-color: #66CCFF;" /></a>
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <article class="content">