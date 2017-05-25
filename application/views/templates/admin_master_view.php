<?php error_reporting(E_ERROR);?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/_parts/admin_master_header_view'); ?>
 
	<div class="container">
		<div class="main-content" style="padding-top:40px;">
			<?php echo $the_view_content; ?>
		</div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo site_url('assets/admin/js/bootstrap.min.js');?>"></script>
<?php echo $before_body;?>

</body>

</html>

