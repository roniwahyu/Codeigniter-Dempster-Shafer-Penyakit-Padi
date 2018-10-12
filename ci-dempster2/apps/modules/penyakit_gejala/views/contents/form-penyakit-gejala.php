<div class="row clearfix">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
		<div id="form_input" class="">
		<?php echo form_open(base_url().'penyakit_gejala/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input type="hidden" value='' id="id_peny_gejala" name="id_peny_gejala">
					<div class="form-group">
						<?php echo form_label('id_penyakit : ','id_penyakit',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('id_penyakit','','id="id_penyakit" class="form-control" placeholder="Enter id_penyakit"'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo form_label('id_gejala : ','id_gejala',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('id_gejala','','id="id_gejala" class="form-control" placeholder="Enter id_gejala"'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo form_label('density : ','density',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('density','','id="density" class="form-control" placeholder="Enter density"'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
						<div class="controls">
						<?php echo form_input('datetime','','id="datetime" class="form-control" placeholder="Enter datetime"'); ?>
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