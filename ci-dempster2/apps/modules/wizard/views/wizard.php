<div class="row" style="margin-top:20px;">

<form id="question" role="form" method="post" action="<?php echo base_url('wizard/proses_inferensi'); ?>">
    
    <!-- <div class="row setup-content" id="step-1"> -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Informasi Pengguna</h3>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            

                <div class="form-group">
                    <label for="">Nama Pengguna</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Pengguna" required="required">
                </div>               
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Email" required="required">
                </div>               
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="">Handphone</label>
                    <input name="handphone" type="text" class="form-control" id="handphone" placeholder="Handphone">
                </div>               
        </div>  
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            
        </div>
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Gejala Penyakit</h3>
		</div>  
        <div class="btn-group" data-toggle="buttons">
                <?php 
                    if($data!==null): 
                        foreach ($data as $key => $value) {?>    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        
                   
                        <label class="btn btn-md btn-block btn-info" style="text-align:left"><span class="text-left">
                            <input type="checkbox" value="<?php echo $value['id_gejala'] ?>" name="id_gejala[]" id="id_gejala">
                            <span style="margin-left:0px;" ><?php echo "(".$value['kode'].") ".$value['gejala'] ?></span>
                            </span>
                        </label>
                     </div>
                     <?php } 
                    endif;
                ?>
    	</div>
    <!-- </div> -->
   
    <div class="col-md-12 text-center" style="margin-top:30px">
    <button id="save" class="btn btn-danger btn-lg btn-block nextBtn" type="submit">Diagnosa Penyakit Padi</button>

    </div>
</form>
</div>