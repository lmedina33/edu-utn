<?php $this->load->view('template/header');?>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<section>
    
    <div>
        <?php echo $output; ?>
    </div>
        
</section>
<?php $this->load->view('template/footer');?>
