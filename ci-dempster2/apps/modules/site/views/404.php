<?php if(isset($error) || $error!==null): ?>
<div class="jumbotron">
	<div class="container text-center">
		<h1>Error!</h1>
		<?php if(isset($msg) || $msg!==null): ?>
		<h3><?php echo $msg; ?></h3>
		<?php endif; ?>
		<p>
			<a href="<?php echo base_url('wizard') ?>" class="btn btn-danger btn-lg">Uji Kepakaran</a>
		</p>
	</div>
</div>
<?php else: ?>
	<div class="row">
		<?php echo $error; ?>
	</div>
<?php endif; ?>