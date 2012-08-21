<?php $this->load->view('template/header');?>

<?php 
foreach($output['css_files'] as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($output['js_files'] as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<section>
    
    <div class="central">
        <?php if($html_sup) echo $html_sup ; ?>
        <?php echo $output['output']; ?>
        <?php if($html_inf) echo $html_sup ; ?>
    </div>
        
</section>
<?php $this->load->view('template/footer');?>
