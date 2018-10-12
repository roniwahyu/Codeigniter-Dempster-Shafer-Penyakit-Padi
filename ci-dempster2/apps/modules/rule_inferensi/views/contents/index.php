    <div class="row">
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar Rule_inferensi</a></li>
                    <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah Rule_inferensi Baru</a></li>
                </ul>
                <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-table"></i> Daftar Rule_inferensi</h6> 
                                <div class="btn-group pull-right">
                                    <a href="#outside" data-toggle="tab" class="baru btn btn-success"><i class="icon-plus"></i> Tambah Rule_inferensi Baru</a>
                                </div> 
                            </div>
                            <div class="datatable-ajax-source">
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="font-size:11px;">
                                    <thead class="">
                                        <tr>
                                                        <th>ID</th>
                                                        <th>Kode Penyakit</th>
                                                        <th>Penyakit</th>
                                                        <th>Kode Gejala</th>
                                                        <th>Gejala</th>
                                                        <!-- <th>Densitas Rule </th> -->
                                                        <th>Date Time</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="5" class="dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data...</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                    <!-- Second tab content -->
                    <div class="tab-pane fade" id="outside">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon-table"></i> Form rule_inferensi</h3>
                                    <div class="btn-group pull-right">
                                        <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Rule_inferensi</a>
                                        <a class="btn btn-info reset" href="#" >Reset Form</a>
                                    </div> 
                                </div>
                                <div class="panel-body">
                                    <div class="row clearfix">
                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                                            <div id="form_input" class="">
                                                <?php echo form_open(base_url().'rule_inferensi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                            
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                        <input type="hidden" value='' id="id_peny_gejala" name="id_peny_gejala">
                                                        

                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('id_penyakit : ','id_penyakit',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php //echo form_input('id_penyakit','','id="id_penyakit" class="form-control" placeholder="Enter id_penyakit"'); ?>
                                                                    <?php echo form_dropdown('id_penyakit',$penyakit,'','id="id_penyakit" class="form-control"'); ?>
                                                                </div>
                                                        </div>
                                                    </div>  
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                           
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('id_gejala : ','id_gejala',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_dropdown('id_gejala',$gejala,'','id="id_gejala" class="form-control"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                       
                                                    </div> 
                                                    <!-- <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                           
                                                        
                                                        <div class="form-group">
                                                                <?php //echo form_label('densitas : ','densitas',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php //echo form_input('densitas','','id="densitas" class="form-control"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                       
                                                    </div> -->
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
                                </div>
                        </div>
                    <!-- /second tab content -->
                    </div>

            </div>
    </div>
</div>


        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

               
                
            
            </div>
        </div>
        
<!--     </div>
</div> -->
