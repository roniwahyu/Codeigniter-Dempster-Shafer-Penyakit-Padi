<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
    <div id="form_input" class="">
        <?php echo form_open(base_url().'gejala/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <input type="hidden" value='' id="id_gejala" name="id_gejala">

                <div class="form-group">
                    <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                    <div class="controls">
                    <?php echo form_input('kode','','id="kode" class="form-control" placeholder="Enter kode"'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('gejala : ','gejala',array('class'=>'control-label')); ?>
                    <div class="controls">
                    <?php echo form_input('gejala','','id="gejala" class="form-control" placeholder="Enter gejala"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('densitas : ','densitas',array('class'=>'control-label')); ?>
                    <div class="controls">
                    <?php echo form_input('densitas','','id="densitas" class="form-control" placeholder="Enter densitas"'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">    
                <div class="form-group">
                    <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                    <div class="controls">
                    <?php echo form_textarea('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
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