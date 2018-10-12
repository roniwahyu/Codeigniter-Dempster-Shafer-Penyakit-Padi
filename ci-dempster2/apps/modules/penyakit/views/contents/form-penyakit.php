<div class="row clearfix">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
		<div id="form_input" class="">
		<?php echo form_open(base_url('penyakit/submit'),array('id'=>'addform','role'=>'form','class'=>'form')); ?>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<input type="hidden" value='<?php  echo !empty($default['id_penilaian'])?$default['id_penilaian']:'' ?>' id="id_penyakit" name="id_penyakit">

					<div class="form-group">
						<?php echo form_label('Kode : ','kode',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('kode','','id="kode" class="form-control" placeholder="Enter kode"'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo form_label('Penyakit : ','penyakit',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('penyakit','','id="penyakit" class="form-control" placeholder="Enter penyakit"'); ?>
						</div>
					</div>
				
					
					<div class="form-group">
						<?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
						</div>
					</div>

					

				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="form-group">
						<?php echo form_label('Penyebab : ','penyebab',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('penyebab','','id="penyebab" class="form-control" placeholder="Enter penyebab"'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo form_label('Saran Penanggulangan : ','penanggulangan',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('penanggulangan','','id="penanggulangan" class="form-control" placeholder="Enter penanggulangan"'); ?>
						</div>
					</div>
				

				
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<button id="save" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
					<button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
					<a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
				</div>
			</div>
		<?php echo form_close();?>
		</div>
	</div>
</div>