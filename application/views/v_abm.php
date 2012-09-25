<?php $this->load->view('template/header');?>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<section>
    
    <div class="central">
        <ul class="breadcrumb">
           <legend>
                <h3> 
                   <?php if(isset($titulo)) echo $titulo ; ?>
                   <small></small>
                </h3>
           </legend>
       </ul>
        
       <br />
        <p><?php echo $output; ?></p>
        <p><?php if(isset($html_inf)) echo $html_inf ; ?></p>
    </div>
        
</section>
<?php $this->load->view('template/footer');?>
