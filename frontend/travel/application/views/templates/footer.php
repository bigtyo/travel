

<?php if(isset($watchs))
{
    echo json_encode($watchs);
}
?>
        
	

	
	
	<!-- Nice Scroll -->
	<script src="<?php echo base_url();?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="<?php echo base_url();?>js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
        <script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	<script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery.ui.slider.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="<?php echo base_url();?>js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Masked inputs -->
	<script src="<?php echo base_url();?>js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
	<!-- TagsInput -->
	<script src="<?php echo base_url();?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Datepicker -->
	<script src="<?php echo base_url();?>js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Daterangepicker -->
	<script src="<?php echo base_url();?>js/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>js/plugins/daterangepicker/moment.min.js"></script>
	<!-- Timepicker -->
	<script src="<?php echo base_url();?>js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- Colorpicker -->
	<script src="<?php echo base_url();?>js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- Chosen -->
	<script src="<?php echo base_url();?>js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- MultiSelect -->
	<script src="<?php echo base_url();?>js/plugins/multiselect/jquery.multi-select.js"></script>
	<!-- CKEditor -->
	<script src="<?php echo base_url();?>js/plugins/ckeditor/ckeditor.js"></script>
	<!-- PLUpload -->
	<script src="<?php echo base_url();?>js/plugins/plupload/plupload.full.js"></script>
	<script src="<?php echo base_url();?>js/plugins/plupload/jquery.plupload.queue.js"></script>
	<!-- Custom file upload -->
	<script src="<?php echo base_url();?>js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/mockjax/jquery.mockjax.js"></script>
	<!-- select2 -->
	<script src="<?php echo base_url();?>js/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo base_url();?>js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- complexify -->
	<script src="<?php echo base_url();?>js/plugins/complexify/jquery.complexify-banlist.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/complexify/jquery.complexify.min.js"></script>
	<!-- Mockjax -->
	<script src="<?php echo base_url();?>js/plugins/mockjax/jquery.mockjax.js"></script>
        <!-- dataTables -->
	<script src="<?php echo base_url();?>js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/datatable/TableTools.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="<?php echo base_url();?>js/plugins/datatable/ColVis.min.js"></script>
	<script src="<?php echo base_url();?>js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="<?php echo base_url();?>js/plugins/datatable/jquery.dataTables.grouping.js"></script>
        <!-- Notify -->
	<script src="<?php echo base_url();?>js/plugins/gritter/jquery.gritter.min.js"></script>
        
        <!-- Wizard -->
	<script src="<?php echo base_url();?>js/plugins/wizard/jquery.form.wizard.min.js"></script>
	
        
	<!-- Theme framework -->
	<script src="<?php echo base_url();?>js/eakroko.js"></script>
	<!-- Theme scripts -->
	<script src="<?php echo base_url();?>js/application.min.js"></script>
	<!-- Just for demonstration -->
	<!--<script src="<?php echo base_url();?>js/demonstration.js"></script>-->
        
        <?php if(isset($external_scripts)) {
            foreach ($external_scripts as $script) { ?>
                <script type="text/javascript" src="<?php echo $script; ?>"></script>
        
            <?php }
        }?>
        
        
        <?php if(isset($scripts)) {
            foreach ($scripts as $script) { ?>
                <script src="<?php echo base_url()."js/".$script; ?>.js?version=0.0.0"></script>
        
            <?php }
        
        }?>
        
        
	<!--[if lte IE 9]>
		<script src="<?php echo base_url();?>js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>img/apple-touch-icon-precomposed.png" />
</body>

</html>

