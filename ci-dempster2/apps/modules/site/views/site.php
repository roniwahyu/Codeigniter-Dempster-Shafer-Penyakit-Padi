<?php if(!isset($data)): ?>
<div class="jumbotron">
	<div class="container text-center">
		<h1>Sistem Pakar Penyakit Padi</h1>
		<h3>Menggunakan Metode Dempster Shafer</h3>
		<p>&nbsp;</p>
		<p>
			<a href="<?php echo base_url('wizard') ?>" class="btn btn-danger btn-lg">Diagnosa Penyakit Padi</a>
		</p>
	</div>
</div>
<?php else: ?>
	<div class="row">
		<button type="button" class="print pull-right btn-lg btn btn-info no-print"><i class="glyphicon glyphicon-print"></i> Cetak</button>
		<h1>Laporan Sistem Pakar Penyakit Padi</h1>
		<h3>Menggunakan Metode Dempster Shafer</h3>
		<hr>
		<?php echo $data; ?>
	</div>
<?php endif; ?>